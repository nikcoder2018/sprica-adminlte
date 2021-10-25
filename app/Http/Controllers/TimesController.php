<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeLog;
use App\Models\Project;
use App\Models\StaffCode;

use Carbon\Carbon;
class TimesController extends Controller
{
    public function index(){
        $data['page_title'] = __('Times');
        $data['timelogs'] = TimeLog::where('user_id', auth()->user()->id)->orderBy('date', 'desc')->get();
        $data['projects'] = Project::all();
        $data['mycodes'] = StaffCode::with('code')->where('user_id', auth()->user()->id)->get();
        
        $data['form_vars'] = (object)[
            'yesterday' => Carbon::now()->subDays(4)->format('Y-m-d'),
            'yesterday_label' => Carbon::now()->subDays(4)->format('d.m.Y'),
            'tomorrow' => Carbon::now()->addDays(1)->format('Y-m-d'),
            'today' => Carbon::now()->format('Y-m-d')
        ];

        //return response()->json($data);
        return view('contents.staff.times', $data);
    }

    public function store(Request $request){

        $exists = TimeLog::where(['user_id' => auth()->user()->id, 'date' => $request->date])->exists();
        
        if($exists)
            return response()->json(['success' => false, 'msg' => __('timelog.store_fail_exists')]);
            
        $store = TimeLog::create([
            'user_id' => auth()->user()->id,
            'project_id' => $request->project_id,
            'code_id' => $request->code_id,
            'title' => $request->title,
            'date' => $request->date,
            'hours' => $request->hours
        ]);

        if($store){
            return response()->json(['success' => true, 'msg' => __('timelog.store_success')]);
        }
    }
}
