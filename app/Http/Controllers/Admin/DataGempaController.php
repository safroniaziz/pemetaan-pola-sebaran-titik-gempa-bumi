<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataGempa;

class DataGempaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function dashboard(){
        $datas = DataGempa::all();
        return view('admin/data_gempa.index', compact('datas'));
    }
}
