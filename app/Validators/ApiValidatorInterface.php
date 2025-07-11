<?php

namespace App\Validators;

use Illuminate\Validation\ValidationException;

interface ApiValidatorInterface
{
    /**
     * @throws ValidationException
     */
    public function validate(array $data): void;
}
