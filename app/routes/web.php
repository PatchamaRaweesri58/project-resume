<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Frontend
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FeaturedController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController as ProfileController;

//Backend
use App\Http\Controllers\Backend\ProfileController as BackendProfileController;
use App\Http\Controllers\Backend\Profile\CreatedController as BackendProfileCreatedController;
use App\Http\Controllers\Backend\Profile\UpdatedController as BackendProfileUpdatedController;
use App\Http\Controllers\Backend\Profile\STController as BackendProfileSTController;
use App\Http\Controllers\Backend\Education\EducationController as BackendEducationController;
use App\Http\Controllers\Backend\Skills\SkillsController as BackendSkillsController;
use App\Http\Controllers\Backend\Featured\FeaturedController as BackendFeaturedController;
use App\Http\Controllers\Backend\Experience\ExperienceController as BackendExperienceController;
use App\Http\Controllers\Backend\Certificate\CertificateController as BackendCertificateController;

//list
use App\Http\Controllers\ListexperienceController;
use App\Http\Controllers\ListfeaturedController;
use App\Http\Controllers\ListskillsControllerController as ListskillsController;
//format
use App\Http\Controllers\FormatController;
//number
use App\Http\Controllers\NumberController;

//
use App\Http\Controllers\AuthLogoutController as LogoutController;


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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
//format
Route::get('/table',[FormatController::class,'index'])->name('table.format');
Route::get('/table/calendar',[FormatController::class,'calendar'])->name('table.calendar');
Route::get('/table/forms',[FormatController::class,'forms'])->name('table.forms');
Route::get('/table/icons',[FormatController::class,'icons'])->name('table.icons');
Route::get('/table/license',[FormatController::class,'license'])->name('table.license');
Route::get('/table/login',[FormatController::class,'getLogin'])->name('table.login');
Route::get('/table/register',[FormatController::class,'getRegister'])->name('table.register');
Route::get('/table/set-password',[FormatController::class,'setpassword'])->name('table.password');
Route::get('/table/dashboard',[FormatController::class,'dashboard'])->name('table.dashboard');
Route::get('/table/profile',[FormatController::class,'profile'])->name('table.profile');

//Route
Route::get('/check-number',[NumberController::class,'checkNumberForm']);
Route::post('/check-number',[NumberController::class,'checkNumber']);




//Frontend Profile
Route::get('/', [ProfileController::class, 'index'])->name('profile');
Route::get('/skills', [SkillsController::class, 'index'])->name('skills');
Route::get('/education', [EducationController::class, 'index'])->name('education');
Route::get('/experience', [ExperienceController::class, 'index'])->name('experience');
Route::get('/certificate', [CertificateController::class, 'index'])->name('certificate');
Route::get('/featured', [FeaturedController::class, 'index'])->name('featured');


