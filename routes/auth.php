<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController; // ใช้ Controller สำหรับจัดการการเข้าสู่ระบบและออกจากระบบ
use App\Http\Controllers\Auth\ConfirmablePasswordController; // ใช้ Controller สำหรับยืนยันรหัสผ่าน
use App\Http\Controllers\Auth\EmailVerificationNotificationController; // ใช้ Controller สำหรับส่งอีเมลยืนยัน
use App\Http\Controllers\Auth\EmailVerificationPromptController; // ใช้ Controller สำหรับแจ้งเตือนการยืนยันอีเมล
use App\Http\Controllers\Auth\NewPasswordController; // ใช้ Controller สำหรับตั้งค่ารหัสผ่านใหม่
use App\Http\Controllers\Auth\PasswordController; // ใช้ Controller สำหรับอัปเดตรหัสผ่าน
use App\Http\Controllers\Auth\PasswordResetLinkController; // ใช้ Controller สำหรับการขอลิงก์รีเซ็ตรหัสผ่าน
use App\Http\Controllers\Auth\RegisteredUserController; // ใช้ Controller สำหรับการลงทะเบียนผู้ใช้งานใหม่
use App\Http\Controllers\Auth\VerifyEmailController; // ใช้ Controller สำหรับยืนยันอีเมล
use Illuminate\Support\Facades\Route; // ใช้ Facade สำหรับกำหนด Route

Route::middleware('guest')->group(function () { // กลุ่ม Route ที่ใช้งานได้เฉพาะผู้ที่ยังไม่ได้เข้าสู่ระบบ (guest)
    Route::get('register', [RegisteredUserController::class, 'create']) // แสดงฟอร์มลงทะเบียนผู้ใช้งาน
        ->name('register'); // ตั้งชื่อ Route เป็น "register"

    Route::post('register', [RegisteredUserController::class, 'store']); // บันทึกข้อมูลผู้ใช้งานใหม่

    Route::get('login', [AuthenticatedSessionController::class, 'create']) // แสดงฟอร์มเข้าสู่ระบบ
        ->name('login'); // ตั้งชื่อ Route เป็น "login"

    Route::post('login', [AuthenticatedSessionController::class, 'store']); // ประมวลผลข้อมูลเข้าสู่ระบบ

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create']) // แสดงฟอร์มขอลิงก์รีเซ็ตรหัสผ่าน
        ->name('password.request'); // ตั้งชื่อ Route เป็น "password.request"

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store']) // ส่งลิงก์รีเซ็ตรหัสผ่าน
        ->name('password.email'); // ตั้งชื่อ Route เป็น "password.email"

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create']) // แสดงฟอร์มรีเซ็ตรหัสผ่านพร้อม token
        ->name('password.reset'); // ตั้งชื่อ Route เป็น "password.reset"

    Route::post('reset-password', [NewPasswordController::class, 'store']) // บันทึกรหัสผ่านใหม่
        ->name('password.store'); // ตั้งชื่อ Route เป็น "password.store"
});

Route::middleware('auth')->group(function () { // กลุ่ม Route ที่ใช้งานได้เฉพาะผู้ที่เข้าสู่ระบบแล้ว (auth)
    Route::get('verify-email', EmailVerificationPromptController::class) // แสดงหน้าสำหรับแจ้งเตือนการยืนยันอีเมล
        ->name('verification.notice'); // ตั้งชื่อ Route เป็น "verification.notice"

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class) // ยืนยันอีเมลด้วย ID และ Hash ที่ได้รับ
        ->middleware(['signed', 'throttle:6,1']) // ใช้ middleware สำหรับตรวจสอบลายเซ็นและจำกัดคำขอ
        ->name('verification.verify'); // ตั้งชื่อ Route เป็น "verification.verify"

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store']) // ส่งการแจ้งเตือนยืนยันอีเมลอีกครั้ง
        ->middleware('throttle:6,1') // จำกัดคำขอส่งการแจ้งเตือน 6 ครั้งใน 1 นาที
        ->name('verification.send'); // ตั้งชื่อ Route เป็น "verification.send"

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show']) // แสดงฟอร์มยืนยันรหัสผ่าน
        ->name('password.confirm'); // ตั้งชื่อ Route เป็น "password.confirm"

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']); // ยืนยันรหัสผ่าน

    Route::put('password', [PasswordController::class, 'update']) // อัปเดตรหัสผ่านใหม่
        ->name('password.update'); // ตั้งชื่อ Route เป็น "password.update"

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy']) // ออกจากระบบ
        ->name('logout'); // ตั้งชื่อ Route เป็น "logout"
});
