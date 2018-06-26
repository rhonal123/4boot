<?php

use Illuminate\Database\Seeder;
use App\IncidenceType;

class IncidenceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 1000; $i++) { 
    		IncidenceType::create(['type'=> 'Incidence N '. $i ]);
    	}
    }
}
