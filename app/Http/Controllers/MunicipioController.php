<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexmun(Request $request)
    {
        if($request->has('search')){
            $data = Municipio::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Municipio::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('data_extra\municipio\index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        return view('data_extra\municipio\aumentamun', compact('dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Municipio::create($request->all());
        $dataseries = Serie::all();
        return redirect()->route('municipio', compact('dataseries'))->with('success','Dadus Konsegue Submete Ho Susesu!');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show(Municipio $municipio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipio)
    {
        $data = Municipio::find($municipio);
        $dataseries = Serie::all();
        return view('data_extra\municipio\edit', compact('data','dataseries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipio $municipio)
    {
        $data = Municipio::find($municipio);
        $data->series_id = $request->input('series_id');
        $data->naran = $request->input('naran');
        $data->update();
        return redirect()->route('municipio')->with('success','Dadus Konsegue Retifika!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Municipio::find($id);
        $data->delete();
        return redirect()->route('municipio')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Municipio::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('data_extra.municipio.municipio-pdf', $data->toArray())->setPaper('a4')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Municipio.pdf"
        );
    }
}
