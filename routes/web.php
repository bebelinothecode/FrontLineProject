<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ImportExportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function (User $user) {
    return view('dashboard',['user'=> $user]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::resource('/users', [UserController::class, 'index']);
    Route::resource('user',UserController::class);
    Route::resource("vehicle",VehicleController::class);
    Route::post('import', [ImportExportController::class, 'import'])->name('vehicle.import'); // import route
    Route::get('export', [ImportExportController::class, 'export'])->name('vehicle.export'); // export route
    Route::get('/graphs',[ChartController::class,'index'])->name('chart.graph'); //graph
});

require __DIR__.'/auth.php';
