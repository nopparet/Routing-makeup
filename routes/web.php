<?php
 
use App\Http\Controllers\ChirpController; //กำหนดเส้นทางไปหา controller
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
 
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
 
Route::get('/dashboard', function () {//วิ่งหาไฟล์เดสบอด
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); //middleware ส่วนของป้องกันเบื้องต้น ไม่อยากให้ผู้ใช้เข้ามาโดยตรง
 
Route::middleware('auth')->group(function () { //ก่อนจะเข้าโปรไฟล์ต้องผ่าน auth ก่อน
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'update', 'destroy'])//ทำงานเข้าไปให้เห็น อินเดก สโตร อัปเดต เปิดคอนโทรเลอฟังชั่นอื่นจะไม่เห็นนอกเหนือจากนี้
    ->middleware(['auth', 'verified']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show'])->middleware(['auth', 'verified']);
    
 
require __DIR__.'/auth.php';