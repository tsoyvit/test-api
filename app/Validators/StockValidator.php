<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class StockValidator implements ApiValidatorInterface
{
    /**
     * @throws ValidationException
     */
    public function validate(array $data): void
    {
        $validator = Validator::make($data, [
            'date'                => ['required', 'date'],
            'last_change_date'    => ['nullable', 'date'],
            'supplier_article'    => ['nullable', 'string', 'max:255'],
            'tech_size'           => ['nullable', 'string', 'max:255'],
            'barcode'             => ['nullable', 'integer'],
            'quantity'            => ['nullable', 'integer'],
            'is_supply'           => ['nullable', 'boolean'],
            'is_realization'      => ['nullable', 'boolean'],
            'quantity_full'       => ['nullable', 'integer'],
            'warehouse_name'      => ['nullable', 'string', 'max:255'],
            'in_way_to_client'    => ['nullable', 'integer'],
            'in_way_from_client'  => ['nullable', 'integer'],
            'nm_id'               => ['nullable', 'integer'],
            'subject'             => ['nullable', 'string', 'max:255'],
            'category'            => ['nullable', 'string', 'max:255'],
            'brand'               => ['nullable', 'string', 'max:255'],
            'sc_code'             => ['nullable', 'integer'],
            'price'               => ['nullable', 'numeric'],
            'discount'            => ['nullable', 'numeric'],
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
