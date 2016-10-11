<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] 	= 'Dashboard_controller';
$route['404_override'] 			= 'Error_controller';
$route['translate_uri_dashes'] 	= FALSE;


/*==============================================
DASHBOARD CONTROLLER
================================================*/
$route['dashboard'] 		= 'Dashboard_controller/index';

/*==============================================
AUDIT CONTROLLER
================================================*/
$route['audit-trail'] 		= 'Audit_controller/index';

/*==============================================
USER CONTROLLER
================================================*/
$route['users'] 					= 'User_controller/index';
$route['users/add'] 				= 'User_controller/add_user';
$route['lock'] 						= 'User_controller/lock_user';
$route['user-group'] 				= 'User_controller/user_group';
$route['signin'] 					= 'User_controller/signin';
$route['forgot-password'] 			= 'User_controller/forgot_password';
$route['check_user'] 				= 'User_controller/cek_authorization';
$route['signout'] 					= 'User_controller/process_signout';
$route['setting'] 					= 'User_controller/setting';
$route['users/process_edit'] 		= 'User_controller/process_edit';
$route['users/delete'] 				= 'User_controller/process_delete';
$route['users/process_add'] 		= 'User_controller/process_add';
$route['users/edit/(:any)'] 		= 'User_controller/edit_user/$1';

/*==============================================
USER GROUP CONTROLLER
================================================*/
$route['user-group'] 				= 'UserGroup_controller/index';
$route['user-group/add'] 			= 'UserGroup_controller/add';

/*==============================================
MENU CONTROLLER
================================================*/
$route['menu'] 						= 'Menu_controller/index';
$route['menu/add'] 					= 'Menu_controller/add';
$route['menu/process_add'] 			= 'Menu_controller/process_add';
$route['menu/edit/(:num)'] 			= 'Menu_controller/edit/$1';
$route['menu/process_edit'] 		= 'Menu_controller/process_edit';
$route['menu/delete'] 				= 'Menu_controller/process_delete';

/*==============================================
TRAINER CONTROLLER
================================================*/
$route['trainer'] 						= 'Trainer_controller/index';
$route['trainer/add'] 					= 'Trainer_controller/add';
$route['trainer/process_add'] 			= 'Trainer_controller/process_add';
$route['trainer/edit/(:num)'] 			= 'Trainer_controller/edit/$1';
$route['trainer/process_edit'] 			= 'Trainer_controller/process_edit';
$route['trainer/delete'] 				= 'Trainer_controller/process_delete';

/*==============================================
MATERI CONTROLLER
================================================*/
$route['materi'] 						= 'Materi_controller/index';
$route['materi/add'] 					= 'Materi_controller/add';
$route['materi/process_add'] 			= 'Materi_controller/process_add';
$route['materi/edit/(:num)'] 			= 'Materi_controller/edit/$1';
$route['materi/process_edit'] 			= 'Materi_controller/process_edit';
$route['materi/delete'] 				= 'Materi_controller/process_delete';

/*==============================================
TIPE PELATIHAN CONTROLLER
================================================*/
$route['tipe-pelatihan'] 						= 'TipePelatihan_controller/index';
$route['tipe-pelatihan/add'] 					= 'TipePelatihan_controller/add';
$route['tipe-pelatihan/process_add'] 			= 'TipePelatihan_controller/process_add';
$route['tipe-pelatihan/edit/(:num)'] 			= 'TipePelatihan_controller/edit/$1';
$route['tipe-pelatihan/process_edit'] 			= 'TipePelatihan_controller/process_edit';
$route['tipe-pelatihan/delete'] 				= 'TipePelatihan_controller/process_delete';

/*==============================================
KLASIFIKASI MATERI CONTROLLER
================================================*/
$route['klasifikasi-materi'] 						= 'KlasifikasiM_controller/index';
$route['klasifikasi-materi/add'] 					= 'KlasifikasiM_controller/add';
$route['klasifikasi-materi/process_add'] 			= 'KlasifikasiM_controller/process_add';
$route['klasifikasi-materi/edit/(:num)'] 			= 'KlasifikasiM_controller/edit/$1';
$route['klasifikasi-materi/process_edit'] 			= 'KlasifikasiM_controller/process_edit';
$route['klasifikasi-materi/delete'] 				= 'KlasifikasiM_controller/process_delete';

/*==============================================
DIVISI CONTROLLER
================================================*/
$route['divisi'] 						= 'Divisi_controller/index';
$route['divisi/add'] 					= 'Divisi_controller/add';
$route['divisi/process_add'] 			= 'Divisi_controller/process_add';
$route['divisi/edit/(:num)'] 			= 'Divisi_controller/edit/$1';
$route['divisi/process_edit'] 			= 'Divisi_controller/process_edit';
$route['divisi/delete'] 				= 'Divisi_controller/process_delete';

/*==============================================
EVENT CONTROLLER
================================================*/
$route['propose'] = 'Event_controller/propose';

/*==============================================
CABANG CONTROLLER
================================================*/
$route['cabang'] 						= 'Cabang_controller/index';
$route['cabang/add_cabang']				= 'Cabang_controller/add_cabang';
$route['cabang/edit_cabang/(:num)']		= 'Cabang_controller/edit_cabang/$1';
$route['cabang/process_add_cabang']		= 'Cabang_controller/process_add_cabang';
$route['cabang/process_edit_cabang']	= 'Cabang_controller/process_edit_cabang';
$route['cabang/process_delete_cabang']	= 'Cabang_controller/process_delete_cabang';
