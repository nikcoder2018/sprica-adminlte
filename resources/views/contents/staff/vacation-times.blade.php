@extends('layouts.app')

@section('content')
<section class="content">                
    <div class="container">      
        <div class="row">  
            <!-- left column -->
            <div class="col-sm-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{$page_title}}</h3>
                        <div style="color:white;height:3px" class="text-right">
                            <button data-toggle="modal" class="btn btn-sm btn-light" data-target="#modal-lg">
                                <i style="color:#5858FA" class="nav-icon fas fa-plane-departure"></i>
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
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
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

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog">
        <form method="POST" action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Add to') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="inputBasicFirstName">{{ __('Choose project')}}</label>
                            <select class="form-control" name="project_id">
                                @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{$project->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input style="visibility:hidden" required type="text" class="form-control vRequired" id="inputBasicFirstName" name="ProjeBASLIK" placeholder="Stadt" value="Urlaub">
                
                        <div class="form-group col-6 col-sm-6">
                            <label class="form-control-label" for="inputBasicFirstName">{{ __('Date') }} </label>
                            <input required type="date" min='{{$form_vars->yesterday}}' max='{{$form_vars->tomorrow}}' value='{{$form_vars->today}}' class="form-control" id="inputBasicFirstName" name="date" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <!--  <a href="" type="button" class="btn btn-default">Close</a> -->
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save on computer') }}</button>
                </div> </div>
        </form>
            </div>
    <!-- /.modal-content -->
</div>
@endsection