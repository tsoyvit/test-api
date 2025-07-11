<?php

namespace App\Services;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Validators\ApiValidatorInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

abstract class AbstractSyncService
{
    protected BaseRepositoryInterface $repository;
    protected ApiValidatorInterface $validator;
    protected string $defaultDateFrom = '2025-01-01';
    protected string $defaultDateTo;

    public function __construct(BaseRepositoryInterface $repository, ApiValidatorInterface $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->defaultDateTo = now()->format('Y-m-d');
    }

    public function sync(?\DateTime $dateFrom = null, ?\DateTime $dateTo = null): void
    {
        $dateFrom ??= new \DateTime($this->defaultDateFrom);
        $dateTo ??= new \DateTime($this->defaultDateTo);

        $page = 1;

        do {
            $response = $this->fetchData($dateFrom, $dateTo, $page);
            $items = $response['data'] ?? [];

            if (empty($items)) {
                break;
            }

            $this->processItems($items);

            $page++;
        } while ($page <= ($response['meta']['last_page'] ?? 1));
    }

    protected function processItems(array $items): void
    {
        $validItems = [];

        foreach ($items as $item) {
            try {
                $this->validate($item);
                $validItems[] = $this->prepareItem($item);
            } catch (ValidationException $e) {
                Log::error(get_class($this) . ' validation error', [
                    'item' => $item,
                    'errors' => $e->errors()
                ]);
            }
        }

        if (!empty($validItems)) {
            $this->repository->insert($validItems);
        }
    }

    protected function prepareItem(array $item): array
    {
        return $item + [
                'created_at' => now(),
                'updated_at' => now()
            ];
    }

    protected function fetchData(\DateTime $dateFrom, \DateTime $dateTo, int $page): array
    {
        return $this->repository->fetch(
            $dateFrom->format('Y-m-d'),
            $dateTo->format('Y-m-d'),
            $page
        );
    }

    /**
     * @throws ValidationException
     */
    protected function validate(array $item): void
    {
        $this->validator->validate($item);
    }
}
