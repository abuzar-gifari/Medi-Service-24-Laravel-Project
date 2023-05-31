<?php

use Illuminate\Support\Facades\Route;
//() {} [] 


// A-L-L   F-R-O-N-T-E-N-D    R-O-U-T-E
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\SubscriberController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\ContactController;


// A-L-L   A-D-M-I-N    R-O-U-T-E
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminDeliveryBoyController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminStockController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminVendorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;


// A-L-L   C-U-S-T-O-M-E-R    R-O-U-T-E
use App\Http\Controllers\Customer\CustomerAuthController;
use App\Http\Controllers\Customer\CustomerHomeController;
use App\Http\Controllers\Customer\CustomerOrderController;
use App\Http\Controllers\Customer\CustomerProfileController;


// A-L-L   V-E-N-D-O-R    R-O-U-T-E
use App\Http\Controllers\Vendor\VendorAuthController;
use App\Http\Controllers\Vendor\VendorHomeController;
use App\Http\Controllers\Vendor\VendorProductController;
use App\Http\Controllers\Vendor\VendorProfileController;
use App\Http\Controllers\Vendor\VendorSubscriberController;


// A-L-L   D-E-L-I-V-E-R-Y   B-O-Y    R-O-U-T-E
use App\Http\Controllers\DeliveryBoy\DeliveryBoyAuthController;
use App\Http\Controllers\DeliveryBoy\DeliveryBoyHomeController;
use App\Http\Controllers\DeliveryBoy\DeliveryBoyProfileController;
use App\Http\Controllers\Vendor\VendorStockController;

/**------------------------  F-R-O-N-T-E-N-D   R-O-U-T-E   ---------------------------------**/


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/photo-gallery', [PhotoController::class, 'index'])->name('photo_gallery');
// Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send-email', [ContactController::class, 'send_email'])->name('contact_send_email');
Route::post('/subscriber/send-email', [SubscriberController::class, 'send_email'])->name('subscriber_send_email');
Route::get('/subscriber/verify/{email}/{token}', [SubscriberController::class, 'verify'])->name('subscriber_verify');
Route::get('/about-us-page', [PageController::class, 'about_us'])->name('about-us-page');
Route::get('/contact-page', [PageController::class, 'contact'])->name('contact-page');
Route::get('/my-account-page', [PageController::class, 'my_account'])->name('my-account-page');
Route::get('/login-page', [PageController::class, 'login'])->name('login-page');
Route::get('/register-page', [PageController::class, 'register'])->name('register-page');
Route::get('/privacy-policy-page', [PageController::class, 'privacy_policy'])->name('privacy-policy-page');
Route::get('/your-wishlist', [CartController::class, 'wishlist_view'])->name('wishlist_view');
Route::get('/vendor-lists', [PageController::class, 'all_vendor_list'])->name('all_vendor_list');
Route::get('/product-details/{id}', [ProductController::class, 'product_details'])->name('product_details');
Route::get('/your-cart', [CartController::class, 'cart_view'])->name('your_cart');
Route::post('/cart/submit', [CartController::class, 'your_cart_submit'])->name('your_cart_submit');
Route::get('/your-cart/delete/{id}', [CartController::class, 'your_cart_delete'])->name('your_cart_delete');
Route::get('/your-checkout', [CartController::class, 'your_checkout'])->name('your_checkout');
Route::post('/payment', [CartController::class, 'payment'])->name('payment');
Route::get('/payment/paypal/{price}', [CartController::class, 'paypal'])->name('paypal');
Route::post('/payment/stripe/{price}', [CartController::class, 'stripe'])->name('stripe');



/**-------------------  E-N-D   F-R-O-N-T-E-N-D   R-O-U-T-E  -----------------------------**/







/**--------------------------  C-U-S-T-O-M-E-R   R-O-U-T-E   ---------------------------------**/


/* C-U-S-T-O-M-E-R    A-U-T-H-E-N-T-I-C-A-T-I-O-N */

