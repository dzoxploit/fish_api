<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('messages')->group(function () {
    Route::get('/', [MessageController::class, 'index']); // GET /api/messages
    Route::get('/{id}', [MessageController::class, 'show']); // GET /api/messages/{id}
    Route::post('/', [MessageController::class, 'store']); // POST /api/messages
    Route::put('/{id}', [MessageController::class, 'update']); // PUT /api/messages/{id}
    Route::delete('/{id}', [MessageController::class, 'destroy']); // DELETE /api/messages/{id}
});