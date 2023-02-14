<?php

namespace App\Http\Controllers;

use App\Models\Distribuisaun;
use App\Models\Ikannurseryn;
use App\Models\Nurserynd;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class NurseryndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Ikannurseryn::where('id_ikannurseryn','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Ikannurseryn::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('diminuisaun\ikanoann\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        $dataikan = Ikannurseryn::all();
        $datadis = Distribuisaun::all();
        return view('diminuisaun\ikanoann\aumenta',compact('dataseries','dataikan','datadis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Nurserynd::create($request->all());
        $dataseries = Serie::all();
        $dataikan = Ikannurseryn::all();
        $datadis = Distribuisaun::all();
        return view('diminuisaun\ikanoann\aumenta',compact('dataseries','dataikan','datadis'))->with('success',' Dadus Submete Ho Sucesso! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nurserynd  $nurserynd
     * @return \Illuminate\Http\Response
     */
    public function show(Nurserynd $nurserynd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nurserynd  $nurserynd
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Nurserynd::find($id);
        $dataseries = Serie::all();
        $dataikan = Ikannurseryn::all();
        $datadis = Distribuisaun::all();
        return view('diminuisaun\ikanoann\edit',compact('data','dataseries','dataikan','datadis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nurserynd  $nurserynd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Nurserynd::find($id);
        $data->series_id = $request->input('series_id');
        $data->data = $request->input('data');
        $data->nurseryn_id = $request->input('nurseryn_id');
        $data->total_nurseryn = $request->input('total_nurseryn');
        $data->distribuisaun_id = $request->input('distribuisaun_id');
        $data->total_distribuisaun = $request->input('total_distribuisaun');
        $data->total_diminuisaun = $request->input('total_diminuisaun');
        $data->update();
        return redirect()->route('ikannurserynd')->with('success','Dadus Konsegue Retifika!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nurserynd  $nurserynd
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Ikannurseryn::find($id);
        $data->delete();
        return redirect()->route('ikannurserynd')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Ikannurseryn::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('data_ikanoann.ikanoann-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Ikan-Nursery-None-Mono-Sex.pdf"
        );
    }
}
