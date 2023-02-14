<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Kolam;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class KolamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexkolam(Request $request)
    {
        if($request->has('search')){
            $data = Kolam::where('kode_kolam','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Kolam::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('manutensaun\kolam\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dataemployee = Employee::all();
        $dataseries = Serie::all();
        return view('manutensaun\kolam\aumentadata', compact('dataemployee','dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        Kolam::create($request->all());
        $dataemployee = Employee::all();
        $dataseries = Serie::all();
        return redirect()->route('indexkolam', compact('dataemployee','dataseries'))->with('success',' Dadus Konsegue Submete ho Susesu. ');
        // return view('manutensaun\kolam\aumentadata', compact('dataemployee','dataseries'))->with('success',' Dadus Submete Ho Susesu!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kolam  $kolam
     * @return \Illuminate\Http\Response
     */
    public function show(Kolam $kolam)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kolam  $kolam
     * @return \Illuminate\Http\Response
     */
    public function editkolam($id)
    {
        $data = Kolam::find($id);
        $dataseries = Serie::all();
        $dataemployee = Employee::all();
        //dd($data);
        return view('manutensaun\kolam\edit',compact('data','dataseries','dataemployee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kolam  $kolam
     * @return \Illuminate\Http\Response
     */
    public function updatedatakolam(Request $request, $id)
    {
        $data = Kolam::find($id); 
        $data->series_id            = $request->input('series_id');
        // $data->id_kolam          = $request->input('id_kolam');
        $data->tipu_kolam           = $request->input('tipu_kolam');
        $data->funsionamentu        = $request->input('funsionamentu');
        $data->employee_id          = $request->input('employee_id');
        $data->largura_kolam        = $request->input('largura_kolam');
        $data->comprimento_kolam    = $request->input('comprimento_kolam');
        $data->area_kolam           = $request->input('area_kolam');
        $data->altura_kolam         = $request->input('altura_kolam');
        $data->volume_kolam         = $request->input('volume_kolam');
        $data->status               = $request->input('status');
        $data->observasaun          = $request->input('observasaun');
        $data->update();
        return redirect()->route('indexkolam')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kolam  $kolam
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Kolam::find($id);
        $data->delete();
        return redirect()->route('indexkolam')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Kolam::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('manutensaun.kolam.kolam-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Kolam.pdf"
        );
    }
}
