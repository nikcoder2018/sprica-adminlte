@extends('layouts.app')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
					    <h4>{{$page_title}} 
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-md dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$selected_year}}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{route('dashboard', ['year' => 2019])}}"> 2019</a>
                                        <a class="dropdown-item" href="{{route('dashboard', ['year' => 2020])}}"> 2020</a>
                                        <a class="dropdown-item" href="{{route('dashboard', ['year' => 2021])}}"> 2021</a>
                                    </div>
                                </div>
                            </div>
                        </h4>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row" style="margin-left:0px; margin-right: 0px;">
                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-blue"><i class="fas fa-hourglass-end"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{ __('Today')}}</span>
                                        <span class="info-box-number">{{$total_hours_today}} {{__('hours')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-blue"><i class="fas fa-hourglass-end"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{__('Yesterday')}}</span>
                                        <span class="info-box-number">{{$total_hours_yesterday}} {{__('h')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-blue"><i class="fas fa-hourglass-end"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{__('This month')}}</span>
                                        <span class="info-box-number">{{$total_hours_month}} {{__('h')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-blue"><i class="fas fa-hourglass-end"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{__('This year')}}</span>
                                        <span class="info-box-number">{{$total_hours_year}} {{__('h')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><i class="fas fa-umbrella-beach"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{__('Holidays')}} {{$selected_year}}</span>
                                        <span class="info-box-number"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-yellow"><i class="fas fa-plane"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{__('Vacation')}} {{$selected_year}}</span>
                                        <span class="info-box-number"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-red"><i class="fas fa-first-aid"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{__('Sick days')}} {{$selected_year}}</span>
                                        <span class="info-box-number"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-red"><i class="fas fa-first-aid"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{__('Sick pay')}} {{$selected_year}}</span>
                                        <span class="info-box-number"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><i class="fas fa-clock"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{__('Good hours')}}</span>
                                        <span class="info-box-number">{{$total_hours_good}} {{__('h')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-yellow"><i class="fas fa-plane"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{__('Vacation')}}</span>
                                        <span class="info-box-number"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card bg-light mb-3">
                                    <div class="card-header bg-info text-center"><b>{{__('Assembly')}}</b></div>
                                    <div class=" table-responsive-md">
                                        <table style="color: #424242" class="table table-sm table-striped table-hover tablehover">
                                            <tr style="background: #BDBDBD">
                                                <th><b>{{__('Month')}}</b></th>
                                                <th><b>{{__('Total')}}</b></th>
                                                <th><b>{{__('Assembly')}}</b></th>
                                                <th><b>{{__('Vacation')}}</b></th>
                                                <th><b>{{__('Ill')}}</b></th>
                                                <th><b>{{__('KUG')}}</b></th>
                                            </tr>
                                            @foreach($assembly as $row)
                                            <tr>
                                                <td>{{$row['month']}}</td>
                                                <td>{{$row['total']}}</td>
                                                <td>{{$row['assembly']}}</td>
                                                <td>{{$row['vacation']}}</td>
                                                <td>{{$row['ill']}}</td>
                                                <td>{{$row['kug']}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td><b>{{__('Total')}}</b></td>
                                                <td><b>{{$assembly_total['total']}}</b></td>
                                                <td><b>{{$assembly_total['assembly']}}</b></td>
                                                <td><b>{{$assembly_total['vacation']}}</b></td>
                                                <td><b>{{$assembly_total['ill']}}</b></td>
                                                <td><b>{{$assembly_total['kug']}}</b></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">		
                                <div class="card card-info text-center">
                                    <div class="card-header">
                                        <h3 class="card-title">Zeiten</h3>
                                        <div class="card-tools"></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                        <canvas id="barChart" style="min-height: 450px; height: 450px; max-height: 450px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Area Chart</h3>
                                        <div class="card-tools"></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="areaChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                <!-- /.card-body -->
                                </div>
                            </div>
                
                            <!-- STACKED BAR CHART -->
                            <div class="col-lg-12 col-12">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Stacked Bar Chart</h3>

                                        <div class="card-tools">
                                        
                                        
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                        <canvas id="stackedBarChart" style="min-height: 450px; height: 450px; max-height: 450px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div> 
                    </div>  <!-- erster Tab ender hier -->
                </div>    <!-- Hier enden alle Tabs -->
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection