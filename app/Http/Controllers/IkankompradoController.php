<?php

namespace App\Http\Controllers;

use App\Models\Ikankomprado;
use App\Models\Lelaun;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class IkankompradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Ikankomprado::where('id_ikankomprado','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Ikankomprado::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }

        
        return view('operasaun\nota_kompras\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datalelaun = Lelaun::all();
        $dataseries = Serie::all();
        return view('operasaun\nota_kompras\aumenta', compact('datalelaun','dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Ikankomprado::create($request->all());
        $data->save();
        $datalelaun = Lelaun::all();
        $dataseries = Serie::all();
        return view('operasaun\nota_kompras\aumenta', compact('datalelaun','dataseries'))->with('success',' Dadus Submete Ho Susesu!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ikankomprado  $ikankomprado
     * @return \Illuminate\Http\Response
     */
    public function show(Ikankomprado $ikankomprado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ikankomprado  $ikankomprado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ikankomprado::find($id);
        return view('operasaun\nota_kompras\edit', [
            'data' => $data,
            'dataseries' => Serie::all(),
            'datalelaun' => Lelaun::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ikankomprado  $ikankomprado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Ikankomprado::find($id); 
        $data->series_id = $request->input('series_id');
        $data->data = $request->input('data');
        $data->lelaun_id = $request->input('lelaun_id');
        $data->no_eleitoral = $request->input('no_eleitoral');
        $data->no_bi = $request->input('no_bi');
        $data->naran_kliente = $request->input('naran_kliente');
        $data->peso = $request->input('peso');
        $data->presu = $request->input('presu');
        $data->total = $request->input('total');
        $data->update();
        return redirect()->route('nota_kompras')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ikankomprado  $ikankomprado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Ikankomprado::find($id);
        $data->delete();
        return redirect()->route('nota_kompras')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Ikankomprado::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('operasaun.nota_kompras.notaKompras-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Nota-Kompras.pdf"
        );
    }
}
