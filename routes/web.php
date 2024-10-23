<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CasierController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//login controller
Route::get('/', [LoginController::class, 'login']);
Route::post('/client/access',[LoginController::class,'access']);
Route::get('/client/logout',[LoginController::class,'logout']);
Route::post('/casier/loginaccess',[LoginController::class,'loginaccess']);
Route::get('/casier/logoutc',[LoginController::class,'logoutc']);



//admin controller
Route::get('admin/home', [AdminController::class, 'home']);
Route::get('admin/account', [AdminController::class, 'account']);
Route::get('admin/addaccount', [AdminController::class, 'addaccount']);
Route::get('admin/feedback', [AdminController::class, 'feedback']);
Route::get('admin/clientdetail/{id}', [AdminController::class, 'clientdetail']);
Route::get('admin/sendnotice/{id}', [AdminController::class, 'sendnotice']);
Route::post('admin/addcaisier', [AdminController::class, 'addcaisier']);
Route::post('admin/updatecasier', [AdminController::class, 'updatecasier']);
Route::get('admin/deletecasier/{id}', [AdminController::class, 'deletecasier']);
Route::post('admin/saveaccount', [AdminController::class, 'saveaccount']);
Route::get('admin/deleteclient/{id}',[AdminController::class,'deleteclient']);
Route::post('admin/notice',[AdminController::class,'notice']);
Route::get('admin/deletefeed/{id}',[AdminController::class,'deletefeed']);

//client controller

Route::get('client/home', [ClientController::class, 'home']);
Route::get('client/account', [ClientController::class, 'account']);
Route::get('client/statement', [ClientController::class, 'statement']);
Route::get('client/fund', [ClientController::class, 'fund']);
Route::get('client/feedback', [ClientController::class, 'feedback']);
Route::get('client/notice', [ClientController::class, 'notice']);
Route::post('client/clientmessage',[ClientController::class,'clientmessage']);
Route::post('client/clienttransfer',[ClientController::class,'clienttransfer']);
Route::post('client/transfer',[ClientController::class,'transfer']);
//casier controller

Route::get('casier/home', [CasierController::class, 'home']);
Route::post('casier/casiertransfer',[CasierController::class,'casiertransfer']);
Route::post('casier/withdraw',[CasierController::class,'withdraw']);
Route::post('casier/deposit',[CasierController::class,'deposit']);
