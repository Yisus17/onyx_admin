<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model{
	protected $fillable = [
		'delivery_date', 'return_date', 'instalation_date', 
		'start_date', 'end_date', 'uninstalation_date',
		'validity', 'description', 'address', 
		'payment_conditions', 'payment_method', 'tax_percentage', 'notes'];

	protected $dates = [
		'delivery_date', 'return_date', 
		'instalation_date', 'start_date', 'end_date', 'uninstalation_date'];

	public function client(){
		return $this->belongsTo(Client::class);
	}

	public function products(){
    return $this->belongsToMany(Product::class);
	}
	
	public function getTotalWithTax(){
		$taxTotal = getPercentageValue($this->total, $this->tax_percentage);
		return $this->total + $taxTotal;
	}

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
