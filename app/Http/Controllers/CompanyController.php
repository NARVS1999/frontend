<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\CompaniesRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $companies = Company::orderBy('updated_at', 'desc')->paginate(5);

        return view('companies.index', [
            'companies' => $companies,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompaniesRequest $request): RedirectResponse
    {
        if ($request->validated()) {
            $company = new Company;
            $company->name = $request['name'];
            $company->email = $request['email'];
            $company->website = $request['website'];
    
            if ($request->hasFile('logo')) {
                $uploadedFile = $request->file('logo');
                $path = $uploadedFile->store('public');
    
                $company->logo = str_replace('public/', '', $path);
                $company->save();
            }
    
            $company->save();
        }

        return redirect(route('companies.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', [
            'company' => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompaniesRequest $request, Company $company): RedirectResponse
    {
        if ($request->validated()) {
            $company->update([
                'name' => $request->input('name'),
                'website' => $request->input('website'),
                'email' => $request->input('email'),
            ]);

            if ($request->hasFile('logo')) {
                $imagePath = $request->file('logo')->store('company_logos', 'public');

                $company->update(['logo' => $imagePath]);
            }
        }

        return redirect(route('companies.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();

        return redirect(route('companies.index'));
    }
}