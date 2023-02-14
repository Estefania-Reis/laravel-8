<?php

namespace App\Http\Controllers;

use App\Models\Hahanikan;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class HahanikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Hahanikan::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Hahanikan::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }

        return view('rekursu\hahan_ikan\index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        return view('rekursu\hahan_ikan\aumentadata', compact('dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Hahanikan::create($request->all());
        $data->save();
        $dataseries = Serie::all();
        return view('rekursu\hahan_ikan\aumentadata', compact('dataseries'))->with('success',' Dadus Submete Ho Susesu! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hahanikan  $hahanikan
     * @return \Illuminate\Http\Response
     */
    public function show(Hahanikan $hahanikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hahanikan  $hahanikan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Hahanikan::find($id);
        $dataseries = Serie::all();
        return view('rekursu\hahan_ikan\edit', [
            'data' => $data,
            'dataseries' => $dataseries
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hahanikan  $hahanikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Hahanikan::find($id); 
        $data->series_id = $request->input('series_id');
        $data->naran = $request->input('naran');
        $data->unidade = $request->input('unidade');
        $data->kuantidade = $request->input('kuantidade');
        $data->presu = $request->input('presu');
        $data->total_presu = $request->input('total_presu');
        $data->data = $request->input('data');
        $data->data_hahan_expire = $request->input('data_hahan_expire');
        $data->update();
        return redirect()->route('fo-han')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hahanikan  $hahanikan
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Hahanikan::find($id);
        $data->delete();
        return redirect()->route('fo-han')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Hahanikan::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('rekursu.hahan_ikan.hahanIkan-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Hahan-Ikan.pdf"
        );
    }
}
