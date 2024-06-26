
<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\ClubController;
use App\Http\Controllers\admin\TouranmentController;
use App\Http\Controllers\admin\PictureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactClubController;
use App\Http\Controllers\admin\PagesController;
use App\Http\Controllers\admin\TournamentCategoryController;
use App\Http\Controllers\admin\TeamController;
 
// Route::get('welcome', function () {
//     return view('tournament-info');
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

    Route::controller(PictureController::class)->prefix('pictures')->group(function () {
        Route::get('', 'index')->name('pictures.index');
        Route::get('create', 'create')->name('pictures.create');
        Route::post('store', 'store')->name('pictures.store');
        Route::get('edit/{id}', 'edit')->name('pictures.edit');
        Route::put('edit/{id}', 'update')->name('pictures.update');
        Route::delete('destroy/{id}', 'destroy')->name('pictures.destroy');
    });

    Route::controller(TournamentCategoryController::class)->prefix('tournamentCategories')->group(function () {
        Route::get('', 'index')->name('tournament.category.index');
        Route::get('create', 'create')->name('tournament.category.create');
        Route::post('store', 'store')->name('tournament.category.store');
        Route::get('edit/{id}', 'edit')->name('tournament.category.edit');
        Route::put('edit/{id}', 'update')->name('tournament.category.update');
        Route::delete('destroy/{id}', 'destroy')->name('tournament.category.destroy');
    });
    Route::controller(TeamController::class)->prefix('teams')->group(function () {
        Route::get('', 'index')->name('teams.index');
        Route::get('create', 'create')->name('teams.create');
        Route::post('store', 'store')->name('teams.store');
        Route::get('edit/{id}', 'edit')->name('teams.edit');
        Route::put('edit/{id}', 'update')->name('teams.update');
        Route::delete('destroy/{id}', 'destroy')->name('teams.destroy');
    });
 
    Route::get('/profile/{id}', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::post('/profile/update/{id}', [App\Http\Controllers\AuthController::class, 'updateProfile'])->name('profile.update');

    Route::get('/club-contact-info',[PagesController::class, 'clubContactInfo'])->name('club.contact.info');
    Route::post('/club-contact-info-store',[PagesController::class, 'clubContactInfoStore'])->name('club.contact.info.store');
  
});
Route::get('/action/pictures', [HomeController::class, 'pictureActionShow'])->name('action.picture.show');
Route::get('/info/tournaments', [HomeController::class, 'tournamentInfo'])->name('tournament.information');

Route::get('/club-contact-us', [ContactClubController::class, 'clubContactUs'])->name('club.contact.us');
Route::post('/club-contact-us-store', [ContactClubController::class, 'clubContactUsStore'])->name('club.contact.us.store');


