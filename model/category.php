<?php
/**
 * 
 */
class Category
{
	
	public static function getCategoryParent(){
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="SELECT * FROM categories WHERE subcategoryid='0'";
		//tạo đối tượng prepare
		$stmt=$db->prepare($sql);
		$stmt->execute();
		$items=array();
		while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

			$items[]=$row;
		}
		return $items;
	}
	public static function getCategoryCon($loaicha){
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="SELECT * FROM categories WHERE subcategoryid='$loaicha'";
		//tạo đối tượng prepare
		$stmt=$db->prepare($sql);
		$stmt->execute();
		$items=array();
		while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

			$items[]=$row;
		}
		return $items;
	}


	public function getProductByCatId($id){
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="SELECT * FROM products WHERE categoryID= '$id' LIMIT 18";
		//tạo đối tượng prepare
		$stmt=$db->prepare($sql);
		$stmt->execute();
		$items=array();
		while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

			$items[]=$row;
		}
		return $items;
	}



	public function getProductBySearch($search){
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="SELECT * FROM products WHERE productName LIKE '%$search%'";
		//tạo đối tượng prepare
		$stmt=$db->prepare($sql);
		$stmt->execute();
		$items=array();
		while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

			$items[]=$row;
		}
		return $items;
	}
}
?>