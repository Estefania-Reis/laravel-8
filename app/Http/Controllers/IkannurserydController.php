<?php

namespace App\Http\Controllers;

use App\Models\Distribuisaun;
use App\Models\Ikannurseryd;
use App\Models\Ikanoan;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class IkannurserydController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Ikanoan::where('id_ikanoan','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Ikanoan::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('diminuisaun\ikanoanmate\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        $dataikan = Ikanoan::all();
        $datadis = Distribuisaun::all();
        return view('diminuisaun\ikanoanmate\aumentadata',compact('dataseries','dataikan','datadis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ikannurseryd::create($request->all());
        $dataseries = Serie::all();
        $dataikan = Ikanoan::all();
        $datadis = Distribuisaun::all();
        return view('diminuisaun\ikanoanmate\aumentadata',compact('dataseries','dataikan','datadis'))->with('success',' Dadus Submete Ho Sucesso! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ikannurseryd  $ikannurseryd
     * @return \Illuminate\Http\Response
     */
    public function show(Ikannurseryd $ikannurseryd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ikannurseryd  $ikannurseryd
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ikannurseryd::find($id);
        $dataseries = Serie::all();
        $dataikan = Ikanoan::all();
        $datadis = Distribuisaun::all();
        return view('diminuisaun\ikanoanmate\edit',compact('data','dataseries','dataikan','datadis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ikannurseryd  $ikannurseryd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ikannurseryd $ikannurseryd)
    {
        $data = Ikannurseryd::find($ikannurseryd); 
        $data->series_id = $request->input('series_id');
        $data->data = $request->input('data');
        $data->nursery_id = $request->input('nursery_id');
        $data->total_nursery = $request->input('total_nursery');
        $data->distribuisaun_id = $request->input('distribuisaun_id');
        $data->total_distribuisaun = $request->input('total_distribuisaun');
        $data->total_diminuisaun = $request->input('total_diminuisaun');
        $data->update();
        return redirect()->route('ikanoanmate')->with('success','Dadus Konsegue Retifika!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ikannurseryd  $ikannurseryd
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Ikanoan::find($id);
        $data->delete();
        return redirect()->route('ikanoanmate')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Ikanoan::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('data_ikan_oan.ikanOan-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Ikan-Oan.pdf"
        );
    }
}
