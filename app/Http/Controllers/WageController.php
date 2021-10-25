<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WageController extends Controller
{
    public function index(){
        $data['page_title'] = __('Wage advance');
        return view('contents.staff.wage-advance', $data);
    }
}
