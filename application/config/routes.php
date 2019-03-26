<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'HomeController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//login

$route['login'] = 'LoginController/index';
$route['logout'] = 'LoginController/logout';
$route['auth'] = 'LoginController/authentication';
$route['sio/view'] = 'HomeController/view_sio';
$route['home'] = 'HomeController/index';
$route['test-upload'] = 'UploadController/proses_upload';



$route['cetak'] = 'Laporanpdf/index';
$route['cetak2'] = 'EvalController/test';
$route['cetak3'] = 'Report/pdf';


$route['user'] = 'UserController/index';
$route['telegram'] = 'UserController/get_telegram';
$route['add-user'] = 'UserController/add_user';
$route['delete-user/(:any)'] = 'UserController/delete_user/$1';
$route['edit-user/(:any)'] = 'UserController/edit_user/$1';
$route['update-user'] = 'UserController/update_user';

//telegram
$route['add-id_telegram'] = 'UserController/add_id_telegram';
$route['delete-telegram/(:any)'] = 'UserController/delete_telegram/$1';
$route['edit-telegram/(:any)'] = 'UserController/edit_telegram/$1';
$route['update-telegram'] = 'UserController/update_telegram';


//eval

$route['delete/file/(:any)'] = 'EvalController/delete_file/$1';
$route['upload'] = 'EvalController/upload_file';
$route['view-file/(:any)'] = 'EvalController/view_file/$1';
$route['download-file/(:any)'] = 'EvalController/download/$1';
$route['eval'] = 'EvalController/index';
$route['return/add'] = 'EvalController/add_Return';
$route['return/view/(:any)'] = 'EvalController/view_detail/$1';
$route['eval/nik/(:any)'] = 'EvalController/ambil_user/$1';
$route['eval/ojt/(:any)'] = 'EvalController/ambil_bank/$1';
$route['eval/view'] = 'EvalController/view_eval';
$route['eval/save'] = 'EvalController/save_eval';
$route['eval/view-data'] = 'EvalController/view_data';
$route['end/delete/(:any)'] = 'EvalController/delete_eval/$1';
$route['end/view/(:any)'] = 'EvalController/print_evaluation/$1';
$route['end/view-docum'] = 'EvalController/view_docum';
$route['Sent-notif'] = 'EvalController/send_notif_telegram';
$route['certifikat/(:any)'] = 'EvalController/get_certifikat/$1';



$route['bank/delete/(:any)'] = 'OjtController/delete_bank/$1';
$route['ojt/view-bank/(:any)'] = 'OjtController/view_bank/$1';
$route['ojt'] = 'OjtController/index';
$route['ojt/bank'] = 'OjtController/add_bank';
$route['ojt/add'] = 'OjtController/add_ojt';
$route['ojt/delete/(:any)'] = 'OjtController/delete_ojt/$1';
$route['ojt/edit/(:any)'] = 'OjtController/edit_ojt/$1';
$route['ojt/update'] = 'OjtController/update_ojt';