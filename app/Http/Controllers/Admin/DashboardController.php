<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimeLog;

use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index(Request $request){
        $selected_year = $request->year ? $request->year : Carbon::now()->format('Y');
        $data['page_title'] = __('Dashboard');
        $data['selected_year'] = $selected_year;
        $date_1st_of_month = Carbon::today()->firstOfMonth()->toDateString();
        $date_end_of_month = Carbon::today()->endOfMonth()->toDateString();
        $date_1st_of_current_year = Carbon::today()->firstOfYear()->toDateString();
        $date_end_of_current_year = Carbon::today()->endOfYear()->toDateString();

        $date_1st_of_selected_year = Carbon::create($selected_year,1,1)->firstOfYear()->toDateString();
        $date_end_of_selected_year = Carbon::create($selected_year,1,1)->endOfYear()->toDateString();

        $data['total_hours_today'] = TimeLog::where('date',Carbon::today())->sum('hours');
        $data['total_hours_yesterday'] = TimeLog::where('date',Carbon::yesterday())->sum('hours');
        $data['total_hours_month'] = TimeLog::where('date','>=',$date_1st_of_month)->where('date','<=',$date_end_of_month)->sum('hours');
        $data['total_hours_year'] = TimeLog::where('date','>=',$date_1st_of_current_year)->where('date','<=',$date_end_of_current_year)->sum('hours');

        $data['total_hours_holidays'] = TimeLog::whereHas('project', function($q){ $q->where('code', 998); })->whereBetween('date',[$date_1st_of_selected_year,$date_end_of_selected_year])->sum('hours');
        $data['total_hours_vacation'] = TimeLog::whereHas('project', function($q){ $q->where('code', 996); })->whereBetween('date',[$date_1st_of_selected_year,$date_end_of_selected_year])->sum('hours');
        $data['total_hours_sick'] = TimeLog::whereHas('project', function($q){ $q->where('code', 997); })->whereBetween('date',[$date_1st_of_selected_year,$date_end_of_selected_year])->sum('hours');
        $data['total_hours_good'] = TimeLog::where('confirmed', 1)->whereBetween('date',[$date_1st_of_selected_year,$date_end_of_selected_year])->sum('hours');

        for($i = 1; $i <= 12; $i++){
            $current_month_1st = Carbon::create($selected_year, $i,1);
            $current_month_end = Carbon::create($selected_year, $i,1)->endOfMonth();
            $current_month_str = $current_month_1st->format('F');
            $assembly[$i]['month'] = $current_month_str;
            $assembly[$i]['total'] = TimeLog::whereBetween('date',[$current_month_1st,$current_month_end])->sum('hours');
            $assembly[$i]['assembly'] = TimeLog::whereHas('project', function($q){ $q->where('code', 1); })->whereBetween('date',[$current_month_1st,$current_month_end])->sum('hours');
            $assembly[$i]['vacation'] = TimeLog::whereHas('project', function($q){ $q->where('code', 996); })->whereBetween('date',[$current_month_1st,$current_month_end])->sum('hours');
            $assembly[$i]['ill'] = TimeLog::whereHas('project', function($q){ $q->where('code', 997); })->whereBetween('date',[$current_month_1st,$current_month_end])->sum('hours');
            $assembly[$i]['kug'] = TimeLog::whereHas('project', function($q){ $q->where('code', 302); })->whereBetween('date',[$current_month_1st,$current_month_end])->sum('hours');
        }
        $data['assembly'] = $assembly;
        $data['assembly_total'] = [
            'total' => TimeLog::whereBetween('date',[$date_1st_of_selected_year,$date_end_of_selected_year])->sum('hours'),
            'assembly' => TimeLog::whereHas('project', function($q){ $q->where('code', 1); })->whereBetween('date',[$date_1st_of_selected_year,$date_end_of_selected_year])->sum('hours'),
            'vacation' => TimeLog::whereHas('project', function($q){ $q->where('code', 996); })->whereBetween('date',[$date_1st_of_selected_year,$date_end_of_selected_year])->sum('hours'),
            'ill' => TimeLog::whereHas('project', function($q){ $q->where('code', 997); })->whereBetween('date',[$date_1st_of_selected_year,$date_end_of_selected_year])->sum('hours'),
            'kug' => TimeLog::whereHas('project', function($q){ $q->where('code', 302); })->whereBetween('date',[$date_1st_of_selected_year,$date_end_of_selected_year])->sum('hours')
        ];
        
        //return response()->json($data); exit;
        return view('contents.admin.dashboard', $data);
    }
}
