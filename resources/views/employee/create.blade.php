@extends('layouts.app')

@section('content')
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@lang('employees.create_employee')</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0">
                            <div class="panel-body">
                                <div class="actions_buttons">
                                    <a href="{{ url('/employees') }}" class="btn btn-primary new__btn btn-last">
                                        {{--<i class="fa fa-lg fa-fw fa-plus icon_color"></i>--}}@lang('employees.view_employees')
                                    </a>
                                </div>
                                <div>
                                    <div class="col-md-8 col-8 offset-2">
                                        <!-- general form elements -->
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">@lang('employees.new_employee')</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            @include('employee._form')
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </body>
@endsection
