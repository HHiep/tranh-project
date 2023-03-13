<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AuthenticateController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\TestController;
use GuzzleHttp\Middleware;

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

Route::get('user/register', [AuthenticateController::class, 'register'])->name('user.authenticate.register');
Route::get('user/alert', [AuthenticateController::class, 'postRegister'])->name('user.authenticate.postRegister');
Route::post('post_register', [AuthenticateController::class, 'postRegister'])->name('user.authenticate.postRegister');
Route::get('user/Logout', [AuthenticateController::class, 'logoutUse'])->name('admin.authenticate.logoutUse');
Route::get('user/login', [AuthenticateController::class, 'getLoginUser'])->name('users.authenticate.getLoginUser');
Route::post('post_LoginUser', [AuthenticateController::class, 'postLoginUser'])->name('users.authenticate.postLoginUser');


Route::get('forgotpassword', [AuthenticateController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('post_forgotpassword', [AuthenticateController::class, 'postForgotpassword'])->name('postForgotpassword');
Route::get('user/forgotpassword', [AuthenticateController::class, 'postForgotpassword'])->name('user.postForgotpassword');

Route::get('home', [HomeController::class, 'home'])->name('home');
Route::prefix('home')->middleware(['authenticate_homeuser'])->group(function () {
    Route::get('productcate', [HomeController::class, 'productCate'])->name('home.productcate');
    Route::get('detail', [HomeController::class, 'productDetail'])->name('home.productDetail');
    Route::get('cart', [HomeController::class, 'carts'])->name('home.carts');
    Route::get('productcart', [HomeController::class, 'getHomeListproduct'])->name('home.productcart');
    Route::get('reducesp', [HomeController::class, 'reducesp'])->name('home.reducesp');
    Route::get('addsp', [HomeController::class, 'addsp'])->name('home.addsp');
    Route::get('giohangus', [HomeController::class, 'giohangUsers'])->name('home.giohang');
    Route::get('removesp', [HomeController::class, 'removesp'])->name('home.removesp');
    Route::get('xacnhan', [HomeController::class, 'xacnhanusers'])->name('home.xacnhanusers');
});

Route::get('admin/Logout', [AuthenticateController::class, 'Logout'])->name('admin.authenticate.Logout');
Route::post('post_Login', [AuthenticateController::class, 'postLogin'])->name('admin.authenticate.postLogin');
Route::get('admin/login', [AuthenticateController::class, 'getLogin'])->name('admin.authenticate.getLogin');

Route::prefix('admin')->middleware(['authenticate_user'])->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('list', [CategoryController::class, 'CategoryList'])->name('admin.category.getList');
        Route::get('detail', [CategoryController::class, 'CategoryDetail'])->name('admin.category.getdetail');
        Route::get('add', [CategoryController::class, 'CategoryAdd'])->name('admin.category.getadd');
        Route::post('post_add', [CategoryController::class, 'CategoryPostAdd'])->name('admin.category.getpostadd');
        Route::get('update', [CategoryController::class, 'CategoryUpdate'])->name('admin.category.getupdate');
        Route::post('update', [CategoryController::class, 'CategoryPostUpdate'])->name('admin.category.getpostupdate');
        Route::get('deletedforever', [CategoryController::class, 'CategoryDeletedForever'])->name('admin.category.getdeletedforever');
        Route::get('deletedall', [CategoryController::class, 'CategoryDeletedAll'])->name('admin.category.getdeletedall');
        Route::get('deleted', [CategoryController::class, 'CategoryDeleted'])->name('admin.category.getdeleted');
        Route::get('rycle', [CategoryController::class, 'CategoryRycle'])->name('admin.category.getrycle');
        Route::get('restore', [CategoryController::class, 'CategoryRestore'])->name('admin.category.restore');
        Route::get('restoreall', [CategoryController::class, 'CategoryRestoreAll'])->name('admin.category.restoreall');
    });
    Route::prefix('product')->group(function () {
        Route::get('list', [ProductController::class, 'productList'])->name('admin.product.getproductList');
        Route::get('detail', [ProductController::class, 'getDetailproduct'])->name('admin.product.getdetail');
        Route::get('add', [ProductController::class, 'productGetAdd'])->name('admin.product.getadd');
        Route::post('post_add', [ProductController::class, 'productPostAdd'])->name('admin.product.getpostadd');
        Route::get('update', [ProductController::class, 'getUpdateProduct'])->name('admin.product.getupdate');
        Route::post('post_update', [ProductController::class, 'ProductPostUpdate'])->name('admin.product.getpostupdate');
        Route::get('deletedforever', [ProductController::class, 'delete'])->name('admin.product.getdeletedforever');
        Route::get('deletedall', [ProductController::class, 'deleteAll'])->name('admin.product.getdeletedall');
        Route::get('deleted', [ProductController::class, 'getDeleteProduct'])->name('admin.product.getdeleted');
        Route::get('rycle', [ProductController::class, 'rycl'])->name('admin.product.getrycle');
        Route::get('restore', [ProductController::class, 'restore'])->name('admin.product.restore');
        Route::get('restoreall', [ProductController::class, 'restoreAll'])->name('admin.product.restoreall');
    });
    Route::prefix('users')->group(function () {
        Route::get('listuser', [UsersController::class, 'listuser'])->name('admin.users.listuser');
        Route::get('list', [UsersController::class, 'list'])->name('admin.users.getList');
        Route::get('add', [UsersController::class, 'add'])->name('admin.users.getadd');
        Route::post('post_add', [UsersController::class, 'postAdd'])->name('admin.users.getpostadd');
        Route::get('deleted', [UsersController::class, 'deleted'])->name('admin.users.deleted');
        Route::get('profile', [UsersController::class, 'profile'])->name('admin.users.profile');
        Route::post('profile', [UsersController::class, 'postprofile'])->name('admin.users.postprofile');
        Route::get('updateuse', [UsersController::class, 'updateuse'])->name('admin.users.updateuse');
        Route::post('postupdateuse', [UsersController::class, 'postupdateuse'])->name('admin.users.postupdateuse');
    });
    Route::prefix('cart')->group(function () {
        Route::get('list', [CartController::class, 'cartList'])->name('admin.users.getcartlist');
        Route::get('giohang', [CartController::class, 'giohang'])->name('admin.users.giohang');
        Route::get('detailgiohang', [CartController::class, 'detailgiohang'])->name('admin.users.detailgiohang');
        Route::get('xacnhanadmin', [CartController::class, 'xacnhanadmin'])->name('admin.users.xacnhanadmin');
    });
});
