<?php

namespace App\Http\Controllers;

use App\Models\Hapa;
use App\Models\Ikanoan;
use App\Models\Ikantolun;
use App\Models\Kliente;
use App\Models\Klientegrupo;
use App\Models\Kolam;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class IkanoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ikanoan::paginate('5');
        return view('data_ikan_oan\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datakolam = DB::table('kolams')->where('tipu_kolam', 'nursery')->get();
        $datahapa = Hapa::all();
        $dataklienteind = Kliente::all();
        $dataklientegp = Klientegrupo::all();
        $dataseries = Serie::all();
        return view('data_ikan_oan\aumentadata', compact('datakolam','datahapa','dataklienteind','dataklientegp','dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Ikanoan::create($request->all());
        $data->save();
        $dataklienteind = Kliente::all();
        $dataklientegp = Klientegrupo::all();
        $datakolam = DB::table('kolams')->where('tipu_kolam', 'nursery')->get();
        $datahapa = Hapa::all();
        $dataseries = Serie::all();
        return redirect()->route('ikanoan', compact('dataklienteind','dataklientegp','datakolam','datahapa','dataseries'))->with('success',' Dadus Konsegue Submete Ho Sucesso! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ikanoan  $ikanoan
     * @return \Illuminate\Http\Response
     */
    public function show(Ikanoan $ikanoan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ikanoan  $ikanoan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ikanoan::find($id);
        return view('data_ikan_oan\edit', [
            'data' => $data,
            'dataseries' => Serie::all(),
            'datakolam' => Kolam::all(),
            'datahapa' => Hapa::all(),
            'dataklienteind' => Kliente::all(),
            'dataklientegp' => Klientegrupo::all()
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ikanoan  $ikanoan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Ikanoan::find($id); 
        $data->data = $request->input('data');
        $data->series_id = $request->input('series_id');
        $data->kolam_nursery_id = $request->input('kolam_nursery_id');
        $data->hapa_id = $request->input('hapa_id');
        $data->total_msex = $request->input('total_msex');
        $data->total_nmsex = $request->input('total_nmsex');
        $data->total_ikan_oan = $request->input('total_ikan_oan');
        $data->total_msex_ad = $request->input('total_msex_ad');
        $data->total_nmsex_ad = $request->input('total_nmsex_ad');
        $data->total_ikan_nursery_adisiona = $request->input('total_ikan_nursery_adisiona');
        $data->tipu_dim = $request->input('tipu_dim');
        $data->razaun_dim = $request->input('razaun_dim');
        $data->total_dim = $request->input('total_dim');
        // $data->data_distribuisaun = $request->input('data_distribuisaun');
        $data->klienteIndividual_id = $request->input('klienteIndividual_id');
        $data->klienteGrupo_id = $request->input('klienteGrupo_id');
        $data->total_plastik_msex = $request->input('total_plastik_msex');
        $data->total_plastik_nmsex = $request->input('total_plastik_nmsex');
        $data->total_ikanplastik_msex = $request->input('total_ikanplastik_msex');
        $data->total_ikanplastik_nmsex = $request->input('total_ikanplastik_nmsex');
        $data->total_ikan_oan_msex_atual = $request->input('total_ikan_oan_msex_atual');
        $data->total_ikan_oan_nmsex_atual = $request->input('total_ikan_oan_nmsex_atual');
        // $data->total_distribuisaun = $request->input('total_distribuisaun');
        $data->total_ikan_oan_atual = $request->input('total_ikan_oan_atual');
        $data->update();
        return redirect()->route('ikanoan')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ikanoan  $ikanoan
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Ikanoan::find($id);
        $data->delete();
        return redirect()->route('ikanoan')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Ikanoan::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('data_ikan_oan.ikanOan-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Ikan-Oan.pdf"
        );
    }
}