// Route::get('/login', [CustomerAuthController::class, 'login'])->name('customer_login');
Route::post('/login-submit', [CustomerAuthController::class, 'login_submit'])->name('customer_login_submit');
Route::get('/customer/logout', [CustomerAuthController::class, 'logout'])->name('customer_logout');
Route::get('/signup', [CustomerAuthController::class, 'signup'])->name('customer_signup');
Route::post('/signup-submit', [CustomerAuthController::class, 'signup_submit'])->name('customer_signup_submit');
Route::get('/signup-verify/{email}/{token}', [CustomerAuthController::class, 'signup_verify'])->name('customer_signup_verify');
Route::get('/forget-password', [CustomerAuthController::class, 'forget_password'])->name('customer_forget_password');
Route::post('/forget-password-submit', [CustomerAuthController::class, 'forget_password_submit'])->name('customer_forget_password_submit');
Route::get('/reset-password/{token}/{email}', [CustomerAuthController::class, 'reset_password'])->name('customer_reset_password');
Route::post('/reset-password-submit', [CustomerAuthController::class, 'reset_password_submit'])->name('customer_reset_password_submit');




/* C-U-S-T-O-M-E-R    R-O-U-T-E */
Route::group(['middleware' =>['customer:customer']], function(){
    Route::get('/customer/home', [CustomerHomeController::class, 'index'])->name('customer_home');
    Route::get('/customer/edit-profile', [CustomerProfileController::class, 'index'])->name('customer_profile');
    Route::post('/customer/edit-profile-submit', [CustomerProfileController::class, 'profile_submit'])->name('customer_profile_submit');
    Route::get('/customer/order/view', [CustomerOrderController::class, 'index'])->name('customer_order_view');
    Route::get('/your/invoice/{id}', [CartController::class, 'invoice'])->name('customer_invoice');
});

/**-----------------------  E-N-D   C-U-S-T-O-M-E-R   R-O-U-T-E  -----------------------------**/








/**--------------------------  V-E-N-D-O-R   R-O-U-T-E   ---------------------------------**/


/* V-E-N-D-O-R    A-U-T-H-E-N-T-I-C-A-T-I-O-N */

Route::get('/vendor/login', [VendorAuthController::class, 'login'])->name('vendor_login');
Route::post('/vendor/login-submit', [VendorAuthController::class, 'login_submit'])->name('vendor_login_submit');
Route::get('/vendor/logout', [VendorAuthController::class, 'logout'])->name('vendor_logout');
Route::get('/vendor/signup', [VendorAuthController::class, 'signup'])->name('vendor_signup');
Route::post('/vendor/signup-submit', [VendorAuthController::class, 'signup_submit'])->name('vendor_signup_submit');
Route::get('/vendor/signup-verify/{email}/{token}', [VendorAuthController::class, 'signup_verify'])->name('vendor_signup_verify');
Route::get('/vendor/forget-password', [VendorAuthController::class, 'forget_password'])->name('vendor_forget_password');
Route::post('/vendor/forget-password-submit', [VendorAuthController::class, 'forget_password_submit'])->name('vendor_forget_password_submit');
Route::get('/vendor/reset-password/{token}/{email}', [VendorAuthController::class, 'reset_password'])->name('vendor_reset_password');
Route::post('/vendor/reset-password-submit', [VendorAuthController::class, 'reset_password_submit'])->name('vendor_reset_password_submit');




