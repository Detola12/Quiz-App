<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard',['result' => \App\Models\Result::with('user')->get()])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('question/set', \App\Livewire\QuestionSet::class)->name('question.set');
Route::get('question/show', \App\Livewire\QuestionShow::class)->name('question.show');

Route::get('section/add', \App\Livewire\SectionSet::class)->name('section.add');

Route::get('question/edit/{question}', \App\Livewire\QuestionEdit::class)->name('question.edit');

Route::get('/quiz', \App\Livewire\Quiz::class)->name('quiz');


require __DIR__.'/auth.php';
