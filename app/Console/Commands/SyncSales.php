<?php

namespace App\Console\Commands;

use App\Services\SaleService;
use Illuminate\Console\Command;

class SyncSales extends Command
{
    protected $signature = 'sync:sales';

    protected $description = 'Sync sales data from API to database';

    public function __construct(private readonly SaleService $saleService)
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $this->info('Starting sales sync...');
        $this->saleService->sync();
        $this->info('Sales sync completed.');
    }
}
