<?php

namespace App\Http\Controllers;

use App\Models\Hapa;
use App\Models\Ikansrt;
use App\Models\Kolam;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class IkansrtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ikansrt::paginate('5');
        return view('data_ikan_srt\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datakolam = DB::table('kolams')->where('tipu_kolam', 'srt')->get();
        $datahapa = Hapa::all();
        $dataseries = Serie::all();
        return view('data_ikan_srt\aumentadata', compact('datakolam','datahapa','dataseries'));
    }

     //.......Posto.......
     public function getHapa(Request $request){
        $kolam_id = $request->kolam_id;
        $hapas = Hapa::where('kolam_id', $kolam_id)->get();
        $option = "<option > Hili... </option>";
        foreach($hapas as $hapa ){
            $option.= "<option value='$hapa->id_hapa'>$hapa->id_hapa</option>";
        }
        echo $option;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Ikansrt::create($request->all());
        $data->save();
        return redirect()->route('ikansrt')->with('success',' Dadus Konsegue Susesu! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ikansrt::find($id);
        return view('data_ikan_srt\edit', [
            'data' => $data,
            'dataseries' => Serie::all(),
            'datakolam' => Kolam::all(),
            'datahapa' => Hapa::all()
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $data = Ikansrt::find($id); 
            $data->series_id = $request->input('series_id');
            $data->data_husik = $request->input('data_husik');
            $data->kolam_id = $request->input('kolam_id');
            $data->hapa_id = $request->input('hapa_id');
            $data->total_ikan_srt = $request->input('total_ikan_srt');
            $data->update();
            return redirect()->route('ikansrt')->with('success',' Dadus Konsegue Retifika! ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Ikansrt::find($id);
        $data->delete();
        return redirect()->route('ikansrt')->with('success',' Dadus Konsege Hamos Ona!');
    }
    public function exportpdf(){
        $data = Ikansrt::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('data_ikan_srt.ikanSrt-pdf', $data->toArray())->setPaper('a4', 'landscape')->setWarnings(false)->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Ikan-SRT.pdf"
        );
    }
}
