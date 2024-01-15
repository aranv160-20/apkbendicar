<?php 

/**
 * Home Page Controller
 * @category  Controller
 */
class HomeController extends SecureController{
	/**
     * Index Action
     * @return View
     */
	function index(){
		if(strtolower(USER_ROLE) == 'administrator'){
			$this->render_view("home/administrator.php" , null , "main_layout.php");
		}
		elseif(strtolower(USER_ROLE) == 'owner'){
			$this->render_view("home/owner.php" , null , "main_layout.php");
		}
		elseif(strtolower(USER_ROLE) == 'petugas'){
			$this->render_view("home/petugas.php" , null , "main_layout.php");
		}
		elseif(strtolower(USER_ROLE) == 'customer'){
			$this->render_view("home/customer.php" , null , "main_layout.php");
		}
		else{
			$this->render_view("home/index.php" , null , "main_layout.php");
		}
	}
}
