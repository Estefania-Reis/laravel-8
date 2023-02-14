<?php

namespace App\Http\Controllers;

use App\Models\Ikansrt;
use App\Models\Ikantolun;
use App\Models\Ikantolund;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;
use Barryvdh\DomPDF\Facade\Pdf;

class IkantolundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Ikantolund::where('id_ikantolund','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Ikantolund::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }

        
        return view('diminuisaun.ikantolun.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datasrt = Ikansrt::all();
        $dataikantolun = Ikantolun::all();
        $dataseries = Serie::all();
        return view('diminuisaun.ikantolun.aumentadata',compact('datasrt','dataikantolun','dataseries'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ikantolund::create($request->all());
        $datasrt = Ikansrt::all();
        $dataikantolun = Ikantolun::all();
        $dataseries = Serie::all();
        return view('diminuisaun.ikantolun.aumentadata',compact('datasrt','dataikantolun','dataseries'))->with('success',' Dadus Submete Ho Sucesso! ');
    }
// //.......Valor Total Ikan srt & tolun.......
// public function getIkantolund(Request $request){
//     $id_ikantolun = $request->ikantolun_id;
//     $ikantoluns = Ikantolun::where('id_ikantolun', $id_ikantolun)->get();
//    return response()->json($ikantoluns);
// }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ikantolund  $ikantolund
     * @return \Illuminate\Http\Response
     */
    public function show(Ikantolund $ikantolund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ikantolund  $ikantolund
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ikantolund::find($id);
        $datasrt = Ikansrt::all();
        $dataikantolun = Ikantolun::all();
        $dataseries = Serie::all();
        return view('diminuisaun.ikantolun.edit',compact('data','datasrt','dataikantolun','dataseries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ikantolund  $ikantolund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Ikantolund::find($id);
        $data->series_id = $request->input('series_id');
        $data->data = $request->input('data');
        $data->ikantolun_id = $request->input('ikantolun_id');
        $data->total_ikantolun = $request->input('total_ikantolun');
        $data->srt_id = $request->input('srt_id');
        $data->total_srt = $request->input('total_srt');
        $data->total_diminuisaun = $request->input('total_diminuisaun');
        $data->update();
        return redirect()->route('ikantolund')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ikantolund  $ikantolund
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Ikantolund::find($id);
        $data->delete();
        return redirect()->route('ikantolund')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Ikantolund::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('diminuisaun.ikantolun.ikantolun-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Ikan-Tolun-Diminuidu.pdf"
        );
    }
}
