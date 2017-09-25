<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class price_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $afficionado = array("f95", "f89", "f87", "f23", "f64");
        $penshoppe = array("p96", "p81", "p58", "p15", "p4");
        $johnsons = array("j43", "j76", "j40", "j45", "j18");
        $bench = array("b69", "b49", "b24", "b20", "b76" );
        $lacoste = array("l23", "l41", "l25", "l57", "l81");

       	$sizes = array("10ml", "20ml", "50ml", "65ml", "1l	");
       	
       	$prices_afficionado = array("75.00", "100.00", "150.00", "200.00", "500.00");

       	$prices_penshoppe = array("80.00", "110.00", "160.00", "210.00", "510.00");

       	$prices_johnsons= array("50.00", "75.00", "120.00", "150.00", "300.00");

       	$prices_bench = array("79.99", "99.99", "149.99", "199.99", "499.99");

       	$prices_lacoste = array("200.00", "300.00", "400.00", "500.00", "1020.50");

			
		
	       	for($i=0;$i<5;$i++){
	       		
	       			DB::table('product_prices')->insert([
		       			'product_id' => $i+1,
		       			'description' => $sizes[$i],
		       			'price'=> $prices_afficionado[$i],
		       			'created_at'=> Carbon::now()
		       			
		       		]);
		       		
       		}
	       	
	       
	     	for($i=0;$i<5;$i++){

	       		DB::table('product_prices')->insert([
	       			'product_id' => $i+6,
	       			'description' => $sizes[$i],
	       			'price'=> $prices_penshoppe[$i],
	       			'created_at'=> Carbon::now()
       			]);
       		}
	    

	       	for($i=0;$i<5;$i++){

   		   		DB::table('product_prices')->insert([
		       			'product_id' => $i+11,
		       			'description' => $sizes[$i],
		       			'price'=> $prices_johnsons[$i],
		       			'created_at'=> Carbon::now()
	       			]);
      		
	       	}
	    	    

	       	for($i=0;$i<5;$i++){

	     		DB::table('product_prices')->insert([
		       			'product_id' => $i+16,
		       			'description' => $sizes[$i],
		       			'price'=> $prices_bench[$i],
		       			'created_at'=> Carbon::now()
	       			]);
	       	}
	    


			for($i=0;$i<5;$i++){

				DB::table('product_prices')->insert([
		       			'product_id' => $i+21,
		       			'description' => $sizes[$i],
		       			'price'=> $prices_lacoste[$i],
		       			'created_at'=> Carbon::now()
	       			]);
				echo ". ";
	       	}
	   
	    
    }
    
}
