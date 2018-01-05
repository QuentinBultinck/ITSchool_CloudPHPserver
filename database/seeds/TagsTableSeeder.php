<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Belgian',
                'created_at' => '2017-12-29 19:06:57',
                'updated_at' => '2017-12-29 19:06:57',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Chinese',
                'created_at' => '2017-12-29 19:06:57',
                'updated_at' => '2017-12-29 19:06:57',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'chique',
                'created_at' => '2018-01-05 19:27:20',
                'updated_at' => '2018-01-05 19:27:20',
            ),
        ));
        
        
    }
}