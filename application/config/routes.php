<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



$route['user_login'] = 'admin_login/check_user_data';
$route['superadmin'] = 'admin_login/super_admin';


$route['dashboard'] = 'admin_login/login';
$route['logout'] = 'admin_login/logout';


$route['new-order'] = 'order/create_order';

$route['add-new-courier'] = 'courier/add_new_courier';
$route['add-courier'] = 'courier/add_courier';
$route['view-courier'] = 'courier/view_courier';
$route['edit-courier'] = 'courier/edit_courier';



$route['add-new-shop'] = 'shop/add_new_shop';
$route['add-shop'] = 'shop/add_shop';
$route['view-shop'] = 'shop/view_shop';
$route['edit-shop'] = 'shop/edit_shop';

$route['get_courier_charge'] = 'ajax/get_courier_charge';
$route['submit_order'] = 'ajax/submit_order';

$route['all-order'] = 'view_order';
$route['view-details'] = 'view_order/view_details';


