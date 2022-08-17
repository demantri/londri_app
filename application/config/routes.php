<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// user 
$route['user/hak-akses'] = 'user/hak_akses';

$route['user/daftar-member'] = 'member/daftar';

$route['londri/list-paket'] = 'londri/index';
$route['londri/list-parfum'] = 'parfum/index';

