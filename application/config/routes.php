<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route = [
    'default_controller'                => 'asrama',
    'logout'                            => 'asrama/logout',
    'Admin'                             =>'Admin',
    'User'                              =>'User',
    'Musahil'                           =>'Musahil'
];
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
