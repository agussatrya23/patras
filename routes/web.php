<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains thakademie "web" middleware group. Now create something great!
|
*/

Route::get('/',[App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('tentang-kami',[App\Http\Controllers\WelcomeController::class, 'about'])->name('tentang');
Route::get('layanan/{slug}',[App\Http\Controllers\WelcomeController::class, 'services'])->name('layanan');
Route::prefix('portofolio')->group(function () {
    Route::get('',[App\Http\Controllers\PortfolioController::class, 'index'])->name('portofolio');
    Route::get('/{slug}',[App\Http\Controllers\PortfolioController::class, 'detail'])->name('portfolio.detail');

});

Auth::routes();

Route::post('reset-password',[App\Http\Controllers\ResetPasswordController::class, 'sendemail'])->name('ResetPassword');
Route::post('store-password',[App\Http\Controllers\ResetPasswordController::class, 'storepassword'])->name('storePassword');
Route::get('reset',[App\Http\Controllers\ResetPasswordController::class, 'reset'])->name('reset');
Route::get('new-password/{token}',[App\Http\Controllers\ResetPasswordController::class, 'newpassword'])->name('NewPassword');
Route::post('ubahpassword',[App\Http\Controllers\MDUserController::class, 'ubahpassword'])->name('user.ubahpassword');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('sessiontema/{id}', [App\Http\Controllers\HomeController::class, 'sessiontema'])->name('sessiontema');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('s2')->group(function () {
    Route::get('layanan',[App\Http\Controllers\Select2Controller::class, 'layanan'])->name('s2.layanan');
    Route::get('klien',[App\Http\Controllers\Select2Controller::class, 'klien'])->name('s2.klien');
    Route::get('pegawai',[App\Http\Controllers\Select2Controller::class, 'pegawai'])->name('s2.pegawai');
});

Route::prefix('admin')->group(function () {
    Route::prefix('masterdata')->group(function () {
        Route::prefix('klien')->group(function () {
            Route::get('',[App\Http\Controllers\AdminKlienController::class, 'index'])->name('md.klien');
            Route::get('dt',[App\Http\Controllers\AdminKlienController::class, 'dt'])->name('md.klien.dt');
            Route::post('store',[App\Http\Controllers\AdminKlienController::class, 'store'])->name('md.klien.store');
            Route::post('update',[App\Http\Controllers\AdminKlienController::class, 'update'])->name('md.klien.update');
            Route::post('delete',[App\Http\Controllers\AdminKlienController::class, 'delete'])->name('md.klien.delete');
        });
        Route::prefix('layanan')->group(function () {
            Route::get('',[App\Http\Controllers\AdminLayananController::class, 'index'])->name('md.layanan');
            Route::get('dt',[App\Http\Controllers\AdminLayananController::class, 'dt'])->name('md.layanan.dt');
            Route::get('create',[App\Http\Controllers\AdminLayananController::class, 'create'])->name('md.layanan.create');
            Route::post('store',[App\Http\Controllers\AdminLayananController::class, 'store'])->name('md.layanan.store');
            Route::get('edit/{id}',[App\Http\Controllers\AdminLayananController::class, 'edit'])->name('md.layanan.edit');
            Route::post('update',[App\Http\Controllers\AdminLayananController::class, 'update'])->name('md.layanan.update');
        });
        Route::prefix('pegawai')->group(function () {
            Route::get('',[App\Http\Controllers\AdminPegawaiController::class, 'index'])->name('md.pegawai');
            Route::get('dt',[App\Http\Controllers\AdminPegawaiController::class, 'dt'])->name('md.pegawai.dt');
            Route::get('create',[App\Http\Controllers\AdminPegawaiController::class, 'create'])->name('md.pegawai.create');
            Route::post('store',[App\Http\Controllers\AdminPegawaiController::class, 'store'])->name('md.pegawai.store');
            Route::get('edit/{id}',[App\Http\Controllers\AdminPegawaiController::class, 'edit'])->name('md.pegawai.edit');
            Route::post('update',[App\Http\Controllers\AdminPegawaiController::class, 'update'])->name('md.pegawai.update');
        });
    });

    Route::prefix('portofolio')->group(function () {
        Route::get('',[App\Http\Controllers\AdminPortfolioController::class, 'index'])->name('admin.portofolio');
        Route::get('dt',[App\Http\Controllers\AdminPortfolioController::class, 'dt'])->name('admin.portofolio.dt');
        Route::get('create',[App\Http\Controllers\AdminPortfolioController::class, 'create'])->name('admin.portofolio.create');
        Route::post('store',[App\Http\Controllers\AdminPortfolioController::class, 'store'])->name('admin.portofolio.store');
        Route::get('detail/{id}',[App\Http\Controllers\AdminPortfolioController::class, 'detail'])->name('admin.portofolio.detail');
        Route::get('edit/{id}',[App\Http\Controllers\AdminPortfolioController::class, 'edit'])->name('admin.portofolio.edit');
        Route::post('update',[App\Http\Controllers\AdminPortfolioController::class, 'update'])->name('admin.portofolio.update');
        Route::post('delete',[App\Http\Controllers\AdminPortfolioController::class, 'delete'])->name('admin.portofolio.delete');
        Route::post('storegaleri',[App\Http\Controllers\AdminPortfolioController::class, 'storegaleri'])->name('admin.portofolio.storegaleri');
        Route::post('deletegaleri',[App\Http\Controllers\AdminPortfolioController::class, 'deletegaleri'])->name('admin.portofolio.deletegaleri');
        Route::get('getgaleri/{id}',[App\Http\Controllers\AdminPortfolioController::class, 'get'])->name('admin.portofolio.getgaleri');
        Route::post('updatecaption',[App\Http\Controllers\AdminPortfolioController::class, 'updatecaption'])->name('admin.portofolio.updatecaption');
    });

    Route::prefix('project')->group(function () {
        Route::get('',[App\Http\Controllers\AdminProjectController::class, 'index'])->name('admin.project');
        Route::get('dt/{idlayanan}',[App\Http\Controllers\AdminProjectController::class, 'dt'])->name('admin.project.dt');
        Route::get('create',[App\Http\Controllers\AdminProjectController::class, 'create'])->name('admin.project.create');
        Route::post('store',[App\Http\Controllers\AdminProjectController::class, 'store'])->name('admin.project.store');
        Route::get('detail/{id}',[App\Http\Controllers\AdminProjectController::class, 'detail'])->name('admin.project.detail');
        Route::get('edit/{id}',[App\Http\Controllers\AdminProjectController::class, 'edit'])->name('admin.project.edit');
        Route::post('update',[App\Http\Controllers\AdminProjectController::class, 'update'])->name('admin.project.update');
        
        Route::prefix('pengeluaran')->group(function () {
            Route::get('dt/{idproject}',[App\Http\Controllers\AdminProjectController::class, 'dtpengeluaran'])->name('admin.project.pengeluaran.dt');
            Route::post('store',[App\Http\Controllers\AdminProjectController::class, 'storepengeluaran'])->name('admin.project.pengeluaran.store');
            Route::post('update',[App\Http\Controllers\AdminProjectController::class, 'updatepengeluaran'])->name('admin.project.pengeluaran.update');
        });  
        
        Route::prefix('pembayaran')->group(function () {
            Route::get('dt/{idproject}',[App\Http\Controllers\AdminProjectController::class, 'dtpembayaran'])->name('admin.project.pembayaran.dt');
            Route::post('store',[App\Http\Controllers\AdminProjectController::class, 'storepembayaran'])->name('admin.project.pembayaran.store');
            
        });
    });
});

