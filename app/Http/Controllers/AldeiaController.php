<?php

namespace App\Http\Controllers;

use App\Models\Suco;
use App\Models\Posto;
use App\Models\Serie;
use App\Models\Aldeia;
use App\Exports\AldeiaExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AldeiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexaldeia(Request $request)
    {
        if($request->has('search')){
            $data = Aldeia::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Aldeia::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('data_extra\aldeia\index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datasuco = Suco::all();
        $dataposto = Posto::all();
        $datamunicipio = Municipio::all();
        $dataseries = Serie::all();
        return view('data_extra\aldeia\aumentaaldeia', compact('datasuco','dataposto','datamunicipio','dataseries'));
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

    //.......Suco.......
    public function getSuco(Request $request){
        $posto_id = $request->posto_id;
        $sucos = Suco::where('posto_id', $posto_id)->get();
        $option = "<option > Hili... </option>";
        foreach($sucos as $suku ){
            $option.= "<option value='$suku->id'>$suku->naran</option>";
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
        Aldeia::create($request->all());
        $datasuco = Suco::all();
        $dataposto = Posto::all();
        $datamunicipio = Municipio::all();
        $dataseries = Serie::all();
        return redirect()->route('indexaldeia', compact('datasuco','dataposto','datamunicipio','dataseries'))->with('success',' Dadus Konsegue Submete Ho Susesu! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aldeia  $aldeia
     * @return \Illuminate\Http\Response
     */
    public function show(Aldeia $aldeia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aldeia  $aldeia
     * @return \Illuminate\Http\Response
     */
    public function edit(Aldeia $aldeia)
    {
        $data = Aldeia::find($aldeia);
        $datasuco = Suco::all();
        $dataposto = Posto::all();
        $datamunicipio = Municipio::all();
        $dataseries = Serie::all();
        return view('data_extra\aldeia\edit', compact('data','datasuco','dataposto','datamunicipio','dataseries'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aldeia  $aldeia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aldeia $aldeia)
    {
        $data = Aldeia::find($aldeia); 
        $data->series_id = $request->input('series_id');
        $data->municipio_id = $request->input('municipio_id');
        $data->posto_id = $request->input('posto_id');
        $data->suco_id = $request->input('suco_id');
        $data->naran = $request->input('naran');
        $data->update();
        return redirect()->route('indexaldeia')->with('success',' Dadus Konsegue Retifika! ');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aldeia  $aldeia
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Aldeia::find($id);
        $data->delete();
        return redirect()->route('indexaldeia')->with('success',' Dadus Konsege Hamos Ona!');
    }

    public function exportpdf(){
        $data = Aldeia::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('data_extra.aldeia.aldeia-pdf', $data->toArray())->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "aldeia.pdf"
        );
    }
}
