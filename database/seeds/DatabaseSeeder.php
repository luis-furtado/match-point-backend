<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Fulano de tal',
            'email' => 'fulanodetal@gmail.com',
            'phone' => '61999137803',
            'password' => Hash::make('123456789'),
        ]);

        //event categories
        DB::table('event_categories')->insert([
            'name'  => 'Show Sertanejo',
        ]);
        DB::table('event_categories')->insert([
            'name'  => 'House',
        ]);
        DB::table('event_categories')->insert([
            'name'  => 'Show Funk',
        ]);
        DB::table('event_categories')->insert([
            'name'  => 'Show Rap',
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
            'tickets_available' => 10,
        ]);

    }
}
