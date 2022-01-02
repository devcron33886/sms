<?php

Route::get('/','HomeController@index')->name('welcome');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register'=>false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth','admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Category
    Route::delete('students/destroy', 'CategoryController@massDestroy')->name('students.massDestroy');
    Route::resource('students', 'CategoryController');

    // Question
    Route::delete('questions/destroy', 'QuestionController@massDestroy')->name('questions.massDestroy');
    Route::resource('questions', 'QuestionController');

    // Testimonial
    Route::delete('testimonials/destroy', 'TestimonialController@massDestroy')->name('testimonials.massDestroy');
    Route::resource('testimonials', 'TestimonialController');

    // Students
    Route::delete('students/destroy', 'StudentsController@massDestroy')->name('students.massDestroy');
    Route::resource('students', 'StudentsController');

    // Mentors
    Route::delete('mentors/destroy', 'MentorsController@massDestroy')->name('mentors.massDestroy');
    Route::resource('mentors', 'MentorsController');

    // Department
    Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
    Route::resource('departments', 'DepartmentController');

    // Overview
    Route::delete('overviews/destroy', 'OverviewController@massDestroy')->name('overviews.massDestroy');
    Route::resource('overviews', 'OverviewController');
});

//HOD
Route::group(['prefix' => 'hod', 'as' => 'hod.', 'namespace' => 'Hod', 'middleware' => ['auth','hod']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    // Testimonial
    Route::resource('testimonials', 'TestimonialController');

    // Students
    Route::post('students/media', 'StudentsController@storeMedia')->name('students.storeMedia');
    Route::post('students/ckmedia', 'StudentsController@storeCKEditorImages')->name('students.storeCKEditorImages');
    Route::resource('students', 'StudentsController');

    // Mentors
    Route::post('mentors/media', 'MentorsController@storeMedia')->name('mentors.storeMedia');
    Route::post('mentors/ckmedia', 'MentorsController@storeCKEditorImages')->name('mentors.storeCKEditorImages');
    Route::resource('mentors', 'MentorsController');

});
//Dean
Route::group(['prefix' => 'dean', 'as' => 'dean.', 'namespace' => 'Dean', 'middleware' => ['auth','dean']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    // Users
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');
    // Category
    Route::resource('students', 'CategoryController');

    // Testimonial
    Route::resource('testimonials', 'TestimonialController');
    // Students
    Route::resource('students', 'StudentsController');
    //Mentors
    Route::resource('mentors', 'MentorsController');
    // Department
    Route::resource('departments', 'DepartmentController');
    // HODS
    Route::resource('hods', 'HodController');
    //Category
    Route::resource('categories','CategoryController');
});
//Mentor
Route::group(['prefix' => 'mentor', 'as' => 'mentor.', 'namespace' => 'Mentor', 'middleware' => ['auth','mentor']], function () {
    Route::resource('dashboard','MentorController');
    //Questions
    Route::resource('questions', 'QuestionController');

    Route::resource('testimonials', 'TestimonialController');

    Route::resource('students', 'StudentsController');

});
//Students
Route::group(['prefix' => 'student', 'as' => 'student.', 'namespace' => 'Student', 'middleware' => ['auth','student']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    // Question
    Route::delete('questions/destroy', 'QuestionController@massDestroy')->name('questions.massDestroy');
    Route::resource('questions', 'QuestionController');

    // Testimonial
    Route::delete('testimonials/destroy', 'TestimonialController@massDestroy')->name('testimonials.massDestroy');
    Route::resource('testimonials', 'TestimonialController');

    // Mentors
    Route::resource('mentors', 'MentorsController');

    // Overview
    Route::resource('overviews', 'OverviewController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
