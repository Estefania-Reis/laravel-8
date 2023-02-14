<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Posto;
use App\Models\Serie;
use FontLib\Table\Type\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class PostoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexposto(Request $request)
    {
        if($request->has('search')){
            $data = Posto::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Posto::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('data_extra\posto\index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datamunicipio = Municipio::all();
        $dataseries = Serie::all();
        return view('data_extra\posto\aumentaposto', compact('datamunicipio','dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Posto::create($request->all());
        $datamunicipio = Municipio::all();
        $dataseries = Serie::all();
        return redirect()->route('posto', compact('datamunicipio','dataseries'))->with('success',' Dadus Konsegue Submete Ho Susesu! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posto  $posto
     * @return \Illuminate\Http\Response
     */
    public function show(Posto $posto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posto  $posto
     * @return \Illuminate\Http\Response
     */
    public function edit(Posto $posto)
    {
        $data = Posto::find($posto);
        $datamunicipio = Municipio::all();
        $dataseries = Serie::all();
        return view('data_extra\posto\edit', compact('data','datamunicipio','dataseries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posto  $posto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Posto::find($id);
        $data->series_id = $request->input('series_id'); 
        $data->municipio_id = $request->input('municipio_id');
        $data->naran = $request->input('naran');
        $data->update();
        return redirect()->route('posto')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posto  $posto
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Posto::find($id);
        $data->delete();
        return redirect()->route('posto')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Posto::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('data_extra.posto.posto-pdf', $data->toArray())->setPaper('a4')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Posto-Administrativo.pdf"
        );
    }
}
