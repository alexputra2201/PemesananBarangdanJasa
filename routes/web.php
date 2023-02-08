<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\DashboardCareerController;
use App\Http\Controllers\DashboardProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserCareer;
use App\Models\Project;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        'projects' => Project::all(),
        'project' => Project::distinct()->get(['nama_project'])
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/career', UserCareer::class)->except('edit','update');

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('admin');

Route::resource('/dashboard/careers', DashboardCareerController::class)->middleware('admin');
Route::resource('/dashboard/projects', DashboardProjectController::class)->middleware('admin');