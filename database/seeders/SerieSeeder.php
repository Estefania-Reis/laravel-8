<?php

namespace Database\Seeders;

use App\Models\Serie;
use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Serie::create([
            'series' => 'IMPF',
            'deskrisaun' => 'kodigu ka id husi Importasaun Fini'
        ]);
        Serie::create([
            'series' => 'IB',
            'deskrisaun' => 'kodigu ka id husi Ikan Brood'
        ]);
        Serie::create([
            'series' => 'ITOL',
            'deskrisaun' => 'kodigu ka id husi Ikan Tolun/Larva'
        ]);
        Serie::create([
            'series' => 'ISRT',
            'deskrisaun' => 'kodigu ka id husi Ikan SRT (sex reversal tilapia)'
        ]);
        Serie::create([
            'series' => 'INUR',
            'deskrisaun' => 'kodigu ka id husi Ikan Nursery'
        ]);
        Serie::create([
            'series' => 'INUR-N',
            'deskrisaun' => 'kodigu ka id husi Ikan Nursery None Mono Sex'
        ]);
        Serie::create([
            'series' => 'KIB',
            'deskrisaun' => 'kodigu ka id husi Kandidatu Ikan Brood'
        ]);
        Serie::create([
            'series' => 'DIS',
            'deskrisaun' => 'kodigu ka id husi Distribuisaun'
        ]);
        Serie::create([
            'series' => 'BID',
            'deskrisaun' => 'kodigu ka id husi Benefisiariu Individual'
        ]);
        Serie::create([
            'series' => 'BGP',
            'deskrisaun' => 'kodigu ka id husi Benefisiariu Grupu'
        ]);
        Serie::create([
            'series' => 'LEL',
            'deskrisaun' => 'kodigu ka id husi Lelaun'
        ]);
        Serie::create([
            'series' => 'NK',
            'deskrisaun' => 'kodigu ka id husi Nota Kompras'
        ]);
        Serie::create([
            'series' => 'REL',
            'deskrisaun' => 'kodigu ka id husi Relijiaun'
        ]);
        Serie::create([
            'series' => 'NED',
            'deskrisaun' => 'kodigu ka id husi Nivel Edukasaun'
        ]);
        Serie::create([
            'series' => 'ALD',
            'deskrisaun' => 'kodigu ka id husi Aldeia'
        ]);
        Serie::create([
            'series' => 'SUC',
            'deskrisaun' => 'kodigu ka id husi Suku'
        ]);
        Serie::create([
            'series' => 'POS',
            'deskrisaun' => 'kodigu ka id husi Postu Administrativu'
        ]);
        Serie::create([
            'series' => 'MUN',
            'deskrisaun' => 'kodigu ka id husi Munisipiu'
        ]);
        Serie::create([
            'series' => 'KOL',
            'deskrisaun' => 'kodigu ka id husi Kolam'
        ]);
        Serie::create([
            'series' => 'HP',
            'deskrisaun' => 'kodigu ka id husi Hapa'
        ]);
        Serie::create([
            'series' => 'INC',
            'deskrisaun' => 'kodigu ka id husi Incubator'
        ]);
        Serie::create([
            'series' => 'ELE',
            'deskrisaun' => 'kodigu ka id husi Eletrisidade'
        ]);
        Serie::create([
            'series' => 'KB',
            'deskrisaun' => 'kodigu ka id husi Kualidade Bee'
        ]);
        Serie::create([
            'series' => 'FER',
            'deskrisaun' => 'kodigu ka id husi Fertilizante'
        ]);
        Serie::create([
            'series' => 'ING',
            'deskrisaun' => 'kodigu ka id husi Ingrediente'
        ]);
        Serie::create([
            'series' => 'FPA',
            'deskrisaun' => 'kodigu ka id husi Funsionariu Pescas Aquicultura'
        ]);
        
    }
}
