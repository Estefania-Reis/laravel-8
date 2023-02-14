<?php

namespace App\Http\Controllers;

use App\Models\Orijemikan;
use App\Models\Serie;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrijemikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Orijemikan::paginate('5');
        return view('data_extra\orijem\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        return view('data_extra\orijem\aumentadata', compact('dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Orijemikan::create($request->all());
        $dataseries = Serie::all();
        return view('data_extra\orijem\aumentadata', compact('dataseries'))->with('success',' Dadus Submete Ho Susesu! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Orijemikan::find($id);
        $dataseries = Serie::all();
        return view('data_extra.orijem.edit', compact('data','dataseries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Orijemikan::find($id);
        $data->series_id = $request->input('series_id'); 
        $data->naran = $request->input('naran');
        $data->update();
        return redirect()->route('indexori')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Orijemikan::find($id);
        $data->delete();
        return redirect()->route('indexori')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Orijemikan::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('data_extra.orijem.orijem-pdf', $data->toArray())->setPaper('a4')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Orijem-Ikan.pdf"
        );
    }
}
