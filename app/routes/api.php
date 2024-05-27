<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//backend
use App\Http\Controllers\Backend\ProfileController as BackendProfileController;
use App\Http\Controllers\Backend\Profile\CreatedController as BackendProfileCreatedController;
use App\Http\Controllers\Backend\Profile\UpdatedController as BackendProfileUpdatedController;
use App\Http\Controllers\Backend\Profile\STController as BackendProfileSTController;
use App\Http\Controllers\Backend\Education\EducationController as BackendEducationController;
use App\Http\Controllers\Backend\Skills\SkillsController as BackendSkillsController;
use App\Http\Controllers\Backend\Featured\FeaturedController as BackendFeaturedController;
use App\Http\Controllers\Backend\Experience\ExperienceController as BackendExperienceController;
use App\Http\Controllers\Backend\Certificate\CertificateController as BackendCertificateController;
use App\Http\Controllers\ImageController;

//list
use App\Http\Controllers\ListexperienceController;
use App\Http\Controllers\ListfeaturedController;
use App\Http\Controllers\ListskillsControllerController as ListskillsController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Profile


Route::get('/data', [BackendProfileController::class, 'data'])->name('api.datatables.data');
Route::post('/add', [BackendProfileCreatedController::class, 'create'])->name('datatables.created');
Route::put('/updated/{id}', [BackendProfileUpdatedController::class, 'update'])->name('api.datatables.updateprofile');
//education
Route::get('/data/education', [BackendEducationController::class, 'data'])->name('api.datatables.education');
Route::post('/datatables/education', [BackendEducationController::class, 'store'])->name('datatables.education.store');
Route::put('/datatables/education/edit/{id}', [BackendEducationController::class, 'update'])->name('datatables.education.update');
//skills
Route::get('/data/skills/data', [BackendSkillsController::class, 'data'])->name('api.datatables.skills');
Route::post('/datatables/skills', [BackendSkillsController::class, 'store'])->name('datatables.skills.store');
Route::put('/datatables/skills/edit/{id}', [BackendSkillsController::class, 'update'])->name('datatables.skills.update');
//featured
Route::get('/data/featured', [BackendFeaturedController::class, 'data'])->name('api.datatables.featured');
Route::post('/datatables/featured', [BackendFeaturedController::class, 'store'])->name('datatables.featured.store');
Route::put('/datatables/featured/edit/{id}', [BackendFeaturedController::class, 'update'])->name('datatables.featured.update');
//experience
Route::get('/data/experience', [BackendExperienceController::class, 'data'])->name('api.datatables.experience');
Route::post('/datatables/experience', [BackendExperienceController::class, 'store'])->name('datatables.experience.store');
Route::put('/datatables/experience/edit/{id}', [BackendExperienceController::class, 'update'])->name('datatables.experience.update');
//certificate
Route::get('/data/certificate', [BackendCertificateController::class, 'data'])->name('api.datatables.certificate');
Route::post('/datatables/certificate', [BackendCertificateController::class, 'store'])->name('datatables.certificate.store');
Route::put('/datatables/certificate/edit/{id}', [BackendCertificateController::class, 'update'])->name('datatables.certificate.update');
//list
Route::get('/data/st', [BackendProfileSTController::class, 'data'])->name('api.datatables_st.data');
Route::post('/datatables/stprofile', [BackendProfileSTController::class, 'store'])->name('datatables.st.store');
Route::put('/datatables/stprofile/edit/{id}', [BackendProfileSTController::class, 'update'])->name('datatables.st.update');
//image
Route::get('/images/data', [ImageController::class, 'getData'])->name('api.images.data');
Route::put('/images/edit/{id}', [ImageController::class, 'update'])->name('images.update');
Route::post('/add/image', [ImageController::class, 'store'])->name('images.store');
//list 
Route::post('/datatables/list/experience', [ListexperienceController::class, 'store'])->name('api.experience');
Route::put('/datatables/list/experience/edit/{id}', [ListexperienceController::class, 'update'])->name('datatables.experience.list.update');
Route::get('/datatables/list/experience/data', [ListexperienceController::class, 'data'])->name('api.datatables.experience.data');
//data-featured
Route::post('/datatables/list/featured/', [ListfeaturedController::class, 'store'])->name('datatables.list.featured.store');
Route::put('/datatables/list/featured/edit/{id}', [ListfeaturedController::class, 'update'])->name('datatables.list.featured.update');
Route::get('/datatables/list/featured/data', [ListfeaturedController::class, 'data'])->name('api.datatables.featured.data');
//data-skills
Route::post('/datatables/list/skills', [ListskillsController::class, 'store'])->name('datatables.skills.list.store');
Route::put('/datatables//list/skills/edit/{id}', [ListskillsController::class, 'update'])->name('datatables.skills.list.update');
Route::get('/datatables/list/skills/data', [ListskillsController::class, 'data'])->name('api.datatables.skills.data');

//
// Route::post('/login',[AuthController::class,'login'])->name('api.login');
// Route::post('/register',[AuthController::class,'register'])->name('api.register');

// //delete
// Route::middleware('cors')->delete('/delete/profile/{id}', [BackendProfileUpdatedController::class, 'destroy'])->name('destroy.profile');
// Route::middleware('cors')->delete('/delete/image/{id}', [ImageController::class, 'destroy'])->name('images.destroy');
// Route::middleware('cors')->delete('/delete/education/{id}', [BackendEducationController::class, 'destroy'])->name('datatables.education.destroy');
// Route::middleware('cors')->delete('/delete/skills/{id}', [BackendSkillsController::class, 'destroy'])->name('datatables.skills.destroy');
// Route::middleware('cors')->delete('/delete/featured/{id}', [BackendFeaturedController::class, 'destroy'])->name('datatables.featured.destroy');
// Route::middleware('cors')->delete('/delete/experience/{id}', [BackendExperienceController::class, 'destroy'])->name('datatables.experience.destroy');
// Route::middleware('cors')->delete('/delete/certificate/{id}', [BackendCertificateController::class, 'destroy'])->name('datatables.certificate.destroy');
// Route::middleware('cors')->delete('/delete/image/{id}', [ImageController::class, 'destroy'])->name('datatables.image.destroy');
// Route::middleware('cors')->delete('/delete/stprofile/{id}', [BackendProfileSTController::class, 'destroy']);
// Route::middleware('cors')->delete('/datete/list/skills/{id}', [ListskillsController::class, 'destroy'])->name('datatables.skills.list.destroy');
// Route::middleware('cors')->delete('/delete/list/featured/{id}', [ListfeaturedController::class, 'destroy'])->name('datatables.list.featured.destroy');
// Route::middleware('cors')->delete('/delete/list/experience/{id}', [ListexperienceController::class, 'destroy'])->name('datatables.experience.list.destroy');
