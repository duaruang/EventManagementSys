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
$route['users/view/(:any)'] 		= 'User_controller/view_user/$1';
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
$route['user-group/process-add'] 	= 'UserGroup_controller/process_add';
$route['user-group/view/(:num)'] 	= 'UserGroup_controller/view/$1';
$route['user-group/edit/(:num)'] 	= 'UserGroup_controller/edit/$1';
$route['user-group/process-edit'] 	= 'UserGroup_controller/process_edit';
$route['user-group/process-delete'] = 'UserGroup_controller/process_delete';


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
TRAINER EKSTERNAL CONTROLLER
================================================*/
$route['trainer-eksternal']					= 'TrainerEksternal_controller/index';
$route['trainer-eksternal/add'] 			= 'TrainerEksternal_controller/add';
$route['trainer-eksternal/process-add'] 	= 'TrainerEksternal_controller/process_add';
$route['trainer-eksternal/view/(:num)'] 	= 'TrainerEksternal_controller/view/$1';
$route['trainer-eksternal/edit/(:num)'] 	= 'TrainerEksternal_controller/edit/$1';
$route['trainer-eksternal/process-edit']	= 'TrainerEksternal_controller/process_edit';
$route['trainer-eksternal/process-delete'] 	= 'TrainerEksternal_controller/process_delete';

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
TIPE EXAM CONTROLLER
================================================*/
$route['tipe-exam'] 						= 'TipeExam_controller/index';
$route['tipe-exam/add'] 					= 'TipeExam_controller/add';
$route['tipe-exam/process_add'] 			= 'TipeExam_controller/process_add';
$route['tipe-exam/edit/(:num)'] 			= 'TipeExam_controller/edit/$1';
$route['tipe-exam/process_edit'] 			= 'TipeExam_controller/process_edit';
$route['tipe-exam/delete'] 					= 'TipeExam_controller/process_delete';
$route['tipe-exam/view/(:num)'] 			= 'TipeExam_controller/view/$1';

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
KATEGORI TEMPAT CONTROLLER
================================================*/
$route['kategori-tempat'] 						= 'KategoriTempat_controller/index';
$route['kategori-tempat/add'] 					= 'KategoriTempat_controller/add';
$route['kategori-tempat/view/(:num)'] 			= 'KategoriTempat_controller/view/$1';
$route['kategori-tempat/process_add'] 			= 'KategoriTempat_controller/process_add';
$route['kategori-tempat/edit/(:num)'] 			= 'KategoriTempat_controller/edit/$1';
$route['kategori-tempat/process_edit'] 			= 'KategoriTempat_controller/process_edit';
$route['kategori-tempat/delete'] 				= 'KategoriTempat_controller/process_delete';

/*==============================================
KATEGORI EVENT CONTROLLER
================================================*/
$route['kategori-event'] 						= 'KategoriEvent_controller/index';
$route['kategori-event/add'] 					= 'KategoriEvent_controller/add';
$route['kategori-event/view/(:num)'] 			= 'KategoriEvent_controller/view/$1';
$route['kategori-event/process_add'] 			= 'KategoriEvent_controller/process_add';
$route['kategori-event/edit/(:num)'] 			= 'KategoriEvent_controller/edit/$1';
$route['kategori-event/process_edit'] 			= 'KategoriEvent_controller/process_edit';
$route['kategori-event/delete'] 				= 'KategoriEvent_controller/process_delete';

/*==============================================
KATEGORI RAB CONTROLLER
================================================*/
$route['kategori-rab'] 							= 'KategoriRab_controller/index';
$route['kategori-rab/add'] 						= 'KategoriRab_controller/add';
$route['kategori-rab/process-add-kategori'] 	= 'KategoriRab_controller/process_add_kategori';
$route['kategori-rab/process-add-subkategori'] 	= 'KategoriRab_controller/process_add_subkategori';
$route['kategori-rab/view/(:num)'] 				= 'KategoriRab_controller/view/$1';
$route['kategori-rab/edit/(:num)'] 				= 'KategoriRab_controller/edit/$1';
$route['kategori-rab/process-edit'] 			= 'KategoriRab_controller/process_edit';
$route['kategori-rab/process-delete'] 			= 'KategoriRab_controller/process_delete';

/*==============================================
BISNIS UNIT CONTROLLER
================================================*/
$route['bisnis-unit'] 							= 'BisnisUnit_controller/index';

