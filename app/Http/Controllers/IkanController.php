<?php

namespace App\Http\Controllers;

use App\Models\Hapa;
use App\Models\Ikan;
use App\Models\Kolam;
use App\Models\Orijemikan;
use App\Models\Tipuikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IkanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
        public function index(Request $request){

            if($request->has('search')){
                $data = Ikan::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
                Session::put('halaman_url', request()->fullUrl());
            }else{
                $data = Ikan::paginate(5);
               
                Session::put('halaman_url', request()->fullUrl());
            }
    
            
            return view('data_ikan\index',compact('data'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datatipuikan = Tipuikan::all();
        $dataorijemikan = Orijemikan::all();
        $datakolam = Kolam::all();
        return view('data_ikan\aumentadata',compact('datatipuikan','dataorijemikan', 'datakolam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ikan::create($request->all());
    return redirect()->route('ikan')->with('success',' Dadus Submete Ho Sucesso! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ikan  $ikan
     * @return \Illuminate\Http\Response
     */
    public function show(Ikan $ikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ikan  $ikan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ikan::find($id);
        $datatipuikan = Tipuikan::all();
        $dataorijemikan = Orijemikan::all();
        $datakolam = Kolam::all();
        return view('data_ikan\edit',compact('data','datatipuikan','dataorijemikan', 'datakolam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ikan  $ikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Ikan::find($id);
        $data->tipu_id = $request->input('tipu_id');
        $data->jerasaun = $request->input('jerasaun');
        $data->kuantidade_ikan_aman = $request->input('kuantidade_ikan_aman');
        $data->kuantidade_ikan_inan = $request->input('kuantidade_ikan_inan');
        $data->orijem_id = $request->input('orijem_id');
        $data->kolam_id = $request->input('kolam_id');
        $data->periodo = $request->input('periodo');
        $data->periodo_expire = $request->input('periodo_expire');
        $data->update();
        return redirect()->route('ikan')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ikan  $ikan
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Ikan::find($id);
        $data->delete();
        return redirect()->route('ikan')->with('success',' Dadus Konsege Hamos Ona!');
    }
}
