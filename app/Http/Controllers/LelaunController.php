<?php

namespace App\Http\Controllers;

use App\Models\Ikan;
use App\Models\Lelaun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LelaunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Lelaun::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Lelaun::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }

        
        return view('operasaun\lelaun\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataikan = Ikan::all();
        return view('operasaun\lelaun\aumentadata', compact('dataikan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lelaun = Lelaun::create($request->all());
        $lelaun->lelaun()->sync()->attach($request->input('ikan_id'));
        return view('operasaun\lelaun\index')->with('success', 'Dadus Adisiona Ho Susesu');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lelaun  $lelaun
     * @return \Illuminate\Http\Response
     */
    public function show(Lelaun $lelaun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lelaun  $lelaun
     * @return \Illuminate\Http\Response
     */
    public function edit(Lelaun $lelaun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lelaun  $lelaun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lelaun $lelaun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lelaun  $lelaun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lelaun $lelaun)
    {
        //
    }
}
