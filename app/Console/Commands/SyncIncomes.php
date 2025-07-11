<?php

namespace App\Console\Commands;

use App\Services\IncomeService;
use Illuminate\Console\Command;

class SyncIncomes extends Command
{
    protected $signature = 'sync:incomes';

    protected $description = 'Sync incomes data from API to database';

    public function __construct(private readonly IncomeService $incomeService)
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $this->info('Starting incomes sync...');
        $this->incomeService->sync();
        $this->info('Incomes sync completed.');
    }
}
