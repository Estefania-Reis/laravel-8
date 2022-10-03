<?php

namespace App\Http\Controllers;

use App\Models\Bee;
use App\Models\Employee;
use App\Models\Ikan;
use App\Models\Ikantolun;
use App\Models\Incubator;
use Illuminate\Http\Request;

class IkantolunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ikantolun::paginate('5');
        return view('ikanTolun\index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataidikan = Ikan::all();
        $databee = Bee::all();
        $dataidincu = Incubator::all();
        return view('ikanTolun\aumentadata',compact('dataidikan','databee','dataidincu'));
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
        $data->save();
        return redirect()->route('ikan_tolun')->with('success',' Dadus Submete Ho Sucesso! ');
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
            'dataidikan' => Ikan::all(),
            'databee' => Bee::all(),
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
        $data->ikan_id = $request->input('ikan_id');
        $data->pesu = $request->input('pesu');
        $data->unidade = $request->input('unidade');
        $data->bee_id = $request->input('bee_id');
        $data->incubator_id = $request->input('incubator_id');
        $data->data = $request->input('data');
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
}
