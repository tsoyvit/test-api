<?php

namespace App\Console\Commands;

use App\Services\StockService;
use Illuminate\Console\Command;

class SyncStocks extends Command
{
    protected $signature = 'sync:stocks';

    protected $description = 'Sync stocks data from API to database';

    public function __construct(private readonly StockService $stockService)
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $this->info('Starting stocks sync...');
        $this->stockService->sync();
        $this->info('Stocks sync completed.');
    }
}
