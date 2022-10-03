<?php

namespace App\Http\Controllers;

use App\Models\Suco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SucoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexsuco(Request $request)
    {
        if($request->has('search')){
            $data = Suco::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Suco::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('data_extra\suco\index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_extra\suco\aumentasuco');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Suco::create($request->all());
        return Redirect()->route('indexsuco');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suco  $suco
     * @return \Illuminate\Http\Response
     */
    public function show(Suco $suco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suco  $suco
     * @return \Illuminate\Http\Response
     */
    public function edit(Suco $suco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suco  $suco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suco $suco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suco  $suco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suco $suco)
    {
        //
    }
}
