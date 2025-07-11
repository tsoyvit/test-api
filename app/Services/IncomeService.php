<?php

namespace App\Services;

use App\Repositories\Interfaces\IncomeRepositoryInterface;
use App\Validators\IncomeValidator;

class IncomeService extends AbstractSyncService
{
    protected array $uniqueBy = ['income_id'];
    protected array $upsertFields = [
        'number', 'date', 'last_change_date', 'supplier_article',
        'tech_size', 'barcode', 'quantity', 'total_price', 'date_close',
        'warehouse_name', 'nm_id', 'updated_at'
    ];

    public function __construct(IncomeRepositoryInterface $repository, IncomeValidator $validator)
    {
        parent::__construct($repository, $validator);
    }
}