/*==============================================
EVENT CONTROLLER
================================================*/
$route['pengajuan-event'] 							= 'Event_controller/propose';
$route['event'] 									= 'Event_controller/index';
$route['event/get_parent_anggaran'] 				= 'Event_controller/get_parent_anggaran';
$route['event/get_materi'] 							= 'Event_controller/get_materi';
$route['pengajuan-event/view/(:any)'] 				= 'Event_controller/view/$1';
$route['pengajuan-event/process_add'] 				= 'Event_controller/process_add';
$route['pengajuan-event/edit/(:any)'] 				= 'Event_controller/edit/$1';
$route['pengajuan-event/edit-tanggal/(:any)'] 		= 'Event_controller/edit_tanggal/$1';
$route['pengajuan-event/process_edit'] 				= 'Event_controller/process_edit';
$route['pengajuan-event/process_edit_tanggal'] 		= 'Event_controller/process_edit_tanggal';
$route['pengajuan-event/delete'] 					= 'Event_controller/process_delete';
$route['pengajuan-event/list-approval-atasan'] 		= 'Event_controller/list_approval_atasan';
$route['pengajuan-event/list-approval-pusat'] 		= 'Event_controller/list_approval_pusat';
$route['pengajuan-event/approval-atasan/(:any)']	= 'Event_controller/approval_atasan/$1';
$route['pengajuan-event/approval-pusat/(:any)']		= 'Event_controller/approval_pusat/$1';
$route['pengajuan-event/memo_view/(:any)'] 			= 'Event_controller/make_pdf/$1';
$route['pengajuan-event/process_approval_atasan'] 	= 'Event_controller/proccess_approval_atasan';
$route['pengajuan-event/process_approval_pusat'] 	= 'Event_controller/proccess_approval_pusat';

/*==============================================
CABANG CONTROLLER
================================================*/
$route['cabang'] 						= 'Cabang_controller/index';
$route['cabang/add_cabang']				= 'Cabang_controller/add_cabang';
$route['cabang/edit_cabang/(:num)']		= 'Cabang_controller/edit_cabang/$1';
$route['cabang/process_add_cabang']		= 'Cabang_controller/process_add_cabang';
$route['cabang/process_edit_cabang']	= 'Cabang_controller/process_edit_cabang';
$route['cabang/process_delete_cabang']	= 'Cabang_controller/process_delete_cabang';

/*==============================================
FEEDBACK CONTROLLER
================================================*/
$route['kirim-feedback'] 						= 'Feedback_controller/send';
$route['feedback/generate-participant'] 		= 'Feedback_controller/load_participant';
$route['feedback/process-send'] 				= 'Feedback_controller/process_send';
$route['list-feedback'] 						= 'Feedback_controller/index';
$route['list-feedback/view/(:num)'] 			= 'Feedback_controller/view/$1';
$route['feedback/process-delete'] 				= 'Feedback_controller/process_delete';

/*==============================================
BISNIS UNIT CONTROLLER
================================================*/
$route['bisnis-unit-jabatan'] 							= 'BisnisUnit_controller/index';
$route['bisnis-unit-jabatan/add'] 						= 'BisnisUnit_controller/add';
$route['bisnis-unit-jabatan/process-add-bisnis-unit'] 	= 'BisnisUnit_controller/process_add_bisnisunit';
$route['bisnis-unit-jabatan/process-add-jabatan'] 		= 'BisnisUnit_controller/process_add_jabatan';
$route['bisnis-unit-jabatan/view/(:num)/(:num)'] 		= 'BisnisUnit_controller/view/$1/$2';
$route['bisnis-unit-jabatan/edit/(:num)/(:num)'] 		= 'BisnisUnit_controller/edit/$1/$2';
$route['bisnis-unit-jabatan/process-edit'] 				= 'BisnisUnit_controller/process_edit';
$route['bisnis-unit-jabatan/process-delete'] 			= 'BisnisUnit_controller/process_delete';

