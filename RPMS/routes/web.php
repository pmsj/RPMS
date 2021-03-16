<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ParishController;
use App\Http\Controllers\Backend\CommunityController;
use App\Http\Controllers\Backend\MinistryController;
use App\Http\Controllers\Backend\InstitutionController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\ProvinceController;
use App\Http\Controllers\Backend\DesignationController;
use App\Http\Controllers\Backend\FormationStageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\PersonalDetailController;
use App\Http\Controllers\Admin\FormationTransactionController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\User\ProfileController;


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

Route::group(['middleware' => 'prevent-back-history'], function () {  //prevent-back-history after logout




  Route::get('/', function () {
    return view('auth.login');
  });

  //dashboard route
  Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
  })->name('dashboard');


  //Admin Logout
  Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');


  //Admin Routes
  Route::prefix('admin')->middleware(['auth', 'auth.isAdmin'])->name('admin.')->group(function () {
    Route::resource('/users', UserController::class)->except('show');
    Route::resource('/roles', RoleController::class)->except('show');
    Route::resource('/community', CommunityController::class)->except('show');
    Route::resource('/country', CountryController::class)->except('show');
    Route::resource('/designation', DesignationController::class)->except('show');
    Route::resource('/district', DistrictController::class)->except('show');
    Route::resource('/formationStage', FormationStageController::class)->except('show');
    Route::resource('/institution', InstitutionController::class)->except('show');
    Route::resource('/ministry', MinistryController::class)->except('show');
    Route::resource('/parish', ParishController::class)->except('show');
    Route::resource('/province', ProvinceController::class)->except('show');
    Route::resource('/state', StateController::class)->except('show');
    Route::resource('/state', StateController::class)->except('show');
    Route::resource('/formationTransaction', FormationTransactionController::class);
    
  });
  //user related page
  Route::prefix('user')->middleware(['auth'])->name('user.')->group(function () {
    Route::get('profile', ProfileController::class)->name('profile');
    Route::resource('/personalDetail', PersonalDetailController::class)->except('show');

  });
});//prevent-back-history after logout ====> route  it should cover all the routes to prevent cach