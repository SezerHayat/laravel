<?php

namespace Database\Seeders;

use App\Models\Mesai;
use Illuminate\Database\Seeder;

class MesaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30; $i++) { 
            Mesai::create([
                'personel_id'=>rand(1,5),
                'end'=>'08.00',
                'start'=>'17.00',
                'notes'=>'',
            ]);
        }
    }
}
