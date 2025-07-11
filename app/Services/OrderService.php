<?php

namespace App\Services;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Validators\OrderValidator;

class OrderService extends AbstractSyncService
{
    public function __construct(OrderRepositoryInterface $repository, OrderValidator $validator)
    {
        parent::__construct($repository, $validator);
    }
}
