<?php
	require_once('base_controller.php');
	require_once("model/products.php");
	class CartController extends BaseController
	{
		public function __construct(){
			$this->folder="product";
			unset($_SESSION['admin_status2']);
		}


		public function getcart(){
			$this->render("cart");
		}
	}
?>