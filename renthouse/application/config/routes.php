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

$route['default_controller'] = "welcome";
$route['404_override'] = '';
$route['Guest_home'] = 'welcome/Guest_home';
$route['admin'] = "admin/welcome/login";
//$route['admin/(:any)'] = 'admin/welcome/$1';
$route['admin/owner/(:num)'] = 'admin/welcome/owner/$1';
$route['admin/login'] = "admin/welcome/login";
$route['admin/index'] = "admin/welcome/index";
$route['admin/house'] = "admin/house/index";
$route['admin/owner']='admin/welcome/owner';
$route['admin/add_owner']='admin/welcome/add_owner';
$route['admin/owner_detial']='admin/welcome/owner_detial';
$route['admin/forbid_owner']='admin/welcome/forbid_owner';
$route['admin/edit_owner']='admin/welcome/edit_owner';
$route['admin/delete_owner']='admin/welcome/delete_owner';
$route['admin/delete_selected_owner']='admin/welcome/delete_selected_owner';
//$route['admin/edit_owner_infor']='admin/welcome/edit_owner_infor';
$route['admin/add_owner_infor']='admin/welcome/add_owner_infor';
$route['admin/relieve_forbid_owner']='admin/welcome/relieve_forbid_owner';






/*房源管理开始*/
//$route['rooms_mgr'] = "admin/mgruser/rooms_mgr";
//$route['mgruser/rooms_mgr'] = "admin/mgruser/rooms_mgr";
$route['admin/mgruser/rooms_mgr/(:num)'] = 'admin/mgruser/rooms_mgr/$1';

/*收发回复路由*/
$route['send_rec_message'] = "admin/mgruser/send_rec_message";

$route['get_rec_message'] = "admin/mgruser/get_rec_message";
$route['get_send_message'] = "admin/mgruser/get_send_message";
$route['delete_message'] = "admin/mgruser/delete_message";
$route['reply_message'] = "admin/mgruser/reply_message";

$route['mgruser/get_rec_message'] = "admin/mgruser/get_rec_message";
$route['mgruser/get_send_message'] = "admin/mgruser/get_send_message";
$route['mgruser/delete_message'] = "admin/mgruser/delete_message";
$route['mgruser/reply_message'] = "admin/mgruser/reply_message";



/*房客对房东评论路由*/
$route['admin/mgruser/user_comment_owner/(:num)'] = "admin/mgruser/user_comment_owner/$1";



/*配置房客管理页面的路由开始*/

$route['admin/mgruser/mgr_user/(:num)'] = 'admin/mgruser/mgr_user/$1';

/*配置房客管理页面的路由*/
//$route['admin/mgr_user'] = "admin/mgruser/mgr_user";

/*配置编辑房客管理页面的路由*/
$route['admin/mgr_user_edit'] = "admin/mgruser/mgr_user_edit";
$route['admin/mgruser/mgr_user_edit'] = "admin/mgruser/mgr_user_edit";

$route['admin/mgr_user_update'] = "admin/mgruser/mgr_user_update";
$route['admin/mgruser/mgr_user_update'] = "admin/mgruser/mgr_user_update";

/*配置保存房客信息房客管理页面的路由*/


//$route['admin/mgr_user_save'] = "admin/mgruser/mgr_user_save";
//$route['admin/mgruser/mgr_user_save'] = "admin/mgruser/mgr_user_save";

/*配置新增房客管理页面的路由*/
$route['admin/mgr_user_add'] = "admin/mgruser/mgr_user_add";

/*配置禁用房客管理页面的路由*/
$route['admin/mgruser/disabled_user'] = "admin/mgruser/disabled_user";

/*配置查询房客管理页面的路由*/
$route['admin/mgruser/search_user'] = "admin/mgruser/search_user";

/*配置删除房客管理页面的路由*/
$route['admin/mgruser/delete_user'] = "admin/mgruser/delete_user";
$route['admin/mgruser/delete_selected_user'] = "admin/mgruser/delete_selected_user";

//$route['admin/mgruser/(:any)'] = "admin/mgruser/$1";
$route['admin/mgr_user_update/(:any)'] = "admin/mgruser/mgr_user_update/$1";
/*配置房客管理页面的路由结束*/












/*thj--配置评论管理页面路由*/
$route['admin/comment'] = "admin/welcome/get_comments";
/*配置公告管理页面的路由*/
$route['admin/notice'] = "admin/welcome/notice";
/*配置房东主页页面路由*/
$route['owner'] = "ownerHomepage/index";
/*配置发布房源路由*/
$route['publish'] = "welcome/publish";
/*配置收藏页路由*/
$route['collect'] = "welcome/collect_page";
/*意见反馈路由*/
$route['admin/feedback'] = "admin/welcome/feedback";

$route['booklist'] = 'book/booklist';
$route['journey'] = 'book/journey';

/*成为房东页面的路由*/
$route['become_owner'] = "welcome/become_owner";
/*预定房源页面的路由*/
$route['order'] = "welcome/order";
/*弹层主页面路由配置*/
$route['tanceng'] = "welcome/tanceng";
/*分享个人路由配置*/
$route['share'] = "welcome/share";
/*申诉的路由*/
$route['complaint'] = "welcome/complaint";
/*申诉详情的路由*/
$route['complaint_details'] = "welcome/complaint_details";
/*房源详情页*/
$route['house_detail'] = "welcome/house_detail";
/*登陆-注册-忘记密码*/
$route['register'] = "welcome/register";
$route['login'] = "welcome/login";
$route['forget_password'] = "welcome/forget_password";
