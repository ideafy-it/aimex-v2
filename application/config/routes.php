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
$route['default_controller'] = 'pages';
$route['(:any)'] = 'pages/view/$1';
// Loans
$route['loans/(:any)'] = 'loans/view/$1';
$route['loans/home/(:any)'] = 'loans/view/home/$1';
$route['loans/loanDetails_new/(:any)'] = 'loans/view/loanDetails_new/$1';
$route['loans/loanDetails_renewal/(:any)'] = 'loans/view/loanDetails_renewal/$1';
$route['loans/loanDetails_additional/(:any)'] = 'loans/view/loanDetails_additional/$1';
$route['loans/loanDetails_extension/(:any)'] = 'loans/view/loanDetails_extension/$1';
$route['loans/addNewLoan/(:any)'] = 'loans/view/addNewLoan/$1';
$route['loans/addRenewLoan/(:any)'] = 'loans/view/addRenewLoan/$1';
$route['loans/addExtensionLoan/(:any)'] = 'loans/view/addExtensionLoan/$1';
$route['loans/addAdditionalLoan/(:any)'] = 'loans/view/addAdditionalLoan/$1';
$route['loans/function/(:any)'] = 'loans/$1';
// Collections
$route['collections/(:any)'] = 'collections/view/$1';
// Clients
$route['clients/(:any)'] = 'clients/view/$1';
$route['clients/home/(:any)'] = 'clients/view/home/$1';
$route['clients/function/(:any)'] = 'clients/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
