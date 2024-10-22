<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\casierController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\loginController;
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
Route::get('/', [loginController::class, 'login']);
Route::post('/client/access',[loginController::class,'access']);
Route::get('/client/logout',[loginController::class,'logout']);
Route::post('/casier/loginaccess',[loginController::class,'loginaccess']);
Route::get('/casier/logoutc',[loginController::class,'logoutc']);



//admin controller
Route::get('admin/home', [adminController::class, 'home']);
Route::get('admin/account', [adminController::class, 'account']);
Route::get('admin/addaccount', [adminController::class, 'addaccount']);
Route::get('admin/feedback', [adminController::class, 'feedback']);
Route::get('admin/clientdetail/{id}', [adminController::class, 'clientdetail']);
Route::get('admin/sendnotice/{id}', [adminController::class, 'sendnotice']);
Route::post('admin/addcaisier', [adminController::class, 'addcaisier']);
Route::post('admin/updatecasier', [adminController::class, 'updatecasier']);
Route::get('admin/deletecasier/{id}', [adminController::class, 'deletecasier']);
Route::post('admin/saveaccount', [adminController::class, 'saveaccount']);
Route::get('admin/deleteclient/{id}',[adminController::class,'deleteclient']);
Route::post('admin/notice',[adminController::class,'notice']);
Route::get('admin/deletefeed/{id}',[adminController::class,'deletefeed']);

//client controller

Route::get('client/home', [clientController::class, 'home']);
Route::get('client/account', [clientController::class, 'account']);
Route::get('client/statement', [clientController::class, 'statement']);
Route::get('client/fund', [clientController::class, 'fund']);
Route::get('client/feedback', [clientController::class, 'feedback']);
Route::get('client/notice', [clientController::class, 'notice']);
Route::post('client/clientmessage',[clientController::class,'clientmessage']);
Route::post('client/clienttransfer',[clientController::class,'clienttransfer']);
Route::post('client/transfer',[clientController::class,'transfer']);
//casier controller

Route::get('casier/home', [casierController::class, 'home']);
Route::post('casier/casiertransfer',[casierController::class,'casiertransfer']);
Route::post('casier/withdraw',[casierController::class,'withdraw']);
Route::post('casier/deposit',[casierController::class,'deposit']);
