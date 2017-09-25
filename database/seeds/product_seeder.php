<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class product_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $sizes            = array("10ml", "20ml", "50ml", "65ml", "1l");
        $aficionado_items = array("F1", "F4", "F5", "F62", "F63"); 
        $prescripto_items = array("P2", "P3", "P7", "P18", "P25");
        $johnson_items    = array("J8", "J9", "J10", "J90", "J23");
        $bench_items      = array("B15", "B11", "B47", "B17", "B21");
        $lacoste_items    = array("L19", "L21", "L23", "L61", "L67");

        

        // for($i=0;$i<5;$i++){
        // 	echo 1+$i." = "; 

        	for($a=0;$a<5;$a++){

                for($b=0;$b<5;$b++){

                    // for($c=0;$c<5;$c++){

        	        	DB::table('products')->insert([
                            // 'id' => $a,
        	        		'name' => $aficionado_items[$a],
        	        		'description' => $sizes[$b],
        	        		'category_id' => "1",
        	        		'barcode' => str_random(7),
        	        		'created_at' => Carbon::now()
        	        	]);
                    // }
                }
	       		echo ". ";
	        }
	        echo "\n";

            for($a=0;$a<5;$a++){

                for($b=0;$b<5;$b++){

                    // for($c=0;$c<5;$c++){

                        DB::table('products')->insert([
                            // 'id' => $a,
                            'name' => $prescripto_items[$a],
                            'description' => $sizes[$b],
                            'category_id' => "2",
                            'barcode' => str_random(7),
                            'created_at' => Carbon::now()
                        ]);
                    // }
                }
                echo ". ";
            }
            echo "\n";

            for($a=0;$a<5;$a++){

                for($b=0;$b<5;$b++){

                    // for($c=0;$c<5;$c++){

                        DB::table('products')->insert([
                            // 'id' => $a,
                            'name' => $johnson_items[$a],
                            'description' => $sizes[$b],
                            'category_id' => "3",
                            'barcode' => str_random(7),
                            'created_at' => Carbon::now()
                        ]);
                    // }
                }
                echo ". ";
            }
            echo "\n";

            for($a=0;$a<5;$a++){

                for($b=0;$b<5;$b++){

                    // for($c=0;$c<5;$c++){

                        DB::table('products')->insert([
                            // 'id' => $a,
                            'name' => $bench_items[$a],
                            'description' => $sizes[$b],
                            'category_id' => "4",
                            'barcode' => str_random(7),
                            'created_at' => Carbon::now()
                        ]);
                    // }
                }
                echo ". ";
            }
            echo "\n";

            for($a=0;$a<5;$a++){

                for($b=0;$b<5;$b++){

                    // for($c=0;$c<5;$c++){

                        DB::table('products')->insert([
                            // 'id' => $a,
                            'name' => $lacoste_items[$a],
                            'description' => $sizes[$b],
                            'category_id' => "5",
                            'barcode' => str_random(7),
                            'created_at' => Carbon::now()
                        ]);
                    // }
                }
                echo ". ";
            }
            echo "\n";


    }
}
