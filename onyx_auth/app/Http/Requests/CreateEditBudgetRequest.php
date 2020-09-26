<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class CreateEditBudgetRequest extends FormRequest{

	public function authorize(){
		return \Auth::check();
	}

	public function rules(){
		return [
			'client_id' => 'required', 
			'validity' => 'required', 
			'address' => 'required', 
			'delivery_date' => 'required', 
			'return_date' => 'required', 
			'instalation_date' => 'required', 
			'start_date' => 'required', 
			'end_date' => 'required',
			'uninstalation_date' => 'required',
			'payment_conditions' => 'required', 
			'payment_method' => 'required',
			'tax_percentage' => 'required',
			'products.*.description' => 'required',
			'products.*.quantity' => 'required|numeric|min:1',
			'products.*.factor' => 'required|numeric|min:1',
			'products.*.unit_price' => 'required|numeric',
			'products.*.discount' => 'nullable|numeric|min:0|max:100'
		];
	}

	public function getValidatorInstance(){
		$this->formatDates();
		return parent::getValidatorInstance();
	}

	protected function formatDates(){
		$eventDates = [
			'delivery_date', 
			'return_date', 
			'instalation_date', 
			'start_date', 
			'end_date',
			'uninstalation_date'
		];

		foreach ($eventDates as $eventDate){
			if($this->request->get($eventDate)){
				$this->merge([
					$eventDate => Carbon::createFromFormat('d/m/Y H:m', $this->request->get($eventDate))->format('Y-m-d H:m')
				]);
			}
		}
	}
}
