<?php

namespace App\Http\Controllers;

use App\Models\Ikanoan;
use App\Models\Ikansrt;
use App\Models\Ikansrtd;
use App\Models\Ikansrtmate;
use App\Models\Kolam;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class IkansrtmateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Ikansrtd::where('id_ikansrtd','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Ikansrtd::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('diminuisaun\ikansrtmate\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        $dataikan = Ikansrt::all();
        $dataikannr = Ikanoan::all();
        return view('diminuisaun\ikansrtmate\aumentadata',compact('dataseries' ,'dataikan', 'dataikannr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ikansrtd::create($request->all());
        $dataseries = Serie::all();
        $dataikan = Ikansrt::all();
        $dataikannr = Ikanoan::all();
        return redirect()->route('ikansrtmate',compact('dataseries' ,'dataikan', 'dataikannr'))->with('success',' Dadus Submete Ho Sucesso! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ikansrtmate  $ikansrtmate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ikansrtmate  $ikansrtmate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ikansrtd::find($id);
        $dataseries = Serie::all();
        $dataikan = Ikansrt::all();
        $dataikannr = Ikanoan::all();
        return view('diminuisaun\ikansrtmate\aumentadata',compact('data','dataseries' ,'dataikan', 'dataikannr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ikansrtmate  $ikansrtmate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Ikansrtd::find($id); 
        $data->series_id = $request->input('series_id');
        $data->data = $request->input('data');
        $data->ikansrt_id = $request->input('ikansrt_id');
        $data->totalsrt = $request->input('totalsrt');
        $data->nursery_id = $request->input('nursery_id');
        $data->total_nursery = $request->input('total_nursery');
        $data->total_diminuisaun = $request->input('total_diminuisaun');
        $data->update();
        return redirect()->route('ikansrtmate')->with('success','Dadus Konsegue Retifika!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ikansrtmate  $ikansrtmate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Ikansrtd::find($id);
        $data->delete();
        return redirect()->route('ikansrtmate')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Ikansrtd::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('diminuisaun.ikansrtmate.ikansrtmate-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Ikan-SRT-Diminuidu.pdf"
        );
    }
}
