@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-inline-block">
                <h3 class="card-title"> <i class="fa fa-user"></i> {{ $page_title }}</h3>
            </div>
            <div class="d-inline-block float-right">
                <a data-toggle="modal" data-target="#modal-lg" href="javascript:void(0)" class="btn btn-md btn-outline-primary"> <i class="nav-icon fas fa-pen-square"></i></a>
            </div> 
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="card">
        <div class="card-body table-responsive-md">
            <div class="row">
                <div class="col col-12">
                    <div class="collapse multi-collapse in show" id="multiCollapseExample1">
                        <table id="example1" class="table table-md table-hover ttable-bordered table-responsive-md table-striped" data-order='[[0, "asc"]]' data-page-length='100'>
                            <thead>
                                <tr style="background-color: #D3D3D3">
                                    <th>{{ __('Fullname')}}</th>
                                    <th>{{ __('Staff Num')}}</th>
                                    <th>{{ __('Vacation Entitlement')}}</th>
                                    <th>{{ __('Username')}}</th>       
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staffs as $staff)
                                    <tr>
                                        <td><a style="color:black" href="{{route('admin.staffs.show', $staff->id)}}" role="menuitem">{{$staff->informations->fullname}}</a></td>
                                        <td>{{$staff->informations->number}}</td>
                                        <td>{{$staff->informations->vacation_entitlement}}</td>
                                        <td> {{$staff->name}} <a class="float-right"><span class="badge badge-success @if($staff->informations->active) selected @endif">{{__('Active')}}</span></a></td>
                                    </tr>
                                @endforeach		
                            </tbody>       
                        </table>
                    </div>
                </div>																
            </div>
        </div>
    </div>
</div>
@endsection