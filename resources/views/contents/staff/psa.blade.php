@extends('layouts.app')

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
                        <h3 class="card-title">{{ __('Recieved')}} PSA</h3>
                        
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="box-body table-responsive no-padding">
                        <table id="example1" class="table table-hover table-responsive-md table-striped" data-page-length='50'>
                            <thead>
                                <tr style="background-color:#BDBDBD">
                                    <th style="text-align:left">{{ __('Date') }}</th>
                                    <th style="text-align:left">{{ __('PSA') }}</th>
                                </tr>
                            </thead>
                            <tbody>
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
@endsection