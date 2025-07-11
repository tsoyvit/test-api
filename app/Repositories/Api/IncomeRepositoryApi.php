<?php

namespace App\Repositories\Api;

use App\Models\Income;
use App\Repositories\Interfaces\IncomeRepositoryInterface;

class IncomeRepositoryApi extends BaseRepositoryApi implements IncomeRepositoryInterface
{
    protected string $endpoint = '/api/incomes';

    public function insert(array $items): void
    {
        Income::insert($items);
    }
}
