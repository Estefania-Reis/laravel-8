<?php

namespace App\Http\Controllers;

use App\Models\Eletrisidade;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class EletrisidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request ) 
    {
        if($request->has('search')){
            $data = Eletrisidade::where('id_eletrisidade','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Eletrisidade::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('rekursu\eletrisidade\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        return view('rekursu\eletrisidade\aumenta',compact('dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Eletrisidade::create($request->all());
        $dataseries = Serie::all();
        return redirect()->route('eletrisidade',compact('dataseries'))->with('success',' Dadus Konsegue Submete Ho Susesu! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eletrisidade  $eletrisidade
     * @return \Illuminate\Http\Response
     */
    public function show(Eletrisidade $eletrisidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eletrisidade  $eletrisidade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Eletrisidade::find($id);
        $dataseries = Serie::all();
        return view('rekursu\eletrisidade\edit',compact('data','dataseries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eletrisidade  $eletrisidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Eletrisidade::find($id);
        $data->series_id = $request->input('series_id');
        $data->data_ahi_mate = $request->input('data_ahi_mate');
        $data->data_ahi_lakan = $request->input('data_ahi_lakan');
        $data->horas_ahi_lakan = $request->input('horas_ahi_lakan');
        $data->horas_ahi_mate = $request->input('horas_ahi_mate');
        $data->update();
        return redirect()->route('eletrisidade')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eletrisidade  $eletrisidade
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Eletrisidade::find($id);
        $data->delete();
        return redirect()->route('eletrisidade')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Eletrisidade::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('rekursu\eletrisidade\eletrisidade-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "eletrisidade.pdf"
        );
    }
}
