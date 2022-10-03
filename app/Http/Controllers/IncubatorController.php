<?php

namespace App\Http\Controllers;

use App\Models\Incubator;
use Illuminate\Http\Request;

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
        return view('manutensaun\incubator\aumentadata');
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
        return Redirect()->route('indexincub');
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
        //dd($data);
        return view('manutensaun\incubator\edit',compact('data'));
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
}
