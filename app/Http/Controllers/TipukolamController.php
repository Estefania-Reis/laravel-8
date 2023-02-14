<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Tipukolam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class TipukolamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Tipukolam::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Tipukolam::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('manutensaun\tipu_kolam\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        return view('manutensaun\tipu_kolam\aumenta', compact('dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tipukolam::create($request->all());
        $dataseries = Serie::all();
        return view('manutensaun\tipu_kolam\aumenta', compact('dataseries'))->with('success',' Dadus Submete Ho Susesu!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipukolam  $tipukolam
     * @return \Illuminate\Http\Response
     */
    public function show(Tipukolam $tipukolam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipukolam  $tipukolam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tipukolam::find($id);
        $dataseries = Serie::all();
        return view('manutensaun\tipu_kolam\edit', compact('data','dataseries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipukolam  $tipukolam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Tipukolam::find($id);
        $data->naran = $request->input('naran');
        $data->deskrisaun = $request->input('deskrisaun');
        $data->update();
        return redirect()->route('tipukolam')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipukolam  $tipukolam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tipukolam::find($id);
        $data->delete();
        return redirect()->route('tipukolam')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Tipukolam::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('manutensaun.tipu_kolam.tipuKolam-pdf', $data->toArray())->setPaper('a4')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Tipu-Kolam.pdf"
        );
    }
}
