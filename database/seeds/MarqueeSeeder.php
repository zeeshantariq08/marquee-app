<?php
use App\Marquee;
use Illuminate\Database\Seeder;

class MarqueeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Marquee::count() == 0) {
    		$data = [
    					[
				        'slug' 		    => "NAZAR-SONS-BANQUET-HALL",
				        'name' 	=> "NAZAR SONS BANQUET HALL",
				        'phone_no' 	=> "03002425265",
				        'address' 	=> "Hall no 7,Garrison Golf and Country Club. Lahore cantt",
						'email' 	=> "nsbh@gmail.com",
						'description' 	=> "Nazar Sons Banquet Halls have held a legacy in the Lahore since 1989, and to date have upheld it. A part of Garrison Golf and Country Club halls, these pillarless and spacious halls are backed by popular reviews and superior class services, the company promises a personalized take on your wedding combined with great services, a capacity of upto 1000 guests, 1000+ parking, and delicious menus that fulfill your every need.",
				        'user_id' 	=> "1",
				        'city_id' 	=> "1",
				        'status' => "1"
				    	]
				    	
    				];
		    Marquee::insert($data);
		}else{
			echo "*marque * Table Already has Data\n";
		}
    }
}
