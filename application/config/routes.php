<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['categories/edit'] = 'categories/edit';
$route['categories/delete'] = 'categories/delete';
$route['categories/create'] = 'categories/create';
$route['categories/(:any)'] = 'categories/view/$1';
$route['categories'] = 'categories/index';

$route['posts/edit'] = 'posts/edit';
$route['posts/delete'] = 'posts/delete';
$route['posts/create'] = 'posts/create';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
