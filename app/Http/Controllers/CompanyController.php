<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $company = company::all();
        return view('company.base', compact('company'));
    }

    public function formCreateCompany(Request $request)
    {
        return view('company.create');
    }

    public function CreateCompany(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        $logoPath = $request->file('logo')->store('logo', 'public');

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logoPath,
            'website' => $request->website,
        ]);

        return redirect()->route('index.company')->with('create', "Successfully Added Company Data $request->name !");
    }


    public function editFromCompany($id)
    {
        $company = company::findOrFail($id);

        return view('company.edit', compact('company'));
    }

    public function editCompany(Request $request, $id)
    {
        $company = company::findOrFail($id);
        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('public/images');
            $logoName = basename($logoPath);

            if ($company->logo) {
                Storage::delete('public/images/' . $company->logo);
            }

            $company->update([
                'logo' => $logoName,
            ]);
        } else {
            $company->name = $request->name;
            $company->email = $request->email;
            $company->website = $request->website;
        }
        $company->update();
        return redirect()->route('index.company')->with('update', 'Successfully Updated Company Data');
    }

   // CompanyController.php
   public function deleteCompany(Request $request, $id)
   {
       $company = Company::findOrFail($id);
       
       // Hapus file gambar jika ada
       if ($company->logo) {
           Storage::delete('public/' . $company->logo);
       }
       
       // Hapus data perusahaan
       $company->delete();
       
       // Kembali ke halaman sebelumnya dengan pesan sukses
       return redirect()->back()->with('delete', 'Successfully Deleted Company Data');
   }
   
    
    public function detailCompany($id)
{
    $company = Company::findOrFail($id);
    return view('company.detail', compact('company'));
}

}
