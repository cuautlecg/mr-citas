<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Specialties
//Retorna vistas
Route::get('/specialties', 'SpecialtyController@index');
Route::get('/specialties/create', 'SpecialtyController@create'); //Ruta del formulario de registro
Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit');

//Creación de recursos
Route::post('/specialties', 'SpecialtyController@store');// Envio del form de creación
Route::put('/specialties/{specialty}', 'SpecialtyController@update');
Route::delete('/specialties/{specialty}', 'SpecialtyController@destroy');

//Doctors
Route::resource('doctors', 'DoctorController');

//Patients
Route::resource('patients', 'PatientController');
