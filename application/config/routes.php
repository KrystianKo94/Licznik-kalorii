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
$route['default_controller'] = 'Main_Page_Controller';
$route['404_override'] = 'Error_Controller';
$route['translate_uri_dashes'] = FALSE;
$route['register_user'] = 'Register_Controller/register_data';
$route['register'] = 'Register_Controller';
$route['login'] = 'Login_Controller';
$route['validation'] = 'Login_Controller/validate_user';
$route['logout'] = 'Login_Controller/logout';
$route['main'] = 'Main_Page_Controller';
$route['bmi'] = 'BMI_Controller';
$route['bmi_calculate'] = 'BMI_Controller/bmi_calculate';
$route['calories'] = 'Calories_Controller';
$route['add_calories'] = 'Calories_Controller/add_calories';
$route['chart'] = 'Chart_Controller';
$route['password'] = 'Passowrd_Controller';
$route['change_password'] = 'Passowrd_Controller/change_password';