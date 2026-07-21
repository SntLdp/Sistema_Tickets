<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Engineer\CategoryController;
use App\Http\Controllers\Engineer\CommentController;
use App\Http\Controllers\Engineer\DashboardController;
use App\Http\Controllers\Engineer\ReportController;
use App\Http\Controllers\Engineer\TicketController as EngineerTicketController;
use App\Http\Controllers\User\TicketController as UserTicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect(auth()->user()->isEngineer() ? route('engineer.dashboard') : route('user.tickets.index'));
    }

    return redirect('/login');
});

// ---- Invitado ----
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// ---- Módulo Usuario ----
Route::middleware('auth')->prefix('mis-tickets')->name('user.tickets.')->group(function () {
    Route::get('/', [UserTicketController::class, 'index'])->name('index');
    Route::get('/nuevo', [UserTicketController::class, 'create'])->name('create');
    Route::post('/', [UserTicketController::class, 'store'])->name('store');
    Route::get('/{ticket}', [UserTicketController::class, 'show'])->name('show');
});

// ---- Módulo Ingeniero ----
Route::middleware(['auth', 'engineer'])->prefix('panel')->name('engineer.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/tickets', [EngineerTicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/{ticket}', [EngineerTicketController::class, 'show'])->name('tickets.show');
    Route::patch('/tickets/{ticket}/estado', [EngineerTicketController::class, 'updateStatus'])->name('tickets.status');
    Route::patch('/tickets/{ticket}/clasificar', [EngineerTicketController::class, 'classify'])->name('tickets.classify');
    Route::post('/tickets/{ticket}/comentarios', [CommentController::class, 'store'])->name('tickets.comments.store');

    Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categorias', [CategoryController::class, 'store'])->name('categories.store');
    Route::patch('/categorias/{category}/toggle', [CategoryController::class, 'toggle'])->name('categories.toggle');

    Route::get('/reportes/diario', [ReportController::class, 'daily'])->name('reports.daily');
    Route::get('/reportes/diario/pdf', [ReportController::class, 'exportPdf'])->name('reports.daily.pdf');
    Route::get('/reportes/diario/excel', [ReportController::class, 'exportExcel'])->name('reports.daily.excel');
});
