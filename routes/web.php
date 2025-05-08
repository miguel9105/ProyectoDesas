<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

//ormCONSULTAS
Route::get('ormconsultas', [OrmController::class,'consultas']);

//adriana
Route::controller(UserController::class)->group(function(){
    Route::get('usse','enviar');
    Route::post('Userr','enviarUsuario')->name('User.enviarUsuario');
});
//miguel
Route::controller(PublicationController::class)->group(function ()  {
    Route::get('/publicacion','vista_publi');
    Route::post('/publicacion/respuesta','respuesta_publi')->name('Publication.respuesta_publi');
});
//michell
Route::controller(MessageController::class)->group(function ()  {
    Route::get('vistamensaje','enviar');
    Route::post('vistamensajes','store')->name('Message.store');
});
//david
Route::controller(RoleController::class)->group(function ()  {
    Route::get('/roles/create','create')->name('roles.create');
    Route::post('/roles','store')->name('roles.store');
});

//Kevin
Route::controller(NotificationController::class)->group(function () {
    Route::get('/notificacion', 'vista_notificacion')->name('notificacion.formulario');
    Route::post('/notificacion', 'respuesta_notificacion')->name('notificacion.respuesta_notificacion');
});

Route::get('/vite', function () {
    return view('index');
});
