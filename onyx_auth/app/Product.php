<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    protected $fillable = [
        'code', 'brand', 'model', 'description', 
        'type', 'serial', 'purchase_price', 'status', 
        'bought_by', 'countable', 'purchase_date', 'years_old'];

    public function category(){
    	return $this->belongsTo(Category::class);
    }
}
