<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;   
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*
        for ($i=0; $i <=30 ; $i++) { 
            $faker = Factory::create();
            DB::table('users')->insert([
                'role' => 'user',
                'name' => $faker->name,
                'surname' => $faker->name,
                'surname' => Str::random(10),
                'email' => $faker->email,
                'password' => Hash::make('password'),
            ]);
        }
        */
    }
}
