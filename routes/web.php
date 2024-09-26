<?php

use App\Livewire\Course\CourseCreateEdit;
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

// Route::redirect('/', '/data-table-with-crud');

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

// (new RouteBuilder('nav-admin'))->create();
