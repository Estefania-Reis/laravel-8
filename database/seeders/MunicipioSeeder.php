<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Municipio::create([
            'numeru' => '1',
            'series_id' => '18',
            'id_municipio' => 'MUN-01',
            'naran' => 'Aileu'
        ]);
        // Municipio::create([
        //     'series_id' => '18',
        //     'id_municipio' => 'MUN-02',
        //     'naran' => 'Ainaro'
        // ]);
        // Municipio::create([
        //     'series_id' => '18',
        //     'id_municipio' => 'MUN-03',
        //     'naran' => 'Atauro'
        // ]);
        // Municipio::create([
        //     'series_id' => '18',
        //     'id_municipio' => 'MUN-04',
        //     'naran' => 'Dili'
        // ]);
        // Municipio::create([
        //     'series_id' => '18',
        //     'id_municipio' => 'MUN-05',
        //     'naran' => 'Ermera'
        // ]);
        // Municipio::create([
        //     'series_id' => '18',
        //     'id_municipio' => 'MUN-06',
        //     'naran' => 'Liquica'
        // ]);
        // Municipio::create([
        //     'series_id' => '18',
        //     'id_municipio' => 'MUN-07',
        //     'naran' => 'Bobonaru'
        // ]);
        // Municipio::create([
        //     'series_id' => '18',
        //     'id_municipio' => 'MUN-08',
        //     'naran' => 'Manufahi'
        // ]);
        // Municipio::create([
        //     'series_id' => '18',
        //     'id_municipio' => 'MUN-09',
        //     'naran' => 'Baucau'
        // ]);
        // Municipio::create([
        //     'series_id' => '18',
        //     'id_municipio' => 'MUN-10',
        //     'naran' => 'Lospalos'
        // ]); 
        // Municipio::create([
        //     'series_id' => '18',
        //     'id_municipio' => 'MUN-11',
        //     'naran' => 'Viqueque'
        // ]);
        // Municipio::create([
        //     'series_id' => '18',
        //     'id_municipio' => 'MUN-12',
        //     'naran' => 'Oecusse'
        // ]);
        // Municipio::create([
        //     'series_id' => '18',
        //     'id_municipio' => 'MUN-13',
        //     'naran' => 'Covalima'
        // ]);
        // Municipio::create([
        //     'series_id' => '18',
        //     'id_municipio' => 'MUN-14',
        //     'naran' => 'Manatutu'
        // ]);
    }
}
