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
        
        //Random Male user generator
        for ($i=0; $i <=5 ; $i++) { 
            $faker = Factory::create('es_ES');
            DB::table('users')->insert([
                'role' => 'user',
                'name' => $faker->firstNameMale(),
                'surname' => $faker->lastName,
                'nick' => strtolower($faker->firstName().rand(1,100)),
                'email' => $faker->email,
                'image' => 'img/profile/male-user-'.rand(1,4).'.jpg',
                'password' => 'randomuser123',
                'created_at' => $faker->dateTimeThisMonth(),
                'updated_at' => $faker->dateTimeThisMonth()
            ]);
        }

        /*
        //Random Female user Generator
        for ($i=0; $i <=10 ; $i++) { 
            $faker = Factory::create('es_ES');
            DB::table('users')->insert([
                'role' => 'user',
                'name' => $faker->firstNameFemale(),
                'surname' => $faker->lastName,
                'nick' => strtolower($faker->firstName().rand(1,100)),
                'email' => $faker->email,
                'password' => 'randomuser123',
                'image' => 'public/img/profile/female-user-'.rand(1,3).'.jpg',
                'created_at' => $faker->dateTimeThisMonth(),
                'updated_at' => $faker->dateTimeThisMonth()
            ]);
        }
        */
        
    }
}
