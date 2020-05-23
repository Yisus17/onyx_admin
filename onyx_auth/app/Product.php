<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
	protected $unitPricePercentage = 5;

	protected $fillable = [
		'code', 'brand', 'model', 'description', 
		'type', 'serial', 'purchase_price', 'status', 
		'bought_by', 'countable', 'purchase_date', 'years_old'];

	protected $casts = [
		'countable' => 'boolean'
	];

	protected $dates = ['purchase_date'];

	public function category(){
		return $this->belongsTo(Category::class);
	}

	public function budgets(){
    return $this->belongsToMany(Budget::class);
  }

	public function getUnitPriceAttribute(){
		return getPercentageValue($this->purchase_price, $this->unitPricePercentage);
	}

	public static function getValidityOptions(){
		$validityOptions = [
			'1d' => '1 día',
			'1s' => '1 semana',
			'15d' => '15 días',
			'1m' => '1 mes'
		];
		return $validityOptions;
	}
}
