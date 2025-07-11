<?php

namespace App\Services;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Validators\OrderValidator;

class OrderService extends AbstractSyncService
{
    protected array $uniqueBy = ['g_number'];
    protected array $upsertFields = [
        'date', 'last_change_date', 'supplier_article',
        'tech_size', 'barcode', 'total_price',
        'discount_percent', 'warehouse_name', 'oblast',
        'income_id', 'odid', 'nm_id', 'subject',
        'category', 'brand', 'is_cancel', 'cancel_dt'
    ];

    public function __construct(OrderRepositoryInterface $repository, OrderValidator $validator)
    {
        parent::__construct($repository, $validator);
    }
}
