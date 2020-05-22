<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformasiController extends Controller
{
    public function table(){
        // $datas = Iterasi::select('')
        return view('admin/informasi.table');
    }
}
