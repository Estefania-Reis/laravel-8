<?php

namespace App\Http\Controllers;

use App\Models\Hapa;
use Illuminate\Http\Request;

class HapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexhapa()
    {
        $data = Hapa::paginate('5');
        return view('manutensaun\hapa\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manutensaun\hapa\aumentadata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Hapa::create($request->all());
        return Redirect()->route('indexhapa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hapa  $hapa
     * @return \Illuminate\Http\Response
     */
    public function show(Hapa $hapa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hapa  $hapa
     * @return \Illuminate\Http\Response
     */
    public function edit(Hapa $hapa, $id)
    {
        $data = Hapa::find($id);
        //dd($data);
        return view('manutensaun\hapa\edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hapa  $hapa
     * @return \Illuminate\Http\Response
     */
    public function updatedatahapa(Request $request, $id)
    {
        $data = Hapa::find($id); 
        $data->tipu_hapa = $request->input('tipu_hapa');
        $data->luan = $request->input('luan');
        $data->naruk = $request->input('naruk');
        $data->altura = $request->input('altura');
        $data->volume = $request->input('volume');
        $data->status = $request->input('status');
        $data->obs = $request->input('obs');
        $data->update();
        return redirect()->route('indexhapa')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hapa  $hapa
     * @return \Illuminate\Http\Response
     */
    public function delete(Hapa $hapa, $id)
    {
        $data = Hapa::find($id);
        $data->delete();
        return redirect()->route('indexhapa')->with('success',' Dadus Konsege Hamos Ona!');
    }
}
