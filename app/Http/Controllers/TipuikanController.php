<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Tipuikan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TipuikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indextipu()
    {
        $data = Tipuikan::paginate('5');
        return view('data_extra\tipu_ikan\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        return view('data_extra\tipu_ikan\aumentadata', compact('dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tipuikan::create($request->all());
        $dataseries = Serie::all();
        return view('data_extra\tipu_ikan\aumentadata', compact('dataseries'))->with('success',' Dadus Submete Ho Susesu! ');
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
        $data = Tipuikan::find($id);
        $dataseries = Serie::all();
        return view('data_extra.tipu_ikan.edit', compact('data','dataseries'));
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
        $data = Tipuikan::find($id); 
        $data->naran = $request->input('naran');
        $data->update();
        return redirect()->route('indextipu')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Tipuikan::find($id);
        $data->delete();
        return redirect()->route('indextipu')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Tipuikan::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('data_extra.tipu_ikan.tipuIkan-pdf', $data->toArray())->setPaper('a4')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Tipu-Ikan.pdf"
        );
    }
}
