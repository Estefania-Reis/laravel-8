<?php

namespace App\Http\Controllers;

use App\Models\Kolam;
use App\Models\Kualidade_bee;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class KualidadebeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Kualidade_bee::where('id_kualidadebee','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Kualidade_bee::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('rekursu\bee\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        $datakolam = Kolam::all();
        return view('rekursu\bee\aumentadata',compact('dataseries', 'datakolam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kualidade_bee::create($request->all());
        $dataseries = Serie::all();
        $datakolam = Kolam::all();
        return view('rekursu\bee\aumentadata',compact('dataseries','datakolam'))->with('success',' Dadus Submete Ho Susesu! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kualidadebee  $kualidadebee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kualidadebee  $kualidadebee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kualidade_bee::find($id);
        $dataseries = Serie::all();
        $datakolam = Kolam::all();
        return view('rekursu\bee\edit', compact('data','dataseries','datakolam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kualidadebee  $kualidadebee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Kualidade_bee::find($id);
        $data->series_id = $request->input('series_id');
        $data->data = $request->input('data');
        $data->kolam_id = $request->input('kolam_id');
        $data->status_bee_dalan_sai = $request->input('status_bee_dalan_sai');
        $data->status_bee_dalan_tama = $request->input('status_bee_dalan_tama');
        $data->razaun = $request->input('razaun');
        $data->ph = $request->input('ph');
        $data->temperatura = $request->input('temperatura');
        $data->do = $request->input('do');
        $data->sd = $request->input('sd');
        $data->orijem_bee = $request->input('orijem_bee');
        $data->update();
        return redirect()->route('bee')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kualidadebee  $kualidadebee
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Kualidade_bee::find($id);
        $data->delete();
        return redirect()->route('bee')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Kualidade_bee::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('rekursu.bee.bee-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Bee.pdf"
        );
    }
}
