<?php

namespace App\Http\Controllers;

use App\Models\Kolam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KolamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexkolam()
    {
        $data = Kolam::paginate('5');
        return view('manutensaun\kolam\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('manutensaun\kolam\aumentadata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        Kolam::create($request->all());
        return Redirect()->route('indexkolam');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kolam  $kolam
     * @return \Illuminate\Http\Response
     */
    public function show(Kolam $kolam)
    {
       //
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kolam  $kolam
     * @return \Illuminate\Http\Response
     */
    public function editkolam($id)
    {
        $data = Kolam::find($id);
        //dd($data);
        return view('manutensaun\kolam\edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kolam  $kolam
     * @return \Illuminate\Http\Response
     */
    public function updatedatakolam(Request $request, $id)
    {
        $data = Kolam::find($id); 
        $data->luan         = $request->input('luan');
        $data->naruk        = $request->input('naruk');
        $data->altura       = $request->input('altura');
        $data->volume_bee   = $request->input('volume_bee');
        $data->tipu_kolam   = $request->input('tipu_kolam');
        $data->hapa1        = $request->input('hapa1');
        $data->hapa2        = $request->input('hapa2');
        $data->hapa3        = $request->input('hapa3');
        $data->status_kolam = $request->input('status_kolam');
        $data->observasaun  = $request->input('observasaun');
        $data->update();
        return redirect()->route('indexkolam')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kolam  $kolam
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Kolam::find($id);
        $data->delete();
        return redirect()->route('indexkolam')->with('success',' Dadus Konsege Hamos Ona!');
    }
}
