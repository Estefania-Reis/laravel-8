<?php

namespace App\Http\Controllers;

use App\Models\Candidatoikanb;
use App\Models\Hapa;
use App\Models\Ikanbrood;
use App\Models\Kolam;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class CandidatoikanbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Candidatoikanb::where('id_candidato_ikan_b','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Candidatoikanb::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('kandidatuikanbrood.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataikan = Ikanbrood::all();
        $datakolam = Kolam::all();
        $datahapa = Hapa::all();
        $dataseries = Serie::all();
        return view('kandidatuikanbrood.aumentadata',compact('dataikan','datakolam','datahapa','dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Candidatoikanb::create($request->all());
        $dataikan = Ikanbrood::all();
        $datakolam = Kolam::all();
        $datahapa = Hapa::all();
        $dataseries = Serie::all();
        return redirect()->route('kandidatu_ikan',compact('dataikan','datakolam','datahapa','dataseries'))->with('success','Dadus Submete Ho Sucesso! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidatoikanb  $candidatoikanb
     * @return \Illuminate\Http\Response
     */
    public function show(Candidatoikanb $candidatoikanb)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidatoikanb  $candidatoikanb
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data = Candidatoikanb::find($id);
        return view('kandidatuikanbrood.edit', [
            'data' => $data,
            'dataseries' => Serie::all(),
            'datakolam' => Kolam::all(),
            'datahapa' => Hapa::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidatoikanb  $candidatoikanb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Candidatoikanb::find($id); 
        $data->data = $request->input('data');
        $data->series_id = $request->input('series_id');
        $data->kolam_id = $request->input('kolam_id');
        $data->hapa_id = $request->input('hapa_id');
        $data->codigo_familia = $request->input('codigo_familia');
        $data->total_M = $request->input('total_M');
        $data->total_F = $request->input('total_F');
        $data->subtotal = $request->input('subtotal');
        $data->update();
        return redirect()->route('kandidatu_ikan')->with('success','Dadus Konsegue Retifika!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidatoikanb  $candidatoikanb
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Candidatoikanb::find($id);
        $data->delete();
        return redirect()->route('kandidatu_ikan')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Candidatoikanb::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('kandidatuikanbrood.kandidatuikanbrood-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "kandidatu-ikan-brood.pdf"
        );
    }
}

