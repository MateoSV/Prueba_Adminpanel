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
                            <h1 class="m-0 text-dark">@lang('companies.companies')</h1>
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
                                        <a href="{{ url('companies/create') }}" class="btn btn-primary new__btn btn-last">
                                            {{--<i class="fa fa-lg fa-fw fa-plus icon_color"></i>--}}@lang('companies.create_company')
                                        </a>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered table-hover table-condensed">
                                            <thead>
                                            <tr>
                                                <th class="text-center">@lang('companies.logo')</th>
                                                <th class="text-center">@lang('companies.name')</th>
                                                <th class="text-center">@lang('companies.email')</th>
                                                <th class="text-center">@lang('companies.website')</th>
                                                <th class="text-center">@lang('base.actions')</th>
                                            </tr>
                                            </thead>
                                            @forelse($companies as $company)
                                                <tr>
                                                    <td style="text-align: center">
                                                        @if($company->logo)
                                                            <img src="{{ url('/companies/'.$company->id.'/logo') }}" alt=""
                                                                 width="80" height="80" class="img-circle">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{$company->name}}
                                                    </td>
                                                    <td>
                                                        {{$company->email}}
                                                    </td>
                                                    <td>
                                                        <a href="" target="_blank">
                                                            {{$company->website}}
                                                        </a>

                                                    </td>
                                                    <td>
                                                        <a href="{{ url('companies/' . $company->id .'/edit') }}" class="btn btn-warning new__btn btn-last">
                                                            {{--<i class="fa fa-lg fa-fw fa-plus icon_color"></i>--}}@lang('companies.edit')
                                                        </a>
                                                        <form class="form-horizontal" role="form" method="POST"
                                                              action="{{url('companies/' . $company->id)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-xs btn-delete"
                                                                    title="Eliminar">
                                                                {{--<i class="fa fa-fw fa-remove delete"></i>--}}@lang('companies.delete')</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">
                                                        <em>@lang('companies.not_companies')</em>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </table>
                                    </div>
                                    {{$companies->links()}}
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

