<?php

namespace App\Services;

use App\Repositories\Interfaces\StockRepositoryInterface;
use App\Validators\StockValidator;

class StockService extends AbstractSyncService
{
    public function __construct(StockRepositoryInterface $repository, StockValidator $validator)
    {
        parent::__construct($repository, $validator);
    }

    public function sync(?\DateTime $dateFrom = null, ?\DateTime $dateTo = null): void
    {
        $dateFrom ??= new \DateTime('today');
        $dateTo ??= new \DateTime($this->defaultDateTo);

        parent::sync($dateFrom, $dateTo);
    }
}
