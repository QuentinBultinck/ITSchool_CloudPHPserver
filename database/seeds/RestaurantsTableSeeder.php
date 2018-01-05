<?php

use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('restaurants')->delete();
        
        \DB::table('restaurants')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Quentin\'s Foodplace',
                'info' => 'I make food',
                'openingTime' => '12:00:00',
                'closingTime' => '23:00:00',
                'city' => 'Gistel',
                'country' => 'Belgium',
                'street' => 'Warandestraat',
                'houseNumber' => 41,
                'tables' => 15,
                'owner_id' => 1,
                'created_at' => '2017-12-29 19:06:57',
                'updated_at' => '2017-12-29 19:06:57',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Martino\'s Bar',
                'info' => 'Michaël Vrijmoed kan worden omschreven als een kok uit de nieuwe generatie die werd gevormd door zijn vroegere leermeesters zoals onder andere Guy Van Cauteren “t’Laurierblad” en Peter Goossens “Hof Van Cleve”.

In zijn restaurant gelegen in het hart van de levendige stad Gent brengt hij een hedendaagse keuken die barst van dynamiek, eigen signatuur en eerlijke smaken.',
                'openingTime' => '12:00:00',
                'closingTime' => '23:00:00',
                'city' => 'Gent',
                'country' => 'Belgium',
                'street' => 'Vlaanderenstraat',
                'houseNumber' => 22,
                'tables' => 25,
                'owner_id' => 2,
                'created_at' => '2018-01-05 19:27:20',
                'updated_at' => '2018-01-05 19:27:20',
            ),
        ));
        
        
    }
}