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

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
Route::group(['middleware' => 'auth'], function(){
	
	// ******** Classes *******
	Route::get('/classes', 'ClassController@index')->name('class.index');
});
Route::group(['middleware' => 'auth'], function () {
	// ******* Courses ******* 
	// Route::get('courses', 'CourseController@index')->name('course.index');
	Route::get('/courses', 'CourseController@index')->name('course.index');
	Route::get('/course/add', 'CourseController@create')->name('course.new');
	Route::post('/course/store', 'CourseController@store')->name('course.store');
	Route::get('/course/{id}/edit', 'CourseController@edit')->name('course.edit');
	Route::put('/course/{id}', 'CourseController@update')->name('course.update');
	Route::get('/course/{id}/destroy', 'CourseController@destroy')->name('course.destroy');

	// ******* Groups ******* 
	Route::get('/groups', 'GroupController@index')->name('group.index');
	Route::get('/group/add', 'GroupController@create')->name('group.new');
	Route::post('/group/store', 'GroupController@store')->name('group.store');
	Route::get('/group/{id}/edit', 'GroupController@edit')->name('group.edit');
	Route::put('/group/{id}', 'GroupController@update')->name('group.update');
	Route::get('/group/{id}/destroy', 'GroupController@destroy')->name('group.destroy');
	

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
	Route::get('/group/{id}/details', 'EnrollmentController@show')->name('group.details');
	Route::post('/group/{id}/enrol', 'EnrollmentController@store')->name('group.enrol');
	Route::post('/group/{id}/delete', 'EnrollmentController@destroy')->name('group.enroldelete');
});
Route::group(['middleware' => 'auth'], function () {
	Route::get('/offered-courses/a', 'OfferedCourseController@crseate')->name('page.index');
	// Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

