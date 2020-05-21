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
    Route::get('/','Admin\ProsesClusteringController@pusatCluster')->name('admin.proses_clustering');
    Route::post('/','Admin\ProsesClusteringController@generatePusatCluster')->name('admin.proses_clustering.generate_pusat_cluster');
    Route::get('/nilai_cluster_satu','Admin\ProsesClusteringController@nilaiClusterSatu')->name('admin.proses_clustering.nilai_cluster_satu');
});