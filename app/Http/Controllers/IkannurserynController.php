<?php

namespace App\Http\Controllers;

use App\Models\Hapa;
use App\Models\Ikannurseryn;
use App\Models\Kliente;
use App\Models\Klientegrupo;
use App\Models\Kolam;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class IkannurserynController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Ikannurseryn::where('id_ikannurseryn','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Ikannurseryn::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }

        
        return view('data_ikanoann\index',compact('data'));
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
        $dataseries = Serie::all();
        $dataklienteind = Kliente::all();
        $dataklientegp = Klientegrupo::all();
        return view('data_ikanoann\aumenta', compact('dataklienteind','dataklientegp','datakolam','datahapa','dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Ikannurseryn::create($request->all());
        $data->save();
        $datakolam = DB::table('kolams')->where('tipu_kolam', 'nursery')->get();
        $datahapa = Hapa::all();
        $dataseries = Serie::all();
        $dataklienteind = Kliente::all();
        $dataklientegp = Klientegrupo::all();
        return redirect()->route('ikannurseryn', compact('dataklienteind','dataklientegp','datakolam','datahapa','dataseries'))->with('success',' Dadus Konsegue Submete Ho Sucesso! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ikannurseryn  $ikannurseryn
     * @return \Illuminate\Http\Response
     */
    public function show(Ikannurseryn $ikannurseryn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ikannurseryn  $ikannurseryn
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ikannurseryn::find($id);
        return view('data_ikanoann\edit', [
            'data' => $data,
            'dataseries' => Serie::all(),
            'datakolam' => DB::table('kolams')->where('tipu_kolam', 'nursery')->get(),
            'datahapa' => Hapa::all(),
            'dataklienteind' => Kliente::all(),
            'dataklientegp' => Klientegrupo::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ikannurseryn  $ikannurseryn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Ikannurseryn::find($id); 
        $data->series_id = $request->input('series_id');
        $data->data = $request->input('data');
        $data->kolam_id = $request->input('kolam_id');
        $data->hapa_id = $request->input('hapa_id');
        $data->total_ikan_oan = $request->input('total_ikan_oan');
        $data->adisiona_ikan_oan = $request->input('adisiona_ikan_oan');
        $data->tipu_dim = $request->input('tipu_dim');
        $data->razaun_dim = $request->input('razaun_dim');
        $data->total_dim = $request->input('total_dim');
        // $data->data_distribuisaun = $request->input('data_distribuisaun');
        $data->klienteIndividual_id = $request->input('klienteIndividual_id');
        $data->klienteGrupo_id = $request->input('klienteGrupo_id');
        $data->total_plastik = $request->input('total_plastik');
        $data->total_ikanplastik = $request->input('total_ikanplastik');
        // $data->total_distribuisaun = $request->input('total_distribuisaun');
        $data->total_ikan_oan_atual = $request->input('total_ikan_oan_atual');
        $data->update();
        return redirect()->route('ikannurseryn')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ikannurseryn  $ikannurseryn
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Ikannurseryn::find($id);
        $data->delete();
        return redirect()->route('ikannurseryn')->with('success','Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Ikannurseryn::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('data_ikanoann.ikanoann-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Ikan-Nursery-None-Mono-Sex.pdf"
        );
    }
}
