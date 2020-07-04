<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //users
        DB::table('users')->insert([
            'name' => 'Luis Furtado',
            'email' => 'luiscesm1@gmail.com',
            'phone' => '61999137803',
            'password' => Hash::make('99868234'),
        ]);

        //event categories
        DB::table('event_categories')->insert([
            'name'  => 'Show Sertanejo',
        ]);

        //events
        DB::table('events')->insert([
            'title' => 'Villa Mix',
            'attractions' => 'Marilia Mendonça, Henrique & Juliano',
            'location' => 'Mané Garrincha, Brasília - DF',
            'date' => Carbon::now(),
            'price' => 180.00,
            'description' => 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ',
            'user_id' => 1,
            'event_category_id' => 1,
        ]);

        //tickets
        DB::table('tickets')->insert([
            'event_id' => 1,
            'user_id' => 1,
        ]);

    }
}
