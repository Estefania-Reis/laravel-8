<?php

namespace App\Http\Controllers;

use App\Models\Aldeia;
use App\Models\Klientegrupo;
use App\Models\Municipio;
use App\Models\Posto;
use App\Models\Serie;
use App\Models\Suco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $datamunicipio = Municipio::all();
        $dataseries = Serie::all();
        return view('klientes\grupo\aumentadata', compact('datamunicipio','dataseries'));
    }

    //.......Posto.......
    public function getPosto(Request $request){
        $r_munisipio = $request->municipio_id;
        $postos = Posto::where('municipio_id', $r_munisipio)->get();
        $option = "<option > Hili... </option>";
        foreach($postos as $postu ){
            $option.= "<option value='$postu->id'>$postu->naran</option>";
        }
        echo $option;
    }

    public function getSuco(Request $request){
        $r_postu = $request->posto_id;
        $sucos = Suco::where('posto_id', $r_postu)->get();
        $option = "<option > Hili... </option>";
        foreach($sucos as $suku ){
            $option.= "<option value='$suku->id'>$suku->naran</option>";
        }

        echo $option;
    }

    public function getAldeia(Request $request){
        $r_suku = $request->suco_id;
        $aldeias = Aldeia::where('suco_id', $r_suku)->get();
        $option = "<option > Hili... </option>";
        foreach($aldeias as $aldeia ){
            $option.= "<option value='$aldeia->id'>$aldeia->naran</option>";
        }

        echo $option;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Klientegrupo::create($request->all());
        // if($request->hasFile('foto')){
        //     $request->file('foto')->move('storage/fotoklientegrupo/', $request->file('foto')->getClientOriginalName());
        //     $data->foto = $request->file('foto')->getClientOriginalName();
        //     $data->save();
        // }
        // $data->employee_id = $employee_id;
        $datamunicipio = Municipio::all();
        $dataseries = Serie::all();
        return redirect()->route('indexgp', compact('datamunicipio','dataseries'))->with('success',' Dadus Konsegue Submete Ho Susesu! ');
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
            'datamunicipio'=> Municipio::all(),
            'dataseries' => Serie::all()
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
        $data->series_id = $request->input('series_id'); 
        $data->naran = $request->input('naran');
        $data->chefe_grupo = $request->input('chefe_grupo');
        $data->no_id_xefe = $request->input('no_id_xefe');
        $data->jeneru = $request->input('jeneru');
        $data->r_aldeia = $request->input('r_aldeia');
        $data->r_suku = $request->input('r_suku');
        $data->r_postu = $request->input('r_postu');
        $data->r_munisipio = $request->input('r_munisipio');
        $data->nmr_telfone = $request->input('nmr_telfone');
        // if($request->hasFile('foto')){
        //     $destination = 'storage/fotoklientegrupo/'.$data->foto;
        //     if(File::exists($destination)){
        //         File::delete($destination);
        //     }
        //     $file = $request->file('foto');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('storage/fotoklientegrupo/', $filename);
        //     $data->foto = $filename;
        // }

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
        
        // $destination = 'storage/fotoklientegrupo/'.$data->foto;
        // if(File::exists($destination)){
        //    File::delete($destination);
        // } 

        $data->delete();
        return redirect()->route('indexgp')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Klientegrupo::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('klientes.grupo.klienteGrupu-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Benefisiariu-Grupu.pdf"
        );
    }
}
