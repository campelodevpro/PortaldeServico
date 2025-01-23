<?php

declare(strict_types= 1);

use \App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/email', function () {
    $details = [
        'title' => 'Teste de E-mail no Mailpit',
        'body' => 'Este é um e-mail de teste enviado a partir do Laravel!'
    ];

    Mail::raw($details['body'], function ($message) use ($details) {
        $message->to('test@mailpit.test') // Endereço fictício para teste
                ->subject($details['title']);
    });

    return 'E-mail enviado com sucesso!';
});

Route::get('/', function () {
    return to_route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('comments', CommentController::class)
    ->only(['index','store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
