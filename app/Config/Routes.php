<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->group('admin',["namespace"=>"App\Controllers\Admin"],function($routes){

    $routes->get('/', 'Home::index',['filter'=>'auth']);

    //Services
    $routes->get('services','Services::index',['filter'=>'adminauth']);
    $routes->get('add-service','Services::create',['filter'=>'adminauth']);
    $routes->post('add-service','Services::create',['filter'=>'adminauth']);
    $routes->get('show-service/(:num)','Services::showService/$1',['filter'=>'adminauth']);
    $routes->get('service-image/(:any)','Services::image/$1',['filter'=>'adminauth']);
    $routes->get('update-service/(:num)','Services::updateService/$1',['filter'=>'adminauth']);
    $routes->post('update-service/(:num)','Services::updateService/$1',['filter'=>'adminauth']);
    $routes->post('update-service-image/(:num)','Services::updateImageService/$1',['filter'=>'adminauth']);


    //Customer Review
    $routes->get('customer-reviews','CustomerReview::index',['filter'=>'adminauth']);
    $routes->get('create-review','CustomerReview::create',['filter'=>'adminauth']);
    $routes->post('create-review','CustomerReview::create',['filter'=>'adminauth']);
    $routes->get('update-review/(:num)','CustomerReview::update/$1',['filter'=>'adminauth']);
    $routes->post('update-review/(:num)','CustomerReview::update/$1',['filter'=>'adminauth']);
    $routes->get('show-review/(:num)','CustomerReview::show/$1',['filter'=>'adminauth']);
    $routes->get('review-image/(:any)','CustomerReview::image/$1',['filter'=>'adminauth']);
    $routes->post('update-review-image/(:num)','CustomerReview::imageUpdate/$1',['filter'=>'adminauth']);

    //Products
    $routes->get('all-products','Product::index',['filter'=>'adminauth']);
     $routes->get('add-product','Product::create',['filter'=>'adminauth']);
     $routes->post('add-product','Product::create',['filter'=>'adminauth']);
     $routes->get('update-product/(:num)','Product::update/$1',['filter'=>'adminauth']);
     $routes->post('update-product/(:num)','Product::update/$1',['filter'=>'adminauth']);
     $routes->get('show-product/(:num)','Product::show/$1',['filter'=>'adminauth']);
     $routes->get('product-image/(:any)','Product::image/$1',['filter'=>'adminauth']);
     $routes->post('update-product-image/(:num)','Product::imageUpdate/$1',['filter'=>'adminauth']);

   //Team

   $routes->get('team-members','Team::index',['filter'=>'adminauth']);
     $routes->get('add-member','Team::create',['filter'=>'adminauth']);
     $routes->post('add-member','Team::create',['filter'=>'adminauth']);
     $routes->get('update-member/(:num)','Team::update/$1',['filter'=>'adminauth']);
     $routes->post('update-member/(:num)','Team::update/$1',['filter'=>'adminauth']);
     $routes->get('show-member/(:num)','Team::show/$1',['filter'=>'adminauth']);
     $routes->get('member-image/(:any)','Team::image/$1',['filter'=>'adminauth']);
     $routes->post('update-member-image/(:num)','Team::imageUpdate/$1',['filter'=>'adminauth']);

     
   //Blog And Category Route

   $routes->get('blog-category-list','Blog::index',['filter'=>'auth']);
   $routes->post('blog-add-category','Blog::create',['filter'=>'auth']);
   $routes->get('blog-category-update/(:num)','Blog::update/$1',['filter'=>'auth']);
   $routes->post('blog-category-update/(:num)','Blog::update/$1',['filter'=>'auth']);
   $routes->get('blog-category-details/(:num)','Blog::show/$1',['filter'=>'auth']);
   $routes->get('add-blog','Blog::createBlog',['filter'=>'auth']);
   $routes->post('add-blog','Blog::createBlog',['filter'=>'auth']);
   $routes->get('blog-list','Blog::blogList',['filter'=>'auth']);
   $routes->get('show-blog/(:num)','Blog::blogDetails/$1',['filter'=>'auth']);
   $routes->get('blog-update/(:num)','Blog::blogUpdate/$1',['filter'=>'auth']);
   $routes->post('blog-update/(:num)','Blog::blogUpdate/$1',['filter'=>'auth']);
   $routes->post('blog-add-category/(:num)','Blog::AddBlogCat/$1',['filter'=>'auth']);
   $routes->post('blog-category-remove/(:num)','Blog::RemoveCatFromBlog/$1',['filter'=>'auth']);
   $routes->get('blog-image/(:any)','Blog::image/$1',['filter'=>'auth']);
   $routes->post('update-blog-image/(:num)','Blog::imageUpdate/$1',['filter'=>'auth']);

   //Packages and Category

   $routes->get('package-category-list','Package::index',['filter'=>'adminauth']);
   $routes->post('package-add-category','Package::create',['filter'=>'adminauth']);
   $routes->get('package-category-update/(:num)','Package::update/$1',['filter'=>'adminauth']);
   $routes->post('package-category-update/(:num)','Package::update/$1',['filter'=>'adminauth']);
   $routes->get('package-category-details/(:num)','Package::show/$1',['filter'=>'adminauth']);
   $routes->get('add-package','Package::createPackage',['filter'=>'adminauth']);
   $routes->post('add-package','Package::createPackage',['filter'=>'adminauth']);
   $routes->get('packages-list','Package::packageList',['filter'=>'adminauth']);
   $routes->get('show-package/(:num)','Package::packageDetails/$1',['filter'=>'adminauth']);
   $routes->get('package-update/(:num)','Package::packageUpdate/$1',['filter'=>'adminauth']);
   $routes->post('package-update/(:num)','Package::packageUpdate/$1',['filter'=>'adminauth']);
   $routes->post('package-add-service/(:num)','Package::addService/$1',['filter'=>'adminauth']);
   $routes->post('package-service-remove/(:num)','Package::removeServiceFromPackage/$1',['filter'=>'adminauth']);
   $routes->post('package-service-update/(:num)','Package::packageServiceStatus/$1',['filter'=>'adminauth']);
   
   


   //Content Writer
   $routes->get('content-writers','Blogger::contentWriter',['filter'=>'auth']);
   $routes->get('update-profile/(:num)','Blogger::updateInfo/$1',['filter'=>'adminauth']);
   $routes->post('update-profile/(:num)','Blogger::updateInfo/$1',['filter'=>'adminauth']);
   $routes->get('update-password/(:num)','Blogger::updatePassword/$1',['filter'=>'auth']);
   $routes->post('update-password/(:num)','Blogger::updatePassword/$1',['filter'=>'auth']);
   $routes->get('show-user/(:num)','Blogger::profile/$1',['filter'=>'auth']);
   $routes->get('add-content-writer','Blogger::signup',['filter'=>'adminauth']);
   $routes->post('add-content-writer','Blogger::signup',['filter'=>'adminauth']);


   //Callback request
   //Content Writer
   $routes->get('pending-request','Request::index',['filter'=>'adminauth']);
   $routes->post('update-request/(:num)','Request::update/$1',['filter'=>'adminauth']);
   // Contest

  $routes->get('contest-applicant','Contest::index',['filter'=>'adminauth']);
  $routes->get('candidate-email-failed','Contest::emailMissing',['filter'=>'adminauth']);
  $routes->get('email-sent/(:num)','Contest::emailSent/$1',['filter'=>'adminauth']);
  $routes->get('candidate-details/(:num)','Contest::showDetails/$1',['filter'=>'adminauth']);
   

});

$routes->group('login',["namespace"=>"App\Controllers\Admin"],function($routes){
//Login
$routes->get('/','Login::index');
$routes->post('verify','Login::verify');
$routes->get('otp-verify','Login::otpCheck',['filter'=>'otpauth']);
$routes->post('otp-auth','Login::otpVerify');
$routes->get('exit','Login::logout');
});



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
