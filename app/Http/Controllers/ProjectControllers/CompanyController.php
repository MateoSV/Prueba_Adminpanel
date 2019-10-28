<?php

namespace App\Http\Controllers\ProjectControllers;

use App\Company;
use App\Http\Controllers\Controller;
use App\Vehicle;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(Company::perPage);

        return view('company/index',[
            'companies' => $companies ?? [],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        try{
            $company = new Company($request->validated());

            if ($company->save()){
                Session::flash('message', __('companies.created'));
            }
        }catch (\Exception $exception){
            Log::error(Lang::get('base.save_error').': '.$exception->getMessage());
            Session::flash('message_danger', __('base.save_error'));

        }
        return redirect('/companies');
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
    public function edit(Company $company)
    {
        return view('company/create',[
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Company $company, UpdateCompanyRequest $request)
    {
        try{
            if ($company->update($request->validated())) {
                Session::flash('message', __('companies.updated'));
            }
        }catch (\Exception $exception){
            Log::error(Lang::get('base.save_error').': '.$exception->getMessage());
            Session::flash('message_danger', __('base.save_error'));
        }

        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        try {
            $company->delete();
            Session::flash('message', __('companies.deleted'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return redirect('/companies');
    }

    /**
     * @param Vehicle $vehicle
     * @return mixed
     */
    public function logo(Company $company)
    {
        if ($company->logo) {
            return response()->file(storage_path('app/' . $company->logo));
        }

        abort(404);
    }
}
