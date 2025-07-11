<?php

namespace App\Repositories\Api;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepositoryApi extends BaseRepositoryApi implements OrderRepositoryInterface
{
    protected string $endpoint = '/api/orders';

    public function insert(array $items): void
    {
        Order::insert($items);
    }
}
