<form method="POST" id="save_form"
      action="{{ url('/employees' . (($employee->id ?? false) ? "/{$employee->id}" : '')) }}"
      accept-charset="UTF-8"
      enctype="multipart/form-data">
    @csrf

    @if($employee->id ?? false)
        @method('put')
    @endif
    <div class="card-body">

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} ">
            <label for="name">*@lang('employees.name'):</label>
            <input id="name" type="text" class="form-control" name="name"
                   value="{{old('name',$employee->name ?? '')}}"
                   placeholder="@lang('employees.name')"
                   title="@lang('employees.name')">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} ">
            <label for="last_name">*@lang('employees.last_name'):</label>
            <input id="last_name" type="text" class="form-control" name="last_name"
                   value="{{old('last_name',$employee->last_name ?? '')}}"
                   placeholder="@lang('employees.last_name')"
                   title="@lang('employees.last_name')">
            @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} ">
                <label for="email">@lang('employees.email'):</label>
                <input id="email" type="text" class="form-control" name="email"
                       value="{{old('email',$employee->email ?? '')}}"
                       placeholder="@lang('employees.email')"
                       title="@lang('employees.email')">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} ">
                <label for="phone">@lang('employees.phone'):</label>
                <input id="phone" type="text" class="form-control" name="phone"
                       value="{{old('phone',$employee->phone ?? '')}}"
                       placeholder="@lang('employees.phone')"
                       title="@lang('employees.phone')">
                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }} ">
                <label for="company_id">*@lang('employees.company_id'):</label>
                <select id="company_id" name="company_id" class="form-control">
                    <option value="">---</option>
                    @foreach($companies as $company)
                        <option value="{{$company->id}}" {{($company->id == $employee->company_id) ? 'selected' : ''}}>
                            {{$company->name}}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('company_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">@lang('base.save')</button>
        </div>
    </div>
</form>
