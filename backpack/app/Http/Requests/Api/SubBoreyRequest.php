<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SubBoreyRequest extends FormRequest
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
        $exceptUnique = $this->route('sub_boreie')->id ?? null;
        switch($this->route()->action['as']) {
            case 'api.sub-boreies.store':
            case 'api.sub-boreies.update':
                return [
                    'name' => 'required|min:3|unique:sub_boreies,name,'.$exceptUnique,
                    'address' => 'nullable|numeric|digits_between:2,8',
                    'qty' => 'nullable|integer',
                    'profile' => 'nullable'
                ]; break;
            // case 'api.sub-boreies.update': return [
            //     'name' => 'required|min:3|unique:sub_boreies,name,'.$exceptUnique
            // ]; break;
            default: return [];
        }
    }

    public function messages()
    {
        return [
            // 'name.unique' => json_encode($this->route('sub_boreie')->id)
        ];
    }
}