/* V-E-N-D-O-R    R-O-U-T-E */
Route::group(['middleware' =>['vendor:vendor']], function(){
    Route::get('/vendor/home', [VendorHomeController::class, 'index'])->name('vendor_home');
    Route::get('/vendor/edit-profile', [VendorProfileController::class, 'index'])->name('vendor_profile');
    Route::post('/vendor/edit-profile-submit', [VendorProfileController::class, 'profile_submit'])->name('vendor_profile_submit');

    
    /* P R O D U C T */

    Route::get('/vendor/product/show',[VendorProductController::class,'show'])->name('vendor_product_show');
    Route::get('/vendor/product/create',[VendorProductController::class,'create'])->name('vendor_product_create');
    Route::post('/vendor/product/store',[VendorProductController::class,'store'])->name('vendor_product_store');
    Route::get('/vendor/product/edit/{id}',[VendorProductController::class,'edit'])->name('vendor_product_edit');
    Route::post('/vendor/product/update/{id}',[VendorProductController::class,'update'])->name('vendor_product_update');
    Route::get('/vendor/product/delete/{id}',[VendorProductController::class,'delete'])->name('vendor_product_delete');
    Route::get('/vendor/product/gallery/{id}',[VendorProductController::class,'gallery'])->name('vendor_product_gallery');
    Route::post('/vendor/product/gallery/store/{id}',[VendorProductController::class,'gallery_store'])->name('vendor_product_gallery_store');
    Route::get('/vendor/product/gallery/delete/{id}',[VendorProductController::class,'gallery_delete'])->name('vendor_product_gallery_delete');


    /* S U B S C R I B E R */

    Route::get('/vendor/subscriber/show', [VendorSubscriberController::class, 'show'])->name('vendor_subscriber_show');
    Route::get('/vendor/subscriber/send-email', [VendorSubscriberController::class, 'send_email'])->name('vendor_subscriber_send_email');
    Route::post('/vendor/subscriber/send-email-submit', [VendorSubscriberController::class, 'send_email_submit'])->name('vendor_subscriber_send_email_submit');



    /* S T O C K */
        
    Route::get('/vendor/stock', [VendorStockController::class, 'vendor_stock_show'])->name('vendor_stock_show');





});

/**---------------------------  E-N-D   V-E-N-D-O-R   R-O-U-T-E  -----------------------------**/









/**-----------------------  D-E-L-I-V-E-R-Y   B-O-Y   R-O-U-T-E   ----------------------------**/


/* D-E-L-I-V-E-R-Y   B-O-Y   A-U-T-H-E-N-T-I-C-A-T-I-O-N */

Route::get('/delivery_boy/login', [DeliveryBoyAuthController::class, 'login'])->name('delivery_boy_login');
Route::post('/delivery_boy/login-submit', [DeliveryBoyAuthController::class, 'login_submit'])->name('delivery_boy_login_submit');
Route::get('/delivery_boy/logout', [DeliveryBoyAuthController::class, 'logout'])->name('delivery_boy_logout');
Route::get('/delivery_boy/signup', [DeliveryBoyAuthController::class, 'signup'])->name('delivery_boy_signup');
Route::post('/delivery_boy/signup-submit', [DeliveryBoyAuthController::class, 'signup_submit'])->name('delivery_boy_signup_submit');
Route::get('/delivery_boy/signup-verify/{email}/{token}', [DeliveryBoyAuthController::class, 'signup_verify'])->name('delivery_boy_signup_verify');
Route::get('/delivery_boy/forget-password', [DeliveryBoyAuthController::class, 'forget_password'])->name('delivery_boy_forget_password');
Route::post('/delivery_boy/forget-password-submit', [DeliveryBoyAuthController::class, 'forget_password_submit'])->name('delivery_boy_forget_password_submit');
Route::get('/delivery_boy/reset-password/{token}/{email}', [DeliveryBoyAuthController::class, 'reset_password'])->name('delivery_boy_reset_password');
Route::post('/delivery_boy/reset-password-submit', [DeliveryBoyAuthController::class, 'reset_password_submit'])->name('delivery_boy_reset_password_submit');




/* D-E-L-I-V-E-R-Y   B-O-Y   R-O-U-T-E */
Route::group(['middleware' =>['delivery_boy:delivery_boy']], function(){
    Route::get('/delivery_boy/home', [DeliveryBoyHomeController::class, 'index'])->name('delivery_boy_home');
    Route::get('/delivery_boy/edit-profile', [DeliveryBoyProfileController::class, 'index'])->name('delivery_boy_profile');
    Route::post('/delivery_boy/edit-profile-submit', [DeliveryBoyProfileController::class, 'delivery_boy_profile_submit'])->name('delivery_boy_profile_submit');
});

