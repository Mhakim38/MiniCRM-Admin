<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Company;

Route::get('/companies/{id}', function ($id) {
    $company = Company::with('employees')->findOrFail($id);

    return response()->json([
        'id' => $company->id,
        'name' => $company->name,
        'email' => $company->email,
        'website' => $company->website,
        'logo' => $company->logo,
        'employee_count' => $company->employees->count(),
        'employees' => $company->employees,
    ]);
});
