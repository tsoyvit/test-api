<?php

namespace App\Repositories\Api;

use App\Models\Sale;
use App\Repositories\Interfaces\SaleRepositoryInterface;

class SaleRepositoryApi extends BaseRepositoryApi implements SaleRepositoryInterface
{
    protected string $endpoint = '/api/sales';

    public function insert(array $items): void
    {
        Sale::insert($items);
    }
}
