<?php

namespace App\Repositories\Api;

use App\Models\Income;
use App\Repositories\Interfaces\IncomeRepositoryInterface;

class IncomeRepositoryApi extends BaseRepositoryApi implements IncomeRepositoryInterface
{
    protected string $endpoint = '/api/incomes';

    public function upsert(array $items, array $uniqueBy, array $upsertFields): void
    {
        Income::upsert($items, $uniqueBy, $upsertFields);
    }
}
