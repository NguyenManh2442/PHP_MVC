<?php
require_once("controllers/base_controller.php");
require_once("model/employee.php");
class AdminController extends BaseController
{
	public function __construct(){
		$this->folder = "admin";
		$_SESSION['admin_status2'] = "admin page";

	}
	public function index(){
		if (isset($_SESSION['admin2']) && $_SESSION['login_admin2']==true) {
				$this->render("index");
			}	
		else{
			$this->render('login');
		}
	}
	public function login(){
		if (isset($_POST['dangnhap'])) {
			$u=$_POST['email'];
			$p=$_POST['pass'];
			if(Employee::checkLogin($u,$p)==1){
				$_SESSION['admin2']=$u;
				$_SESSION['login_admin2']=true;
				$this->render('index');
			}
			else{
				header("location:".PATH."?controller=admin");
			}
		}
	}
	public function logout(){
		unset($_SESSION['admin2']);
		$_SESSION['login_admin2']=false;
		header("location:".PATH."?controller=admin");
	}
	public function quanTriSanPham(){
		if (isset($_SESSION['admin2']) && $_SESSION['login_admin2']==true) {
				$pro = Employee::getAllProduct();
				$data = array('p'=>$pro);
				$this->render("quanTriSanPham", $data);
			}	
		else{
			$this->render('login');
		}
	}
	public function updateProduct(){
		

		if (isset($_SESSION['admin2']) && $_SESSION['login_admin2']==true) {
			$id=isset($_GET['id'])?$_GET['id']:"";
			if($id==""){
				header("location:".PATH."?controller=page&action=error");
			}
			else{
				$data=Employee::getProductById($id);
				$this->render("updateProduct",$data);
				}
			}	
		else{
			$this->render('login');
		}
	}



	public function deleteProduct(){
		
		if (isset($_SESSION['admin2']) && $_SESSION['login_admin2']==true) {
			$id=isset($_GET['id'])?$_GET['id']:"";
			if($id==""){
				header("location:".PATH."?controller=page&action=error");
			}
			else{
				if(Employee::deleteProductById($id)==true){
					header("location:".PATH."?controller=admin&action=quanTriSanPham");
				}
				else{
					echo "lỗi không xóa được";
				}
			}
		}	
		else{
			$this->render('login');
		}
	}
	
}
?>