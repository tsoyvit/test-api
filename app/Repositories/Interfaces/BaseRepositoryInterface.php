<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function fetch(string $dateFrom, string $dateTo, int $page = 1, int $limit = 500): array;
    public function upsert(array $items, array $uniqueBy, array $upsertFields): void;
}
