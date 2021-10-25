<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeLog;
use App\Models\User;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index(){
        $data['page_title'] = __('Dashboard');

        $my = User::with('informations')->where('id', auth()->user()->id)->first();
        $now = Carbon::now();
        $date_1st_of_month = Carbon::today()->firstOfMonth()->toDateString();
        $date_end_of_month = Carbon::today()->endOfMonth()->toDateString();
        $date_1st_of_year = Carbon::today()->firstOfYear()->toDateString();
        $date_end_of_year = Carbon::today()->endOfYear()->toDateString();

        $data['month_total_hours'] = TimeLog::where('date','>=',$date_1st_of_month)->where('date','<=',$date_end_of_month)->where('user_id', auth()->user()->id)->sum('hours');
        $data['year_total_hours'] = TimeLog::where('date','>=',$date_1st_of_year)->where('date','<=',$date_end_of_year)->where('user_id', auth()->user()->id)->sum('hours');
        $data['sick_total_hours'] = TimeLog::whereHas('project', function($q){ $q->where('code', 997); })
                                            ->where('date','>=',$date_1st_of_year)
                                            ->where('date','<=',$date_end_of_year)
                                            ->where('user_id', auth()->user()->id)
                                            ->sum('hours');
                                            
        $data['good_total_hours'] = TimeLog::where('confirmed', 1)->where('user_id',auth()->user()->id)->sum('hours');
        
        $total_vacation_used = TimeLog::whereHas('project', function($q){ $q->where('code', 996); })->where('user_id',auth()->user()->id)->count();
        $total_vacation_allowed = $my->informations->vacation_entitlement;
        $data['vacation_left_days'] = $total_vacation_allowed-$total_vacation_used;
        $data['registered_since'] = $now->diffInDays($my->created_at);

        for($i = 1; $i <= 12; $i++){
            $current_month_1st = Carbon::create(Carbon::now()->year, $i,1);
            $current_month_end = Carbon::create(Carbon::now()->year, $i,1)->endOfMonth();
            $current_month_str = $current_month_1st->format('F');
            $overview[$i]['month'] = $current_month_str;
            $overview[$i]['hours'] = TimeLog::whereBetween('date',[$current_month_1st,$current_month_end])->where('user_id',auth()->user()->id)->sum('hours');
        }
        $data['overview'] = $overview;
        $data['overview_total'] = TimeLog::whereBetween('date',[$date_1st_of_year,$date_end_of_year])->where('user_id',auth()->user()->id)->sum('hours');
        
        //return response()->json($data); exit;
        return view('contents.staff.dashboard', $data);
    }
}
