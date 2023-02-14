<?php

namespace App\Http\Controllers;

use App\Models\Hapa;
use App\Models\Ikanbd;
use App\Models\Ikanbrood;
use App\Models\Kolam;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class IkanbdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Ikanbrood::where('id_ikanbrood','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Ikanbrood::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('diminuisaun.ikanmate.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datakolam = Kolam::all();
        $datahapa = Hapa::all();
        $dataikanb = Ikanbrood::all();
        $dataseries = Serie::all();
        return view('diminuisaun.ikanmate.aumentadata',compact('datakolam','datahapa','dataseries','dataikanb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ikanbd::create($request->all());
        $datakolam = Kolam::all();
        $datahapa = Hapa::all();
        $dataikanb = Ikanbrood::all();
        $dataseries = Serie::all();
        return view('diminuisaun.ikanmate.aumentadata',compact('datakolam','datahapa','dataseries','dataikanb'))->with('success',' Dadus Submete Ho Sucesso! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ikanbd  $ikanbd
     * @return \Illuminate\Http\Response
     */
    public function show(Ikanbd $ikanbd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ikanbd  $ikanbd
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $data = Ikanbd::find($id);
        $datakolam = Kolam::all();
        $datahapa = Hapa::all();
        $dataikanb = Ikanbrood::all();
        $dataseries = Serie::all();
        return view('diminuisaun.ikanmate.edit',compact( 'data','datakolam','datahapa','dataseries','dataikanb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ikanbd  $ikanbd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Ikanbd::find($id);
        $data->series_id = $request->input('series_id');
        $data->data = $request->input('data');
        $data->ikan_id = $request->input('ikan_id');
        $data->kolam_id = $request->input('kolam_id');
        $data->hapa_id = $request->input('hapa_id');
        $data->total_m = $request->input('total_m');
        $data->total_f = $request->input('total_f');
        $data->subtotal = $request->input('subtotal');
        $data->tipu_diminui = $request->input('tipu_diminui');
        $data->razaun = $request->input('razaun');
        $data->qty_ikan_aman = $request->input('qty_ikan_aman');
        $data->qty_ikan_inan = $request->input('qty_ikan_inan');
        $data->total_diminui = $request->input('total_diminui');
        $data->ikan_rezerva = $request->input('ikan_rezerva');
        $data->total_troka_m = $request->input('total_troka_m');
        $data->total_troka_f = $request->input('total_troka_f');
        $data->total_ikan_troka = $request->input('total_ikan_troka');
        $data->total_ikan_atual_m = $request->input('total_ikan_atual_m');
        $data->total_ikan_atual_f = $request->input('total_ikan_atual_f');
        $data->total_atual = $request->input('total_atual');
        $data->update();
        return redirect()->route('ikanmate')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ikanbd  $ikanbd
     * @return \Illuminate\Http\Response
     */
    public function delete( $id)
    {
        $data = Ikanbrood::find($id);
        $data->delete();
        return redirect()->route('ikan')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Ikanbd::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('data_ikan.ikan-pdf', $data->toArray())->setPaper('a3', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Ikan-Brood.pdf"
        );
    }  
}
