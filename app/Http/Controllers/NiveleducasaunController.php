<?php

namespace App\Http\Controllers;

use App\Models\Niveleducasaun;
use Illuminate\Http\Request;

class NiveleducasaunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Niveleducasaun::paginate('5');
        return view('data_extra\niv_ed\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_extra/niv_ed/aumentanivel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Niveleducasaun::create($request->all());
        return Redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Niveleducasaun  $niveleducasaun
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $data = Niveleducasaun::find($id);
        //dd($data);
        return view('data_extra/niv_ed/edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Niveleducasaun  $niveleducasaun
     * @return \Illuminate\Http\Response
     */
    // public function edit(Niveleducasaun $niveleducasaun)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Niveleducasaun  $niveleducasaun
     * @return \Illuminate\Http\Response
     */
    public function updatedataniv(Request $request, $id){
        $data = Niveleducasaun::find($id);
        $data->employees()->sync($request['niveleducasaun_id']);//$game->platforms()->update($updates['platform_ids']); $game->platforms()->sync($updates['platform_ids']);

        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success',' Dadus Update ho Sucesso!');
            
        }

        return redirect()->route('index')->with('success',' Dadus Update ho Sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Niveleducasaun  $niveleducasaun
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $data = Niveleducasaun::find($id);
        $data->delete();
        return redirect()->route('index')->with('success',' Dadus Konsege Hamos Ona!');
    }


}
