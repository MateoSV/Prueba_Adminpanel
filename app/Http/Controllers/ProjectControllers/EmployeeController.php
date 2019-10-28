<?php

namespace App\Http\Controllers\ProjectControllers;

use App\Company;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(Employee::perPage);

        return view('employee/index',[
            'employees' => $employees ?? [],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee/create',[
            'companies' => Company::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        try{
            $employee = new Employee($request->validated());

            if ($employee->save()){
                Session::flash('message', __('employees.created'));
            }
        }catch (\Exception $exception){
            Log::error(Lang::get('base.save_error').': '.$exception->getMessage());
            Session::flash('message_danger', __('base.save_error'));
        }
        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee/create',[
            'employee' => $employee,
            'companies' => Company::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        try{
            if ($employee->update($request->validated())) {
                Session::flash('message', __('employees.updated'));
            }
        }catch (\Exception $exception){
            Log::error(Lang::get('base.save_error').': '.$exception->getMessage());
            Session::flash('message_danger', __('base.save_error'));
        }

        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            Session::flash('message', __('employees.deleted'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return redirect('/employees');
    }
}
