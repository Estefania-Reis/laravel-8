<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Religion::where('id_religion','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Religion::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('datareligion', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        return view('tambahreligion', compact('dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Religion::create($request->all());
        $dataseries = Serie::all();
        return redirect()->route('datareligion', compact('dataseries'))->with('success',' Dadus Submete Ho Susesu! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function show(Religion $religion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Religion::find($id);
        $dataseries = Serie::all();
        return view('editreligion', compact('data','dataseries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Religion::find($id);
        $data->series_id = $request->input('series_id');
        $data->naran = $request->input('naran');
        $data->update();
        return redirect()->route('datareligion')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Religion::find($id);
        $data->delete();
        return redirect()->route('datareligion')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Religion::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('religion-pdf', $data->toArray())->setPaper('a4')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Relijiaun.pdf"
        );
    }
}
