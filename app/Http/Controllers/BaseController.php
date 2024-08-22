<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\Employes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function index()
    {
        $user = User::count();
        return view('template.base', compact('user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function count()
    {
        $employesCount = Employes::count();
        $companiesCount = company::count();

        return view('dashboard', compact('employesCount', 'companiesCount'));
    }
}