/**---------------------------  E-N-D   V-E-N-D-O-R   R-O-U-T-E  -----------------------------**/






/**-------------------------  A-D-M-I-N   R-O-U-T-E   -------------------------------------**/



/* A-D-M-I-N    A-U-T-H-E-N-T-I-C-A-T-I-O-N */

Route::get('admin/home',[AdminHomeController::class,'index'])->name('admin_home')->middleware('admin:admin');
Route::get('admin/login',[AdminLoginController::class,'index'])->name('admin_login');
Route::post('/login/submit',[AdminLoginController::class,'login_submit'])->name('admin_login_submit');
Route::get('admin/logout',[AdminLoginController::class,'logout'])->name('admin_logout');





/* A-D-M-I-N   R-O-U-T-E */

Route::group(['middleware'=>['admin:admin']],function(){


    /* P R O F I L E */
    
    Route::get('/admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile');
    Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');


    /* S L I D E R */

    Route::get('/admin/slider/show',[AdminSliderController::class,'show'])->name('admin_slider_show');
    Route::get('/admin/slider/create',[AdminSliderController::class,'create'])->name('admin_slider_create');
    Route::post('/admin/slider/store',[AdminSliderController::class,'store'])->name('admin_slider_store');
    Route::get('/admin/slider/edit/{id}',[AdminSliderController::class,'edit'])->name('admin_slider_edit');
    Route::post('/admin/slider/update/{id}',[AdminSliderController::class,'update'])->name('admin_slider_update');
    Route::get('/admin/slider/delete/{id}',[AdminSliderController::class,'delete'])->name('admin_slider_delete');


    /* C A T E G O R Y */

    Route::get('/admin/category/show',[CategoryController::class,'show'])->name('admin_category_show');
    Route::get('/admin/category/create',[CategoryController::class,'create'])->name('admin_category_create');
    Route::post('/admin/category/store',[CategoryController::class,'store'])->name('admin_category_store');
    Route::get('/admin/category/edit/{id}',[CategoryController::class,'edit'])->name('admin_category_edit');
    Route::post('/admin/category/update/{id}',[CategoryController::class,'update'])->name('admin_category_update');
    Route::get('/admin/category/delete/{id}',[CategoryController::class,'delete'])->name('admin_category_delete');


    /* S U B - C A T E G O R Y */

    Route::get('/admin/subcategory/show',[SubCategoryController::class,'show'])->name('admin_subcategory_show');
    Route::get('/admin/subcategory/create',[SubCategoryController::class,'create'])->name('admin_subcategory_create');
    Route::post('/admin/subcategory/store',[SubCategoryController::class,'store'])->name('admin_subcategory_store');
    Route::get('/admin/subcategory/edit/{id}',[SubCategoryController::class,'edit'])->name('admin_subcategory_edit');
    Route::post('/admin/subcategory/update/{id}',[SubCategoryController::class,'update'])->name('admin_subcategory_update');
    Route::get('/admin/subcategory/delete/{id}',[SubCategoryController::class,'delete'])->name('admin_subcategory_delete');

    

    /* P R O D U C T */

    Route::get('/admin/product/show',[AdminProductController::class,'show'])->name('admin_product_show');
    Route::get('/admin/product/create',[AdminProductController::class,'create'])->name('admin_product_create');
    Route::post('/admin/product/store',[AdminProductController::class,'store'])->name('admin_product_store');
    Route::get('/admin/product/edit/{id}',[AdminProductController::class,'edit'])->name('admin_product_edit');
    Route::post('/admin/product/update/{id}',[AdminProductController::class,'update'])->name('admin_product_update');
    Route::get('/admin/product/delete/{id}',[AdminProductController::class,'delete'])->name('admin_product_delete');
    Route::get('/admin/product/gallery/{id}',[AdminProductController::class,'gallery'])->name('admin_product_gallery');
    Route::post('/admin/product/gallery/store/{id}',[AdminProductController::class,'gallery_store'])->name('admin_product_gallery_store');
    Route::get('/admin/product/gallery/delete/{id}',[AdminProductController::class,'gallery_delete'])->name('admin_product_gallery_delete');



    /* C U S T O M E R */
    
    Route::get('/admin/customers', [AdminCustomerController::class, 'index'])->name('admin_customer');
    Route::get('/admin/customer/change-status/{id}', [AdminCustomerController::class, 'change_status'])->name('admin_customer_change_status');



    /* V E N D O R */
    
    Route::get('/admin/vendors', [AdminVendorController::class, 'admin_vendor_lists_show'])->name('admin_vendor_lists_show');



    /* D-E-L-I-V-E-R-Y   B-O-Y */
    
    Route::get('/admin/delivery_boy', [AdminDeliveryBoyController::class, 'admin_delivery_boy_lists_show'])->name('admin_delivery_boy_lists_show');


    /* C U S T O M E R    O R D E R */

    Route::get('/admin/order/view', [AdminOrderController::class, 'index'])->name('admin_orders');
    Route::get('/admin/order/invoice/{id}', [AdminOrderController::class, 'invoice'])->name('admin_invoice');
    Route::get('/admin/order/delete/{id}', [AdminOrderController::class, 'delete'])->name('admin_order_delete');



    /* T E S T I M O N I A L */

    Route::get('/admin/testimonial/view', [AdminTestimonialController::class, 'index'])->name('admin_testimonial_view');
    Route::get('/admin/testimonial/add', [AdminTestimonialController::class, 'add'])->name('admin_testimonial_add');
    Route::post('/admin/testimonial/store', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_store');
    Route::get('/admin/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
    Route::post('/admin/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update');
    Route::get('/admin/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete');


    
    /* P H O T O */

    Route::get('/admin/photo/view', [AdminPhotoController::class, 'index'])->name('admin_photo_view');
    Route::get('/admin/photo/add', [AdminPhotoController::class, 'add'])->name('admin_photo_add');
    Route::post('/admin/photo/store', [AdminPhotoController::class, 'store'])->name('admin_photo_store');
    Route::get('/admin/photo/edit/{id}', [AdminPhotoController::class, 'edit'])->name('admin_photo_edit');
    Route::post('/admin/photo/update/{id}', [AdminPhotoController::class, 'update'])->name('admin_photo_update');
    Route::get('/admin/photo/delete/{id}', [AdminPhotoController::class, 'delete'])->name('admin_photo_delete');



    /* F A Q  */

    Route::get('/admin/faq/view', [AdminFaqController::class, 'index'])->name('admin_faq_view');
    Route::get('/admin/faq/add', [AdminFaqController::class, 'add'])->name('admin_faq_add');
    Route::post('/admin/faq/store', [AdminFaqController::class, 'store'])->name('admin_faq_store');
    Route::get('/admin/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
    Route::post('/admin/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin_faq_update');
    Route::get('/admin/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete');



    /* S U B S C R I B E R */

    Route::get('/admin/subscriber/show', [AdminSubscriberController::class, 'show'])->name('admin_subscriber_show');
    Route::get('/admin/subscriber/send-email', [AdminSubscriberController::class, 'send_email'])->name('admin_subscriber_send_email');
    Route::post('/admin/subscriber/send-email-submit', [AdminSubscriberController::class, 'send_email_submit'])->name('admin_subscriber_send_email_submit');



    /* S T O C K */
    
    Route::get('/admin/stock', [AdminStockController::class, 'admin_stock_show'])->name('admin_stock_show');



});

/**-----------------------  E-N-D   A-D-M-I-N   R-O-U-T-E  ---------------------------------**/





/**------------------------  -------------------------  ----------------------------------**/
/**------------------------  -------------------------  ----------------------------------**/
/**------------------------  E-N-D   A-L-L   R-O-U-T-E  ----------------------------------**/
/**------------------------  -------------------------  ----------------------------------**/
/**------------------------  -------------------------  ----------------------------------**/