<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', fn () => redirect()->route('pengaturan.index'))->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Pengadaan
    Route::get('/admin/pengadaan', fn () => view('admin.pengadaan.index'))->name('pengadaan.index');
    Route::get('/admin/pengadaan/create', fn () => view('admin.pengadaan.create'))->name('pengadaan.create');
    Route::get('/admin/pengadaan/show', fn () => view('admin.pengadaan.show'))->name('pengadaan.show');

    // Aset
    Route::get('/admin/aset', fn () => view('admin.aset.index'))->name('aset.index');
    Route::get('/admin/aset/create', fn () => view('admin.aset.create'))->name('aset.create');
    Route::get('/admin/aset/show', fn () => view('admin.aset.show'))->name('aset.show');

    // User
    Route::get('/admin/user', fn () => view('admin.user.index'))->name('user.index');
    Route::get('/admin/user/create', fn () => view('admin.user.create'))->name('user.create');
    Route::get('/admin/user/show', fn () => view('admin.user.show'))->name('user.show');
    Route::get('/admin/user/edit', fn () => view('admin.user.edit'))->name('user.edit');

    // Monitoring
    Route::get('/admin/monitoring', fn () => view('admin.monitoring.index'))->name('monitoring.index');
    Route::get('/admin/monitoring/show', fn () => view('admin.monitoring.show'))->name('monitoring.show');

    // Inbox / Notifikasi
    Route::get('/admin/inbox', fn () => view('admin.inbox.index'))->name('inbox.index');

    // Pengaturan
    Route::get('/admin/pengaturan', fn () => view('admin.pengaturan.index'))->name('pengaturan.index');
});

require __DIR__.'/auth.php';
