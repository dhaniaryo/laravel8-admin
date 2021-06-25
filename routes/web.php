<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
    return view('auth.login');
});

Auth::routes(); 
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//=================== user
Route::get('/userdashboard','HomeController@userdashboard')->name('userdashbboard');
//jasa
Route::get('/userjualjasasemua','HomeController@jualjasasemua');
//barang
Route::get('/userjualbarangsemua','HomeController@jualbarangsemua');



//============================  admin
Route::group(['middleware' => 'is_admin'], function () {

    Route::get('/admindashboard', 'AdminController@admindashboard')->name('admindashboard');

    //data pengguna
    Route::get('/lihatdatapengguna','AdminController@lihatdatapengguna')->name('lihatdatapengguna');
    Route::get('/tambahdatapengguna','AdminController@tambahdatapengguna');
    Route::post('/tambahdatapengguna/proses','AdminController@prosestambahdatapengguna');
    Route::get('/hapusdatapengguna/{id}','AdminController@hapusdatapengguna');
    Route::get('/ubahdatapengguna/{id}','AdminController@ubahdatapengguna');
    Route::post('/ubahdatapengguna/proses/{id}','AdminController@ubahdatapenggunaproses');

    //========================  data jual
    //kategori jasa
    Route::get('/datajualjasasemua','AdminController@datajualjasasemua');
    Route::get('/tambahdatajualjasa','AdminController@tambahdatajualjasa');

    //kategori barang
    Route::get('/datajualbarangsemua','AdminController@datajualbarangsemua');
    Route::get('/tambahdatajualbarang','AdminController@tambahdatajualbarang');

    //proses data jual
    Route::post('/tambahdatajual/proses','AdminController@tambahdatajualproses');
    Route::get('/ubahdatajual/{id}','AdminController@ubahdatajual');
    Route::post('/ubahdatajual/proses/{id}','AdminController@ubahdatajualproses');
    Route::get('/hapusdatajual/{id}','AdminController@hapusdatajual');

    //======================= data rekap
    Route::get('/datarekapsemua','AdminController@datarekapsemua');
    Route::get('/datarekaphari','AdminController@datarekaphari');
    Route::get('/datarekapbulan','AdminController@datarekapbulan');
    Route::get('/datarekaptahun','AdminController@datarekaptahun');

    //======================= data pengeluaran
    Route::get('/datapengeluaransemua','AdminController@datapengeluaransemua');
    Route::get('/tambahdatapengeluaran','AdminController@tambahdatapengeluaran');
    Route::post('/tambahdatapengeluaran/proses','AdminController@tambahdatapengeluaranproses');
    Route::get('/ubahdatapengeluaran/{id}','AdminController@ubahdatapengeluaran');
    Route::post('/ubahdatapengeluaran/proses/{id}','AdminController@ubahdatapengeluaranproses');
    Route::get('/hapusdatapengeluaran/{id}','AdminController@hapusdatapengeluaran');
});