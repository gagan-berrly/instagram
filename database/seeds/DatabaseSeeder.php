<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;   
use Illuminate\Support\Facades\DB; 

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
        
        for ($i=0; $i <=3; $i++) { 
            $faker = Factory::create('es_ES');
            DB::table('users')->insert([
                'role' => 'user',
                'name' => $faker->firstNameFemale(),
                'surname' => $faker->lastName,
                'nick' => strtolower($faker->firstNameFemale().rand(1,100)),
                'quote' => null,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'created_at' => $faker->dateTimeThisMonth(),
                'updated_at' => $faker->dateTimeThisMonth()
            ]);
        }
        
    }
}
