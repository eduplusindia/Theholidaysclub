<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "login";
$route['404_override'] = 'error';


/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['logout'] = 'user/logout';
$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";
$route['confirmMember/(:num)'] = "user/confirmMember/$1";

$route['giftVoucher'] = "user/giftVoucher";
$route['addGiftVoucher'] = "user/addGiftVoucher";
$route['ThankYou/(:num)'] = "user/ThankYou/$1";
$route['vouchers'] = "user/vouchers";
$route['configuration'] = "user/configuration";
$route['editConfiguration'] = "user/editConfiguration";
$route['updateConfiguration'] = "user/updateConfiguration";
$route['voucherDetails/(:num)'] = "user/voucherDetails/$1";
$route['deleteVoucher/(:num)'] = "user/deleteVoucher/$1s";
$route['voucherByLocation'] = "user/voucherByLocation";
$route['voucherProfile/(:num)'] = "user/voucherProfile/$1";


$route['venues/(:num)'] = 'user/venues/$1';
//$route['addvenue'] = 'user/addvenue';
$route['addvenue/(:any)'] = 'user/addvenue/$1';
$route['insertVenue'] = 'user/insertVenue';
$route['updateVenue'] = 'user/updateVenue';
$route['editvenues/(:num)'] = "user/editvenues/$1";

$route['addlocation'] = 'user/addlocation';
$route['insertLoction'] = 'user/insertLoction';
$route['locations'] = 'user/locations';
$route['updateLoction'] = 'user/updateLoction';
$route['editlocaion/(:num)'] = "user/editlocaion/$1";

$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

$route['leadEditpage/(:num)'] = 'leads/leadEditpage/$1';

$route['editLead'] = 'leads/editLead';
$route['addNewLead'] = 'leads/addNewLead';
$route['addLead'] = 'leads/addLead';
$route['leads'] = 'leads';
$route['view_detail/(:num)'] = 'user/view_detail/$1';
$route['view_memberDetail/(:num)'] = 'user/view_memberDetail/$1';
$route['webuserAddPage'] = 'user/webuserAddPage';
$route['addMember'] = 'user/addMember';
$route['addWebuser'] = 'user/addWebuser';
$route['userRole'] = 'user/userRole';
$route['editRole/(:num)'] = 'user/editRole/$1';
$route['addNewRole'] = 'user/addNewRole';
$route['updateRole'] = 'user/updateRole';
$route['insertRole'] = 'user/insertRole';
$route['insertMember'] = 'user/insertMember';
$route['webusersList'] = 'user/webusersList';
$route['membersList'] = 'user/membersList';
$route['updateMember'] = 'user/updateMember';
$route['webuserEdit'] = "user/webuserEdit";
$route['webuserEditPage/(:num)'] = "user/webuserEditPage/$1";
$route['memberEdit/(:num)'] = "user/memberEdit/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */