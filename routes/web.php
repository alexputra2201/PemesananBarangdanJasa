<?php

use App\Models\Jasa;
use App\Models\Product;
use App\Models\Project;
use App\Http\Controllers\UserJasa;
use App\Http\Controllers\UserCareer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardJasaController;
use App\Http\Controllers\DashboardCareerController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardProjectController;
use App\Http\Controllers\HistoryUser;
use App\Http\Controllers\PemesananBarangController;
use App\Http\Controllers\PemesananJasaController;
use App\Http\Controllers\UserJasaKonstruksi;
use App\Models\PemesananJasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        'project' => Project::distinct()->get(['nama_project']),
        'products' => Product::all(),
        'jasas' => Jasa::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/career', UserCareer::class)->except('edit','update');
Route::resource('/product', UserJasa::class);
Route::resource('/pemesananjasakonstruksi', UserJasaKonstruksi::class);


//jasakonstruksi
Route::get('/dashboard/jasakonstruksi/{id}', function(Jasa $jasa, $id){
    return view('dashboard.jasa.showjasakonstruksi',[
        'jasa' => $jasa::find($id),
        'pemesananjasas' => PemesananJasa::Where('jasa_id', $id)->get(),
    ]);
})->middleware('admin');

Route::get('/dashboard/jasakonstruksi/{id}/edit', function(PemesananJasa $pemesananJasa, $id){
    return view('dashboard.jasa.jasaeditkonstruksi',[
        'pemesananjasa' => $pemesananJasa::find($id)
    ]);
})->middleware('admin');

Route::put('/dashboard/jasakonstruksi/{id}',  function (Request $request, $id)
{
    $findId = PemesananJasa::find($id);
    if($findId->total_harga == null || $findId->status == null){
        $findId->penawaran = $request->input('penawaran');
        $findId->total_harga = $request->input('total_harga');
        $findId->dp = $request->input('total_harga')/2;
        $findId->status = $request->input('status');
    }
    else{
        $findId->status = $request->input('status');
    }

    if ($request->file('penawaran')) {
        if ($request->oldImage) {
            Storage::delete($request->oldImage);
        }
        $findId->penawaran = $request->file('penawaran')->store('penawaran-images');
    }
    $findId->save(); 
    return redirect('/dashboard/jasas/')->with('success', 'Data Pemesanan has been updated!');

});

Route::get('/historyKonstruksi/{id}/edit', function(PemesananJasa $pemesananJasa, $id){
    return view('historykonstruksiedit',[
        'pemesananjasa' => $pemesananJasa::find($id)
    ]);
});

Route::put('/historyKonstruksi/{id}/', function(Request $request,$id){
    $findId = PemesananJasa::find($id);
    $findId->bukti_transaksi = $request->input('bukti_transaksi');
    if ($request->file('bukti_transaksi')) {
        if ($request->oldImage) {
            Storage::delete($request->oldImage);
        }
        $findId->bukti_transaksi = $request->file('bukti_transaksi')->store('bukti_transaksi-images');
    }
    $findId->save();
    return redirect('/history')->with('success', 'Harap Menunggu Admin Menghubungi Anda');
});

//end jasa konstruksi

Route::resource('/history', HistoryUser::class);

//resource perumahan barang
Route::resource('/pemesananbarang', PemesananBarangController::class);


Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('admin');

Route::resource('/dashboard/careers', DashboardCareerController::class)->middleware('admin');
Route::resource('/dashboard/projects', DashboardProjectController::class)->middleware('admin');
Route::resource('/dashboard/products', DashboardProductController::class)->middleware('admin');
Route::resource('/dashboard/jasas', DashboardJasaController::class)->middleware('admin');