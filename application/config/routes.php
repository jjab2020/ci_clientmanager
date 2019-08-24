<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'pages/view';
$route['register'] = 'users/userRegister';
$route['login'] = 'users/userLogin';
$route['signup'] = 'users/signup';
$route['check'] = 'users/checkLogin';
$route['dashboard'] = 'dashboard/index';
$route['client'] = 'client/index';
$route['commande'] = 'client/commande';
$route['logout'] = 'users/logout';
$route['(:any)']='pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;