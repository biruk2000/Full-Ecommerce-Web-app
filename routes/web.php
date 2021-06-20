<?php



Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


        // Admin Section
        // category 

Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@storeCategory')->name('store.category');
// Route::get('delete/category/{id}', 'Admin\Category\CategoryController@deleteCategory');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@deleteCategory');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@editCategory');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@updateCategory');

// Brand 
Route::get('admin/brands', 'Admin\Category\BrandController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Category\BrandController@storeBrand')->name('store.brand');
Route::get('delete/brand/{id}', 'Admin\Category\BrandController@deleteBrand');
Route::get('edit/brand/{id}', 'Admin\Category\BrandController@editBrand');
Route::post('update/brand/{id}', 'Admin\Category\BrandController@updateBrand');

// subcategory
Route::get('admin/sub/category', 'Admin\Category\subCategoryController@subcategories')->name('sub.categories');
Route::post('admin/store/subCategory', 'Admin\Category\subCategoryController@storeSubcategory')->name('store.subcategory');
Route::get('delete/subCategory/{id}', 'Admin\Category\subCategoryController@deleteSubCategory');
Route::get('edit/subCategory/{id}', 'Admin\Category\subCategoryController@editSubCategory');
Route::post('update/subCategory/{id}', 'Admin\Category\subCategoryController@updateSubCategory');


// Coupon
Route::get('admin/coupon', 'Admin\Category\CouponController@coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'Admin\Category\CouponController@storeCoupon')->name('store.coupon');
Route::get('delete/coupon/{id}', 'Admin\Category\CouponController@deleteCoupon');
Route::get('edit/coupon/{id}', 'Admin\Category\CouponController@editCoupon');
Route::post('update/coupon/{id}', 'Admin\Category\CouponController@updateCoupon');

// Newsletters

Route::get('admin/newsletters', 'Admin\Category\NewsletterController@newsletter')->name('admin.newsletter');
Route::get('delete/newsletter/{id}', 'Admin\Category\NewsletterController@deleteNewsletter');


// For Show Sub category with ajax 

Route::get('get/subcategory/{subcategory_id}', 'Admin\Product\ProductController@getSubCategories');



// Product All Routes
Route::get('admin/product/all', 'Admin\Product\ProductController@display')->name('all.product');
Route::get('admin/product/add', 'Admin\Product\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Admin\Product\ProductController@storeProduct')->name('store.product');


// Frontend All Routes

Route::post('store/newsletter', 'FrontController@storeNewsletter')->name('store.newsletter');