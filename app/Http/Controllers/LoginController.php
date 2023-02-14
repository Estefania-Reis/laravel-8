<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{ 
    public function index(Request $request){
            // $this->authorize('admin');
            if($request->has('search')){
                $data = User::where('name','LIKE','%' .$request->search.'%')->paginate(5);
                Session::put('halaman_url', request()->fullUrl());
            }else{
                $data = User::paginate(5);
                Session::put('halaman_url', request()->fullUrl());
            }
        return view('utilizador.utilizador', compact('data'));
    }
    public function login(){
        return view('login');
    }
    public function loginproses(Request $request){
       $credentials    = $request->validate([
            'username'    => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return \redirect('login')->with('loginError', 'Login failed!');
    }
    public function registo(){
        return view('utilizador.registo');
    }

    public function registeruser(Request $request){
        $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'username'=>['required', 'min:3', 'max:255', 'unique:users'],
            'email'=> 'required|email:dns|unique:users',
            'password'=> 'required|min:5|max:255',
            'remember_token' => Str::random(60),
        ]);
        $validatedData['password']=Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect()->route('registo')->with('success', 'Registo Successo');
    }

    public function edit($id){
        $data = User::find($id);
        return view('utilizador.edit',compact('data'));
    }

    public function resetpw($id){
        $data = User::find($id);
        return view('utilizador.resetpw',compact('data'));
    }
    public function updatepw(Request $request,$id){
        $data = User::find($id);
        $data->password = Hash::make($request->input('password'));
        $data->update();
        return redirect()->route('utilizador')->with('success',' Password Konsegue Retifika! ');
    }

    public function update(Request $request,$id){
        $data = User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->username = $request->input('username');
        $data->is_xefe = $request->input('is_xefe');
        $data->is_responsavel = $request->input('is_responsavel');
        $data->is_tadmin = $request->input('is_tadmin');
        $data->is_admin = $request->input('is_admin');
        $data->update();
        return redirect()->route('utilizador')->with('success',' Dadus Konsegue Retifika! ');
    }

    public function exportpdf1(){
        $data = User::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('utilizador.utilizador-pdf', $data->toArray())->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(
            fn () => print($pdf),
            "Utilizador.pdf"
        );
    }

    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('utilizador')->with('success',' Dadus Konsege Hamos Ona!');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

}
