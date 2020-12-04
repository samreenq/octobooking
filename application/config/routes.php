<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'octo';

$route['thankyou'] = 'octo/thankyou';
$route['about-us'] = 'octo/aboutus';
$route['privacy-policy'] = 'octo/aboutus';
$route['terms-and-condition'] = 'octo/aboutus';
$route['our-services'] = 'octo/ourservices';
$route['our-services/(:any)'] = 'octo/ourservices/$1';
$route['service/(:any)'] = 'octo/serviceDetail/$1';
$route['become-vendor'] = 'octo/becomevendor';
$route['contact-us'] = 'octo/contactus';
$route['lang-switch/(:any)'] = 'octo/switchLanguage/$1';

$route['my-wishlist'] = 'octo/myWishlist';
$route['my-wishlist/(:any)'] = 'octo/myWishlist/$1';
$route['my-orders'] = 'octo/myOrdersList';
$route['booking/(:any)'] 	= 'octo/orderdetail/$1';
$route['loginSubmit'] = 'octo/loginSubmit';
$route['registerSubmit'] = 'octo/registerSubmit';
$route['profile'] = 'octo/myprofile';
$route['logout'] = 'octo/logout';
$route['change-password'] = 'octo/changepassword';
$route['SubmitPasswordChange'] = 'octo/SubmitPasswordChange';
$route['resetSubmit'] = 'octo/resetSubmit';
$route['reset-password'] = 'octo/resetPassword';
$route['edit-profile'] = 'octo/editProfile';

$route['products'] = 'octo/productList';
$route['products/(:any)'] = 'octo/productList/$1';
$route['product/(:any)'] = 'octo/product/$1';
$route['checkout'] = 'octo/checkout';
$route['submitCheckout'] = 'octo/submitCheckout';

$route['vendor/add-service'] = 'vendor/addservice';
$route['vendor/add-listing'] = 'vendor/addvenue';
$route['vendor/my-services'] 	= 'vendor/listservices';
$route['vendor/my-venues'] 	= 'vendor/listvenues';
$route['vendor/my-bookings'] 	= 'vendor/listbookings';
$route['vendor/booking/(:any)'] 	= 'vendor/bookingdetail/$1';
$route['addVenueSubmit'] = 'vendor/addVenueSubmit';
$route['addServiceSubmit'] = 'vendor/addServiceSubmit';
$route['submit-packages'] = 'vendor/submitpackages';
$route['submit-gallery'] = 'vendor/submitgallery';
$route['vendor/update-status'] = 'vendor/updateVenueStatus';

$route['cms-page/(:any)'] = 'octo/cmsPage/$1';
$route['contact-us'] = 'octo/contactUs';
$route['activate-user'] = 'octo/activateUser';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['get_service_package'] = 'octo/getServicePackage';
$route['get_venue_price'] = 'octo/getVenuePrice';
$route['rating-submit'] = 'octo/ratingSubmit';
$route['vendor/walking-booking-submit'] = 'vendor/walkingBookingSubmit';
$route['vendor/walking-customer-booking'] = 'vendor/walkingBooking';
