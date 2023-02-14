<?php

namespace App\Http\Controllers;
use App\Models\Ikanoan;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DistriController extends Controller
{
    public function exportdispdf(){

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

        view()->share('data', $total_ikan_msex_dis, $total_ikan_nmsex_dis, $total_ikan_nur_dis, $tinan_dis);
        $pdf = PDF::loadview('relatoriu.distribuisaun-pdf')->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "relatoriu-distribuisaun.pdf"
        );
    }
}
