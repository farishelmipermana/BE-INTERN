<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function(){
    Route::get('usersall/search', [ApiController::class, 'usersAll'])->name('api.usersall.search');
    Route::get('users/search', [ApiController::class, 'users'])->name('api.users.search');
    Route::get('vehicle/search', [ApiController::class, 'vehicle'])->name('api.vehicle.search');
    Route::get('stakeholder/search', [ApiController::class, 'stakeholder'])->name('api.stakeholder.search');
});
