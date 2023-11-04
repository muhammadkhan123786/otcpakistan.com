<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Frontend\dashboard\DashboardHomeController;
use App\Http\Controllers\Frontend\dashboard\StudentCompetitionController;
use App\Http\Controllers\Frontend\dashboard\StudentresultsController;
use App\Http\Controllers\Frontend\dashboard\SchoolRegisterationController;
use App\Http\Controllers\Frontend\dashboard\SchoolSessionsManagementController;
use App\Http\Controllers\Frontend\dashboard\SchoolClassesManagementController;
use App\Http\Controllers\Frontend\dashboard\SchoolpublishersManagementController;
use App\Http\Controllers\Frontend\dashboard\TitlesManagementController;
use App\Http\Controllers\Frontend\dashboard\DepartmentsManagementController;



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
//School Department...
Route::controller(DepartmentsManagementController::class)->group(function(){

    Route::get('school-department','index')->name('school-department.index');
    Route::get('school-department-add','add')->name('school-department.add');
    Route::get('school-department-edit/{departmentId}','edit')->name('school-department.edit');
    Route::get('school-department-delete/{departmentId}','destroy')->name('school-department.destroy');
   // Route::get('school-publisher-details/{publisherId}','details')->name('school-publisher.details');


    Route::post('school-department-store','store')->name('school-department.store');
    Route::post('school-department-update/{departmentId}','update')->name("school-department.update");

});

//End school Departments.


//Titles route
Route::controller(TitlesManagementController::class)->group(function(){

    Route::get('school-title','index')->name('school-title.index');
    Route::get('school-title-add','add')->name('school-title.add');
    Route::get('school-title-edit/{titleId}','edit')->name('school-title.edit');
    Route::get('school-title-delete/{titleId}','destroy')->name('school-title.destroy');
   // Route::get('school-publisher-details/{publisherId}','details')->name('school-publisher.details');


    Route::post('school-title-store','store')->name('school-title.store');
    Route::post('school-title-update/{titleId}','update')->name("school-title.update");

});


//end titles route..


//Publishers management

Route::controller(SchoolpublishersManagementController::class)->group(function(){

     Route::get('school-publisher','index')->name('school-publisher.index');
     Route::get('school-publisher-add','add')->name('school-publisher.add');
     Route::get('school-publisher-edit/{publisherId}','edit')->name('school-publisher.edit');
     Route::get('school-publisher-delete/{publisherId}','destroy')->name('school-publisher.destroy');
     Route::get('school-publisher-details/{publisherId}','details')->name('school-publisher.details');


    Route::post('school-publisher-store','store')->name('school-publisher.store');
    Route::post('school-publisher-update/{publisherId}','update')->name("school-publisher.update");

});


//publisher management end.

//School Class routes

Route::controller(SchoolClassesManagementController::class)->group(function(){

    Route::get('school-class','index')->name('school-class.index');
    Route::get('school-class-add','add')->name('school-class.add');
    Route::get('school-class-edit/{classId}','Edit')->name('school-class.edit');
    Route::get('school-class-delete/{classId}','destroy')->name('school-class.destroy');


    Route::post('school-class-store','store')->name('school-class.store');
    Route::post('school-class-update/{classId}','update')->name("school-class.update");

});

//school class route end.

//School sessions
Route::controller(SchoolSessionsManagementController::class)->group(function(){
    Route::get('school-session','index')->name('school-session.index');
    Route::get('school-session-add','add')->name('school-session.add');
    Route::get('school-session-edit/{sessionId}','Edit')->name('school-session.Edit');
    Route::get('school-session-delete/{sessionId}','destroy')->name('school-session.destroy'); //done.
    Route::get('school-session-details/{sessionId}','details')->name('school-session.details');

    Route::post('school-session-store','store')->name('school-session.store');
    Route::post('school-session-update/{sessionId}','update')->name('school-session.update');

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
