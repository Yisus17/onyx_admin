<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class CreateEditProductRequest extends FormRequest{
  
	public function authorize(){
		return \Auth::check();
	}

	public function rules(){
		return [
			'code' => 'required', 
			'brand' => 'required', 
			'model' => 'required', 
			'description' => 'required', 
			'type' => 'required', 
			'purchase_price' => 'required|numeric', 
			'status' => 'required', 
			'bought_by' => 'required', 
			'purchase_date' => 'nullable|date', 
			'years_old' => 'required|numeric',
			'image' => 'image',
			'category_id' => 'required'
		];
	}

	public function getValidatorInstance(){
		$this->formatPurchaseDate();
		return parent::getValidatorInstance();
	}

	protected function formatPurchaseDate(){
		if($this->request->get('purchase_date')){
			$this->merge([
				'purchase_date' => Carbon::createFromFormat('d/m/Y', $this->request->get('purchase_date'))->format('Y-m-d')
			]);
		}
	}
}
