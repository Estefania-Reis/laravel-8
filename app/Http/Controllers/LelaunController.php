<?php

namespace App\Http\Controllers;

use App\Models\Ikan;
use App\Models\Ikanbrood;
use App\Models\Lelaun;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class LelaunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Lelaun::where('id_lelaun','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Lelaun::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }

        
        return view('operasaun\lelaun\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataikan = Ikanbrood::all();
        $dataseries = Serie::all();
        return view('operasaun\lelaun\aumentadata', compact('dataikan','dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lelaun = Lelaun::create($request->all());
        // $lelaun->lelaun()->sync()->attach($request->input('ikan_id'));
        $dataikan = Ikanbrood::all();
        $dataseries = Serie::all();
        return redirect()->route('lelaun', compact('dataikan','dataseries'))->with('success','Dadus Konsegue Adisiona Ho Susesu!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lelaun  $lelaun
     * @return \Illuminate\Http\Response
     */
    public function show(Lelaun $lelaun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lelaun  $lelaun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Lelaun::find($id);
        $dataikan = Ikanbrood::all();
        $dataseries = Serie::all();
        return view('operasaun\lelaun\edit', compact('dataikan','data','dataseries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lelaun  $lelaun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Lelaun::find($id); 
        $data->series_id = $request->input('series_id');
        $data->total_ikan = $request->input('total_ikan');
        $data->presukg = $request->input('presukg');
        $data->data_loke_lelaun = $request->input('data_loke_lelaun');
        $data->data_remata_lelaun = $request->input('data_remata_lelaun');
        $data->update();
        return redirect()->route('lelaun')->with('success','Dadus Konsegue Retifika!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lelaun  $lelaun
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Lelaun::find($id);
        $data->delete();
        return redirect()->route('lelaun')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Lelaun::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('operasaun.lelaun.lelaun-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Lelaun.pdf"
        );
    }
}
