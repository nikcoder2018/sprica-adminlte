<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class StaffController extends Controller
{
    public function index(){
        $data['page_title'] = __('Staffs');
        $data['staffs'] = User::whereHas('roles', function($q){ $q->where('name', 'staff'); })->with('informations')->get();

        return view('contents.admin.staffs', $data);
    }
    
}
