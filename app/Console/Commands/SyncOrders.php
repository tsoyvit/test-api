<?php

namespace App\Console\Commands;

use App\Services\OrderService;
use Illuminate\Console\Command;

class SyncOrders extends Command
{
    protected $signature = 'sync:orders';

    protected $description = 'Sync orders data from API to database';

    public function __construct(private readonly OrderService $orderService)
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $this->info('Starting orders sync...');
        $this->orderService->sync();
        $this->info('Orders sync completed.');
    }
}
