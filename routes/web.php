<?php

use App\Models\Jasa;
use App\Models\Kursi;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\PemesananJasa;
use App\Models\PemesananBarang;
use App\Http\Controllers\UserJasa;
use App\Http\Controllers\UserCareer;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HistoryUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\KursiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserJasaKonstruksi;
use App\Http\Controllers\DashboardJasaController;
use App\Http\Controllers\DashboardJasaKonstruksi;
use App\Http\Controllers\PemesananJasaController;
use App\Http\Controllers\PerumnasRimboController;
use App\Http\Controllers\PerumnasRovinaController;
use App\Http\Controllers\DashboardCareerController;
use App\Http\Controllers\PemesananBarangController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardProjectController;
use App\Http\Controllers\PemesananBarang2Controller;

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

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/career', UserCareer::class)->except('edit','update');
Route::resource('/product', UserJasa::class);
Route::resource('/pemesananjasakonstruksi', UserJasaKonstruksi::class)->only('create','store');
// Route::resource('/pemesananjasakonstruksi', UserJasaKonstruksi::class)->middleware('guest');


//jasakonstruksi user

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


//jasa konstruksi user pelunasan
Route::get('/historyKonstruksiPelunasan/{id}/edit', function(PemesananJasa $pemesananJasa, $id){
    return view('historykonstruksipelunasanedit',[
        'pemesananjasa' => $pemesananJasa::find($id)
    ]);
});

Route::put('/historyKonstruksiPelunasan/{id}/', function(Request $request,$id){
    $findId = PemesananJasa::find($id);
    $findId->bukti_transaksi_pelunasan = $request->input('bukti_transaksi_pelunasan');
    if ($request->file('bukti_transaksi_pelunasan')) {
        if ($request->oldImage) {
            Storage::delete($request->oldImage);
        }
        $findId->bukti_transaksi_pelunasan = $request->file('bukti_transaksi_pelunasan')->store('bukti_transaksi_pelunasan');
    }
    $findId->save();
    return redirect('/history')->with('success', 'Bukti Pelunasan Telah Dikirim');
});



//end jasa konstruksi
Route::resource('/history', HistoryUser::class)->except('create', 'store', 'destroy','show');


Route::get('/kursiUser', function(){
    return view('kursi',[
        'kursis' => Kursi::all(),
        'products' => Product::all(),
    ]);
});



//resource perumahan barang
Route::resource('/pemesananbarang', PemesananBarangController::class);
Route::resource('/pemesananbarang2',PemesananBarang2Controller::class);

Route::resource('/pemesananperumnasrimbo', PerumnasRimboController::class)->only('index');
Route::resource('/pemesananperumnasrovina', PerumnasRovinaController::class)->only('index');


Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'prosesdesign' => PemesananJasa::where('status', 'proses')->count(),
        'prosesperumahan' => PemesananBarang::where('status', 'proses')->count(),
        'pendingdesign' => PemesananJasa::where('status', 'pending')->count(),
        'pendingperumahan' => PemesananBarang::where('status', 'pending')->count(),
        'donedesign' => PemesananJasa::where('status', 'done')->count(),
        'doneperumahan' => PemesananBarang::where('status', 'done')->count(),
        
    ]);
})->middleware('admin');

Route::middleware(['admin'])->group(function(){
    Route::resource('/dashboard/careers', DashboardCareerController::class);
    Route::resource('/dashboard/projects', DashboardProjectController::class);
    Route::resource('/dashboard/products', DashboardProductController::class);
    Route::resource('/dashboard/jasas', DashboardJasaController::class);
    Route::resource('/dashboard/jasakonstruksi', DashboardJasaKonstruksi::class)->middleware('admin');
    Route::resource('/dashboard/kursi', KursiController::class)->middleware('admin');
});

// pdf
Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF']);
Route::get('/generate-pdf-serahterima/{id}', [PDFController::class, 'generatePDFSerahTerima']);
Route::get('/generate-bast/{id}', [PDFController::class, 'generatePDFBAST']);