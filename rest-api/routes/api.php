<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController; #impor kelas animalcontroller
use App\Http\Controllers\StudentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#method GET 

Route::get("/animals", [AnimalController::class, 'index']); #panggil nama kelas dan method di dalam array


#method POST
Route::post("/animals", [AnimalController::class, 'store']);


#method PUT 
Route::put("/animals/{id}", [AnimalController::class, 'update']);


#method DELETE 
Route::delete("/animals/{id}", [AnimalController::class, 'destroy']);


#route students
#method get
#kses kelas Route kmudian panggil method static namanya get, parameter kedua adalah endpoint nya 
Route::get('/students', [StudentController::class, 'index']);

#method post
Route::post('/students', [StudentController::class, 'store']);

#method PUT
# Route::put('/students', [StudentController::class, 'update']);


#untuk mendapatkan satu buah data
#method GET , route /students
Route::get('/students/{id}', [StudentController::class, 'show']);

#method PUT id
Route::put('/students/{id}', [StudentController::class, 'update']);

#method DELETE 
Route::delete('/students/{id}', [StudentController::class, 'destroy']);
