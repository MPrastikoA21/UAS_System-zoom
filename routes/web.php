<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthCont;
use App\Http\Controllers\MahasiswaCont;
use App\Http\Controllers\AdminCont;
use App\Http\Controllers\CrudZoomCont;

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



Route::group(['middleware'=> ['guest']],function () {
    Route::get('/login',[AuthCont::class, 'login'])->name('login');
    Route::post('/login',[AuthCont::class, 'auth'])->name('auth');
    Route::get('/register',[AuthCont::class, 'register'])->name('register');
    Route::post('/register',[AuthCont::class, 'create'])->name('create akun');
    Route::post('/forgot',[AuthCont::class, 'change'])->name('change password');
    Route::get('/forgot',[AuthCont::class, 'forgot'])->name('forgot');
});

Route::post('/logout',[AuthCont::class, 'logout'])->name('logout');

Route::group(['middleware'=> ['staff']],function () {
    // ADMIN atau STAFF
    Route::get('/',[AuthCont::class, 'Dashboard'])->name('Dashboard')->middleware('auth');
    Route::get('/list-jadwal',[AdminCont::class, 'ListJadwal'])->name('List Jadwal Adm');
    Route::get('/history-peminjaman',[AdminCont::class, 'HistoryPeminjaman'])->name('History Peminjaman Adm');
    Route::get('/data-peminjaman',[AdminCont::class, 'DataPeminjaman'])->name('Data Peminjaman Adm');
    Route::get('/approve/{id}', [AdminCont::class, 'approve']);
    Route::post('/approved', [AdminCont::class, 'approved']);
    Route::get('/deny/{id}', [AdminCont::class, 'deny']);
    Route::post('/denied', [AdminCont::class, 'denied']);
    Route::get('/detailspeminjaman/{id}', [AdminCont::class, 'detailspeminjaman']);

    //CRUD Zoom
    Route::get('/data-akun-zoom', [CrudZoomCont::class, 'show'])->name('Data Akun Zoom Adm');
    Route::get('/create', [CrudZoomCont::class, 'create']);
    Route::post('/insert', [CrudZoomCont::class, 'insert']);
    Route::get('/edit/{id}', [CrudZoomCont::class, 'edit']);
    Route::post('/update', [CrudZoomCont::class, 'update']);
    Route::get('/hapus/{id}', [CrudZoomCont::class, 'hapus']);
});

Route::group(['middleware'=> ['mahasiswa']],function () {
    //Mahasiswa
    Route::get('/mahasiswa', [MahasiswaCont::class, 'show'])->name('Dashboard Mhs');
    Route::get('/request-zoom', [MahasiswaCont::class, 'ReqZoom'])->name('Request Zoom Mhs');
    Route::get('/create-request-zoom', [MahasiswaCont::class, 'CreateReqZoom'])->name('Create Request Zoom Mhs');
    Route::post('/insert-request-zoom', [MahasiswaCont::class, 'InsertReqZoom']);
    Route::get('/jadwal-list', [MahasiswaCont::class, 'JadwalList'])->name('List Jadwal Mhs');
    Route::get('/details/{id}', [MahasiswaCont::class, 'details']);
    Route::get('/cancelrequest/{id}', [MahasiswaCont::class, 'CancelRequest']);
    Route::get('/donerequest/{id}', [MahasiswaCont::class, 'DoneRequest']);
});






