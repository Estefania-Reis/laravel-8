<?php

namespace App\Http\Controllers;

use App\Models\Ikanoan;
use App\Models\Ikantolun;
use App\Models\Kolam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IkanoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ikanoan::paginate('5');
        return view('data_ikan_oan\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataikantolun = Ikantolun::all();
        $datakolam = DB::table('kolams')->where('tipu_kolam', 'nursery')->get();
        return view('data_ikan_oan\aumentadata', compact('dataikantolun','datakolam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Ikanoan::create($request->all());
        $data->save();
        return redirect()->route('ikanoan')->with('success',' Dadus Submete Ho Sucesso! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ikanoan  $ikanoan
     * @return \Illuminate\Http\Response
     */
    public function show(Ikanoan $ikanoan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ikanoan  $ikanoan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ikanoan::find($id);
        return view('data_ikan_oan\edit', [
            'data' => $data,
            'dataikantolun' => Ikantolun::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ikanoan  $ikanoan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Ikanoan::find($id); 
        $data->ikan_tolun_id = $request->input('ikan_tolun_id');
        $data->kuantidade = $request->input('kuantidade');
        $data->kolam_nursery_id = $request->input('kolam_nursery_id');
        $data->update();
        return redirect()->route('ikanoan')->with('success',' Dadus Konsegue Retifika! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ikanoan  $ikanoan
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Ikanoan::find($id);
        $data->delete();
        return redirect()->route('ikanoanp')->with('success',' Dadus Konsege Hamos Ona!');
    }
}
