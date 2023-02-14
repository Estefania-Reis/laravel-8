<?php

namespace App\Http\Controllers;

use App\Models\Fohanikan;
use App\Models\Hahanikan;
use App\Models\Ikan;
use App\Models\Ikanbrood;
use App\Models\Ikanoan;
use App\Models\Ikansrt;
use App\Models\Ikantolun;
use App\Models\Kolam;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class FohanikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Fohanikan::where('id_hahan','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Fohanikan::paginate(5); 
            Session::put('halaman_url', request()->fullUrl());
        } 
        return view('rekursu.fo_han.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $dataikan = Ikanbrood::all();
       $dataikanoan = Ikanoan::all();
       $dataikansrt = Ikansrt::all();
       $dataikantolun = Ikantolun::all();
       $dataseries = Serie::all();
        return view('rekursu.fo_han.aumentadata', compact('dataikan', 'dataikanoan','dataikansrt','dataikantolun','dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Fohanikan::create($request->all());
        $data->save();
        $dataikan = Ikanbrood::all();
       $dataikanoan = Ikanoan::all();
       $dataikansrt = Ikansrt::all();
       $dataikantolun = Ikantolun::all();
       $dataseries = Serie::all();
        return view('rekursu.fo_han.aumentadata', compact('dataikan', 'dataikanoan','dataikansrt','dataikantolun','dataseries'))->with('success', 'Dadus Submete Ho Susesu!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fohanikan  $fohanikan
     * @return \Illuminate\Http\Response
     */
    public function show(Fohanikan $fohanikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fohanikan  $fohanikan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Fohanikan::find($id);
        $dataikan = Ikanbrood::all();
        $dataikanoan = Ikanoan::all();
        $dataikansrt = Ikansrt::all();
        $dataikantolun = Ikantolun::all();
        $dataseries = Serie::all();
        return view('rekursu.fo_han.edit', [
            'data' => $data,
            'dataseries' => $dataseries,
            'dataikan' => $dataikan,
            'dataikanoan' => $dataikanoan,
            'dataikansrt' => $dataikansrt,
            'dataikantolun' => $dataikantolun
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fohanikan  $fohanikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Fohanikan::find($id); 
        $data->series_id = $request->input('series_id');
        $data->hahan_id = $request->input('hahan_id');
        $data->kolam_id = $request->input('kolam_id');
        $data->oras_fo_han = $request->input('oras_fo_han');
        $data->qty = $request->input('qty');
        $data->oras_fo_han2 = $request->input('oras_fo_han2');
        $data->qty2 = $request->input('qty2');
        $data->data_fo_han = $request->input('data_fo_han');
        $data->total = $request->input('total');
        $data->staff_id = $request->input('staff_id');
        $data->update();
        return redirect()->route('fo-han')->with('success', 'Dadus Konsege Retifika!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fohanikan  $fohanikan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Fohanikan::find($id);
        $data->delete();
        return redirect()->route('fo-han')->with('success', 'Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Fohanikan::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('rekursu.fo_han.foHan-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Fo-Han-Ikan.pdf"
        );
    }
}
