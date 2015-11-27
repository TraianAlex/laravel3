<?php

Route::resource('users', 'UsersController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);

Route::controller('/', 'HomeController');

// Route::get('/', function () {
//     return view('welcome');
// });
