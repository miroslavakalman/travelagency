<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TripController;

Route::post('/submit-trip', [TripController::class, 'submit'])->name('submit.trip');

Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');

Route::post('/bookings/{id}/cancel', [UserProfileController::class, 'cancelBooking'])->name('bookings.cancel');
Route::post('/bookings/{id}/update', [UserProfileController::class, 'updateBooking'])->name('bookings.update');

Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index')->middleware('auth');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('reviews', ReviewController::class);
});

// Для отображения всех туров (пользовательская часть)
Route::get('/tours/show', [TourController::class, 'showAll'])->name('tours.showAll');

// Для отображения всех туров (дополнительная логика)
Route::get('/tours/index', action: [TourController::class, 'index'])->name('tours.index'); 

// Для отображения конкретного тура
Route::get('/tours/{tour}', [TourController::class, 'show'])->name('tours.show');

// Бронирование и отзывы

Route::post('/tours/{tour}/book', [TourController::class, 'book'])->name('tours.book');
Route::post('/tours/{tour}/review', [TourController::class, 'storeReview'])->name('tours.review');

// Административные маршруты
Route::get('/admin/tours', [TourController::class, 'adminIndex'])->name('admin.tours.index');
Route::get('/admin/tours/create', [TourController::class, 'create'])->name('admin.tours.create');
Route::post('/admin/tours', [TourController::class, 'store'])->name('admin.tours.store');
Route::get('/admin/tours/{tour}/edit', [TourController::class, 'edit'])->name('admin.tours.edit');
Route::put('/admin/tours/{tour}', [TourController::class, 'update'])->name('admin.tours.update');
Route::delete('/admin/tours/{tour}', [TourController::class, 'destroy'])->name('admin.tours.destroy');

// Главная страница
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
