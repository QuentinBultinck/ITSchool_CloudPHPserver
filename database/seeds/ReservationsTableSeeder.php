<?php

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('reservations')->delete();
        
        \DB::table('reservations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'date' => '2018-01-17',
                'people' => 4,
                'time' => '13:00:00',
                'extraInfo' => 'Meeting',
                'restaurant_id' => 2,
                'user_id' => 2,
                'created_at' => '2018-01-05 19:28:02',
                'updated_at' => '2018-01-05 19:28:02',
            ),
        ));
        
        
    }
}