<?php

use Illuminate\Database\Seeder;

class ClientTypeSeeder extends Seeder{

	public function run(){
		$clientTypes = array(
			['id'=> 1, 'name' => "Cliente"],
			['id'=> 2, 'name' => "Proveedor"],
			['id'=> 3, 'name' => "Técnico"],
			['id'=> 4, 'name' => "Transporte"]
		);

		DB::table('client_types')->insert($clientTypes);
	}
}
