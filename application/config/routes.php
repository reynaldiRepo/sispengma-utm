<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'asrama';
$route['logout'] = 'asrama/logout';
$route["admin"] = 'admin/(:any)';
$route["Musahil/insert_penghuni"] = "Admin/insert_penghuni";
$route["Musahil/ManagePassword"] = "Admin/ManagePassword";
$route["Musahil/reset_password"] = "Admin/reset_password";
$route["Musahil/managePassword"] = "Admin/ManagePassword";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
