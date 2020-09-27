<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/public/login', function () {
    return redirect('login');
});
Route::get('/public/register', function () {
    return redirect('register');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
Route::group(['middleware' => 'auth'], function(){
	// ******** Apply Courses *******
	Route::get('/apply', 'HomeController@applycourse')->name('applyCourse');
	Route::get('/apply/list', 'HomeController@showApplicants')->name('applyList');
	Route::post('/apply/store', 'HomeController@applyStore')->name('applyStore');
	Route::post('/apply/bulk', 'HomeController@applyBulk')->name('applyBulk');
	Route::post('/apply/enrol', 'HomeController@enrolApplicants')->name('enrol.applicant');
	Route::get('/apply/{id}/destroy', 'HomeController@applyDestroy')->name('applyDestroy');
});
Route::group(['middleware' => ['auth', 'can:passAdmin']], function () {
	// ******** Classes *******
	Route::get('/classes', 'PeriodController@index')->name('class.index');
	Route::post('/class/store', 'PeriodController@store')->name('class.store');
	Route::get('/class/{id}/destroy', 'PeriodController@destroy')->name('class.destroy');
	
	// ******* Courses ******* 
	// Route::get('courses', 'CourseController@index')->name('course.index');
	Route::get('/courses', 'CourseController@index')->name('course.index');
	Route::get('/course/add', 'CourseController@create')->name('course.new');
	Route::post('/course/store', 'CourseController@store')->name('course.store');
	Route::get('/course/{id}/edit', 'CourseController@edit')->name('course.edit');
	Route::put('/course/{id}', 'CourseController@update')->name('course.update');
	Route::get('/course/{id}/destroy', 'CourseController@destroy')->name('course.destroy');

	// ******* Grades ******* 
	Route::get('/grades', 'GradeController@index')->name('group.index');
	Route::get('/grade/add', 'GradeController@create')->name('group.new');
	Route::post('/grade/store', 'GradeController@store')->name('group.store');
	Route::get('/grade/{id}/edit', 'GradeController@edit')->name('group.edit');
	Route::put('/grade/{id}', 'GradeController@update')->name('group.update');
	Route::get('/grade/{id}/destroy', 'GradeController@destroy')->name('group.destroy');
	

	// ******* Offered Courses ******* 
	Route::get('/offered-courses', 'OfferedCourseController@index')->name('offeredcourse.index');
	Route::get('/offered-courses/add', 'OfferedCourseController@create')->name('offeredcourse.new');
	Route::post('/offered-courses/store', 'OfferedCourseController@store')->name('offeredcourse.store');
	Route::get('/offered-courses/{id}/destroy', 'OfferedCourseController@destroy')->name('offeredcourse.destroy');

	// ******* Portal Users ******* 
	Route::get('/users', 'UserController@index')->name('user.index');
	Route::get('/user/{id}/destroy', 'UserController@destroy')->name('user.destroy');
	Route::get('/user/add', 'UserController@create')->name('user.new');
	Route::post('/user/store', 'UserController@store')->name('user.store');

	// ******* Enroll Students ******* ### NOT DONE
	Route::get('/enrol', 'EnrollmentController@index')->name('enrolstudent.index');
	Route::get('/enrol/add', 'EnrollmentController@create')->name('enrolstudent.new');
	Route::post('/enrol/store', 'EnrollmentController@store')->name('enrolstudent.store');
	Route::get('/enrol/{id}/destroy', 'EnrollmentController@destroy')->name('enrolstudent.destroy');
	Route::get('/course/{id}/details', 'EnrollmentController@show')->name('group.details');
	Route::post('/course/{id}/enrol', 'EnrollmentController@store')->name('group.enrol');
	Route::post('/course/{id}/delete', 'EnrollmentController@destroy')->name('group.enroldelete');
});
Route::group(['middleware' => 'auth'], function () {
	Route::get('/offered-courses/a', 'OfferedCourseController@crseate')->name('page.index');
	// Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});


