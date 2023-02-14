<?php

namespace App\Http\Controllers;

use App\Models\Suco;
use App\Models\Posto;
use App\Models\Serie;
use App\Models\Aldeia;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class SucoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexsuco(Request $request)
    {
        if($request->has('search')){
            $data = Suco::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Suco::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('data_extra.suco.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataposto = Posto::all();
        $datamunicipio = Municipio::all();
        $dataseries = Serie::all();
        return view('data_extra\suco\aumentasuco', compact('dataposto','datamunicipio','dataseries'));
    }

     //.......Posto.......
     public function getPosto(Request $request){
        $municipio_id = $request->municipio_id;
        $postos = Posto::where('municipio_id', $municipio_id)->get();
        $option = "<option > Hili... </option>";
        foreach($postos as $postu ){
            $option.= "<option value='$postu->id'>$postu->naran</option>";
        }
        echo $option;
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Suco::create($request->all());
        $dataposto = Posto::all();
        $datamunicipio = Municipio::all();
        $dataseries = Serie::all();
        return redirect()->route('suco', compact('dataposto','datamunicipio','dataseries'))->with('success',' Dadus Konsegue Submete Ho Susesu! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suco  $suco
     * @return \Illuminate\Http\Response
     */
    public function show(Suco $suco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suco  $suco
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Suco::find($id);
        $datamunicipio = Municipio::all();
        $dataposto = Posto::all();
        $dataseries = Serie::all();
        return view('data_extra\suco\edit', compact('data','datamunicipio','dataseries','dataposto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suco  $suco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Suco::find($id);
        $data->series_id = $request->input('series_id'); 
        $data->municipio_id = $request->input('municipio_id');
        $data->posto_id = $request->input('posto_id');
        $data->naran = $request->input('naran');
        $data->update();
        return redirect()->route('suco')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suco  $suco
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $data = Suco::find($id);
        $data->delete();
        return redirect()->route('suco')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Suco::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('data_extra.suco.suco-pdf', $data->toArray())->setPaper('a4')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Suco.pdf"
        );
    }
}
