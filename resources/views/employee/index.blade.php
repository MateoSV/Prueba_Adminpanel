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
                            <h1 class="m-0 text-dark">@lang('employees.employees')</h1></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12 col-md-offset-0">
                            <div class="panel_users panel-default">

                                @if(Session::has('message'))
                                    <p class="alert alert-success">{{ Session::get('message') }} </p>
                                @endif

                                <div class="panel-body">
                                    <div class="actions_buttons">
                                        <a href="{{ url('employees/create') }}" class="btn btn-primary new__btn btn-last">
                                            {{--<i class="fa fa-lg fa-fw fa-plus icon_color"></i>--}}@lang('employees.create_employee')
                                        </a>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered table-hover table-condensed">
                                            <thead>
                                            <tr>
                                                <th class="text-center">@lang('employees.name')</th>
                                                <th class="text-center">@lang('employees.last_name')</th>
                                                <th class="text-center">@lang('employees.email')</th>
                                                <th class="text-center">@lang('employees.phone')</th>
                                                <th class="text-center">@lang('employees.company_id')</th>
                                                <th class="text-center">@lang('base.actions')</th>
                                            </tr>
                                            </thead>
                                            @forelse($employees as $employee)
                                                <tr>
                                                    <td>
                                                        {{$employee->name}}
                                                    </td>
                                                    <td>
                                                        {{$employee->last_name}}
                                                    </td>
                                                    <td>
                                                        {{$employee->email}}
                                                    </td>
                                                    <td>
                                                        {{$employee->phone}}
                                                    </td>
                                                    <td>
                                                        {{$employee->company->name}}
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('employees/' . $employee->id .'/edit') }}" class="btn btn-warning new__btn btn-last">
                                                            {{--<i class="fa fa-lg fa-fw fa-plus icon_color"></i>--}}@lang('employees.edit')
                                                        </a>
                                                        <form class="form-horizontal" role="form" method="POST"
                                                              action="{{url('employees/' . $employee->id)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-xs btn-delete"
                                                                    title="Eliminar">
                                                                {{--<i class="fa fa-fw fa-remove delete"></i>--}}@lang('employees.delete')</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">
                                                        <em>@lang('employees.not_employees')</em>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </table>
                                    </div>
                                    {{$employees->links()}}
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

