<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use App\Models\Religion;
use App\Models\Niveleducasaun;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


use App\Helpers\Helper;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;

class EmployeeController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Employee::where('naran','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Employee::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }

        
        return view('datapegawai',compact('data'));
    }

    public function indexest(){
        
        // $data['naran'] = DB::select('SELECT naran FROM employees WHERE pozisaun = ?', ['chefe']);
        // $data= DB::table('employees')->where('pozisaun', 'chefe')->last();
        // $user = DB::table('users')->where('name', 'John')->first();
        $data= DB::table('employees')->where('pozisaun', 'chefe departamento (PAAD)')->first();
        $data1= DB::table('employees')->where('pozisaun', 'responsavel centro')->first();
        $data2= DB::table('employees')->where('pozisaun', 'tekniku administrasaun1')->first();
        $data8= DB::table('employees')->where('pozisaun', 'tekniku administrasaun2')->first();
        $data3= DB::table('employees')->where('pozisaun', 'tekniku (brood fish)')->first();
        $data4= DB::table('employees')->where('pozisaun', 'tekniku (incubator)')->first();
        $data5= DB::table('employees')->where('pozisaun', 'tekniku (srt)')->first();
        $data6= DB::table('employees')->where('pozisaun', 'tekniku (nursery)')->first();
        $data7= DB::table('employees')->where('pozisaun', 'tekniku (water quality and disease)')->first();
        // var_dump($data->naran);
        return view('estrutura', compact('data','data1','data2','data3','data4','data5','data6','data7','data8'));
    }

    public function tambahpegawai(){
        $dataagama = Religion::all();
        $datanivel = Niveleducasaun::all();
        return view('tambahdata',compact('dataagama','datanivel'));
    }

    public function insertdata(Request $request){
        //dd($request->all());
        // $employee_id = Helper::IDgenerator(new Employee, 'employee_id', 5, 'FPA');
        $this->validate($request,[
                'naran' => 'required|min:7|max:20',
                'nmr_telefone' => 'required|min:7|max:8'
                 ]);


        $data = Employee::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('storage/fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        // $data->employee_id = $employee_id;
        return redirect()->route('pegawai')->with('success',' Dadus Submete Ho Sucesso! ');
    }

    public function tampilkandata($id){
        
        $data = Employee::find($id);
        //dd($data);
        return view('tampildata', [
            'data' => $data,
            'datanivel' => Niveleducasaun::all()
        ]);
    }

    public function updatedataemp(Request $request, $id){
        
        $data = Employee::find($id);
        $data->naran = $request->input('naran');
        $data->jeneru = $request->input('jeneru');
        $data->nmr_telefone = $request->input('nmr_telefone');
        $data->pozisaun = $request->input('pozisaun');
        $data->status = $request->input('status');
        $data->nivel_ed_id = $request->input('nivel_ed_id');
        $data->level = $request->input('level');
        $data->obs = $request->input('obs');

        if($request->hasFile('foto')){
            $destination = 'storage/fotopegawai/'.$data->foto;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/fotopegawai/', $filename);
            $data->foto = $filename;
        }

        $data->update();
        return redirect()->route('pegawai')->with('success',' Dadus Konsegue Retifika! ');

    }

    public function delete($id){     
        $data = Employee::find($id);
        
        if($data->foto){
            Storage::delete($data->foto);
        }  

        $data->delete();
        return redirect()->route('pegawai')->with('success',' Dadus Konsege Hamos Ona!');
    }

    public function exportpdf(){
        $data = Employee::all();

        view()->share('data', $data);
        $pdf = Pdf::loadview('datapegawai-pdf', $data);
        return $pdf->download('data.pdf');
    }

    public function exportexcel(){
        return Excel::download(new EmployeeExport, 'dadusFuncionario.xlsx');
    }

    public function importexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('EmployeeData', $namafile);

        Excel::import(new EmployeeImport, \public_path('\EmployeeData'.$namafile));
        return \redirect()->back();
    }
}
