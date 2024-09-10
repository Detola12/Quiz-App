<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('question/set', \App\Livewire\QuestionSet::class)->name('question.set');
Route::get('question/show', \App\Livewire\QuestionShow::class)->name('question.show');

Route::get('section/add', \App\Livewire\SectionSet::class)->name('section.add');

Route::get('question/edit/{question}', \App\Livewire\QuestionEdit::class)->name('question.edit');

require __DIR__.'/auth.php';
