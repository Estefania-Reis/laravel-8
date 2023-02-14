<?php

namespace Database\Seeders;

use App\Models\Posto;
use Illuminate\Database\Seeder;

class PostoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Posto::create([
            'series_id' => '17',
            'id_posto' => 'POS-01',
            'municipio_id' => 'Ermera',
            'naran' => 'Atsabe'
        ]);
        Posto::create([
            'series_id' => '17',
            'id_posto' => 'POS-02',
            'municipio_id' => 'Ermera',
            'naran' => 'Ermera'
        ]);
        Posto::create([
            'series_id' => '17',
            'id_posto' => 'POS-03',
            'municipio_id' => 'Ermera',
            'naran' => 'Hatolia'
        ]);
        Posto::create([
            'series_id' => '17',
            'id_posto' => 'POS-04',
            'municipio_id' => 'Ermera',
            'naran' => 'Railaco'
        ]);
        Posto::create([
            'series_id' => '17',
            'id_posto' => 'POS-05',
            'municipio_id' => 'Ermera',
            'naran' => 'Letefoho'
        ]);
    }
}
