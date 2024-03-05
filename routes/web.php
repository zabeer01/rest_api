<?php

use App\Http\Controllers\Api\v1\CustomerController;
use App\Http\Controllers\Api\v1\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'sanctum'])->get('/user' , function (Request $request) {
    return $request->user();
});
//
Route::group(['prefix'=>'api/v1','namespace'=>'App\Http\Controllers\Api\v1'], function(){
 Route::apiResource('customers',CustomerController::class);
 Route::apiResource('invoices',InvoiceController::class);
});
