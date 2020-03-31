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
$route['default_controller'] = 'welcome';
$route['login'] = 'C_Login/login';
$route['logout'] = 'C_Login/logout';
//kajur
$route['kajur/home'] = 'C_kajur/home';
//kajur dosen
$route['kajur/dosen'] = 'C_kajur/dosen';
$route['kajur/detildosen/(:num)'] = 'C_kajur/detildosen/$1';
$route['kajur/dosen/insert'] = 'C_kajur/insertDosen';
$route['kajur/dosen/edit/(:num)'] = 'C_kajur/editDosen/$1';

//kajur jabatan
$route['kajur/jabatan'] = 'C_kajur/jabatan';
$route['kajur/detiljabatan/(:num)'] = 'C_kajur/detilJabatan/$1';
$route['kajur/jabatan/insert'] = 'C_kajur/insertJabatan';
$route['kajur/jabatan/edit'] = 'C_kajur/editJabatan';
$route['kajur/jabatan/delete/(:num)'] = 'C_kajur/deleteJabatan/$1';

//kajur kategori
$route['kajur/kategori'] = 'C_kajur/kategori';
$route['kajur/detilkategori/(:num)'] = 'C_kajur/detilKategori/$1';
$route['kajur/kategori/insert'] = 'C_kajur/insertKategori';
$route['kajur/kategori/edit'] = 'C_kajur/editKategori';
$route['kajur/kategori/delete/(:num)'] = 'C_kajur/deleteKategori/$1';

//kajur kegiatan
$route['kajur/kegiatan/undone'] = 'C_kajur/kegiatan';
$route['kajur/kegiatan/terlaksana'] = 'C_kajur/kegiatanTerlaksana';
$route['kajur/detilkegiatan/(:num)'] = 'C_kajur/detilKegiatan/$1';
$route['kajur/kegiatan/insert'] = 'C_kajur/insertKegiatan';
$route['kajur/kegiatan/edit/(:num)'] = 'C_kajur/editKegiatan/$1';
$route['kajur/pengajuan'] = 'C_kajur/pengajuan';
$route['kajur/detilpengajuan/(:num)'] = 'C_kajur/detilPengajuan/$1';
$route['kajur/kegiatan/acc/(:num)'] = 'C_kajur/acc/$1';
$route['kajur/kegiatan/delete/(:num)'] = 'C_kajur/deleteKegiatan/$1';
$route['kajur/kegiatan/search/(:num)'] = 'C_kajur/searchKegiatan/$1';
$route['kajur/kegiatan/selesai/(:num)'] = 'C_kajur/selesai/$1';

//kajur instansi
$route['kajur/instansidalam'] = 'C_kajur/instansiDalam';
$route['kajur/instansiluar'] = 'C_kajur/instansiLuar';
$route['kajur/detilinstansi/(:num)'] = 'C_kajur/detilInstansi/$1';
$route['kajur/instansi/edit/(:num)'] = 'C_kajur/editInstansi/$1';
$route['kajur/instansi/insert'] = 'C_kajur/insertInstansi';
$route['kajur/instansi/delete/(:num)'] = 'C_kajur/deleteInstansi/$1';

//kajur kerjasama
$route['kajur/kerjasama/insert'] = 'C_kajur/insertKerjasama';
$route['kajur/kerjasama/delete/(:num)'] = 'C_kajur/deleteKerjasama/$1';
$route['kajur/kerjasama/detil/(:num)'] = 'C_kajur/jenisKerjasama/$1';
$route['kajur/kerjasama/masukincolab'] = 'C_kajur/masukinColab';

//kajur kategori_kegiatan
$route['kajur/kategorikegiatan/insert'] = 'C_kajur/insertKategoriKegiatan';
$route['kajur/kategorikegiatan/delete/(:num)'] = 'C_kajur/deleteKategoriKegiatan/$1';

//kajur kolaborasi
$route['kajur/kolaborasi'] = 'C_kajur/kolaborasi';
$route['kajur/detilkolaborasi/(:num)'] = 'C_kajur/detilKolaborasi/$1';
$route['kajur/kolaborasi/insert'] = 'C_kajur/insertKolaborasi';
$route['kajur/kolaborasi/edit'] = 'C_kajur/editKolaborasi';
$route['kajur/kolaborasi/delete/(:num)'] = 'C_kajur/deleteKolaborasi/$1';

//upload
$route['dokumen/upload/(:num)'] = 'C_kajur/uploadDokumen/$1';
$route['dokumen/detil/(:num)'] = 'C_kajur/detilDokumen/$1';
//$route['dokumen/edit'] = 'C_kajur/updateDokumen';
$route['dokumen/delete/(:num)'] = 'C_kajur/deleteDokumen/$1';

