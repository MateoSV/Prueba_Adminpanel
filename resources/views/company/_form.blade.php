<form method="POST" id="save_form"
      action="{{ url('/companies' . (($company->id ?? false) ? "/{$company->id}" : '')) }}"
      accept-charset="UTF-8"
      enctype="multipart/form-data">
    @csrf

    @if($company->id ?? false)
        @method('put')
    @endif
    <div class="card-body">

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} ">
            <label for="name">*@lang('companies.name'):</label>
            <input id="name" type="text" class="form-control" name="name"
                   value="{{old('name',$company->name ?? '')}}"
                   placeholder="@lang('companies.name')"
                   title="@lang('companies.name')">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} ">
                <label for="email">@lang('companies.email'):</label>
                <input id="email" type="text" class="form-control" name="email"
                       value="{{old('email',$company->email ?? '')}}"
                       placeholder="@lang('companies.email')"
                       title="@lang('companies.email')">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">@lang('companies.logo')</label>
            <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }} ">
                <div class="custom-file">
                    <input id="logo" type="file" name="logo" value="{{old('logo')}}">
                </div>
                @if ($errors->has('logo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('logo') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }} ">
                <label for="website">@lang('companies.website'):</label>
                <input id="website" type="text" class="form-control" name="website"
                       value="{{old('website',$company->website ?? '')}}"
                       placeholder="@lang('companies.website')"
                       title="@lang('companies.website')">
                @if ($errors->has('website'))
                    <span class="help-block">
                        <strong>{{ $errors->first('website') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">@lang('base.save')</button>
    </div>
</form>
