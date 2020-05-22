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

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'  => 'admin/'],function(){
    Route::get('/dashboard','Admin\DashboardController@dashboard')->name('admin.dashboard');
});

Route::group(['prefix'  => 'admin/data_gempa'],function(){
    Route::get('/','Admin\DataGempaController@dashboard')->name('admin.data_gempa');
});

Route::group(['prefix'  => 'admin/proses_clustering'],function(){
    Route::get('/pusat_cluster','Admin\ProsesClusteringController@pusatCluster')->name('admin.proses_clustering');
    Route::post('/','Admin\ProsesClusteringController@generatePusatCluster')->name('admin.proses_clustering.generate_pusat_cluster');
    Route::get('/nilai_cluster_satu/{iterasi}','Admin\ProsesClusteringController@nilaiClusterSatu')->name('admin.proses_clustering.nilai_cluster_satu');
    Route::post('/generate_nilai_cluster_satu/{iterasi}','Admin\ProsesClusteringController@generateNilaiClusterSatu')->name('admin.proses_clustering.generate_nilai_cluster_satu');
    Route::get('/nilai_cluster_dua/{iterasi}','Admin\ProsesClusteringController@nilaiClusterDua')->name('admin.proses_clustering.nilai_cluster_dua');
    Route::post('/generate_nilai_cluster_dua/{iterasi}','Admin\ProsesClusteringController@generateNilaiClusterDua')->name('admin.proses_clustering.generate_nilai_cluster_dua');
    Route::get('/nilai_cluster_tiga/{iterasi}','Admin\ProsesClusteringController@nilaiClusterTiga')->name('admin.proses_clustering.nilai_cluster_tiga');
    Route::post('/generate_nilai_cluster_tiga/{iterasi}','Admin\ProsesClusteringController@generateNilaiClusterTiga')->name('admin.proses_clustering.generate_nilai_cluster_tiga');
    Route::get('/nilai_min/{iterasi}','Admin\ProsesClusteringController@nilaiMin')->name('admin.proses_clustering.nilai_min');
    Route::post('/generate_nilai_min/{iterasi}','Admin\ProsesClusteringController@generateNilaiMin')->name('admin.proses_clustering.generate_nilai_min');
    Route::get('/cluster/{iterasi}','Admin\ProsesClusteringController@cluster')->name('admin.proses_clustering.cluster');
    Route::post('/generate_cluster/{iterasi}','Admin\ProsesClusteringController@generateCluster')->name('admin.proses_clustering.generate_cluster');
    Route::get('/jumlah_cost/{iterasi}','Admin\ProsesClusteringController@jumlahCost')->name('admin.proses_clustering.jumlah_cost');
    Route::post('/generate_nilai_cost/{iterasi}','Admin\ProsesClusteringController@generateNilaiCost')->name('admin.proses_clustering.generate_nilai_cost');
});

Route::group(['prefix'  => 'admin/informasi'],function(){
    Route::get('/pusat_cluster','Admin\InformasiController@table')->name('admin.informasi.table');
});