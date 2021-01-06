<?php
defined('BASEPATH') OR exit('No direct script access allowed');





$route['change-password-exe'] = 'Authentication/change_pwd';
$route['change-password'] = 'PageLoaderProtected/change_password';
$route['delete-item-exe'] = 'Items/delete';
$route['create-invoice-and-download'] = 'Invoices/create_invoice';
$route['fetch-costs-and-cloth-reqd'] = 'AjaxController/fetch_costs_cloth_reqd_for_item_and_size';
$route['create-new-invoice'] = 'PageLoaderProtected/create_new_invoice';
$route['add-new-item-exe'] = 'Items/add_new';
$route['add-new-item'] = 'PageLoaderProtected/add_new_item';
$route['see-all-items'] = 'PageLoaderProtected/all_items';
$route['logout'] = 'Authentication/logout';
$route['user-login-exe'] = 'Authentication/login';
$route['login'] = 'PageLoaderPublic/login';
$route['default_controller'] = 'PageLoaderProtected/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
