<?php

namespace App\Http\Controllers;

use App\Models\Aldeia;
use App\Models\Distribuisaun;
use App\Models\Kliente;
use App\Models\Klientegrupo;
use App\Models\Municipio;
use App\Models\Posto;
use App\Models\Suco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DistribuisaunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Distribuisaun::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Distribuisaun::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }

        
        return view('operasaun\distribuisaun\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataklienteind = Kliente::all();
        $dataklientegp = Klientegrupo::all();
        $dataaldeia = Aldeia::all();
        $datasuco = Suco::all();
        $dataposto = Posto::all();
        $datamunicipio = Municipio::all();
        return view('operasaun\distribuisaun\aumentadata', compact('dataklienteind','dataklientegp','dataaldeia','datasuco','dataposto',
        'datamunicipio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distribuisaun  $distribuisaun
     * @return \Illuminate\Http\Response
     */
    public function show(Distribuisaun $distribuisaun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distribuisaun  $distribuisaun
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribuisaun $distribuisaun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distribuisaun  $distribuisaun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribuisaun $distribuisaun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distribuisaun  $distribuisaun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribuisaun $distribuisaun)
    {
        //
    }
}
