<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEditProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required', 
            'brand' => 'required', 
            'model' => 'required', 
            'description' => 'required', 
            'type' => 'required', 
            'purchase_price' => 'required|numeric', 
            'status' => 'required', 
            'bought_by' => 'required', 
            'purchase_date' => 'date', 
            'years_old' => 'required|numeric'
        ];
    }
}
