<?php

namespace App\Http\Controllers;

use App\Models\Hapa;
use App\Models\Ikanbrood;
use App\Models\Importasaunfini;
use App\Models\Kolam;
use App\Models\Orijemikan;
use App\Models\Serie;
use App\Models\Tipuikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class IkanbroodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Ikanbrood::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Ikanbrood::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }

        
        return view('data_ikan\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataimport = Importasaunfini::all();
        $datakolam = Kolam::all();
        $datahapa = Hapa::all();
        $dataseries = Serie::all();
        return view('data_ikan\aumentadata',compact('dataimport', 'datakolam','datahapa','dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ikanbrood::create($request->all());
        $dataimport = Importasaunfini::all();
        $datakolam = Kolam::all();
        $datahapa = Hapa::all();
        $dataseries = Serie::all();
        return redirect()->route('ikan',compact('dataimport', 'datakolam','datahapa','dataseries'))->with('success',' Dadus Konsegue Submete Ho Sucesso! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ikanbrood  $ikanbrood
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Ikanbrood::find($id);
        return view('data_ikan\detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ikanbrood  $ikanbrood
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ikanbrood::find($id);
        $dataseries = Serie::all();
        $dataimport = Importasaunfini::all();
        $datakolam = Kolam::all();
        $datahapa = Hapa::all();
        return view('data_ikan\edit',compact('data','dataimport', 'datakolam','datahapa','dataseries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ikanbrood  $ikanbrood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Ikanbrood::find($id);
        $data->series_id = $request->input('series_id');
        $data->data = $request->input('data');
        $data->total_m = $request->input('total_m');
        $data->total_f = $request->input('total_f');
        $data->total = $request->input('total');
        $data->kolam_id = $request->input('kolam_id');
        $data->hapa_id = $request->input('hapa_id');
        $data->tipu_ikan = $request->input('tipu_ikan');
        $data->nasaun = $request->input('nasaun');
        $data->jerasaun = $request->input('jerasaun');
        $data->codigo_familia = $request->input('codigo_familia');
        $data->data_dim = $request->input('data_dim');
        $data->razaun = $request->input('razaun');
        $data->qty_dim_m = $request->input('qty_dim_m');
        $data->qty_dim_f = $request->input('qty_dim_f');
        $data->total_dim = $request->input('total_dim');
        $data->qty_rez_m = $request->input('qty_rez_m');
        $data->qty_rez_f = $request->input('qty_rez_f');
        $data->total_rez = $request->input('total_rez');
        $data->qty_atual_m = $request->input('qty_atual_m');
        $data->qty_atual_f = $request->input('qty_atual_f');
        $data->total_atual = $request->input('total_atual');
        $data->update();
        return redirect()->route('ikan')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ikanbrood  $ikanbrood
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Ikanbrood::find($id);
        $data->delete();
        return redirect()->route('ikan')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Ikanbrood::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('data_ikan.ikan-pdf', $data->toArray())->setPaper('a3', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Ikan-Brood.pdf"
        );
    }
}
