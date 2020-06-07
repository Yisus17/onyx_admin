<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model{
  public function clients(){
		return $this->hasMany(Client::class);
	}
}