//Back-end
Route::middleware('auth')->group(function () {

    Route::get('/add', [BackendProfileCreatedController::class, 'index']);
    Route::get('/updated/{id}', [BackendProfileUpdatedController::class, 'index']);
    // Route::delete('/delete/profile/{id}', [BackendProfileUpdatedController::class, 'destroy']);
    Route::get('/datatables/profile', [BackendProfileController::class, 'index'])->name('datatables');

    //image
    Route::get('/datatables/images', [ImageController::class, 'index'])->name('images.index');
    Route::get('/add/image', [ImageController::class, 'create'])->name('images.create');
    Route::get('/edit/{id}', [ImageController::class, 'edit'])->name('images.edit');
    // Route::delete('/delete/image/{id}', [ImageController::class, 'destroy'])->name('images.destroy');

    //education
    Route::get('/datatables/education', [BackendEducationController::class, 'index'])->name('datatables.education');
    Route::get('/datatables/education/create', [BackendEducationController::class, 'create'])->name('datatables.education.create');
    Route::get('/datatables/education/edit/{id}', [BackendEducationController::class, 'edit'])->name('datatables.education.edit');
    // Route::delete('/delete/education/{id}', [BackendEducationController::class, 'destroy'])->name('datatables.education.destroy');

    //skills
    Route::get('/datatables/skills', [BackendSkillsController::class, 'index'])->name('datatables.skills');
    Route::get('/datatables/skills/create', [BackendSkillsController::class, 'create'])->name('datatables.skills.create');
    Route::get('/datatables/skills/edit/{id}', [BackendSkillsController::class, 'edit'])->name('datatables.skills.edit');
    // Route::delete('/delete/skills/{id}', [BackendSkillsController::class, 'destroy'])->name('datatables.skills.destroy');

    //featured
    Route::get('/datatables/featured', [BackendFeaturedController::class, 'index'])->name('datatables.featured');
    Route::get('/datatables/featured/create', [BackendFeaturedController::class, 'create'])->name('datatables.featured.create');
    Route::get('/datatables/featured/edit/{id}', [BackendFeaturedController::class, 'edit'])->name('datatables.featured.edit');
    // Route::delete('/delete/featured/{id}', [BackendFeaturedController::class, 'destroy'])->name('datatables.featured.destroy');

    //experience
    Route::get('/datatables/experience', [BackendExperienceController::class, 'index'])->name('datatables.experience');
    Route::get('/datatables/experience/create', [BackendExperienceController::class, 'create'])->name('datatables.experience.create');
    Route::get('/datatables/experience/edit/{id}', [BackendExperienceController::class, 'edit'])->name('datatables.experience.edit');
    // Route::delete('/delete/experience/{id}', [BackendExperienceController::class, 'destroy'])->name('datatables.experience.destroy');


    //certificate
    Route::get('/datatables/certificate', [BackendCertificateController::class, 'index'])->name('datatables.certificate');
    Route::get('/datatables/certificate/create', [BackendCertificateController::class, 'create'])->name('datatables.certificate.create');
    Route::get('/datatables/certificate/edit/{id}', [BackendCertificateController::class, 'edit'])->name('datatables.certificate.edit');
    // Route::delete('/delete/certificate/{id}', [BackendCertificateController::class, 'destroy'])->name('datatables.certificate.destroy');

    //image
    Route::get('/datatables/image', [ImageController::class, 'index'])->name('datatables.image');
    Route::get('/datatables/image/create', [ImageController::class, 'create'])->name('datatables.image.create');
    Route::get('/datatables/image/edit/{id}', [ImageController::class, 'edit'])->name('datatables.image.edit');
    // Route::delete('/delete/image/{id}', [ImageController::class, 'destroy'])->name('datatables.image.destroy');

    //stprofile
    Route::get('/datatables/stprofile', [BackendProfileSTController::class, 'index'])->name('datatables.st');
    Route::get('/datatables/stprofile/created', [BackendProfileSTController::class, 'create'])->name('datatables.st.create');
    Route::get('/datatables/stprofile/edit/{id}', [BackendProfileSTController::class, 'edit'])->name('datatables.st.edit');
    // Route::delete('/delete/stprofile/{id}', [BackendProfileSTController::class, 'destroy']);

    //skills-list
    Route::get('/datatable/list/skills', [ListskillsController::class, 'index'])->name('datatables.listskillsController');
    Route::get('/datatable/list/skills/create', [ListskillsController::class, 'create'])->name('datatables.skills.list.create');
    Route::get('/datatable/list/skills/edit/{id}', [ListskillsController::class, 'edit'])->name('datatables.skills.list.edit');
    // Route::delete('/datete/list/skills/{id}', [ListskillsController::class, 'destroy'])->name('datatables.skills.list.destroy');

    //list-featured
    Route::get('/datatables/list/featured', [ListfeaturedController::class, 'index'])->name('datatables.listfeatured');
    Route::get('/datatables/list/featured/create', [ListfeaturedController::class, 'create'])->name('datatables.list.featured.create');
    Route::get('/datatables/list/featured/edit/{id}', [ListfeaturedController::class, 'edit'])->name('datatables.list.featured.edit');
    // Route::delete('/delete/list/featured/{id}', [ListfeaturedController::class, 'destroy'])->name('datatables.list.featured.destroy');

    //list-experience
    Route::get('/datatables/list/experience', [ListexperienceController::class, 'index'])->name('datatables.listexperience');
    Route::get('/datatables/list/experience/create', [ListexperienceController::class, 'create'])->name('datatables.experience.list.create');
    Route::get('/datatables/list/experience/edit/{id}', [ListexperienceController::class, 'edit'])->name('datatables.experience.list.edit');
    // Route::delete('/delete/list/experience/{id}', [ListexperienceController::class, 'destroy'])->name('datatables.experience.list.destroy');
});


Route::middleware('cors')->delete('/delete/profile/{id}', [BackendProfileUpdatedController::class, 'delete'])->name('profile.delete');
Route::middleware('cors')->delete('/delete/image/{id}', [ImageController::class, 'delete'])->name('images.destroy');
Route::middleware('cors')->delete('/delete/education/{id}', [BackendEducationController::class, 'delete'])->name('datatables.education.destroy');
Route::middleware('cors')->delete('/delete/skills/{id}', [BackendSkillsController::class, 'delete'])->name('datatables.skills.destroy');
Route::middleware('cors')->delete('/delete/featured/{id}', [BackendFeaturedController::class, 'delete'])->name('datatables.featured.destroy');
Route::middleware('cors')->delete('/delete/experience/{id}', [BackendExperienceController::class, 'delete'])->name('datatables.experience.destroy');
Route::middleware('cors')->delete('/delete/certificate/{id}', [BackendCertificateController::class, 'delete'])->name('datatables.certificate.destroy');
Route::middleware('cors')->delete('/delete/image/{id}', [ImageController::class, 'delete'])->name('datatables.image.destroy');
Route::middleware('cors')->delete('/delete/stprofile/{id}', [BackendProfileSTController::class, 'delete']);
Route::middleware('cors')->delete('/datete/list/skills/{id}', [ListskillsController::class, 'delete'])->name('datatables.skills.list.destroy');
Route::middleware('cors')->delete('/delete/list/featured/{id}', [ListfeaturedController::class, 'delete'])->name('datatables.list.featured.destroy');
Route::middleware('cors')->delete('/delete/list/experience/{id}', [ListexperienceController::class, 'delete'])->name('datatables.experience.list.destroy');