/*==============================================
MATRIKS PROGRAM ANGGARAN CONTROLLER
================================================*/
$route['matriks-program-anggaran'] 							= 'ProgramAnggaran_controller/index';
$route['matriks-program-anggaran/add'] 						= 'ProgramAnggaran_controller/add';
$route['matriks-program-anggaran/process-add-lv1'] 			= 'ProgramAnggaran_controller/process_add_level1';
$route['matriks-program-anggaran/process-add-lv2'] 			= 'ProgramAnggaran_controller/process_add_level2';
$route['matriks-program-anggaran/process-add-lv3'] 			= 'ProgramAnggaran_controller/process_add_level3';
$route['matriks-program-anggaran/load-lv2'] 				= 'ProgramAnggaran_controller/load_level2';
$route['matriks-program-anggaran/view/(:num)/(:num)'] 		= 'ProgramAnggaran_controller/view/$1/$2';
$route['matriks-program-anggaran/edit/(:num)/(:num)'] 		= 'ProgramAnggaran_controller/edit/$1/$2';
$route['matriks-program-anggaran/process-edit'] 			= 'ProgramAnggaran_controller/process_edit';
$route['matriks-program-anggaran/load-kategori-program'] 	= 'ProgramAnggaran_controller/load_kategori';
$route['matriks-program-anggaran/process-delete'] 			= 'ProgramAnggaran_controller/process_delete';

/*==============================================
PERSETUJUAN USULAN CONTROLLER
================================================*/
$route['list-persetujuan'] 								= 'PersetujuanUsulan_controller/index';
$route['list-persetujuan/add'] 							= 'PersetujuanUsulan_controller/add';
$route['list-persetujuan/process-add'] 					= 'PersetujuanUsulan_controller/process_add';
$route['list-persetujuan/view/(:num)'] 					= 'PersetujuanUsulan_controller/view/$1';
$route['list-persetujuan/edit/(:num)'] 					= 'PersetujuanUsulan_controller/edit/$1';
$route['list-persetujuan/process-edit'] 				= 'PersetujuanUsulan_controller/process_edit';
$route['list-persetujuan/process-delete'] 				= 'PersetujuanUsulan_controller/process_delete';
$route['list-persetujuan-pengganti'] 					= 'PersetujuanUsulan_controller/index_alt';
$route['list-persetujuan-pengganti/add'] 				= 'PersetujuanUsulan_controller/add_alt';
$route['list-persetujuan-pengganti/process-add'] 		= 'PersetujuanUsulan_controller/process_add_alt';
$route['list-persetujuan-pengganti/view/(:num)'] 		= 'PersetujuanUsulan_controller/view_alt/$1';
$route['list-persetujuan-pengganti/get-user-content'] 	= 'PersetujuanUsulan_controller/get_content_user_alt';
$route['list-persetujuan-pengganti/edit/(:num)'] 		= 'PersetujuanUsulan_controller/edit_alt/$1';
$route['list-persetujuan-pengganti/process-edit'] 		= 'PersetujuanUsulan_controller/process_edit_alt';
$route['list-persetujuan-pengganti/process-delete'] 	= 'PersetujuanUsulan_controller/process_delete_alt';


/*==============================================
Realisasi CONTROLLER
================================================*/
$route['realisasi/edit/(:any)'] 				= 'Realisasi_controller/edit/$1';
$route['realisasi/list'] 						= 'Realisasi_controller/index';
$route['realisasi/get_parent_anggaran'] 		= 'Realisasi_controller/get_parent_anggaran';
$route['realisasi/get_materi'] 					= 'Realisasi_controller/get_materi';
$route['realisasi/view/(:any)'] 				= 'Realisasi_controller/view/$1';
$route['realisasi/process_add'] 				= 'Realisasi_controller/process_add';
$route['realisasi/edit-tanggal/(:any)'] 		= 'Realisasi_controller/edit_tanggal/$1';
$route['realisasi/process_edit'] 				= 'Realisasi_controller/process_edit';
$route['realisasi/process_edit_tanggal'] 		= 'Realisasi_controller/process_edit_tanggal';
$route['realisasi/delete'] 						= 'Realisasi_controller/process_delete';
$route['realisasi/list-approval-atasan'] 		= 'Realisasi_controller/list_approval_atasan';
$route['realisasi/list-approval-pusat'] 		= 'Realisasi_controller/list_approval_pusat';
$route['realisasi/approval-atasan/(:any)']		= 'Realisasi_controller/approval_atasan/$1';
$route['realisasi/approval-pusat/(:any)']		= 'Realisasi_controller/approval_pusat/$1';
$route['realisasi/memo_view/(:any)'] 			= 'Realisasi_controller/make_pdf/$1';
$route['realisasi/process_approval_atasan'] 	= 'Realisasi_controller/proccess_approval_atasan';
$route['realisasi/process_approval_pusat'] 		= 'Realisasi_controller/proccess_approval_pusat';
