<?php

namespace App\Http\Controllers;

use App\Models\Fertilizante;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class FertilizanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Fertilizante::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Fertilizante::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('rekursu.fertilizante.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        return view('rekursu.fertilizante.aumenta', compact('dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fertilizante::create($request->all());
        $dataseries = Serie::all();
        return view('rekursu.fertilizante.aumenta', compact('dataseries'))->with('success',' Dadus Submete Ho Susesu!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fertilizante  $fertilizante
     * @return \Illuminate\Http\Response
     */
    public function show(Fertilizante $fertilizante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fertilizante  $fertilizante
     * @return \Illuminate\Http\Response
     */
    public function edit(Fertilizante $fertilizante)
    {
        $data = Fertilizante::find();
        $dataseries = Serie::all();
        return view('rekursu.fertilizante.edit', compact('data','dataseries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fertilizante  $fertilizante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Fertilizante::find($id);
        $data->series_id = $request->input('series_id');
        $data->naran = $request->input('naran');
        $data->total_saka = $request->input('total_saka');
        $data->total_kgsaka = $request->input('total_kgsaka');
        $data->presusaka = $request->input('presusaka');
        $data->total_presu = $request->input('total_presu');
        $data->data_import = $request->input('data_import');
        $data->data_expire = $request->input('data_expire');
        $data->update();
        return redirect()->route('fertilizante')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fertilizante  $fertilizante
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Fertilizante::find($id);
        $data->delete();
        return redirect()->route('fertilizante')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Fertilizante::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('rekursu.fertilizante.fertilizante-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "fertilizante.pdf"
        );
    }
}
