<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model{
	protected $fillable = [
		'name', 'lastname', 'business_name', 
		'address', 'phone', 'secondary_phone', 'email', 'postal_code', 
		'client_type_id', 'community_id' ];

	public function budgets(){
		return $this->hasMany(Budget::class);
	}

	public function invoices(){
		return $this->hasMany(Invoice::class);
	}

	public function clientType(){
		return $this->belongsTo(ClientType::class);
	}

	public function community(){
		return $this->belongsTo(Community::class);
	}

	public function getFullnameAttribute(){
    return $this->name . ' ' . $this->lastname;
	}
}
