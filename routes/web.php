<?php

use App\Http\Controllers\DropdownController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TypeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

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

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/member', [MemberController::class, 'member']);

Route::middleware(['auth:sanctum', 'verified'])->get('member', function () {
    $users = User::all();
    return view('member', compact('users'));
})->name('member');

Route::get('/placetype', [TypeController::class, 'placetype']);

Route::post('/placetype',[TypeController::class,'insert'])->name('addType');

Route::get('/type/edit/{id}',[TypeController::class,'edit']);

Route::post('/type/update/{id}',[TypeController::class,'update'])->name('updateType');

Route::get('/type/delete/{id}',[TypeController::class,'delete']);

Route::get('/event',[EventController::class,'event']);

Route::post('/event',[EventController::class,'insert'])->name('addEvent');

Route::get('/event/editevent{id}',[EventController::class,'edit']);

Route::post('/event/update{id}',[EventController::class,'update']);

Route::get('/event/delete/{id}',[EventController::class,'delete']);

Route::get('/place',[PlaceController::class,'place']);

Route::post('/place',[PlaceController::class,'insert'])->name('addPlace');

Route::get('/place/editplace{id}',[PlaceController::class,'edit']);

Route::post('/place/update{id}',[PlaceController::class,'update']);

Route::get('/place/delete/{id}',[PlaceController::class,'delete']);




// Route::get('/', function(){
//     return view('welcome');
// });








// Route::get('/place',[DropdownController::class,'index']);

Route::post('/place/fetch',[PlaceController::class,'fetch'])->name('dropdown.fetch');







