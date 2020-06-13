<?php

use Illuminate\Database\Seeder;
use App\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (City::count() == 0) {
            $data = [
                [
                    'name' => "Islamabad",
                ],
                [
                    'name' => "Rawalpindi",
                ],
                [
                    'name' => "Lahore",
                ],
                [
                    'name' => "Murree",
                ],
                [
                    'name' => "Sawat",
                ],
                [
                    'name' => "Karachi",
                ],
            ];
            City::insert($data);
    	}else{
    		echo "*users* Table Already has Data\n";
    	}
    }
}
