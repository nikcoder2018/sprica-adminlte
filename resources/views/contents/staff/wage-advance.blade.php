@extends('layouts.app')

@section('css-plugins')
<link rel="stylesheet" href="/.../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="/.../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endsection
@section('css')
<style>
    .dataTables_length, .ddataTables_filter, .dataTables_iinfo, .ddataTables_paginate {
        display: none;
    }
      td {
    
        ooverflow: hidden;
      white-space: nowrap;
    

  }
    
    table {
      table-layout: fixed;
      border: 0px solid red;
    }
    tr:hover td{
    background-color:#CECEF6;
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
                        <h3 class="card-title">{{ $page_title }}</h3>
                        
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="box-body table-responsive no-padding">   
                        <form method="POST">
                            <table id="example1" class="table table-hover table-responsive-md table-striped" data-page-length='50'>
                                <thead>
                                    <tr style="background-color:#BDBDBD">
                                        <th style="text-align:left">{{ __('Date') }}</th>
                                        <th style="text-align:left">{{ __('Amount')}}</th>
                                        <th style="white-space: nowrap">{{ __('Debit on')}}</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>    
                                    </tr>
                                </tbody>
                            </table>
                        </form>
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
@endsection