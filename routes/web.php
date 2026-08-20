<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\SocialAuthController;

use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\InvoiceController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AppController::class, 'homepage'])->name('homepage');


// Route::prefix('/dashboard')->group(function(){
//     Route::get('/admin', [AppController::class, 'admin_dashboard'])->name('dashboard.admin');
// });


Route::get('/sign_up', [RegisterController::class, 'show_sign_up'])->name('sign_up.show');
Route::get('/login', [LoginController::class, 'show_sign_in'])->name('login');
Route::get('/forgot_password', [ForgetPasswordController::class, 'forgot_password'])->name('forgot.password');
Route::get('/reset_password/{token}', [ResetPasswordController::class, 'reset_password'])->name('password.reset');

Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::post('/sign_in', [LoginController::class, 'store'])->name('sign_in');


Route::post('/logout',[LoginController::class,'destroy'])->middleware('auth')->name('logout');

Route::middleware(['auth','role:admin'])->group(function () {


    // Route::post('/dashboard/admin/add_room', [RoomController::class, 'add_room']);

    Route::prefix('/dashboard')->group(function(){
        Route::get('/admin/update_room/{room}', [RoomController::class, 'show_update_room'])->name('update.room');
        Route::get('/admin', [AppController::class, 'admin_dashboard'])->name('dashboard.admin');
        Route::post('/admin/add_room', [RoomController::class, 'add_room']);
        Route::put('/admin/update_room/{room}', [RoomController::class, 'update_room'])->name('rooms.update');
        Route::delete('/admin/delete_room/{room}', [RoomController::class, 'destroy'])->name('admin.rooms.destroy');
    });

});

Route::middleware(['auth', 'verified', 'role:guest|admin'])->group(function(){
    Route::get('/rooms', [RoomController::class, 'rooms'])->name('rooms');
    Route::get('/rooms/view_room/{room}', [RoomController::class, 'view_room'])->name('view.room');
    Route::get('/room/{room}/book_room', [BookingController::class, 'book_room'])->name('book.room');
    Route::get('/room/{room}/booking_details', [BookingController::class, 'show_booking_details'])->name('booking.details');
    Route::post('/room/{room}/book_room', [BookingController::class, 'store_booking'])->name('store.booking');

    Route::get('/room/user_bookings', [BookingController::class, 'view_user_booking'])->name('user.booking');

    //  Invoice Routing
    Route::get('/booking/{room}/invoice/download', [InvoiceController::class, 'downloadInvoice'])->name('booking.invoice.download');
});



Route::get('/email/verify', [VerificationController::class, 'notice'])
    ->name('verification.notice');

// Note: NO 'auth' middleware — this is what allows auto-login on click
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware('signed')
    ->name('verification.verify');

Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

// routes/web.php

Route::get('/auth/google', [SocialAuthController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [SocialAuthController::class, 'callback']);
