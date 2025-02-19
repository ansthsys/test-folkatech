<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10)->withQueryString();

        return view('page.company.index', [
            'companies' => $companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $payload = $request->validated();

        if ($request->hasFile('logo')) {
            $payload['logo'] = $request->file('logo')->store('public/company-logo');
            $payload['logo'] = Storage::url($payload['logo']);
        } else {
            $payload['logo'] = "https://ui-avatars.com/api/?name={$payload['name']}";
        }

        $company = Company::create($payload);

        return to_route('companies.show', [$company->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('page.company.show', [
            'company' => $company,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('page.company.edit', [
            'company' => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        if ($request->hasFile('logo')) {
            $payload = $request->validated();
            $payload['logo'] = $request->file('logo')->store('public/company-logo');
            $payload['logo'] = Storage::url($payload['logo']);

            if (Storage::exists($company->logo)) {
                Storage::delete($company->logo);
            }
        } else {
            $payload = $request->validated();
        }

        $company->update($payload);

        return to_route('companies.show', $company);

        return dd($payload, $company->isDirty("name"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if (Storage::exists($company->logo)) {
            Storage::delete($company->logo);
        }

        $company->delete();

        return to_route('companies.index');
    }
}
