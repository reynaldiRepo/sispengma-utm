<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'asrama';
$route['logout'] = 'asrama/logout';
$route['admin'] = 'admin/(:any)';
$route['user'] = 'user/(:any)';
$route['musahil'] = 'musahil/(:any)';
$route['musahil/(:any)'] = 'admin/(:any)';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
