<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TypeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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