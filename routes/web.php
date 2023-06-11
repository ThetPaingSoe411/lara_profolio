<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\admin\AdminController;

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

//login register
Route::redirect("/","login");
Route::get("loginPage",[AuthController::class,"loginPage"])->name("admin#login");
Route::get("registerPage",[AuthController::class,"registerPage"])->name("admin#register");

//login register covering middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
//dashboard
Route::get("dashboard",[AuthController::class,"dashboard"])->name("dashboard");
//................................admin..................................
//account
Route::group(["prefix"=>"account","middleware"=>"admin_auth"],function(){
    Route::get("Home",[AuthController::class,"Home"])->name("admin#Home");
    Route::get("create",[AuthController::class,"create"])->name("admin#passwordCreatePage");
    Route::post("passwordchange",[AuthController::class,"passwordChange"])->name("admin#passwordChange");
    Route::get("createPage",[AdminController::class,"createPage"])->name("admin#accountPage");
    Route::get("editPage",[AdminController::class,"editPage"])->name("admin#accounteditPage");
    Route::post("edit/{id}",[AdminController::class,"edit"])->name("admin#accountEdit");
});

//category
Route::group(["prefix"=>"category","middleware"=>"admin_auth"],function(){
    Route::get("list",[CategoryController::class,"list"])->name("admin#adminList");
    Route::get("categorypage",[CategoryController::class,"category"])->name("admin#category");
    Route::post("category",[CategoryController::class,"addCategory"])->name("admin#addCategory");
    Route::get("delete/{id}",[CategoryController::class,"categoryDelete"])->name("admin#delete");
    Route::get("editPage/{id}",[CategoryController::class,"categoryEditPage"])->name("admin#editPage");
    Route::post("edit",[CategoryController::class,"categoryEdit"])->name("admin#edit");

});
//admin
Route::group(["prefix"=>"Adminator","middleware"=>"admin_auth"],function(){
    Route::get("adminPage",[AdminController::class,"adminPage"])->name("admin#adminPage");
    Route::get("changeRolePage/{id}",[AdminController::class,"changeRolePage"])->name("admin#adminChangeRolePage");
    Route::post("changeRole",[AdminController::class,"roleChange"])->name("admin#adminroleChange");
    Route::get("adminDelete/{id}",[AdminController::class,"adminDelete"])->name("admin#adminDelete");
    Route::get("more/{id}",[AdminController::class,"adminMore"])->name("admin#adminMore");
    Route::get("list",[AdminController::class,"userListPage"])->name("admin#userListPage");
    Route::get("create/{id}",[AdminController::class,"userCreate"])->name("admin#userCreate");
    Route::post("change",[AdminController::class,"userChange"])->name("admin#userChange");
    Route::get("userDelete/{id}",[AdminController::class,"userDelete"])->name("admin#userDelete");
    Route::get("userMore/{id}",[AdminController::class,"userMore"])->name("admin#userMore");
});

//product
Route::group(["prefix"=>"product","middleware"=>"admin_auth"],function(){
Route::get("list",[ProductController::class,"ListPage"])->name("admin#productListPage");
Route::get("createPage",[ProductController::class,"createPage"])->name("admin#productCreatePage");
Route::post("create",[ProductController::class,"create"])->name("admin#productCreate");
Route::get("more/{id}",[ProductController::class,"more"])->name("admin#productMore");
Route::get("editPage/{id}",[ProductController::class,"editPage"])->name("admin#productEdit");
Route::post("update",[ProductController::class,"update"])->name("admin#productUpdate");
Route::get("delete/{id}",[ProductController::class,"delete"])->name("admin#productDelete");
});
Route::group(["prefix"=>"order","middleware"=>"admin_auth"],function(){
Route::get("list",[OrderController::class,"list"])->name("admin#orderList");
Route::get("status/change",[OrderController::class,"change"])->name("admin#StatusChange");
Route::get("delete/{id}",[OrderController::class,"delete"])->name("admin#StatusDelete");
Route::get("detail/{orderCode}",[OrderController::class,"detail"])->name("admin#orderDetail");
});
Route::group(["prefix"=>"book","middleware"=>"admin_auth"],function(){
Route::get("list",[bookController::class,"list"])->name("admin#bookingList");
Route::get("more/{id}",[bookController::class,"more"])->name("admin#bookingMore");
Route::get("delete/{id}",[bookController::class,"delete"])->name("admin#bookingDelete");
});
Route::group(["prefix"=>"contact","middleware"=>"admin_auth"],function(){
Route::get("list",[ContactController::class,"list"])->name("admin#contactList");
Route::get("more/{id}",[ContactController::class,"more"])->name("admin#contactMore");
Route::get("delete/{id}",[ContactController::class,"delete"])->name("admin#contactDelete");
});
//.................................user...........................................
//home
Route::group(["prefix"=>"customer","middleware"=>"user_auth"],function(){
Route::get("master",[UserController::class,"master"])->name("user#Master");
Route::get("homePage",[UserController::class,"home"])->name("user#home");
Route::get("account",[UserController::class,"account"])->name("user#account");
Route::get("edit",[UserController::class,"edit"])->name("user#accountedit");
Route::post("update",[UserController::class,"update"])->name("user#accountUpdate");
Route::get("profile",[UserController::class,"profile"])->name("user#accountProfile");
Route::post("change/password",[AuthController::class,"ChangingPassword"])->name("user#accountPassword");
Route::get("logoutPage",[AuthController::class,"logoutPage"])->name("user#logoutPage");
});
//product
Route::group(["prefix"=>"customer/product","middleware"=>"user_auth"],function(){
Route::get("menu",[ProductController::class,"UserMenuPage"])->name("user#productMenu");
Route::get("filter/{id}",[UserController::class,"UserProductFilter"])->name("user#productFilter");
});

Route::group(["prefix"=>"cart","middleware"=>"user_auth"],function(){
Route::get("detail/{id}",[CartController::class,"detail"])->name("user#productDetail");
Route::get("cart",[CartController::class,"UserCart"])->name("user#productCart");
Route::get("addcart",[CartController::class,"addCart"])->name("user#ajaxAddCart");
Route::get("order",[CartController::class,"order"])->name("user#ajaxOrder");
Route::get("history",[CartController::class,"history"])->name("user#History");
Route::get("clear/cart",[CartController::class,"clearCart"])->name("use#ajaxClearCart");
Route::get("remove/cart",[CartController::class,"removeCart"])->name("user#ajaxRemoveCart");
});

Route::group(["pefix"=>"book","middleware"=>"user_auth"],function(){
Route::post("table",[BookController::class,"bookTable"])->name("user#BookTable");
Route::post("contact",[BookController::class,"contact"])->name("user#BookContact");
});
});







