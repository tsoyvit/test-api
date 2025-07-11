<?php

namespace App\Services;

use App\Repositories\Interfaces\StockRepositoryInterface;
use App\Validators\StockValidator;

class StockService extends AbstractSyncService
{
    protected array $uniqueBy = ['g_number'];
    protected array $upsertFields = [
        'date', 'last_change_date', 'supplier_article',
        'tech_size', 'barcode', 'quantity', 'is_supply',
        'is_realization', 'quantity_full', 'warehouse_name',
        'in_way_to_client', 'in_way_from_client',
        'nm_id', 'subject', 'category', 'brand',
        'sc_code', 'price', 'discount',
    ];

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
