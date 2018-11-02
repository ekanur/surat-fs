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

Route::get('/aktif-kuliah/{permohonan_surat_id}/{print}', "AktifKuliahController@view")->name("cetak.aktif_kuliah");
Route::get('/aktif-kuliah/{permohonan_surat_id}/', "AktifKuliahController@view")->name("lihat.aktif_kuliah");
// Route::post("/aktif-kuliah", "PermohonanSuratController@prosesAktifKuliah")->name("simpan.aktif_kuliah");

Route::post("/keluhan", "KeluhanController@simpan");

Route::post("/permohonan-surat", "PermohonanSuratController@simpan")->name("simpan.permohonan_surat");

Route::get("/permohonan-surat/konten/{id}", "PermohonanSuratController@getKonten")->name("permohonan_surat.konten");
Route::get('/ijin-penelitian/{permohonan_surat_id}/{print}', "IjinPenelitianController@view")->name("cetak.ijin_kuliah");
Route::get('/ijin-penelitian/{permohonan_surat_id}/', "IjinPenelitianController@view")->name("lihat.ijin_kuliah");

Route::get('/ijin-observasi/{permohonan_surat_id}/{print}', "IjinObservasiController@view")->name("cetak.ijin_kuliah");
Route::get('/ijin-observasi/{permohonan_surat_id}/', "IjinObservasiController@view")->name("lihat.ijin_kuliah");

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/mahasiswa', "Auth\MahasiswaLoginController@showLoginForm")->name("mahasiswa.login");
Route::post('/mahasiswa', "Auth\MahasiswaLoginController@login")->name("mahasiswa.login.submit");
Route::post('/mahasiswa/logout', "Auth\MahasiswaLoginController@logout")->name("mahasiswa.logout");
Route::get("/", "AppController@index")->name("mahasiswa.dashboard");

Route::post("/verifikasi-aktif-kuliah", "Admin\VerifikasiController@aktifKuliah")->name("verifikasi.aktif-kuliah");

Route::post("/ijin-penelitian", "IjinPenelitianController@simpan");

Route::get("/admin/mahasiswa", "Admin\MahasiswaController@index");
Route::post("/admin/import-mahasiswa", "Admin\MahasiswaController@import");

Route::post("/pengajuan-skripsi", "PengajuanJudulSkripsi@simpan")->name("verifikasi.pengajuan-skripsi");

Route::get("/pengajuan-skripsi/{id}/{cetak}", "PengajuanJudulSkripsi@detail");
Route::get("/pengajuan-skripsi/{id}/", "PengajuanJudulSkripsi@detail");

Route::post("/ijin-ujian", "IjinUjianController@simpan")->name("verifikasi.ijin-ujian");

Route::get("/ijin-ujian/{id}/{cetak}", "IjinUjianController@detail");
Route::get("/ijin-ujian/{id}/", "IjinUjianController@detail");