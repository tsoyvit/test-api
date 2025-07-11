<?php

namespace Tests\Feature;

use App\Repositories\Api\IncomeRepositoryApi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IncomeRepositoryApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_fetches_incomes_from_api()
    {
        $repo = new IncomeRepositoryApi();

        $dateFrom = now()->subMonths(6)->format('Y-m-d');
        $dateTo = now()->format('Y-m-d');

        $result = $repo->fetch($dateFrom, $dateTo, 1, 1);

        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
    }
}
