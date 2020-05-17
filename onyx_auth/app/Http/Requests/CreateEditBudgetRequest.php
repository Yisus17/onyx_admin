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
			'payment_method' => 'required'
		];
	}

	public function getValidatorInstance(){
		$this->formatDates();
		return parent::getValidatorInstance();
	}

	protected function formatDates(){
		if($this->request->get('delivery_date')){
			$this->merge([
				'delivery_date' => Carbon::createFromFormat('d/m/Y', $this->request->get('delivery_date'))->format('Y-m-d H:m')
			]);
		}

		if($this->request->get('return_date')){
			$this->merge([
				'return_date' => Carbon::createFromFormat('d/m/Y', $this->request->get('return_date'))->format('Y-m-d H:m')
			]);
		}

		if($this->request->get('instalation_date')){
			$this->merge([
				'instalation_date' => Carbon::createFromFormat('d/m/Y', $this->request->get('instalation_date'))->format('Y-m-d H:m')
			]);
		}

		if($this->request->get('start_date')){
			$this->merge([
				'start_date' => Carbon::createFromFormat('d/m/Y', $this->request->get('start_date'))->format('Y-m-d H:m')
			]);
		}

		if($this->request->get('end_date')){
			$this->merge([
				'end_date' => Carbon::createFromFormat('d/m/Y', $this->request->get('end_date'))->format('Y-m-d H:m')
			]);
		}

		if($this->request->get('uninstalation_date')){
			$this->merge([
				'uninstalation_date' => Carbon::createFromFormat('d/m/Y', $this->request->get('uninstalation_date'))->format('Y-m-d H:m')
			]);
		}
	}
}
