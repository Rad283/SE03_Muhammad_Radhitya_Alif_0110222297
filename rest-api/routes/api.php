j<?php

    use App\Http\Controllers\AnimalController;
    use App\Http\Controllers\StudentController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    /*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::controller(AnimalController::class)->group(function () {
        Route::get('/animals', 'index');
        Route::post('/animals', 'store');
        Route::put('/animals/{id}', 'update');
        Route::delete('animals/{id}', 'destroy');
    });

    Route::controller(StudentController::class)->group(function () {
        Route::get('/students', 'index');
        Route::post('/students', 'post');
        Route::put('/students/{id}', 'put');
        Route::delete('students/{id}', 'destroy');
    });
