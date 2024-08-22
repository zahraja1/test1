<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\chartController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\employeController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::controller(BaseController::class)->group(function () {
        Route::get('/home', 'index')->name('index.home');
       
        Route::post('/logout', function () {
            Auth::logout();
            return redirect('/');
        })->name('logout');
        
    });
    Route::controller(chartController::class)->group(function(){
        Route::get('/chart', 'index')->name('index.chart');
    });
    Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
        Route::controller(CompanyController::class)->group(function () {
            Route::get('/company', 'index')->name('index.company');
            Route::get('/form/company', 'formCreateCompany')->name('form.create.company');
            Route::post('/create/company', 'CreateCompany')->name('create.company');
            Route::get('/edit/form/company/{id}', 'editFromCompany')->name('edit.form.company');
            Route::put('/edit/company/{id}', 'editCompany')->name('edit.company');
            Route::get('/delete/company/{id}', 'deleteCompany')->name('delete.company');
            Route::get('/detail/company/{id}', 'detailCompany')->name('detail.company');
        });
        Route::controller(employeController::class)->group(function(){
            Route::get('/employe', 'index')->name('index.employe');
            Route::get('/form/employe', 'formCreateEmploye')->name('form.create.employe');
            Route::post('/create/employe', 'createEmploye')->name('create.employe');
            Route::get('/edit/form/employe/{id}', 'editFromemploye')->name('edit.form.employe');
            Route::put('/edit/employe/{id}', 'editemploye')->name('edit.employe');
            Route::get('/delete/employe/{id}', 'deleteemploye')->name('delete.employe');
            Route::get('/detail/employe/{id}', 'detailemploye')->name('detail.employe');
        });
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
