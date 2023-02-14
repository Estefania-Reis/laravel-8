<?php

namespace App\Http\Controllers;

use App\Models\Bee;
use App\Models\Employee;
use App\Models\Hapa;
use App\Models\Ikanbrood;
use App\Models\Ikantolun;
use App\Models\Incubator;
use App\Models\Kolam;
use App\Models\Serie;
use App\Models\Tipuikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class IkantolunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Ikantolun::where('id_ikantolun','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Ikantolun::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('ikanTolun\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataseries = Serie::all();
        $dataidikan = Ikanbrood::all();
        $dataidkolam = Kolam::all();
        $dataidhapa = Hapa::all();
        $dataidfun = Employee::all();
        // $databee = Bee::all();
        $dataidincu = Incubator::all();
        return view('ikanTolun\aumentadata',compact('dataidikan','dataidincu','dataidkolam','dataidhapa','dataidfun','dataseries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Ikantolun::create($request->all());
        $dataseries = Serie::all();
        $dataidikan = Ikanbrood::all();
        $dataidkolam = Kolam::all();
        $dataidhapa = Hapa::all();
        $dataidfun = Employee::all();
        // $databee = Bee::all();
        $dataidincu = Incubator::all();
        $data->save();
        return redirect()->route('ikan_tolun', compact('dataidikan','dataidincu','dataidkolam','dataidhapa','dataidfun','dataseries'))->with('success',' Dadus Submete Ho Sucesso!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ikantolun  $ikantolun
     * @return \Illuminate\Http\Response
     */
    public function show(Ikantolun $ikantolun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ikantolun  $ikantolun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ikantolun::find($id);
        return view('ikanTolun\edit', [
            'data' => $data,
            'dataseries' => Serie::all(),
            'dataidikan' => Ikanbrood::all(),
            'dataidkolam' => Kolam::all(),
            'dataidhapa' => Hapa::all(),
            'dataidfun' => Employee::all(),
            // 'databee' => Bee::all(),
            'dataidincu' => Incubator::all()
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ikantolun  $ikantolun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Ikantolun::find($id); 
        $data->series_id = $request->input('series_id');
        $data->data_kolleta = $request->input('data_kolleta');
        $data->ikan_id = $request->input('ikan_id');
        $data->kolam_id = $request->input('kolam_id');
        $data->hapa_id = $request->input('hapa_id');
        $data->staff_id = $request->input('staff_id');
        $data->total_ikan_F = $request->input('total_ikan_F');
        $data->total_ikan_tolun = $request->input('total_ikan_tolun');
        $data->incubator_id = $request->input('incubator_id');
        $data->update();
        return redirect()->route('ikan_tolun')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ikantolun  $ikantolun
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Ikantolun::find($id);
        $data->delete();
        return redirect()->route('ikan_tolun')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Ikantolun::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('ikanTolun.ikanTolun-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Ikan-Tolun.pdf"
        );
    }
}
