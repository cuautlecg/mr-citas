<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth','admin'])->namespace('Admin')->group(function() {
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
});

Route::middleware(['auth','doctor'])->namespace('Doctor')->group(function() {
    Route::get('/schedule', 'ScheduleController@edit');
    Route::post('/schedule', 'ScheduleController@store');
});

Route::middleware('auth')->group(function(){
    Route::get('/appointments/create', 'AppointmentController@create');
    Route::post('/appointments', 'AppointmentController@store');
    //Response in JSON
    Route::get('/specialties/{specialty}/doctors', 'Api\SpecialtyController@doctors');
    Route::get('/api/schedule/hours', 'Api\ScheduleController@hours');
});

