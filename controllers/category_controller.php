<?php
/**
 * 
 */
require_once("model/category.php");
require_once('base_controller.php');
class CategoryController extends BaseController
{
	public function __construct(){
		$this->folder="category";
		unset($_SESSION['admin_status2']);
	}
	public function getproductbycatid(){
		$start=isset($_GET['start'])?$_GET['start']:"";
		$limit=isset($_GET['limit'])?$_GET['limit']:"";

		$catId = isset($_GET['id'])? $_GET['id'] : "";
		if (!empty($catId)) {
			$arrProductByCatId = Category::getProductByCatId($catId, $start, $limit);
			$data=array('product'=>$arrProductByCatId);
			$this->render("index",$data);
		}else{
			//điều hướng về index hoặc trang báo lỗi
		}
	}

	public function getproductbySearch(){
		$search = isset($_GET['search'])? $_GET['search'] : "";
		if (!empty($search)) {
			$arrProductBySearch = Category::getProductBySearch($search);
			$data=array('product'=>$arrProductBySearch);
			$this->render("index",$data);
		}else{
			header("location:".PATH);
		}
	}


}
?>