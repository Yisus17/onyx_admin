<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model{
	protected $dates = ['delivery_date', 'return_date', 'instalation_date', 'start_date', 'end_date'];

	public static function getPaymentConditions(){
		$paymentConditions = [
			'cash' => 'Contado',
			'advanced' => 'Adelantado',
			'15d' => 'A 15 días',
			'reservation_percentage' => 'Porcentaje de reserva mas saldo pendiente a fecha'
		];
		return $paymentConditions;
	}

	public static function getPaymentMethods(){
		$paymentMethods = [
			'transfer ' => 'Transferencia',
			'cash' => 'Efectivo'
		];
		return $paymentMethods;
	}
}
