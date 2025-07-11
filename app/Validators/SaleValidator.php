<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SaleValidator implements ApiValidatorInterface
{
    /**
     * @throws ValidationException
     */
    public function validate(array $data): void
    {
        $validator = Validator::make($data, [
            'g_number'             => ['required', 'string', 'max:255'],
            'date'                 => ['required', 'date'],
            'last_change_date'     => ['nullable', 'date'],
            'supplier_article'     => ['required', 'string', 'max:255'],
            'tech_size'            => ['required', 'string', 'max:255'],
            'barcode'              => ['required', 'integer'],
            'total_price'          => ['required', 'numeric'],
            'discount_percent'     => ['required', 'numeric'],
            'is_supply'            => ['required', 'boolean'],
            'is_realization'       => ['required', 'boolean'],
            'promo_code_discount'  => ['nullable', 'numeric'],
            'warehouse_name'       => ['required', 'string', 'max:255'],
            'country_name'         => ['required', 'string', 'max:255'],
            'oblast_okrug_name'    => ['nullable', 'string', 'max:255'],
            'region_name'          => ['nullable', 'string', 'max:255'],
            'income_id'            => ['required', 'integer'],
            'sale_id'              => ['required', 'string', 'max:255'],
            'odid'                 => ['nullable', 'string', 'max:255'],
            'spp'                  => ['required', 'numeric'],
            'for_pay'              => ['required', 'numeric'],
            'finished_price'       => ['required', 'numeric'],
            'price_with_disc'      => ['required', 'numeric'],
            'nm_id'                => ['required', 'integer'],
            'subject'              => ['required', 'string', 'max:255'],
            'category'             => ['required', 'string', 'max:255'],
            'brand'                => ['required', 'string', 'max:255'],
            'is_storno'            => ['nullable', 'boolean'],
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
