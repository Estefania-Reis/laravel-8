<?php

namespace App\Http\Controllers;

use App\Models\Bee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Bee::where('orijem_bee','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Bee::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }

        return view('rekursu\bee\index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('rekursu\bee\aumentadata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Bee::create($request->all());
        $data->save();
        return redirect()->route('indexbee')->with('success',' Dadus Submete Ho Sucesso! ');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bee  $bee
     * @return \Illuminate\Http\Response
     */
    public function show(Bee $bee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bee  $bee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Bee::find($id);
        //dd($data);
        return view('rekursu\bee\edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bee  $bee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Bee::find($id); 
        $data->orijem_bee = $request->input('orijem_bee');
        $data->update();
        return redirect()->route('indexbee')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bee  $bee
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Bee::find($id);
        $data->delete();
        return redirect()->route('indexbee')->with('success',' Dadus Konsege Hamos Ona!');
    }
}
