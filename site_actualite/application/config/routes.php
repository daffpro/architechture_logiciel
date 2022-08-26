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
$route['dashboard'] = 'Dashboard/index';
$route['default_controller'] = 'Welcome/index';
$route['Welcome_category'] = 'Welcome_category';
$route['category_posts/get/(:any)'] = 'Welcome_category/get/$1';
$route['details_posts/get/(:any)'] = 'Single/get/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin'] = 'Welcome/login';
$route['logout'] = 'Welcome/login';
$route['genkey'] = 'Generatekey';
$route['generate'] = 'Generatekey/generate';
$route['categorie'] = 'Categorie/index';
$route['categorie/(:any)'] = 'Categorie/$1';
$route['categorie/(:any)/(:any)'] = 'Categorie/$1/$2';
$route['api/categorie/get_all'] = 'api/Categorie/get_all';
$route['api/categorie/addnew'] = 'api/Categorie/addnew';
$route['api/categorie/edit'] = 'api/Categorie/edit';
$route['api/categorie/remove'] = 'api/Categorie/remove'; 
                  
$route['posts'] = 'Posts/index';
$route['posts/(:any)'] = 'Posts/$1';
$route['posts/(:any)/(:any)'] = 'Posts/$1/$2';
$route['api/posts/get_all'] = 'api/Posts/get_all';
$route['api/posts/get_all_by_cat'] = 'api/Posts/get_all_by_cat';
$route['api/posts/get_post_by_cat/(:any)'] = 'api/Posts/get_post_by_cat/$1';
$route['api/posts/addnew'] = 'api/Posts/addnew';
$route['api/posts/edit'] = 'api/Posts/edit';
$route['api/posts/remove'] = 'api/Posts/remove';
                  
$route['profil'] = 'Profil/index';
$route['profil/(:any)'] = 'Profil/$1';
$route['profil/(:any)/(:any)'] = 'Profil/$1/$2';
$route['api/profil/get_all'] = 'api/Profil/get_all';
$route['api/profil/addnew'] = 'api/Profil/addnew';
$route['api/profil/edit'] = 'api/Profil/edit';
$route['api/profil/remove'] = 'api/Profil/remove'; 
                  
$route['utilisateurs'] = 'Utilisateurs/index';
$route['utilisateurs/(:any)'] = 'Utilisateurs/$1';
$route['utilisateurs/(:any)/(:any)'] = 'Utilisateurs/$1/$2';
$route['api/utilisateurs/get_all'] = 'api/Utilisateurs/get_all';
$route['api/utilisateurs/addnew'] = 'api/Utilisateurs/addnew';
$route['api/utilisateurs/edit'] = 'api/Utilisateurs/edit';
$route['api/utilisateurs/remove'] = 'api/Utilisateurs/remove'; 
                  
$route['soap/nuSoapServer/getMember/wsdl'] = 'soap/nuSoapServer/index/wsdl';
$route['soap/nuSoapServer/getMembers'] = 'soap/nuSoapServer/get_member';
$route['soap/SoapServer'] = 'soap/SoapServer2';
$route['soap/utilisateurs'] = 'soap/SoapServer2/listeutilisateur';
$route['client'] = 'soap/client';
$route['Webservice/wsdl']="soap/Webservice/index/wsdl";
$route['Webservice']="soap/Webservice/index";