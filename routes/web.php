<?php

use App\Livewire\Course\CourseCreateEdit;
use App\Livewire\User\UserCreateEdit;
use Illuminate\Support\Facades\Route;
use Naykel\Gotime\RouteBuilder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

(new RouteBuilder('nav-main'))->create();

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::prefix('courses')->name('courses')->group(function () {
    Route::get('/{course}/edit', CourseCreateEdit::class)->name('.edit');
    Route::get('/create', CourseCreateEdit::class)->name('.create');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('users')->name('users')->group(function () {
    Route::get('/create', UserCreateEdit::class)->name('.create');
    Route::get('/{user}/edit', UserCreateEdit::class)->name('.edit');
});
