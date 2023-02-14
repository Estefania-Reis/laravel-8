<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Kolam;
use App\Models\Tbkolam;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class TbkolamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indextbkolam()
    {
        $data = Tbkolam::paginate('5');
        return view('manutensaun\troka_bee\kolam\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data    = Tbkolam::all();
        $dataemp = Employee::all();
        $datakol = Kolam::all();
        return view('manutensaun\troka_bee\kolam\aumentadata', compact('data','dataemp', 'datakol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tbkolam::create($request->all());
        $data    = Tbkolam::all();
        $dataemp = Employee::all();
        $datakol = Kolam::all();
        return view('manutensaun\troka_bee\kolam\aumentadata', compact('data','dataemp', 'datakol'))->with('success',' Dadus Submete Ho Susesu!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tbkolam  $tbkolam
     * @return \Illuminate\Http\Response
     */
    public function show(Tbkolam $tbkolam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tbkolam  $tbkolam
     * @return \Illuminate\Http\Response
     */
    public function edit(Tbkolam $tbkolam, $id)
    {
        $dataemp = Employee::all();
        $datakol = Kolam::all();
        $data = Tbkolam::find($id);
        //dd($data);
        return view('manutensaun\troka_bee\kolam\edit',compact('data','dataemp','datakol'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tbkolam  $tbkolam
     * @return \Illuminate\Http\Response
     */
    public function updatedatatbkolam(Request $request, $id)
    {
        $data = Tbkolam::find($id); 
        $data->employee_id = $request->input('employee_id');
        $data->kolam_id = $request->input('kolam_id');
        $data->oras_tb = $request->input('oras_tb');
        $data->data_tb = $request->input('data_tb');
        $data->update();
        return redirect()->route('indextbkolam')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tbkolam  $tbkolam
     * @return \Illuminate\Http\Response
     */
    public function delete(Tbkolam $tbkolam, $id)
    {
        $data = Tbkolam::find($id);
        $data->delete();
        return redirect()->route('indextbkolam')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Tbkolam::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('manutensaun.troka_bee.kolam.trokabeeKolam-pdf', $data->toArray())->setPaper('a4')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Troka-Bee-Kolam.pdf"
        );
    }
}
