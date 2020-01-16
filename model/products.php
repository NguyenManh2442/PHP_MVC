<?php
/**
 * 
 */
class Product{
	public $id;
	public $proId;
	public $proName;
	public $unitPrice;
	public $desc;
	public $image;
	public $catId;

	public static function getAllProduct(){
		//Khởi tạo đối tượng csdl 
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="SELECT id, productId, productName, unitPrice, image FROM products";
		//tạo đối tượng prepare
		$stmt=$db->prepare($sql);
		$stmt->execute();
		$items=array();
		while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

			$items[]=$row;
		}
		return $items;

	}
	public static function getProductById($id){
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="SELECT * FROM products WHERE id = $id";
		//tạo đối tượng prepare
		$stmt=$db->prepare($sql);
		$stmt->execute();
		$count = $stmt->rowCount();//Tra ve so ban ghi duoc lay ra
		if($count>0){
			$item = $stmt->fetch(PDO::FETCH_ASSOC);
			return $item;
		}
		else{
			return null;
		}
	}
	
	public static function getSlide(){
		//Khởi tạo đối tượng csdl 
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="SELECT * FROM slideshow";
		//tạo đối tượng prepare
		$stmt=$db->prepare($sql);
		$stmt->execute();
		$items=array();
		while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

			$items[]=$row;
		}
		return $items;

	}

	public static function getProductDexuat(){
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="SELECT * FROM products LIMIT 6";
		//tạo đối tượng prepare
		$stmt=$db->prepare($sql);
		$stmt->execute();
		$count = $stmt->rowCount();//Tra ve so ban ghi duoc lay ra
		while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

			$items[]=$row;
		}
		return $items;
	}


	public function getProductByLoadmore($lastid, $menuid){
		$db=DB::getConnection();	
		$sql="SELECT * FROM products WHERE categoryID= '$menuid' AND id>'$lastid' ORDER BY id ASC LIMIT 18";
		$stmt=$db->prepare($sql);
		$stmt->execute();
		$items=array();
		$count = $stmt->rowCount();//Tra ve so ban ghi duoc lay ra
		if($count>0){
			while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

			$items[]=$row;
			}
			return $items;
		}
		else{
			return null;
		}
	}

	public static function getSlideProduct(){
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="SELECT * FROM products LIMIT 8";
		//tạo đối tượng prepare
		$stmt=$db->prepare($sql);
		$stmt->execute();
		$count = $stmt->rowCount();//Tra ve so ban ghi duoc lay ra
		if($count>0){
			while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

			$items[]=$row;
			}
			return $items;
		}
		else{
			return null;
		}
	}
}
	
?>