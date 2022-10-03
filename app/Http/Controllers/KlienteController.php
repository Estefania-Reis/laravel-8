<?php

namespace App\Http\Controllers;

use App\Models\Aldeia;
use App\Models\Kliente;
use App\Models\Kolam;
use App\Models\Municipio;
use App\Models\Posto;
use App\Models\Suco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class KlienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexind(Request $request)
    {
        if($request->has('search')){
            $data = Kliente::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Kliente::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }

        
        return view('klientes\individual\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataaldeia = Aldeia::all();
        $datasuco = Suco::all();
        $dataposto = Posto::all();
        $datamunicipio = Municipio::all();
        return view('klientes\individual\aumentadataindividual', compact('dataaldeia','datasuco', 'dataposto', 'datamunicipio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Kliente::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('storage/fotokliente/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('indexind')->with('success',' Dadus Submete Ho Sucesso! ');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kliente  $kliente
     * @return \Illuminate\Http\Response
     */
    public function show(Kliente $kliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kliente  $kliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kliente::find($id);
        //dd($data);
        return view('klientes\individual\edit', [
            'data' => $data,
            'dataaldeia' => Aldeia::all(),
            'datasuco'=> Suco::all(),
            'dataposto'=> Posto::all(),
            'datamunicipio'=> Municipio::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kliente  $kliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Kliente::find($id); 
        $data->naran = $request->input('naran');
        $data->genero = $request->input('genero');
        $data->data_moris = $request->input('data_moris');
        $data->naturalidade = $request->input('naturalidade');
        $data->aldeia_id = $request->input('aldeia_id');
        $data->suco_id = $request->input('suco_id');
        $data->posto_id = $request->input('posto_id');
        $data->municipio_id = $request->input('municipio_id');
        $data->nmr_telfone = $request->input('nmr_telfone');
        if($request->hasFile('foto')){
            $destination = 'storage/fotokliente/'.$data->foto;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/fotokliente/', $filename);
            $data->foto = $filename;
        }

        $data->update();
        return redirect()->route('indexind')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kliente  $kliente
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Kliente::find($id);
        
        $destination = 'storage/fotokliente/'.$data->foto;
        if(File::exists($destination)){
            File::delete($destination);
        } 

        $data->delete();
        return redirect()->route('indexind')->with('success',' Dadus Konsege Hamos Ona!');
    }
}
