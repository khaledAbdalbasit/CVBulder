<?php

use App\Http\Controllers\backend\backendController;
use App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [frontendController::class,'index']);

Route::controller(backendController::class)->group(function () {
    Route::get('/user/cv', 'userCV')->name('userCV');
    Route::get('/user/logout', 'userLogout')->name('user.logout');
    Route::post('/save/info', 'saveInfo')->name('save.info');
    Route::get('/user/profile', 'userProfile')->name('user.profile');
    Route::post('/save/profile', 'saveProfile')->name('save.profile');

    Route::get('/edit/info', 'editInfo')->name('edit.info');
    Route::post('/update/info', 'updateInfo')->name('update.info');

    Route::get('/edit/profile', 'editProfile')->name('edit.profile');
    Route::post('/update/profile', 'updateProfile')->name('update.profile');

    Route::get('/user/skill', 'userSkill')->name('user.skill');
    Route::post('/save/skill', 'saveSkill')->name('save.skill');
    Route::get('/edit/skill', 'editSkill')->name('edit.skill');
    Route::post('/update/skill', 'updateSkill')->name('update.skill');


    Route::get('/user/education', 'userEducaton')->name('user.educaton');
    Route::post('/save/eduo', 'saveEduo')->name('save.eduo');
    Route::get('/edit/education', 'editeducation')->name('edit.education');
    Route::get('/edit/education/{id}', 'editeducationEducation')->name('edit.education.education');
    Route::post('/update/education', 'updateEducation')->name('update.education');
    Route::get('/delete/education{id}', 'deleteEducation')->name('delete.education');


    Route::get('/user/language', 'userLanguage')->name('user.language');
    Route::post('/save/language', 'saveLanguage')->name('save.language');
    // imaes route
    Route::get('/user/image', 'userImage')->name('user.image');
    Route::post('/save/image', 'saveImage')->name('save.image');

    Route::get('/cv', 'cv')->name('cv');
    Route::get('/downloadCv', 'downloadCv')->name('downloadCv');


});

require __DIR__.'/auth.php';
