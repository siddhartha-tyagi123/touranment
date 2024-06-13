
<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\ClubController;
use App\Http\Controllers\admin\TouranmentController;
use App\Http\Controllers\HomeController;
 
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tournament/{id}', [HomeController::class, 'tournamentProfile'])->name('tournament.show');
Route::get('/club/{id}', [HomeController::class, 'clubProfile'])->name('club.show');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::controller(ClubController::class)->prefix('clubs')->group(function () {
        Route::get('', 'index')->name('clubs.index');
        Route::get('create', 'create')->name('clubs.create');
        Route::post('store', 'store')->name('clubs.store');
        Route::get('edit/{id}', 'edit')->name('clubs.edit');
        Route::put('edit/{id}', 'update')->name('clubs.update');
        Route::delete('destroy/{id}', 'destroy')->name('clubs.destroy');
    });
    Route::controller(TouranmentController::class)->prefix('touranments')->group(function () {
        Route::get('', 'index')->name('touranments.index');
        Route::get('create', 'create')->name('touranments.create');
        Route::post('store', 'store')->name('touranments.store');
        Route::get('edit/{id}', 'edit')->name('touranments.edit');
        Route::put('edit/{id}', 'update')->name('touranments.update');
        Route::delete('destroy/{id}', 'destroy')->name('touranments.destroy');
    });
 
    Route::get('/profile/{id}', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::post('/profile/update/{id}', [App\Http\Controllers\AuthController::class, 'updateProfile'])->name('profile.update');
  
});
