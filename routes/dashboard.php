<?php


use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['auth','verified'],
              'as' => 'dashboard.',
               'prefix' => 'dashboard'], function () {




    #### Dashboard ####
    Route::get('/', [DashboardController::class, 'index']);

    #### Categories ####
    Route::resource('categories', CategoryController::class);
    Route::POST('delete_categories',[CategoryController::class,'delete'])->name('delete_categories');

});
