<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    CvthequeController,
    CompetenceController,
    MetiersController,
    ProfessionnelController,
};

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


Route::get(uri: '/',action: [CvthequeController::class,'index'])->name('index');

Route::get('/competence/{competence}/confirm', [CompetenceController::class, 'confirm'])->name('competence.confirm');
Route::resource('competence',CompetenceController::class);


Route::get('/metier/{metier}/confirm', [MetiersController::class, 'confirm'])->name('metiers.confirm');
Route::resource('metiers',MetiersController::class);


Route::get('/metier/{slug}/professionels', [ProfessionnelController::class, 'index'])->name('professionnels.metier');
Route::get('/professionnels/search', [ProfessionnelController::class, 'search'])->name('professionnels.search');
Route::resource('professionnels',ProfessionnelController::class);





/*Route::get('/', function () {
    return view('welcome');
});*/


/*Route::get('/', function () {
    return view('cvTheque');
});*/

