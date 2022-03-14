<?php
 
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Dashboard\PostController; 
use App\Http\Controllers\Dashboard\CategoryController;
use  App\Http\Controllers\Dashboard\UserController;    
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SettingController;   

Auth::routes(['verify' => true , 'register' => false]); 

 
Route::group(['middleware' => ['auth', 'verified']], function () {

  // Main Page Route 
  Route::get('/', [DashboardController::class,'dashboardAnalytics'])->name('dashboard-analytics');
    
  // Main User Route 
  Route::post('user/store', [UserController::class,'user_store'])->name('user-store');
  Route::get('user', [UserController::class,'user_list'])->name('user-list');
  Route::get('user/list/data', [UserController::class,'getusers'])->name('user-datatables');  // note in controller 
  Route::get('user/{id}/edit', [UserController::class,'user_edit'])->name('user-edit');
  Route::PUT('user/update/{id}', [UserController::class,'user_update'])->name('user-update');
  Route::delete('user/{id}', [UserController::class,'user_delete'])->name('user-delete');

 

  Route::resource('category', CategoryController::class); 
  Route::resource('post', PostController::class); 

  // Setting Route 
  Route::get('settings', [SettingController::class,'index'])->name('app-settings');
  Route::post('settings', [SettingController::class,'update'])->name('edit-settings'); 
 
 
 
  });