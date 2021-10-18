<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\CategoryComponent;
use App\Http\Livewire\Admin\ProductAddComponent;
use App\Http\Livewire\Admin\ProductComponent;
use App\Http\Livewire\Admin\ProductEditComponent;
use App\Http\Livewire\Admin\ProductShowComponent;
use App\Http\Livewire\Admin\UserCreateComponent;
use App\Http\Livewire\Admin\UserTableComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',HomeComponent::class);

// User Route

Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/user/dashboard',AdminDashboardComponent::class)->name('user.dashboard');
});

// Admin Route

Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/users-table',UserTableComponent::class)->name('admin.all_users');
    Route::get('/admin/category',CategoryComponent::class)->name('admin.categories');
    Route::get('/admin/products',ProductComponent::class)->name('admin.products');
    Route::get('/admin/users-create',UserCreateComponent::class)->name('admin.create_user');
    Route::get('/admin/add-product',ProductAddComponent::class)->name('admin.add-product');
    Route::get('/admin/edit-product/{slug}',ProductEditComponent::class)->name('admin.edit-product');
    Route::get('/admin/show-product/{slug}',ProductShowComponent::class)->name('admin.show-product');

});
