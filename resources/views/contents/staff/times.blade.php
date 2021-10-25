@extends('layouts.app')
@section('css-plugins')
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('css')
<style>
    .dataTables_length, .ddataTables_filter, .dataTables_iinfo, .ddataTables_paginate {
        display: none;
    }
    td {
        overflow: hidden;
        white-space: nowrap;
    }
    
    table {
        table-layout: fixed;
        border: 0px solid red;
    }
    tr:hover td{
        background-color:#CECEF6;
    }
    tr.has-border{
        border-bottom: 1.5pt solid grey
    }
</style>
@endsection
@section('content')
<section class="content">               
    <div class="container">      
        <div class="row">               
            <!-- left column -->
            <div class="col-sm-12"> 
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="nav-icon fas fa-clock"></i>{{$page_title}}</h3>
                        <div style="color:white;height:3px" class="text-right">
                            <button data-toggle="modal" class="btn btn-sm btn-light" data-target="#store-modal">
                                <i style="color:#5858FA" class="nav-icon fas fa-play-circle"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="box-body table-responsive no-padding"> 
                        <table id="example1" class="table table-hover table-responsive-md table-striped" data-page-length='50'>
                            <thead>
                                <tr style="background-color:#BDBDBD">
                                    <th style="width:29%">{{ __('Date') }}</th>
                                    <th style="width:19%">{{ __('Std.') }}</th>
                                    <th class="text-center" colspan="1">{{ __('Projector') }}</th>
                                    <th style="width:20%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($timelogs) > 0)
                                    @foreach($timelogs as $timelog)
                                    <tr @if(print_day($timelog->date, null, false) == 'Mo') class="has-border" @endif>
                                        <td>{{print_day($timelog->date)}}</td>
                                        <td>{{$timelog->hours}}</td>
                                        <td>{{$timelog->project->title}}</td>
                                        <td>
                                            @if($timelog->confirmed)
                                                <i style="color:green; width: 3px;text-align:center" class="nav-icon fas fa-check"></i>
                                            @else 
                                                <a style="background-color: transparent" class="silbtn" href="javascript:void(0);" data-target="#examplePositionCenter" data-toggle="modal" role="menuitem"><i style="color:red; width: 3px;text-align:center" class="nav-icon fas fa-trash"></i>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->

            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<div class="modal fade" id="store-modal" tabindex="-1" aria-labelledby="storeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{route('timelogs.store')}}" class="form-add">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Add to')}}</h4>
                    <button type="button" class="btn btn-lg btn-link" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-envelope"></i>
                    </button>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="inputBasicFirstName">{{ __('Choose project') }}</label>
                            <select class="form-control" name="project_id">
                                @if(count($projects) > 0)
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                     
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="inputBasicFirstName">{{ __('Projector') }}</label>
                            <input required type="text" class="form-control" id="inputBasicFirstName" name="title" placeholder="Stadt" value="">
                        </div>
                        
                        <div class="form-group col-6 col-sm-6">
                            <label class="form-control-label" for="inputBasicFirstName">{{ __('Date')}} (> {{$form_vars->yesterday_label}}) </label>
                            <input required type="date" min='{{$form_vars->yesterday}}' max='{{$form_vars->tomorrow}}' value='{{$form_vars->today}}' class="form-control" id="inputBasicFirstName" name="date" placeholder="">
                        </div>


                        <div class="form-group col-6 col-sm-6">
                            <label class="form-control-label" for="inputBasicFirstName">{{ __('Std.')}}</label>
                            <select type="text" class="form-control vRequired" id="inputBasicFirstName" name="hours" value="" placeholder="">
                                @for($i = .5; $i <= 10; $i+=.5)
                                    <option value="{{$i}}">{{clockalize($i)}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-control-label" for="inputBasicFirstName">{{ __('Overnight stay') }}</label>
                            <select class="form-control" name="code_id">
                                @if(count($mycodes) > 0)
                                    @foreach($mycodes as $mycode)
                                        <option value="{{$mycode->code->id}}">{{$mycode->code->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <!--  <a href="" type="button" class="btn btn-default">Close</a> -->
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save on computer') }}</button>
                </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
@endsection

@section('js')
<!-- bs-custom-file-input -->
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    $('.form-add').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: () =>{
                $(this).find('button[type=submit]').prop('disabled', true);
            },
            success: (resp) => {
                $(this).find('button[type=submit]').prop('disabled', false);

                if(resp.success){
                    $('#store-modal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                    Toast.fire({
                        icon: 'success',
                        title: resp.msg,
                        showConfirmButton: false,
                    });

                    $('.form-add')[0].reset();
                }else{
                    $('#store-modal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                    $('.content .container').prepend(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ${resp.msg}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`);

                    setTimeout(()=>{
                        $('.content .container').find('.alert').fadeOut(300);
                    }, 3000);
                }
            }
        })
    })
</script>
@endsection