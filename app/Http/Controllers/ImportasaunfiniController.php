<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use App\Models\Importasaunfini;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class ImportasaunfiniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Importasaunfini::where('nasaun','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Importasaunfini::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('importasaun\importasaunfini', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        return view('importasaun\aumenta', compact('dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=Importasaunfini::create($request->all());
        $dataseries = Serie::all();
        return redirect()->route('importasaun_fini', compact('data','dataseries'))->with('success',' Dadus Konsegue Retifika! ');
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
        $data = Importasaunfini::find($id);
        $dataseries = Serie::all();
        return view('importasaun\edit', compact('data','dataseries'));
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
        $data = Importasaunfini::find($id); 
        // $data->series_id = $request->input('series_id');
        $data->data = $request->input('data');
        $data->tipu = $request->input('tipu');
        $data->nasaun = $request->input('nasaun');
        $data->total_msex = $request->input('total_msex');
        $data->total_nmsex = $request->input('total_nmsex');
        $data->update();
        return redirect()->route('importasaun_fini')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Importasaunfini::find($id);
        $data->delete();
        return redirect()->route('importasaun_fini')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Importasaunfini::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('importasaun.importasaunfini-pdf', $data->toArray())->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Importasaun-Fini-Ikan.pdf"
        );
    }
}
