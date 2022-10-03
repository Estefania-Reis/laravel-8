<?php

namespace App\Http\Controllers;

use App\Models\Aldeia;
use App\Models\Klientegrupo;
use App\Models\Municipio;
use App\Models\Posto;
use App\Models\Suco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class KlientegrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexgp(Request $request)
    {
        if($request->has('search')){
            $data = Klientegrupo::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Klientegrupo::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }

        
        return view('klientes\grupo\index',compact('data'));
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
        return view('klientes\grupo\aumentadata', compact('dataaldeia','datasuco', 'dataposto', 'datamunicipio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Klientegrupo::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('storage/fotoklientegrupo/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        // $data->employee_id = $employee_id;
        return redirect()->route('indexgp')->with('success',' Dadus Submete Ho Sucesso! ');
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
    public function editgp($id)
    {
        $data = Klientegrupo::find($id);
        //dd($data);
        return view('klientes\grupo\edit', [
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updategp(Request $request, $id)
    {
        $data = Klientegrupo::find($id); 
        $data->naran = $request->input('naran');
        $data->chefe_grupo = $request->input('chefe_grupo');
        $data->jeneru = $request->input('jeneru');
        $data->r_aldeia = $request->input('r_aldeia');
        $data->r_suku = $request->input('r_suku');
        $data->r_postu = $request->input('r_postu');
        $data->r_munisipio = $request->input('r_munisipio');
        $data->nmr_telfone = $request->input('nmr_telfone');
        if($request->hasFile('foto')){
            $destination = 'storage/fotoklientegrupo/'.$data->foto;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/fotoklientegrupo/', $filename);
            $data->foto = $filename;
        }

        $data->update();
        return redirect()->route('indexgp')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Klientegrupo::find($id);
        
        $destination = 'storage/fotoklientegrupo/'.$data->foto;
        if(File::exists($destination)){
           File::delete($destination);
        } 

        $data->delete();
        return redirect()->route('indexgp')->with('success',' Dadus Konsege Hamos Ona!');
    }
}
