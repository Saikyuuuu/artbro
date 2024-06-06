<?php

use App\Http\Controllers\AdminArtistsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPaymentsController;
use App\Http\Controllers\AdminProjectsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\Artist\ArtistDashboardController;
use App\Http\Controllers\Artist\ArtistCustomersController;
use App\Http\Controllers\Artist\ArtistProjectsController;
use App\Http\Controllers\Artist\ProjectDetailsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ClientArtsController;
use App\Http\Controllers\ClientHomeController;
use App\Http\Controllers\ClientOrdersController;
use App\Http\Controllers\ClientPaymentsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaypalPaymentController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\SignOutController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CartController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(['web'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome')->middleware('throttle:30,1');

    Route::resource("/login", LoginController::class)->middleware('throttle:30,1');

    Route::post("/signup", [LoginController::class, 'signUp'])->name('signUp')->middleware('throttle:30,1');

    Route::resource("/client_home", ClientHomeController::class)->middleware('throttle:30,1');

    Route::resource("/admin_dashboard", AdminDashboardController::class)->middleware('throttle:30,1');

    Route::resource("/admin_users", AdminUsersController::class)->middleware('throttle:30,1');

    Route::resource("/admin_banner", BannerController::class)->middleware('throttle:30,1');

    Route::resource("/admin_artists", AdminArtistsController::class)->middleware('throttle:30,1');

    Route::get("/signout", [SignOutController::class, 'index'])->middleware('throttle:30,1');

    Route::resource("/artist_dashboard", ArtistDashboardController::class)->middleware('throttle:30,1');

    Route::resource("/artist_projects", ArtistProjectsController::class)->middleware('throttle:30,1');

    Route::resource("/artist_customers", ArtistCustomersController::class)->middleware('throttle:30,1');

    Route::resource("/artist_project_detail", ProjectDetailsController::class)->middleware('throttle:30,1');

    Route::resource("/orders", ClientOrdersController::class)->middleware('throttle:30,1');
    

    Route::resource("/cart", CartController::class)->middleware('throttle:30,1');

    Route::patch('/cart/update/{id}', 'CartController@update')->name('cart.update');

    Route::post('/add-to-cart', [ClientArtsController::class, 'addToCart'])->name('addToCart');
    
    Route::resource("/arts", ClientArtsController::class, )->middleware('throttle:30,1');
    Route::get('/search', [ClientArtsController::class, 'search'])->middleware('throttle:30,1');

    Route::resource("/payments", ClientPaymentsController::class)->middleware('throttle:30,1');

    Route::resource("/admin_payments", AdminPaymentsController::class)->middleware('throttle:30,1');
    Route::resource("/admin_projects", AdminProjectsController::class)->middleware('throttle:30,1');

    Route::get('/paypal', [PaypalPaymentController::class, 'payWithPayPal'])->name('paypal')->middleware('throttle:30,1');
    Route::get('/paypal/status', [PaypalPaymentController::class, 'payPalStatus'])->name('paypal.status')->middleware('throttle:30,1');

    Route::get('/payment_delete/{id}', [AdminPaymentsController::class, 'destroy']);
});


Route::get('payment', [SampleController::class, 'index']);
Route::post('charge', [SampleController::class, 'charge']);
Route::get('success', [SampleController::class, 'success']);
Route::get('error', [SampleController::class, 'error']);

Route::fallback(function () {
    return view('errors.404'); // Replace 'errors.404' with the actual view name for your 404 page
});
