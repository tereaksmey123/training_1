<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PriceHistoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $exceptUnique = $this->route('price_histories')->id ?? null;
        switch($this->route()->action['as']) {
            case 'api.houses.store':return [
                'house_no' => 'required|min:1',
                'street_no' => 'required|min:1',
                'sub_borey_id' => 'required|integer|exists:sub_boreies,id',
                'latlng' => 'nullable|min:1',
                'owner_primary_phone' => 'nullable|numeric',
                'owner_secondary_phone' => 'nullable|numeric',
                'internal_note' => 'nullable'
            ]; break;
            case 'api.houses.update':
                return [
                    'sub_borey_id' => 'nullable|integer|exists:sub_boreies,id',
                    'rent_price' => 'nullable|numeric',
                    'sale_price' => 'nullable|numeric',
                    'list_price' => 'nullable|numeric',
                    'sold_price' => 'nullable|numeric',
                    'financing_price' => 'nullable|numeric',
                    'owner_name' => 'nullable|min:1|max:255',
                    'owner_primary_phone' => 'nullable|numeric',
                    'owner_secondary_phone' => 'nullable|numeric',
                    'owner_email' => 'nullable|email|min:1|max:255',
                    'latlng' => 'nullable|min:1',
                    'internal_note' => 'nullable|min:1',
                ]; break;
            default: return [];
        }
    }
}
