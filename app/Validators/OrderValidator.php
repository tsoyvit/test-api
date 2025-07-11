<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class OrderValidator implements ApiValidatorInterface
{
    /**
     * @throws ValidationException
     */
    public function validate(array $data): void
    {
        $validator = Validator::make($data, [
            'g_number'          => ['required', 'string', 'max:255'],
            'date'              => ['required', 'date_format:Y-m-d H:i:s'],
            'last_change_date'  => ['nullable', 'date'],
            'supplier_article'  => ['required', 'string', 'max:255'],
            'tech_size'         => ['required', 'string', 'max:255'],
            'barcode'           => ['required', 'integer'],
            'total_price'       => ['required', 'numeric'],
            'discount_percent'  => ['required', 'numeric'],
            'warehouse_name'    => ['required', 'string', 'max:255'],
            'oblast'            => ['nullable', 'string', 'max:255'],
            'income_id'         => ['required', 'integer'],
            'odid'              => ['required', 'string', 'max:255'],
            'nm_id'             => ['required', 'integer'],
            'subject'           => ['required', 'string', 'max:255'],
            'category'          => ['required', 'string', 'max:255'],
            'brand'             => ['required', 'string', 'max:255'],
            'is_cancel'         => ['required', 'boolean'],
            'cancel_dt'         => ['nullable', 'date'],
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
