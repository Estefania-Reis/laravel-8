<?php

namespace App\Http\Controllers;

use App\Models\Incubator;
use App\Models\Serie;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class IncubatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexincub()
    {
        $data = Incubator::paginate('5');
        return view('manutensaun\incubator\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        return view('manutensaun\incubator\aumentadata',compact('dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Incubator::create($request->all());
        $dataseries = Serie::all();
        return redirect()->route('indexincub',compact('dataseries'))->with('success',' Dadus Konsegue Submete Ho Susesu! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incubator  $incubator
     * @return \Illuminate\Http\Response
     */
    public function show(Incubator $incubator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Incubator  $incubator
     * @return \Illuminate\Http\Response
     */
    public function edit(Incubator $incubator, $id)
    {
        $data = Incubator::find($id);
        $dataseries = Serie::all();
        //dd($data);
        return view('manutensaun\incubator\edit',compact('data','dataseries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incubator  $incubator
     * @return \Illuminate\Http\Response
     */
    public function updatedataincub(Request $request, $id)
    {
        $data = Incubator::find($id); 
        $data->series_id = $request->input('series_id');
        $data->status = $request->input('status');
        $data->observasaun = $request->input('observasaun');
        $data->update();
        return redirect()->route('indexincub')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incubator  $incubator
     * @return \Illuminate\Http\Response
     */
    public function delete(Incubator $incubator, $id)
    {
        $data = Incubator::find($id);
        $data->delete();
        return redirect()->route('indexincub')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Incubator::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('manutensaun.incubator.incubator-pdf', $data->toArray())->setPaper('a4')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Incubator.pdf"
        );
    }
}
