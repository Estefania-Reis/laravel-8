<?php

namespace Database\Seeders;

use App\Models\Niveleducasaun;
use Illuminate\Database\Seeder;

class NiveleducasaunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Niveleducasaun::create([
            'id_niveleducasaun' => 'NED-01',
            'naran' => 'D. P.'
        ]);
        Niveleducasaun::create([
            'id_niveleducasaun' => 'NED-02',
            'naran' => 'D3 Agronomia'
        ]);
        Niveleducasaun::create([
            'id_niveleducasaun' => 'NED-03',
            'naran' => 'Licenciatura Agricultura'
        ]);
        Niveleducasaun::create([
            'id_niveleducasaun' => 'NED-04',
            'naran' => 'D3 Colleta'
        ]);
        Niveleducasaun::create([
            'id_niveleducasaun' => 'NED-05',
            'naran' => 'Primeira Classe'
        ]);
        Niveleducasaun::create([
            'id_niveleducasaun' => 'NED-06',
            'naran' => 'Ensino Secundario'
        ]);
    }
}
