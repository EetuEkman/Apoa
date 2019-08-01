<?php

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

/*
Route::get('/', function () {
    return view('login');
});
*/

//Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('/', 'HomeController@index');

Route::get('/users', 'UsersController@index');
Route::get('/users/{id}/edit', 'UsersController@edit');
Route::patch('users/{id}', 'UsersController@update');

Route::resource('groups', 'GroupsController');

Route::resource('assessments', 'AssessmentsController');

Route::resource('responses', 'ResponsesController');

Auth::routes();

/*
public function auth(array $options = [])
{
    // Authentication Routes...
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    if ($options['register'] ?? true) {
        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'Auth\RegisterController@register');
    }

    // Password Reset Routes...
    if ($options['reset'] ?? true) {
        $this->resetPassword();
    }

    // Email Verification Routes...
    if ($options['verify'] ?? false) {
        $this->emailVerification();
    }
}
*/

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/students', 'StudentsController@index');
Route::get('/students/{id}', 'StudentsController@show');

Route::get('/users/{id}/password', 'UsersController@changePasswordForm');
Route::patch('/users/{id}/password', 'UsersController@changePassword');
