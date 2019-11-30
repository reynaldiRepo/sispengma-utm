<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'asrama';
$route['logout'] = 'asrama/logout';
$route["admin"] = 'admin/(:any)';
$route["Musahil/insert_penghuni"] = "Admin/insert_penghuni";
$route["Musahil/ManagePassword"] = "Admin/ManagePassword";
$route["Musahil/reset_password"] = "Admin/reset_password";
$route["Musahil/managePassword"] = "Admin/ManagePassword";
$route["Musahil/data_pendaftaran"] = "Admin/data_pendaftaran";
$route["Musahil/data_gedung"] = "Admin/data_gedung";
$route["Musahil/add_penghuni"] = "Admin/add_penghuni";
$route["Musahil/get_token"] = "Admin/get_token";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
