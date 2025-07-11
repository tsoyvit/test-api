<?php

namespace App\Services;

use App\Repositories\Interfaces\SaleRepositoryInterface;
use App\Validators\SaleValidator;

class SaleService extends AbstractSyncService
{
    protected array $uniqueBy = ['g_number'];
    protected array $upsertFields = [
        'date', 'last_change_date', 'supplier_article',
        'tech_size', 'barcode', 'total_price',
        'discount_percent', 'is_supply', 'is_realization',
        'promo_code_discount', 'warehouse_name', 'country_name',
        'oblast_okrug_name', 'region_name', 'income_id',
        'sale_id', 'odid', 'spp', 'for_pay',
        'finished_price', 'price_with_disc', 'nm_id',
        'subject', 'category', 'brand', 'is_storno',
    ];

    public function __construct(SaleRepositoryInterface $repository, SaleValidator $validator)
    {
        parent::__construct($repository, $validator);
    }
}
