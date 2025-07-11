<?php

namespace App\Services;

use App\Repositories\Interfaces\SaleRepositoryInterface;
use App\Validators\SaleValidator;

class SaleService extends AbstractSyncService
{
    public function __construct(SaleRepositoryInterface $repository, SaleValidator $validator)
    {
        parent::__construct($repository, $validator);
    }
}
