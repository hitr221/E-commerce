<?php

use App\Http\Controllers\AdminOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [MyCommerceController::class, 'index'])->name('home');
Route::get('/product-category/{id}', [MyCommerceController::class, 'category'])->name('product-category');
Route::get('/product-detail/{id}', [MyCommerceController::class, 'detail'])->name('product-detail');
Route::post('/add-to-cart/{id}', [CartController::class, 'index'])->name('add-to-cart');
Route::get('/show-cart', [CartController::class, 'show'])->name('show-cart');
Route::get('/remove-cart-product/{id}', [CartController::class, 'remove'])->name('remove-cart-product');
Route::post('/update-cart-product/{id}', [CartController::class, 'update'])->name('update-cart-product');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/customer-email-check', [CheckoutController::class, 'checkCustomerEmail'])->name('customer-email-check');
Route::post('/new-cash-order', [CheckoutController::class, 'newCashOrder'])->name('new-cash-order');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder'])->name('complete-order');

Route::get('/customer-login', [CustomerAuthController::class, 'index'])->name('customer.login');
Route::post('/customer-login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::post('/customer-register', [CustomerAuthController::class, 'register'])->name('customer.register');

Route::middleware(['customer'])->group(function(){
    Route::get('/customer-dashboard', [CustomerAuthController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/customer-profile', [CustomerAuthController::class, 'profile'])->name('customer.profile');
    Route::get('/customer-order', [CustomerOrderController::class, 'allOrder'])->name('customer.order');
    Route::get('/customer-logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
    Route::get('/customer-account', [CustomerAuthController::class, 'account'])->name('customer.account');
    Route::get('/customer-password', [CustomerAuthController::class, 'password'])->name('customer.password');
});





Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/category/add', [CategoryController::class, 'index'])->name('category.add');
    Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::post('/category/new', [CategoryController::class, 'create'])->name('category.new');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

    
    Route::get('/sub-category/add', [SubCategoryController::class, 'index'])->name('sub-category.add');
    Route::get('/sub-category/manage', [SubCategoryController::class, 'manage'])->name('sub-category.manage');
    Route::post('/sub-category/new', [SubCategoryController::class, 'create'])->name('sub-category.new');
    Route::get('/sub-category/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub-category.delete');
    Route::get('/sub-category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub-category.edit');
    Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('sub-category.update');
    
    Route::get('/brand/add', [BrandController::class, 'index'])->name('brand.add');
    Route::get('/brand/manage', [BrandController::class, 'manage'])->name('brand.manage');
    Route::post('/brand/new', [BrandController::class, 'create'])->name('brand.new');
    Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    
    Route::get('/unit/add', [UnitController::class, 'index'])->name('unit.add');
    Route::get('/unit/manage', [UnitController::class, 'manage'])->name('unit.manage');
    Route::post('/unit/new', [UnitController::class, 'create'])->name('unit.new');
    Route::get('/unit/delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');
    Route::get('/unit/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');

    
});