//penugasan
$route['penugasan/insert'] = 'C_kajur/insertPenugasan';
$route['penugasan/insert-mhs'] = 'C_kajur/insertPenugasanMhs';
$route['penugasan/detil/(:num)'] = 'C_kajur/detilPenugasan/$1';
$route['penugasan/edit/(:num)'] = 'C_kajur/editPenugasan/$1';
$route['penugasan/delete/(:num)'] = 'C_kajur/deletePenugasan/$1';
$route['penugasan-mhs/delete/(:num)'] = 'C_kajur/deletePenugasanMhs/$1';

//dosen
//dosen jabatan
$route['dosen/jabatan'] = 'C_dosen/jabatan';
$route['dosen/detiljabatan/(:num)'] = 'C_dosen/detilJabatan/$1';
$route['dosen/jabatan/insert'] = 'C_dosen/insertJabatan';
$route['dosen/jabatan/edit'] = 'C_dosen/editJabatan';
$route['dosen/jabatan/delete/(:num)'] = 'C_dosen/deleteJabatan/$1';

//dosen kategori
$route['dosen/kategori'] = 'C_dosen/kategori';
$route['dosen/detilkategori/(:num)'] = 'C_dosen/detilKategori/$1';
$route['dosen/kategori/insert'] = 'C_dosen/insertKategori';
$route['dosen/kategori/edit'] = 'C_dosen/editKategori';
$route['dosen/kategori/delete/(:num)'] = 'C_dosen/deleteKategori/$1';

//dosen instansi
$route['dosen/instansidalam'] = 'C_dosen/instansiDalam';
$route['dosen/instansiluar'] = 'C_dosen/instansiLuar';
$route['dosen/detilinstansi/(:num)'] = 'C_dosen/detilInstansi/$1';
$route['dosen/instansi/edit/(:num)'] = 'C_dosen/editInstansi/$1';
$route['dosen/instansi/insert'] = 'C_dosen/insertInstansi';
$route['dosen/instansi/delete/(:num)'] = 'C_dosen/deleteInstansi/$1';

//dosen kegiatan
$route['dosen/kegiatan'] = 'C_dosen/kegiatan';
$route['dosen/kegiatan/insert'] = 'C_dosen/insertKegiatan';
$route['dosen/detilkegiatan/(:num)'] = 'C_dosen/detilKegiatan/$1';
$route['dosen/kegiatan/edit/(:num)'] = 'C_dosen/editKegiatan/$1';
$route['dosen/kegiatan/delete/(:num)'] = 'C_dosen/deleteKegiatan/$1';

//dosen kerjasama
$route['dosen/kerjasama/insert'] = 'C_dosen/insertKerjasama';
$route['dosen/kerjasama/delete/(:num)'] = 'C_dosen/deleteKerjasama/$1';

//dosen upload
$route['dosendokumen/upload/(:num)'] = 'C_dosen/uploadDokumen/$1';
$route['dosendokumen/detil/(:num)'] = 'C_dosen/detilDokumen/$1';
$route['dosendokumen/edit'] = 'C_dosen/updateDokumen';
$route['dosendokumen/delete/(:num)'] = 'C_dosen/deleteDokumen/$1';

//dosen penugasan
$route['dosenpenugasan/insert'] = 'C_dosen/insertPenugasan';
$route['dosenpenugasan/detil/(:num)'] = 'C_dosen/detilPenugasan/$1';
$route['dosenpenugasan/edit/(:num)'] = 'C_dosen/editPenugasan/$1';
$route['dosenpenugasan/delete/(:num)'] = 'C_dosen/deletePenugasan/$1';

//dosen kategori_kegiatan
$route['dosen/kategorikegiatan/insert'] = 'C_dosen/insertKategoriKegiatan';
$route['dosen/kategorikegiatan/delete/(:num)'] = 'C_dosen/deleteKategoriKegiatan/$1';

//dosen kolaborasi
$route['dosen/kolaborasi'] = 'C_dosen/kolaborasi';
$route['dosen/detilkolaborasi/(:num)'] = 'C_dosen/detilKolaborasi/$1';
$route['dosen/kolaborasi/insert'] = 'C_dosen/insertKolaborasi';
$route['dosen/kolaborasi/edit'] = 'C_dosen/editKolaborasi';
$route['dosen/kolaborasi/delete/(:num)'] = 'C_dosen/deleteKolaborasi/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
