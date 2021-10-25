<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PSAController extends Controller
{
    public function index(){
        return view('contents.staff.psa');
    }
}
