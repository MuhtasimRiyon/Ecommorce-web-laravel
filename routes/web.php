<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BusinessController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\MarketerController;
use App\Http\Controllers\Backend\VisitController;
use App\Http\Controllers\Backend\TargetController;
use App\Http\Controllers\Backend\ComissionController;
use App\Http\Controllers\Backend\InfoboxController;

use App\Http\Controllers\Frontend\IndexCrontroller;
use App\Http\Controllers\Frontend\LanguageController;

use App\Models\User;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function(){

    //admin all route
    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard')->middleware('auth:admin');

    Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile',[AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit',[AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store',[AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/profile/change/password',[AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('/admin/profile/update/password',[AdminProfileController::class, 'adminUpdatePassword'])->name('update.change.password');

});

//user all route
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

//Home page
Route::get('/',[IndexCrontroller::class, 'index']);
Route::get('/user/logout',[IndexCrontroller::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile',[IndexCrontroller::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store',[IndexCrontroller::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password',[IndexCrontroller::class, 'UserChangePass'])->name('change.password');
Route::post('/user/password/update',[IndexCrontroller::class, 'UserPassUpdate'])->name('user.pass.update');


// ######################### Freelance IT Lab start ##########################

// admin business all routes
// Route::prefix('business')->group(function(){
//     Route::get('/view',[BusinessController::class, 'BusinessView'])->name('new.business');
//     Route::post('/store',[BusinessController::class, 'businessStore'])->name('business.store');
//     Route::get('/view/all',[BusinessController::class, 'AllBusinessView'])->name('all.business');
//     Route::get('/edit/{id}',[BusinessController::class, 'businessEdit'])->name('business.edit');
//     Route::post('/update',[BusinessController::class, 'BusinessUpdate'])->name('business.update');
//     Route::get('/delete/{id}',[BusinessController::class, 'businessDelete'])->name('business.delete');
// });

// // admin marketer all routes
// Route::prefix('marketer')->group(function(){
//     Route::get('/view',[MarketerController::class, 'MarketerView'])->name('new.marketer');
//     Route::post('/store',[MarketerController::class, 'MarketerStore'])->name('marketer.store');
//     Route::get('/view/all',[MarketerController::class, 'AllMarketerView'])->name('all.marketer');
//     Route::get('/edit/{id}',[MarketerController::class, 'MarketerEdit'])->name('marketer.edit');
//     Route::post('/update',[MarketerController::class, 'MarketerUpdate'])->name('marketer.update');
//     Route::get('/delete/{id}',[MarketerController::class, 'MarketerDelete'])->name('marketer.delete');
// });

// // admin Visit all routes
// Route::prefix('visit')->group(function(){
//     Route::get('/view',[VisitController::class, 'newVisit'])->name('new.visit');
//     Route::post('/store',[VisitController::class, 'VisitStore'])->name('visit.store');
//     Route::any('/view/all',[VisitController::class, 'AllVisitView'])->name('all.visit');
//     Route::get('/edit/{id}',[VisitController::class, 'VisitEdit'])->name('visit.edit');
//     Route::post('/update',[VisitController::class, 'VisitUpdate'])->name('visit.update');
//     Route::get('/delete/{id}',[VisitController::class, 'VisitDelete'])->name('visit.delete');

//     // for getting zilah and upozilah
//     Route::post('/district-list', [App\Http\Controllers\VisitController::class, 'districtList'])->name('district-list');
//     Route::post('/upazila-list', [App\Http\Controllers\VisitController::class, 'upazilaList'])->name('upazila-list');
//     Route::post('/union-list', [App\Http\Controllers\VisitController::class, 'unionList'])->name('union-list');

// });

// // admin target all routes
// Route::prefix('target')->group(function(){
//     Route::get('/view',[TargetController::class, 'setTarget'])->name('set.target');
//     Route::post('/store',[TargetController::class, 'targetStore'])->name('target.store');
//     Route::any('/view/all',[TargetController::class, 'AlltargetView'])->name('all.target');
//     Route::get('/edit/{id}',[TargetController::class, 'targetEdit'])->name('target.edit');
//     Route::post('/update',[TargetController::class, 'targetUpdate'])->name('target.update');
//     Route::get('/delete/{id}',[TargetController::class, 'targetDelete'])->name('target.delete');

// });

// // admin comission all routes
// Route::prefix('comission')->group(function(){
//     Route::get('/view',[ComissionController::class, 'newComission'])->name('new.comission');
//     Route::post('/store',[ComissionController::class, 'comissionStore'])->name('comission.store');
//     Route::any('/view/all',[ComissionController::class, 'AllcomissionView'])->name('all.comission');
//     Route::get('/edit/{id}',[ComissionController::class, 'comissionEdit'])->name('commission.edit');
//     Route::post('/update',[ComissionController::class, 'comissionUpdate'])->name('comission.update');
//     Route::get('/delete/{id}',[ComissionController::class, 'comissionDelete'])->name('commission.delete');

// });

// // admin Transaction all routes
// Route::prefix('transaction')->group(function(){
//     Route::get('/view',[TransactionController::class, 'newTransaction'])->name('new.transaction');
//     Route::post('/store',[TransactionController::class, 'transactionStore'])->name('transaction.store');
//     Route::get('/view/all',[TransactionController::class, 'AllTransactionView'])->name('all.transaction');
//     Route::get('/edit/{id}',[TransactionController::class, 'transactionEdit'])->name('transaction.edit');
//     Route::post('/update',[TransactionController::class, 'TransactionUpdate'])->name('transaction.update');
//     Route::get('/delete/{id}',[TransactionController::class, 'transactionDelete'])->name('transaction.delete');
// });

// ######################### Freelance IT Lab End ##########################


// ################# backend routes ################

// admin brand all routes
Route::prefix('brand')->group(function(){
    Route::get('/view',[BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/store',[BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}',[BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update',[BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}',[BrandController::class, 'BrandDelete'])->name('brand.delete');
});

// admin category all routes
Route::prefix('category')->group(function(){
    Route::get('/view',[CategoryController::class, 'CategoryView'])->name('all.category');
    Route::post('/store',[CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update',[CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class, 'CategoryDelete'])->name('category.delete');
});

// admin sub category all routes
Route::prefix('category/sub')->group(function(){
    Route::get('/view',[SubCategoryController::class, 'SubCategoryView'])->name('all.SubCategory');
    Route::post('/store',[SubCategoryController::class, 'SubCategoryStore'])->name('Subcategory.store');
    Route::get('/edit/{id}',[SubCategoryController::class, 'SubCategoryEdit'])->name('Subcategory.edit');
    Route::post('/update',[SubCategoryController::class, 'SubCategoryUpdate'])->name('Subcategory.update');
    Route::get('/delete/{id}',[SubCategoryController::class, 'SubCategoryDelete'])->name('Subcategory.delete');
});

// admin sub-sub category all routes
Route::prefix('category/sub/sub')->group(function(){
    Route::get('/view',[SubCategoryController::class, 'SubSubCategoryView'])->name('all.SubSubCategory');
    Route::post('/store',[SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/edit/{id}',[SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/update',[SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/delete/{id}',[SubCategoryController::class, 'subsubCategoryDelete'])->name('subsubcategory.delete');
    Route::get('/category/ajax/{category_id}',[SubCategoryController::class, 'GetSubCategory']);
    Route::get('getsubsubcat/ajax/{subcategory_id}',[SubCategoryController::class, 'GetSubSubCategory']);
});

// admin products all routes
Route::prefix('product')->group(function(){
    Route::get('/add',[ProductController::class, 'AddProduct'])->name('add.product');
    Route::post('/store',[ProductController::class, 'StoreProduct'])->name('product.store');
    Route::get('/manage',[ProductController::class, 'ManageProduct'])->name('manage.product');
    Route::get('/edit/{id}',[ProductController::class, 'EditProduct'])->name('product.edit');
    Route::post('/data/update',[ProductController::class, 'UpdateProductData'])->name('product.update');
    Route::post('/image/update',[ProductController::class, 'UpdateProductMulImg'])->name('update.product.mulimg');
    Route::post('/thambnail/update',[ProductController::class, 'UpdateProductImg'])->name('update.product.thambnail');
    Route::get('/multi-img/delete/{id}',[ProductController::class, 'MultiImgDlt'])->name('multiImg.Dlt');
    Route::get('/inactive/{id}',[ProductController::class, 'InActiveProduct'])->name('product.inactive');
    Route::get('/active/{id}',[ProductController::class, 'ActiveProduct'])->name('product.active');
    Route::get('/delete/{id}',[ProductController::class, 'ProductDelete'])->name('product.delete');
});

// admin slider all routes
Route::prefix('slider')->group(function(){
    Route::get('/view',[SliderController::class, 'SliderView'])->name('manage.slider');
    Route::post('/store',[SliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('/edit/{id}',[SliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('/update',[SliderController::class, 'SliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}',[SliderController::class, 'SliderDelete'])->name('slider.delete');
    Route::get('/inactive/{id}',[SliderController::class, 'InActiveSlider'])->name('slider.inactive');
    Route::get('/active/{id}',[SliderController::class, 'ActiveSlider'])->name('slider.active');
});

// admin slider all routes
Route::prefix('infobox')->group(function(){
    Route::get('/view',[InfoboxController::class, 'infoboxView'])->name('manage.infobox');
    Route::post('/store',[InfoboxController::class, 'infoboxStore'])->name('infobox.store');
    Route::get('/edit/{id}',[InfoboxController::class, 'infoboxEdit'])->name('infobox.edit');
    Route::post('/update',[InfoboxController::class, 'infoboxUpdate'])->name('infobox.update');
    Route::get('/delete/{id}',[InfoboxController::class, 'infoboxDelete'])->name('infobox.delete');
    Route::get('/inactive/{id}',[InfoboxController::class, 'InActiveInfobox'])->name('infobox.inactive');
    Route::get('/active/{id}',[InfoboxController::class, 'ActiveInfobox'])->name('infobox.active');
});

// ################# frontend routes ################

// language all routes
Route::get('/language/english',[LanguageController::class, 'English'])->name('english.language');
Route::get('/language/bangla',[LanguageController::class, 'Bangla'])->name('bangla.language');

// ################# Product details page url ##########################
Route::get('/product/details/{id}/{slug}',[IndexCrontroller::class, 'ProductDetails']);