<?php


use App\Http\Controllers\dashboard\DashServiceController;
use App\Http\Controllers\dashboard\DashUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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



Route::group(['prefix'=>'dashboard'], function(){

    Route::get('/', function () {
        return view('welcome');
    });

   
    
    Route::middleware('admin')->group(function(){       
        Route::get('user',[DashUserController::class,'index'])->name('user');
        Route::post('store',[DashUserController::class,'store'])->name('new_user');
        Route::get('user-create',[DashUserController::class,'create'])->name('user.create');
        Route::get('user-delete/{id}',[DashUserController::class,'destroy'])->name('user.delete');
    
        Route::get('service',[DashServiceController::class,'index'])->name('service');
        Route::post('service-store',[DashServiceController::class,'store'])->name('new_service');
        Route::get('service-create',[DashServiceController::class,'create'])->name('service.create');
        Route::get('service-delete/{id}',[DashServiceController::class,'destroy'])->name('service.delete');
    });

    
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    
    require __DIR__.'/auth.php';
    
});






