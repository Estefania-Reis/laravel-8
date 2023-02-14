<?php

namespace App\Http\Controllers;

use App\Models\Pedidu;
use App\Models\Kliente;
use App\Models\Klientegrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class PediduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Pedidu::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Pedidu::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }       
        return view('pedidu.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $databind = Kliente::all();
        $databgp = Klientegrupo::all();
        return view('pedidu.aumenta',compact('databind','databgp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Pedidu::create($request->all());
        if($request->hasFile('proposta')){
            $request->file('proposta')->move('storage/proposta-pedidu/', $request->file('proposta')->getClientOriginalName());
            $data->proposta = $request->file('proposta')->getClientOriginalName();
            $data->save();
        }
        $databind = Kliente::all();
        $databgp = Klientegrupo::all();
        return redirect()->route('pedidu', compact('databind','databgp'))->with('success',' Dadus Konsegue Submete Ho Sucesso! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedidu  $pedidu
     * @return \Illuminate\Http\Response
     */
    public function show(Pedidu $pedidu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedidu  $pedidu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pedidu::find($id);
        $databind = Kliente::all();
        $databgp = Klientegrupo::all();
        return view('pedidu.edit', compact('data','databind','databgp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedidu  $pedidu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Pedidu::find($id);
        $data->data = $request->input('data'); 
        $data->tipu_benefisiariu = $request->input('tipu_benefisiariu');
        $data->id_benefisiariu_ind = $request->input('id_benefisiariu_ind');
        $data->id_benefisiariu_gp = $request->input('id_benefisiariu_gp');
        $data->objetivu = $request->input('objetivu');
        if($request->hasFile('proposta')){
            $destination = 'storage/proposta-pedidu/'.$data->proposta;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('proposta');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/proposta-pedidu/', $filename);
            $data->foto = $filename;
        }
        $data->total_msex = $request->input('total_msex');
        $data->total_nmsex = $request->input('total_nmsex');
        $data->deskreve_kolam = $request->input('deskreve_kolam');
        $data->update();
        return redirect()->route('pedidu')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedidu  $pedidu
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Pedidu::find($id);
        $data->delete();
        return redirect()->route('pedidu')->with('success',' Dadus Konsege Hamos Ona!');
    }
}
