<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmitController;

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
    return view('main');
});
Route::post('/login', function () {
    return view('auth.login');
});
Route::get('/insertdata', [SubmitController::class, 'index'])->name('insertdata');

Route::get('/createpost', [SubmitController::class, 'create'])->name('create');
Route::get('/insertdata', [SubmitController::class, 'index']);

Route::POST('/insertdata', [SubmitController::class, 'insertdata'])->name('insertdata');

Route::get('/view', function () {
    return view('view');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');//yang diganti

require __DIR__.'/auth.php';
