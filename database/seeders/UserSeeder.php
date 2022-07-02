<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i <5 ; $i++) { 
            User::create([
                'name'=> $faker->name(),
                'email'=> $faker->email(),
                'password'=> Hash::make('asd'),
                'isAdmin'=>0
            ]);
        }

        User::create([
            'name'=>'Sezer',
            'email'=> 'sezer@gmail.com',
            'password'=> Hash::make('asd'),
            'isAdmin'=>1
        ]);
    }
}
