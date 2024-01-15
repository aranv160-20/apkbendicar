<?php
/**
 * Page Access Control
 * @category  RBAC Helper
 */
defined('ROOT') or exit('No direct script access allowed');
class ACL
{
	

	/**
	 * Array of user roles and page access 
	 * Use "*" to grant all access right to particular user role
	 * @var array
	 */
	public static $role_pages = array(
			'administrator' =>
						array(
							'denda' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'kendaraan' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'peminjaman' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'pengembalian' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'penyewa' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'petugas' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'tbl_user' => array('list','view','add','edit', 'editfield','delete','userregister','accountedit','accountview')
						),
		
			'owner' =>
						array(
							'denda' => array('list','view','import_data'),
							'kendaraan' => array('list','view','import_data'),
							'peminjaman' => array('list','view','import_data'),
							'pengembalian' => array('list','view','import_data'),
							'tbl_user' => array('userregister','accountedit','accountview')
						),
		
			'petugas' =>
						array(
							'denda' => array('list','view','add','edit', 'editfield','delete'),
							'kendaraan' => array('list','view','edit', 'editfield'),
							'peminjaman' => array('list','view','add','edit', 'editfield','delete'),
							'pengembalian' => array('list','view','add','edit', 'editfield','delete'),
							'penyewa' => array('list','view','add','edit', 'editfield','delete'),
							'petugas' => array('list','view'),
							'tbl_user' => array('userregister','accountedit','accountview')
						),
		
			'customer' =>
						array(
							'denda' => array('list','view'),
							'kendaraan' => array('list','view'),
							'peminjaman' => array('list','view','add','edit', 'editfield'),
							'pengembalian' => array('list','view','add','edit', 'editfield'),
							'tbl_user' => array('userregister','accountedit','accountview')
						)
		);

	/**
	 * Current user role name
	 * @var string
	 */
	public static $user_role = null;

	/**
	 * pages to Exclude From Access Validation Check
	 * @var array
	 */
	public static $exclude_page_check = array("", "index", "home", "account", "info", "masterdetail");

	/**
	 * Init page properties
	 */
	public function __construct()
	{	
		if(!empty(USER_ROLE)){
			self::$user_role = USER_ROLE;
		}
	}

	/**
	 * Check page path against user role permissions
	 * if user has access return AUTHORIZED
	 * if user has NO access return UNAUTHORIZED
	 * if user has NO role return NO_ROLE
	 * @return string
	 */
	public static function GetPageAccess($path)
	{
		$rp = self::$role_pages;
		if ($rp == "*") {
			return AUTHORIZED; // Grant access to any user
		} else {
			$path = strtolower(trim($path, '/'));

			$arr_path = explode("/", $path);
			$page = strtolower($arr_path[0]);

			//If user is accessing excluded access contrl pages
			if (in_array($page, self::$exclude_page_check)) {
				return AUTHORIZED;
			}

			$user_role = strtolower(USER_ROLE); // Get user defined role from session value
			if (array_key_exists($user_role, $rp)) {
				$action = (!empty($arr_path[1]) ? $arr_path[1] : "list");
				if ($action == "index") {
					$action = "list";
				}
				//Check if user have access to all pages or user have access to all page actions
				if ($rp[$user_role] == "*" || (!empty($rp[$user_role][$page]) && $rp[$user_role][$page] == "*")) {
					return AUTHORIZED;
				} else {
					if (!empty($rp[$user_role][$page]) && in_array($action, $rp[$user_role][$page])) {
						return AUTHORIZED;
					}
				}
				return FORBIDDEN;
			} else {
				//User does not have any role.
				return NOROLE;
			}
		}
	}

	/**
	 * Check if user role has access to a page
	 * @return Bool
	 */
	public static function is_allowed($path)
	{
		return (self::GetPageAccess($path) == AUTHORIZED);
	}

}
