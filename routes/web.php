<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ConocenosController;

Route::get('/', [ConocenosController::class, 'Home'])->name('home');

// Panel de usuario (requiere autenticación)
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

Route::get('/publications', [PublicationController::class, 'index'])->name('publications.index');
Route::post('/publications', [PublicationController::class, 'store'])->name('publications.store');
Route::get('/publications/{publication}', [PublicationController::class, 'show'])->name('publications.show');
Route::put('/publications/{publication}', [PublicationController::class, 'update'])->name('publications.update');
Route::delete('/publications/{publication}', [PublicationController::class, 'destroy'])->name('publications.destroy');



//ormCONSULTAS
Route::get('ormconsultas', [OrmController::class,'consultas']);


// OrmConsultas
Route::get('ormconsultas', [OrmController::class, 'consultas']);

// Adriana
Route::controller(UserController::class)->group(function () {
    Route::get('usse', 'enviar');
    Route::post('Userr', 'enviarUsuario')->name('User.enviarUsuario');
});

// Miguel
Route::controller(PublicationController::class)->group(function () {
    Route::get('/publicacion', 'vista_publi');
    Route::post('/publicacion/respuesta', 'respuesta_publi')->name('Publication.respuesta_publi');
});

// david - Chat / Mensajes
Route::get('/vistamensaje', [MessageController::class, 'enviar'])->name('Message.enviar');
Route::post('/vistamensajes', [MessageController::class, 'store'])->name('Message.store');

// David - Roles
Route::controller(RoleController::class)->group(function () {
    Route::get('/roles/create', 'create')->name('roles.create');
    Route::post('/roles', 'store')->name('roles.store');
});

// Kevin - Notificaciones
Route::controller(NotificationController::class)->group(function () {
    Route::get('/notificacion', 'vista_notificacion')->name('notificacion.formulario');
    Route::post('/notificacion', 'respuesta_notificacion')->name('notificacion.respuesta_notificacion');
});




// Ruta para la vista 'conocenos'
Route::get('/conocenos', [ConocenosController::class, 'index'])->name('conocenos.index');


