<?php

namespace App\Http\Controllers;

use App\Models\Niveleducasaun;
use App\Models\Serie;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $dataseries = Serie::all();
        return view('data_extra/niv_ed/aumentanivel', compact('dataseries'));
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
        $dataseries = Serie::all();
        return redirect()->route('index', compact('dataseries'))->with('success','Dadus Konsegue Submete Ho Susesu!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Niveleducasaun  $niveleducasaun
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Niveleducasaun  $niveleducasaun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Niveleducasaun::find($id);
        $dataseries = Serie::all();
        //dd($data);
        return view('data_extra/niv_ed/edit',compact('data','dataseries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Niveleducasaun  $niveleducasaun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Niveleducasaun::find($id);
        $data->series_id = $request->input('series_id');
        $data->naran = $request->input('naran');
        $data->update();
        return redirect()->route('index')->with('success','Dadus Konsegue Retifika!');
    }
    // public function updatedataniv(Request $request, $id){
    //     $data = Niveleducasaun::find($id);
    //     $data->employees()->sync($request['niveleducasaun_id']);//$game->platforms()->update($updates['platform_ids']); $game->platforms()->sync($updates['platform_ids']);

    //     if(session('halaman_url')){
    //         return Redirect(session('halaman_url'))->with('success',' Dadus Update ho Sucesso!');
            
    //     }

    //     return redirect()->route('index')->with('success',' Dadus Update ho Sucesso!');

    // }

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
    public function exportpdf(){
        $data = Niveleducasaun::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('data_extra.niv_ed.nivEd-pdf', $data->toArray())->setPaper('a4')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Nivel-Edukasaun.pdf"
        );
    }
}
