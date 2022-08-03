<?php

use App\Http\Controllers\admin\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminBannerController;
use App\Http\Controllers\admin\AdminBlogsController;
use App\Http\Controllers\admin\AdminTestimonialsController;
use App\Http\Controllers\admin\AdminServicesController;
use App\Http\Controllers\admin\AdminProductDetailsController;
use App\Http\Controllers\admin\AdminFaqController;
use App\Http\Controllers\admin\AdminOrderController;
use App\Http\Controllers\admin\AdminStripeRateController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductandCartController;
use App\Http\Controllers\SearchResultController;
use App\Http\Controllers\StripeCartController;
use App\Http\Controllers\PaypalCartController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminStoneRateController;
use App\Http\Controllers\admin\AdminOldMapController;
use App\Http\Controllers\admin\AdminNewMapController;


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

Route::get('/', function () {
    return redirect()->route('admin_login');
});


Route::get('role-set', [IndexController::class, 'role_set'])->name('role_set')->middleware('rolesmid');

/*---------------------------------------Admin-Routes---------------------------------------------- */
/**Auth Routes */
Auth::routes(['verify' => true]);
    Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin_login');
    Route::post('/admin/login-data', [AdminAuthController::class, 'login_data'])->name('login_data_page');
    // Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin_logout');
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout');
/**Admin Auth Middleware Starts */
Route::group(['middleware'=>['protectedPage']], function(){
  Route::get('/admin/admin-profile', [AdminAuthController::class, 'admin_profil'])->name('admin_profiling');
   Route::post('/admin/update-profile', [AdminAuthController::class, 'admin_profile_change'])->name('admin_profile_change');


    /**Dashboard Routes */
        Route::get('/admin/dashboard', [AdminBannerController::class, 'dashboard'])->name('admin_dashboard');

    /**Profile Routes */
        Route::get('/admin/profile', [AdminAuthController::class, 'admin_profile'])->name('admin_profile');
        Route::post('/admin/profile-update/{user?}', [AdminAuthController::class, 'admin_profile_update'])->name('admin_profile_update');
        Route::post('/admin/profile-pass-update/{user?}', [AdminAuthController::class, 'admin_password_update'])->name('admin_password_update');

    /**Banner Routes */
        Route::get('/admin/banner-list', [AdminBannerController::class, 'banner'])->name('admin_banners');
        Route::get('/admin/banner-add', [AdminBannerController::class, 'banner_add'])->name('admin_banners_add');
        Route::get('/admin/banner-edit/{id?}', [AdminBannerController::class, 'banner_edit'])->name('admin_banners_edit');
        Route::get('/admin/banner-delete/{banner?}', [AdminBannerController::class, 'banner_delete'])->name('admin_banners_delete');
        Route::post('/admin/banner-add-edit/{banner?}', [AdminBannerController::class, 'banner_add_edit_data'])->name('admin_banners_add_edit');

         /**Map Oldside Routes */
        Route::get('/admin/oldside-map-list', [AdminOldMapController::class, 'oldmap'])->name('admin_oldside_map');
        Route::get('/admin/oldside-map-add', [AdminOldMapController::class, 'old_add'])->name('admin_oldside_map_add');
        Route::get('/admin/oldside-map-edit/{id?}', [AdminOldMapController::class, 'old_edit'])->name('admin_oldside_map_edit');
        Route::get('/admin/oldside-map-delete/{oldmap?}', [AdminOldMapController::class, 'old_delete'])->name('admin_oldside_map_delete');
        Route::post('/admin/oldside-map-add-edit/{oldmap?}', [AdminOldMapController::class, 'old_add_edit_data'])->name('admin_oldside_map_add_edit');
         /**Map Newside Routes */
        Route::get('/admin/newside-map-list', [AdminNewMapController::class, 'newmap'])->name('admin_newside_map');
        Route::get('/admin/newside-map-add', [AdminNewMapController::class, 'new_add'])->name('admin_newside_map_add');
        Route::get('/admin/newside-map-edit/{id?}', [AdminNewMapController::class, 'new_edit'])->name('admin_newside_map_edit');
        Route::get('/admin/newside-map-delete/{newmap?}', [AdminNewMapController::class, 'new_delete'])->name('admin_newside_map_delete');
        Route::post('/admin/newside-map-add-edit/{newmap?}', [AdminNewMapController::class, 'new_add_edit_data'])->name('admin_newside_map_add_edit');
    /**Products Routes */
        Route::get('/admin/products-list', [AdminProductController::class, 'product_list'])->name('admin_products');
        Route::get('/admin/product-add', [AdminProductController::class, 'product_add'])->name('admin_products_add');
        Route::get('/admin/product-edit/{id?}', [AdminProductController::class, 'product_edit'])->name('admin_products_edit');
        Route::get('/admin/product-delete/{product?}', [AdminProductController::class, 'product_delete'])->name('admin_products_delete');
        Route::post('/admin/product-add-edit/{product?}', [AdminProductController::class, 'product_add_edit_data'])->name('admin_products_add_edit');


/**Rate Routes */
        Route::get('/admin/rate-list', [AdminStripeRateController::class, 'rate_list'])->name('admin_rate');
        Route::get('/admin/rate-add', [AdminStripeRateController::class, 'rate_add'])->name('admin_rate_add');
        Route::get('/admin/rate-edit/{id?}', [AdminStripeRateController::class, 'rate_edit'])->name('admin_rate_edit');
        Route::post('/admin/rate-add-edit/{rate?}', [AdminStripeRateController::class, 'rate_add_edit_data'])->name('admin_rate_add_edit');

/**Stone Rate Routes */
        Route::get('/admin/stone-rate-list', [AdminStoneRateController::class, 'stone_rate_list'])->name('stone_rate');
        Route::get('/admin/stone-rate-add', [AdminStoneRateController::class, 'stone_rate_add'])->name('stone_rate_add');
        Route::get('/admin/stone-rate-edit/{id?}', [AdminStoneRateController::class, 'stone_rate_edit'])->name('stone_rate_edit');
        Route::post('/admin/stone-rate-add-edit/{rate?}', [AdminStoneRateController::class, 'stone_rate_add_edit_data'])->name('stone_rate_add_edit');

    /**Testimonials Routes */
        Route::get('/admin/testimonial-list', [AdminTestimonialsController::class, 'testimonial_list'])->name('admin_testimonials');
        Route::get('/admin/testimonial-add', [AdminTestimonialsController::class, 'testimonial_add'])->name('admin_testimonials_add');
        Route::get('/admin/testimonial-edit/{id?}', [AdminTestimonialsController::class, 'testimonial_edit'])->name('admin_testimonials_edit');
        Route::get('/admin/testimonial-delete/{testimonial?}', [AdminTestimonialsController::class, 'testimonial_delete'])->name('admin_testimonials_delete');
        Route::post('/admin/testimonial-add-edit/{testimonial?}', [AdminTestimonialsController::class, 'testimonial_add_edit_data'])->name('admin_testimonials_add_edit');

    /**Services Routes */
        Route::get('/admin/service-list', [AdminServicesController::class, 'service_list'])->name('admin_services');
        Route::get('/admin/service-add', [AdminServicesController::class, 'service_add'])->name('admin_services_add');
        Route::get('/admin/service-edit/{id?}', [AdminServicesController::class, 'service_edit'])->name('admin_services_edit');
        Route::get('/admin/service-delete/{service?}', [AdminServicesController::class, 'service_delete'])->name('admin_services_delete');
        Route::post('/admin/service-add-edit/{service?}', [AdminServicesController::class, 'service_add_edit_data'])->name('admin_services_add_edit');

    /**User Routes*/
        Route::get('/admin/user-list', [AdminAuthController::class, 'user_list'])->name('admin_users');
        Route::get('/admin/user-add', [AdminAuthController::class, 'user_add'])->name('admin_users_add');
        Route::get('/admin/user-edit/{id?}', [AdminAuthController::class, 'user_edit'])->name('admin_users_edit');
        Route::get('/admin/user-delete/{user?}', [AdminAuthController::class, 'user_delete'])->name('admin_users_delete');
        Route::post('/admin/user-add-edit/{user?}', [AdminAuthController::class, 'user_add_edit_data'])->name('admin_users_add_edit');

    /**Product Detail Routes*/
        /**Categories Routes */
            Route::get('/admin/categories-list', [AdminProductDetailsController::class, 'categories_list'])->name('admin_categories');
            Route::get('/admin/categories-add', [AdminProductDetailsController::class, 'categories_add'])->name('admin_categories_add');
            Route::get('/admin/categories-edit/{id?}', [AdminProductDetailsController::class, 'categories_edit'])->name('admin_categories_edit');
            Route::get('/admin/categories-delete/{categories?}', [AdminProductDetailsController::class, 'categories_delete'])->name('admin_categories_delete');
            Route::post('/admin/categories-add-edit/{categories?}', [AdminProductDetailsController::class, 'categories_add_edit_data'])->name('admin_categories_add_edit');

        /**Sub-Categories Routes */
            Route::get('/admin/sub-categories-list', [AdminProductDetailsController::class, 'sub_categories_list'])->name('admin_sub_categories');
            Route::get('/admin/sub-categories-add', [AdminProductDetailsController::class, 'sub_categories_add'])->name('admin_sub_categories_add');
            Route::get('/admin/sub-categories-edit/{id?}', [AdminProductDetailsController::class, 'sub_categories_edit'])->name('admin_sub_categories_edit');
            Route::get('/admin/sub-categories-delete/{sub_categories?}', [AdminProductDetailsController::class, 'sub_categories_delete'])->name('admin_sub_categories_delete');
            Route::post('/admin/sub-categories-add-edit/{sub_categories?}', [AdminProductDetailsController::class, 'sub_categories_add_edit_data'])->name('admin_sub_categories_add_edit');
        /**Products Routes */
            Route::get('/admin/products-details-list', [AdminProductDetailsController::class, 'products_list'])->name('admin_details_products');
            Route::get('/admin/products-details-add', [AdminProductDetailsController::class, 'products_add'])->name('admin_details_products_add');
            Route::get('/admin/products-details-edit/{id?}', [AdminProductDetailsController::class, 'products_edit'])->name('admin_details_products_edit');
            Route::get('/admin/products-details-delete/{products?}', [AdminProductDetailsController::class, 'products_delete'])->name('admin_details_products_delete');
            Route::post('/admin/products-details-add-edit/{products?}', [AdminProductDetailsController::class, 'products_add_edit_data'])->name('admin_details_products_add_edit');
             /**Faq Routes */
        Route::get('/admin/faq-list', [AdminFaqController::class, 'faq'])->name('admin_faqs');
        Route::get('/admin/faq-add', [AdminFaqController::class, 'faq_add'])->name('admin_faqs_add');
        Route::get('/admin/faq-edit/{id?}', [AdminFaqController::class, 'faq_edit'])->name('admin_faqs_edit');
        Route::get('/admin/faq-delete/{faq?}', [AdminFaqController::class, 'faq_delete'])->name('admin_faqs_delete');
        Route::post('/admin/faq-add-edit/{faq?}', [AdminFaqController::class, 'faq_add_edit_data'])->name('admin_faqs_add_edit');

         /**Orders stone Routes */
        Route::get('/admin/order-list', [AdminOrderController::class, 'admin_order_list'])->name('admin_order_list');
         Route::get('/admin/order-view/{id?}', [AdminOrderController::class, 'admin_orders_view'])->name('admin_orders_view');

          /**Orders searches Routes */
           Route::get('/admin/searches-order-list', [AdminOrderController::class, 'admin_searches_order_list'])->name('admin_searches_order_list');
         Route::get('/admin/searches-order-view/{id?}', [AdminOrderController::class, 'admin_searches_orders_view'])->name('admin_searches_orders_view');
});
/**Admin Auth Middleware Ends */
/**Website Routes Start */
     
 /**All Link Routes*/  
            Route::get('about-us', [IndexController::class, 'about_us'])->name('about_us');
            Route::get('contact-us', [IndexController::class, 'contact_us'])->name('contact_us');
            Route::get('faqs', [IndexController::class, 'faqs'])->name('faqs');
            Route::get('/', [IndexController::class, 'home'])->name('welcome');
            // Route::get('log-in', [IndexController::class, 'log_in'])->name('log_in');
            Route::get('new-map', [IndexController::class, 'new_map'])->name('new_map');
            Route::get('old-maps', [IndexController::class, 'old_maps'])->name('old_maps');

        Route::group(['middleware'=>['searches']], function(){
            Route::get('result', [IndexController::class, 'result'])->name('result');
            Route::get('result-2', [IndexController::class, 'result2'])->name('result2');
            Route::get('result-3', [IndexController::class, 'result3'])->name('result3');
                 });
   

    Route::group(['middleware'=>['checkauthmid']], function(){

         Route::get('/my-profile', [AdminAuthController::class, 'my_profile'])->name('user_profile');
   Route::get('/my-orders', [ProductandCartController::class, 'my_orders'])->name('my_orders');
        /** Add to cart Routes  */
            Route::get('/add-to-cart', [ProductandCartController::class, 'addToCart'])->name('add.to.cart');
        /** Main Search Routes  */
             Route::get('search', [IndexController::class, 'search'])->name('search');
            Route::get('remove-from-cart/{id?}', [ProductandCartController::class, 'remove'])->name('remove.from.cart');
        /** Details Page */
         Route::get('details/{id?}', [SearchResultController::class, 'details'])->name('details');
       /** Stripe search Implementation */
        Route::post('stripe', [ProductandCartController::class, 'stripePost'])->name('stripe.post');
        Route::get('/stripe-search-payment', [IndexController::class, 'checkout'])->name('checkout');
          /** Paypal Search Implementation */
 
        Route::get('paypal',[ProductandCartController::class, 'paypal'])->name('paypal');
        Route::post('/paypal-search-payment', [ProductandCartController::class, 'paypal_payment'])->name('paypal_payment');
        Route::get('payment-method', [IndexController::class, 'payment_method'])->name('payment_method');
           /** Stripe cart Implementation */
            Route::get('stripe-cart/{price?}', [StripeCartController::class, 'stripeCart'])->name('stripe_cart');
             Route::post('/stripe-cart-payment', [StripeCartController::class, 'stripe_cart_payment'])->name('stripe_cart_payment');
             /** Paypal Cart Implementation */
            Route::get('paypal-cart/{price?}',[PaypalCartController::class, 'paypal_cart'])->name('paypal_cart');
            Route::post('/paypal-cart-payment', [PaypalCartController::class, 'paypal_cart_payment'])->name('paypal_cart_payment');
          
            Route::get('/cart', [IndexController::class, 'cart'])->name('cart');
            Route::post('/user-profile-change', [AdminAuthController::class, 'user_profile_change'])->name('user_profile_change');
   
        });
/**Website Routes Ends */

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
