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

Route::get('/aktif-kuliah/{permohonan_surat_id}/{print}', "SuratController@view")->name("cetak.aktif_kuliah");
Route::get('/aktif-kuliah/{permohonan_surat_id}/', "SuratController@view")->name("lihat.aktif_kuliah");
// Route::post("/aktif-kuliah", "PermohonanSuratController@prosesAktifKuliah")->name("simpan.aktif_kuliah");

Route::post("/keluhan", "KeluhanController@simpan");

Route::post("/permohonan-surat", "PermohonanSuratController@simpan")->name("simpan.permohonan_surat");

Route::get("/permohonan-surat/konten/{id}", "SuratController@getKonten")->name("permohonan_surat.konten");
Route::get('/ijin-penelitian/{permohonan_surat_id}/{print}', "SuratController@view")->name("cetak.ijin_kuliah");
Route::get('/ijin-penelitian/{permohonan_surat_id}/', "SuratController@view")->name("lihat.ijin_kuliah");

Route::get('/ijin-observasi/{permohonan_surat_id}/{print}', "SuratController@view")->name("cetak.ijin_kuliah");
Route::get('/ijin-observasi/{permohonan_surat_id}/', "SuratController@view")->name("lihat.ijin_kuliah");

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/mahasiswa', "Auth\MahasiswaLoginController@showLoginForm")->name("mahasiswa.login");
Route::post('/mahasiswa', "Auth\MahasiswaLoginController@login")->name("mahasiswa.login.submit");
Route::post('/mahasiswa/logout', "Auth\MahasiswaLoginController@logout")->name("mahasiswa.logout");
Route::get("/", "AppController@index")->name("mahasiswa.dashboard");

Route::post("/verifikasi", "Controller@updateStatusSurat")->name("verifikasi");

// Route::post("/ijin-penelitian", "IjinPenelitianController@simpan");

Route::post("/pengajuan-skripsi", "PengajuanJudulSkripsi@simpan")->name("verifikasi.pengajuan-skripsi");

Route::get("/pengajuan-skripsi/{id}/{cetak}", "SuratController@view");
Route::get("/pengajuan-skripsi/{id}/", "SuratController@view");

Route::post("/ijin-ujian", "IjinUjianController@simpan")->name("verifikasi.ijin-ujian");

Route::get("/ijin-ujian/{id}/{cetak}", "SuratController@view");
Route::get("/ijin-ujian/{id}/", "SuratController@view");

Route::group(['prefix' => 'admin'], function() {
	Route::get("mahasiswa", "Admin\MahasiswaController@index");
	Route::post("import-mahasiswa", "Admin\MahasiswaController@import");
	Route::get("log-mahasiswa/{id}", "Admin\MahasiswaController@log");
    Route::post('reset-mahasiswa', "Admin\MahasiswaController@resetPassword");
    Route::post('hapus-mahasiswa', "Admin\MahasiswaController@hapus");

    Route::get('dosen', "Admin\DosenController@index");
    Route::post('import-dosen', "Admin\DosenController@import");
    
    Route::get("pejabat", "Admin\PejabatController@index");
    Route::get("detail-pejabat/{id}", "Admin\PejabatController@detail");
    Route::post("pejabat", "Admin\PejabatController@update");

    Route::get('skripsi',"Admin\SkripsiController@index");
    Route::get('skripsi/{id}',"Admin\SkripsiController@detail");
    Route::get('aspirasi',"Admin\AspirasiController@index");
    Route::get('aspirasi/{id}',"Admin\AspirasiController@detail");

    Route::get('surat-masuk', "AdminController@suratMasuk");
    Route::get('layanan', "Admin\LayananSuratController@index");
});

Route::post("reset-password", "Admin\PejabatController@resetPassword");
Route::post("mahasiswa/reset-password", "Admin\MahasiswaController@resetPassword");
Route::post("ganti-password", "AppController@gantiPassword");