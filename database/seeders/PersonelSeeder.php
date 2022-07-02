<?php

namespace Database\Seeders;

use App\Models\Personel;
use Illuminate\Database\Seeder;

class PersonelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Personel::create([
                'user_id'=>1
            ]);
            Personel::create([
                'user_id'=>2
            ]);
            Personel::create([
                'user_id'=>3
            ]);
            Personel::create([
                'user_id'=>4
            ]);
            Personel::create([
                'user_id'=>5
            ]);
  
    }
}
