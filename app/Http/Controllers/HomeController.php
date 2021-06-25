<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userdashboard()
    {
        $semuajual = Jual::all();
        return view('user.userdashboard',compact('semuajual'));
    }

    //jual jasa
    public function jualjasasemua()
    {
        $semuajual = Jual::where('kategori_jual','Jasa')->get();
        return view('user.userjualjasasemua',compact('semuajual'));
    }

    //jual barang
    public function jualbarangsemua()
    {
        $semuajual = Jual::where('kategori_jual','Barang')->get();
        return view('user.userjualbarangsemua',compact('semuajual'));
    }
}
