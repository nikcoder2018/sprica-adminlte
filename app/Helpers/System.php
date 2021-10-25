<?php 

function print_day($date, $delimiter = ".", $with_date = true){
    $date=explode ("-",$date);
    $day = date("l",mktime(0,0,0,$date[1],$date[2],$date[0]));
    $day_english = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
    $day_turkish = array('Mo','Di','Mi','Do','Fr','Sa','So');
    $newday = str_replace($day_english,$day_turkish,$day);
    
    if($with_date){
        $newdate= $date[2].".".$date[1].".".$date[0];
        return $newdate." ".$newday;
    }else{
        return $newday;
    }
}

function clockalize($in){
    $h = intval($in);
    $m = round((((($in - $h) / 100.0) * 60.0) * 100), 0);
    if ($m == 60)
    {
        $h++;
        $m = 0;
    }
    $retval = sprintf("%02d:%02d", $h, $m);
    return $retval;
}