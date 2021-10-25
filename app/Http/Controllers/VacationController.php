<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacations;
use App\Models\Project;
use Carbon\Carbon;
class VacationController extends Controller
{
    public function index(){
        $data['page_title'] = __('Vacation times');
        $data['projects'] = Project::where('id', 1)->get();
        $data['form_vars'] = (object)[
            'yesterday' => Carbon::now()->subDays(4)->format('Y-m-d'),
            'yesterday_label' => Carbon::now()->subDays(4)->format('d.m.Y'),
            'tomorrow' => Carbon::now()->addDays(1)->format('Y-m-d'),
            'today' => Carbon::now()->format('Y-m-d')
        ];
        return view('contents.staff.vacation-times', $data);
    }
}
