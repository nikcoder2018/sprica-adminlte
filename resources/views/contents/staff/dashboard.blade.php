@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container">
        <div class="row">

            <!-- left column -->
            <div class="col-sm-12">  <!--  class="col-md-12"   -->
                <div>
                    <h3>{{$page_title}}</h3>
                </div> 
                <br>
                <!-- /.card-header -->
                <!-- form start -->
                
                <div >  <!--  class="card-body"   -->
                    <div class="col-sm-12"> <!--  class="col-md-12"   -->
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-blue"><i class="fas fa-hourglass-end"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{ __('This month') }}</span>
                                        <span class="info-box-number">{{$month_total_hours}} {{ __('hours')}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-blue"><i class="fas fa-hourglass-end"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{ __('This year (working hours)') }}</span>
                                        <span class="info-box-number">{{$year_total_hours}} {{ __('hours')}} (0 {{ __('hours')}})</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-red"><i class="fas fa-first-aid"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{ __('Sick days')}} <?=Date("Y")?></span>
                                        <span class="info-box-number">{{$sick_total_hours}} {{ __('days')}} ({{ __('hours')}})
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><i class="fas fa-clock"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{ __('Good hours') }}</span>
                                        <span class="info-box-number">{{$good_total_hours}} {{ __('hours') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-yellow"><i class="fas fa-plane"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{ __('Vacation') }}</span>
                                        <span class="info-box-number">{{$vacation_left_days}} {{ __('days')}}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <?php

                                $heute = date('d.m.Y');

                                            ?>
                            
                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-yellow"><i class="fas fa-tools"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{ __('With Sprica since')}}</span>
                                        <span class="info-box-number"> {{$registered_since}} {{ __('days')}}</span>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-lg-3 col-12">
                                <div class="card">
                                    <div style="background: #BDBDBD" class="card-header text-center"><h5><b>{{ __('Overview') }}</b></h5>
                                    </div>
                                    <div>
                                        <table style="color: #424242" class="table table-sm table-striped ttable-responsive-xl table-hover">

                                            <tr style="background: #BDBDBD">
                                                <th class="text-left"><b>
                                                        Monat
                                                    </b></th>

                                                <th class="text-left">
                                                    <b>Std.</b>
                                                </th>
                                            </tr>
                                            @foreach($overview as $res)
                                            <tr>
                                                <td>{{$res['month']}}</td>
                                                <td>{{$res['hours']}}</td>
                                            </tr>
                                            @endforeach
                                        
                                            <tr>
                                                <td><b>Total</b></td>
                                                <td><b>{{$overview_total}}</b></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection