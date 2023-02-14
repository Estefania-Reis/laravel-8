<?php

namespace App\Http\Controllers;

use App\Models\Ikanbrood;
use App\Models\Ikanoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use PDOException;
use PhpParser\Node\Stmt\TryCatch;
use Barryvdh\DomPDF\Facade\Pdf;
use Stevebauman\Location\Facades\Location;

class DashboardController extends Controller
{
    public function dashboard(){
        
        // $data= DB::select(DB::raw("SELECT ikan.total_f");
        // $charts =FacadesDB::table('ikanbroods')->get('*')->toArray(); 
        
        //  $position = Location::get('45.115.73.16');
        $initialMarkers = [
            [
                'position' => [
                    'lat' =>  -8.7177,
                    'lng' => 125.4359
                ],
                'draggable' => true
            ]
            // [
            //     'position' => [
            //         'lat' => -8.56053,
            //         'lng' => 125.570443
            //     ],
            //     'draggable' => false
            // ],
            // [
            //     'position' => [
            //         'lat' => -8.56164,
            //         'lng' => 124.834053
            //     ],
            //     'draggable' => true
            // ]
        ];
        return view('welcome', compact('initialMarkers'));
        
    }

    public function relatoriu(){

        $data1 = DB::table('ikanoans')->get()->last();
        $total_ikan_msex_dis = Ikanoan::select(DB::raw("CAST(SUM(total_msex_dim) as int) as total_msex_dim"))
        ->where('tipu_dim', 'distribui')
        ->GroupBy(DB::raw("Year(data)"))
        ->pluck('total_msex_dim');
        $total_ikan_nmsex_dis = Ikanoan::select(DB::raw("CAST(SUM(total_nmsex_dim) as int) as total_nmsex_dim"))
        ->where('tipu_dim', 'distribui')
        ->GroupBy(DB::raw("Year(data)"))
        ->pluck('total_nmsex_dim');
        $total_ikan_nur_dis = Ikanoan::select(DB::raw("CAST(SUM(total_dim) as int) as total_dim"))
        ->where('tipu_dim', 'distribui')
        ->GroupBy(DB::raw("Year(data)"))
        ->pluck('total_dim');
        $tinan_dis = Ikanoan::select(DB::raw("Year(data) as tinan"))
        ->where('tipu_dim', 'distribui')
        ->GroupBy(DB::raw("Year(data)"))
        ->pluck('tinan');


        // $data1 = FacadesDB::table('ikanoans')->get('data','total_ikan_oan_msex_atual','total_ikan_oan_nmsex_atual','total_ikan_oan_atual');
        $charts = FacadesDB::table('ikanbroods')->get('*')->toArray(); 
        $chartnur =FacadesDB::table('ikanoans')->get('*')->toArray(); 
        $chartlel =FacadesDB::table('lelauns')->get('*')->toArray();

        // $total_ikan_msex = Ikanoan::whereYear('data', date('Y'))->sum('total_msex')->toArray();
        // $total_ikan_nmsex = Ikanoan::whereYear('data', date('Y'))->sum('total_nmsex')->toArray();
        // $total_ikan_nur = Ikanoan::whereYear('data', date('Y'))->sum('total_ikan_oan')->toArray();

        return view('relatoriu.relatoriu', compact('charts','chartnur','total_ikan_msex_dis','total_ikan_nmsex_dis','total_ikan_nur_dis','chartlel','tinan_dis','data1'));
    }

    public function exportpdf(){
        $data = Ikanbrood::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('relatoriu.tabelapib', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "relatoriu-pib.pdf"
        );
    }
    public function exportnurpdf(){

        $data = DB::table('ikanoans')->get()->last();

        view()->share('data', $data);
        $pdf = PDF::loadview('relatoriu.tabelapinur')->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "relatoriu-pinur.pdf"
        );
    }
    public function exportdispdf(){
        $data= DB::table('ikanoans')->where('tipu_dim', 'distribui')->get();
        view()->share('data', $data);
        $pdf = PDF::loadview('relatoriu.distribuisaun-pdf')->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "relatoriu-distribuisaun.pdf"
        );
    }
}