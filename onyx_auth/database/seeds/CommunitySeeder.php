<?php

use Illuminate\Database\Seeder;

class CommunitySeeder extends Seeder{

	public function run(){
		$communities = array(
			['id'=> 1, 'name' => "Andalucía"],
			['id'=> 2, 'name' => "Aragón"],
			['id'=> 3, 'name' => "Asturias"],
			['id'=> 4, 'name' => "Baleares"],
			['id'=> 5, 'name' => "Canarias"],
			['id'=> 6, 'name' => "Cantabria"],
			['id'=> 7, 'name' => "Castilla-La Mancha"],
			['id'=> 8, 'name' => "Castilla y León"],
			['id'=> 9, 'name' => "Cataluña"],
			['id'=> 10, 'name' => "Comunidad Valenciana"],
			['id'=> 11, 'name' => "Extremadura"],
			['id'=> 12, 'name' => "Galicia"],
			['id'=> 13, 'name' => "Madrid"],
			['id'=> 14, 'name' => "Murcia"],
			['id'=> 15, 'name' => "Navarra"],
			['id'=> 16, 'name' => "País Vasco"],
			['id'=> 17, 'name' => "La Rioja"]
		);

		DB::table('communities')->insert($communities);
	}
}
