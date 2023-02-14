<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Religion::create([
            'numeru' => '1',
            'series_id' => '13',
            'id_religion' => 'REL-01',
            'naran' => 'Katolika'
        ]);
        // Religion::create([
        //     'numeru' => '2',
        //     'series_id' => '13',
        //     'id_religion' => 'REL-02',
        //     'naran' => 'Islamika'
        // ]);
        // Religion::create([
        //     'numeru' => '3',
        //     'series_id' => '13',
        //     'id_religion' => 'REL-03',
        //     'naran' => 'Kristaun'
        // ]);
    }
}
