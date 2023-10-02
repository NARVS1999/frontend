<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\CreateEmployeesRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $employees = Employee::orderBy('updated_at', 'desc')->paginate(5);

        return view('employees.index', [
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmployeesRequest $request): RedirectResponse
    {
        if ($request->validated()) {
            $employee = new Employee;
            $employee->first_name = $request->input('first_name');
            $employee->last_name = $request->input('last_name');
            $employee->company_id = $request->input('company_id');
            $employee->email = $request->input('email');
            $employee->phone = $request->input('phone');
    
            $employee->save();
        }

        return redirect(route('employees.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateEmployeesRequest $request, Employee $employee): RedirectResponse
    {
        if ($request->validated()) {
            $employee->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'company_id' => $request->input('company_id'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
            ]);
        }

        return redirect(route('employees.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();

        return redirect(route('employees.index'));
    }
}
