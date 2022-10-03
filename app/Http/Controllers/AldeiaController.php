<?php

namespace App\Http\Controllers;

use App\Models\Aldeia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AldeiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexaldeia(Request $request)
    {
        if($request->has('search')){
            $data = Aldeia::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Aldeia::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('data_extra\aldeia\index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_extra\aldeia\aumentaaldeia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Aldeia::create($request->all());
        return Redirect()->route('indexaldeia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aldeia  $aldeia
     * @return \Illuminate\Http\Response
     */
    public function show(Aldeia $aldeia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aldeia  $aldeia
     * @return \Illuminate\Http\Response
     */
    public function edit(Aldeia $aldeia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aldeia  $aldeia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aldeia $aldeia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aldeia  $aldeia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aldeia $aldeia)
    {
        //
    }
}
