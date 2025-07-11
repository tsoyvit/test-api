<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class IncomeValidator implements ApiValidatorInterface
{
    /**
     * @throws ValidationException
     */
    public function validate(array $data): void
    {
        $validator = Validator::make($data, [
            'income_id'        => ['required', 'integer'],
            'number'           => ['nullable', 'string', 'max:255'],
            'date'             => ['required', 'date'],
            'last_change_date' => ['nullable', 'date'],
            'supplier_article' => ['required', 'string', 'max:255'],
            'tech_size'        => ['required', 'string', 'max:255'],
            'barcode'          => ['required', 'integer'],
            'quantity'         => ['required', 'integer'],
            'total_price'      => ['required', 'numeric'],
            'date_close'       => ['nullable', 'date'],
            'warehouse_name'   => ['required', 'string', 'max:255'],
            'nm_id'            => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
