<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'pages/view';
$route['register'] = 'users/userRegister';
$route['login'] = 'users/userLogin';
$route['signup'] = 'users/signup';
$route['check'] = 'users/checkLogin';
$route['dashboard'] = 'dashboard/index';
$route['client'] = 'client/index';
$route['getclient'] = 'client/getClient';
$route['addClient'] = 'client/addClient';
$route['addclientr'] = 'client/addclientr';
$route['produit'] = 'client/produit';
$route['listsproduit'] = 'client/getProduct';
$route['facture'] = 'facture/showfacture';
$route['facturebyclient'] = 'facture/getFactureByClient';
$route['showpdf'] = 'facture/showpdf';
$route['about'] = 'users/about';
$route['acceuil'] = 'users/acceuil';
$route['logout'] = 'users/logout';
$route['(:any)']='pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;