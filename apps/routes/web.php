<?php

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



// Route::get("/user", "UserController@index")->name("user.dashboard");
Route::get("/admin", "AdminController@index")->name("admin.dashboard");
Route::post("/admin/logout", "Auth\LoginController@adminLogout")->name("admin.logout");
// Route::get("/admin/aktif-kuliah", "Admin\AktifKuliahController@index");
Route::get('/aktif-kuliah/{permohonan_surat_id}', "PermohonanSuratController@viewAktifKuliah")->name("view.aktif_kuliah");
Route::post("/aktif-kuliah", "PermohonanSuratController@prosesAktifKuliah");

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/mahasiswa', "Auth\MahasiswaLoginController@showLoginForm")->name("mahasiswa.login");
Route::post('/mahasiswa', "Auth\MahasiswaLoginController@login")->name("mahasiswa.login.submit");
Route::post('/mahasiswa/logout', "Auth\MahasiswaLoginController@logout")->name("mahasiswa.logout");
Route::get("/", "AppController@index")->name("mahasiswa.dashboard");

Route::post("/verifikasi-aktif-kuliah", "Admin\VerifikasiController@aktifKuliah")->name("verifikasi.aktif-kuliah");

