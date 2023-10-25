<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Frontend\dashboard\DashboardHomeController;
use App\Http\Controllers\Frontend\dashboard\StudentCompetitionController;
use App\Http\Controllers\Frontend\dashboard\StudentresultsController;
use App\Http\Controllers\Frontend\dashboard\SchoolRegisterationController;
use App\Http\Controllers\Frontend\dashboard\SchoolSessionsManagementController;



// Student controller

use App\Http\Controllers\Frontend\dashboard\StudentsController;

//end student controller.


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
Route::controller(DashboardHomeController::class)->group(function(){
    //Get methods
    Route::get('/dashboardhome','index')->name('dashboard.index'); //done
    Route::get('change-password','changePassword')->name('change.password');

    //Post methods
    Route::post('update-password','updatePassword')->name('update.password');
});

//Student controller routes

Route::controller(StudentsController::class)->group(function(){

    //Get methods
    Route::get('student','index')->name('student.index'); //done
    Route::get('addstudent','addStudent')->name('student.add'); //done.
    Route::get('deletestudent/{id}','destroy')->name('student.destroy'); //done.
    Route::get('editstudent/{id}','Edit')->name('student.Edit'); //done.



    //Post methods
    Route::post('storestudent','storeStudent')->name('student.store');
    Route::post('updatestudent/{id}','update')->name('student.update');

});


//end student controller routes.

//School sessions
Route::controller(SchoolSessionsManagementController::class)->group(function(){
    Route::get('school-session','index')->name('school-session.index');
    Route::get('school-session-add','add')->name('school-session.add');

    Route::post('school-session-store','store')->name('school-session.store');


});

//school session end.

//Student
Route::controller(StudentCompetitionController::class)->group(function(){
    Route::get('StudentCompetitions','index')->name('studentcompetition.index');

});


//School registeration routes

Route::controller(SchoolRegisterationController::class)->group(function(){

      Route::get('SchoolRegisterationIndex','index')->name('SchoolRegisteration.index');
      Route::get('SchoolRegisteration','add')->name('SchoolRegisteration.add');
      Route::get('deleteschool/{id}','destroy')->name('school.destroy'); //done.

      Route::post('fetchCities','fetchCity')->name('fetch.cities');

      Route::post('addnewschool','addSchool')->name('school.add.new');


});



//School registeracction routes end.

//student results
Route::controller(StudentresultsController::class)->group(function(){
    Route::get('studentresult','index')->name('result.index');


});






Route::controller(HomeController::class)->group(function(){
    //Get methods
    Route::get('/','index')->name('home.index'); //done

    Route::get('registerrules','rulesandregulation')->name('home.register.rules'); //done

    Route::get('signup','signUp')->name('home.signup'); //done

    Route::get('account-login','Login')->name('account.login');
    Route::get('logout','logout')->name('account.logout');

    // post method
    Route::post("account-login-validate",'SignIn')->name('login.post');
    Route::post('account-register','Register_Account')->name('account.register');



});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
