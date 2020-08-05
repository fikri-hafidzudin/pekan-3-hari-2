<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('index');
    }
    public function admin(){
        return view('admin');
    }
    public function tables(){
        return view('tables');
    }
    public function datatables(){
    return view('datatables');
    }
}