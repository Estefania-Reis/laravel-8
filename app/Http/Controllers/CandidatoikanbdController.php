<?php

namespace App\Http\Controllers;

use App\Models\Candidatoikanb;
use App\Models\Candidatoikanbd;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;


class CandidatoikanbdController extends Controller
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
        return view('diminuisaun\ikankandidatu\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataikan = Candidatoikanb::all();
        $dataseries = Serie::all();
        return view('diminuisaun.ikankandidatu.aumentadata',compact('dataikan','dataseries'));
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
        $dataikan = Candidatoikanb::all();
        $dataseries = Serie::all();
        return view('diminuisaun.ikankandidatu.aumentadata',compact('dataikan','dataseries'))->with('success','Dadus Submete Ho Sucesso! ');
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
    public function edit($id)
    {
        $data = Candidatoikanb::find($id);
        return view('diminuisaun.ikankandidatu.edit', [
            'data' => $data,
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
    public function update(Request $request, $id)
    {
        $data = Candidatoikanbd::find($id); 
        $data->data = $request->input('data');
        $data->series_id = $request->input('series_id');
        $data->kolam_id = $request->input('kolam_id');
        $data->hapa_id = $request->input('hapa_id');
        $data->codigo_familia = $request->input('codigo_familia');
        $data->total_M = $request->input('total_M');
        $data->total_F = $request->input('total_F');
        $data->subtotal = $request->input('subtotal');
        $data->update();
        return redirect()->route('kandidatu_ikan_dim')->with('success','Dadus Konsegue Retifika!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Candidatoikanb::find($id);
        $data->delete();
        return redirect()->route('kandidatu_ikan_dim')->with('success',' Dadus Konsege Hamos Ona!');
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
