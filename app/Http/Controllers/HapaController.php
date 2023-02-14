<?php

namespace App\Http\Controllers;

use App\Models\Hapa;
use App\Models\Kolam;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class HapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexhapa(Request $request)
    {
        if($request->has('search')){
            $data = Hapa::where('id_hapa','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Hapa::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('manutensaun\hapa\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datakolam = Kolam::all();
        $dataseries = Serie::all();
        return view('manutensaun\hapa\aumentadata',compact('datakolam','dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Hapa::create($request->all());
        $datakolam = Kolam::all();
        $dataseries = Serie::all();
        return redirect()->route('indexhapa', compact('datakolam','dataseries'))->with('success',' Dadus Konsegue Submete Ho Susesu! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hapa  $hapa
     * @return \Illuminate\Http\Response
     */
    public function show(Hapa $hapa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hapa  $hapa
     * @return \Illuminate\Http\Response
     */
    public function edit(Hapa $hapa, $id)
    {
        $data = Hapa::find($id);
        $dataseries = Serie::all();
        $datakolam = Kolam::all();
        //dd($data);
        return view('manutensaun\hapa\edit',compact('data','dataseries','datakolam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hapa  $hapa
     * @return \Illuminate\Http\Response
     */
    public function updatedatahapa(Request $request, $id)
    {
        $data = Hapa::find($id); 
        $data->series_id = $request->input('series_id');
        $data->kolam_id = $request->input('kolam_id');
        $data->tipu_hapa = $request->input('tipu_hapa');
        $data->largura = $request->input('largura');
        $data->comprimento = $request->input('comprimento');
        $data->area = $request->input('area');
        $data->altura = $request->input('altura');
        $data->volume = $request->input('volume');
        $data->status = $request->input('status');
        $data->obs = $request->input('obs');
        $data->update();
        return redirect()->route('indexhapa')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hapa  $hapa
     * @return \Illuminate\Http\Response
     */
    public function delete(Hapa $hapa, $id)
    {
        $data = Hapa::find($id);
        $data->delete();
        return redirect()->route('indexhapa')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Hapa::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('manutensaun.hapa.hapa-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Hapa.pdf"
        );
    }
}
