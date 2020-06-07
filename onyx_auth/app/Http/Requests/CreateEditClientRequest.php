<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateEditClientRequest extends FormRequest{
	public function authorize(){
		return \Auth::check();
	}
    

	public function rules(){
		return [
			'business_name' => 'required', 
			'name' => 'required', 
			'lastname' => 'required', 
			'address' => 'required', 
			'phone' => 'required', 
			'email' => array('required', 'email', Rule::unique('clients', 'email')->ignore($this->client))
		];
	}
}
