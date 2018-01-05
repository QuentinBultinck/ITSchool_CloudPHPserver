<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'quentin',
                'email' => 'quentin@hotmail.com',
                'password' => '$2y$10$v8Pw3Q.ageEjIX6Jj5axOuSCIpSNpAjLcdqBX39BFH/ufLPhWnMVm',
                'remember_token' => NULL,
                'created_at' => '2017-12-29 19:06:15',
                'updated_at' => '2017-12-29 19:06:15',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'restaurantLover',
                'email' => 'restaurantLover@hotmail.com',
                'password' => '$2y$10$4CJ3EIq6.XMtI/EGjBXWI.Pphc3TicAKuhDWnE4QrjRS7WhuzgFJS',
                'remember_token' => NULL,
                'created_at' => '2018-01-05 19:23:50',
                'updated_at' => '2018-01-05 19:23:50',
            ),
        ));
        
        
    }
}