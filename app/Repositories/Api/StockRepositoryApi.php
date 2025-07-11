<?php

namespace App\Repositories\Api;

use App\Models\Stock;
use App\Repositories\Interfaces\StockRepositoryInterface;

class StockRepositoryApi extends BaseRepositoryApi implements StockRepositoryInterface
{
    protected string $endpoint = '/api/stocks';

    public function insert(array $items): void
    {
        Stock::insert($items);
    }
}
