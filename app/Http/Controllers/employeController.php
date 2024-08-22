<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\Employes;
use Illuminate\Http\Request;

class employeController extends Controller
{
    public function index()
    {
        $employes = Employes::all();
        return view('employe.base', compact('employes'));
    }

    public function formCreateEmploye()
    {
        $company = Company::all();
        return view('employe.create', compact('company'));
    }

    public function createEmploye(Request $request)
    {

        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable|string|max:15',
        ]);

        $employes = Employes::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'company_id' => $request->input('company_id'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);
        return redirect()->route('index.employe')->with('success', 'Employee created successfully');
    }

    public function editFromEmploye($id)
    {
        $employe = Employes::findOrFail($id);
        $companies = Company::all();
        return view('employe.edit', compact('employe', 'companies')); 
    }


    public function editEmploye(Request $request, $id)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email|unique:employees,email,' . $id,
            'phone' => 'nullable|string|max:15',
        ]);

        $employe = Employes::findOrFail($id);

        $employe->update([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'company_id' => $request->input('company_id'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('index.employe')->with('success', 'Employee updated successfully');
    }
    public function deleteEmploye(Request $request, $id)
    {
        $employe = Employes::findOrFail($id);
        $employe->delete();
        return redirect()->back()->with('delete', 'Successfully Deleted Company Data');
    }

    public function detailEmploye($id)
    {
        $employe = Employes::findOrFail($id);
        return view('employe.detail', compact('employe'));
    }
}
