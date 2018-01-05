<?php

use Illuminate\Database\Seeder;

class RestaurantTagTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('restaurant_tag')->delete();
        
        \DB::table('restaurant_tag')->insert(array (
            0 => 
            array (
                'restaurant_id' => 1,
                'tag_id' => 1,
            ),
            1 => 
            array (
                'restaurant_id' => 1,
                'tag_id' => 2,
            ),
            2 => 
            array (
                'restaurant_id' => 2,
                'tag_id' => 3,
            ),
        ));
        
        
    }
}