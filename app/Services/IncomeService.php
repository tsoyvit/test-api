<?php

namespace App\Services;

use App\Repositories\Interfaces\IncomeRepositoryInterface;
use App\Validators\IncomeValidator;

class IncomeService extends AbstractSyncService
{
    public function __construct(IncomeRepositoryInterface $repository, IncomeValidator $validator)
    {
        parent::__construct($repository, $validator);
    }
}
