<?php
/**
 * 
 */
class Employee
{
	public static function checkLogin($u, $p){
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="SELECT email, password FROM employees WHERE email=? AND password=?";
		//tạo đối tượng prepare
		$stmt=$db->prepare($sql);

		$stmt->bindParam(1,$u);
		$stmt->bindParam(2,$p);

		$stmt->execute();
		// $items=array();
		if($stmt->rowcount()>0){
			return 1;
		}
		else{
			return 0;
		}
	}

		public static function getAllProduct(){
		//Khởi tạo đối tượng csdl 
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="SELECT * FROM products";
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


	public static function deleteProductById($id){
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="DELETE FROM `products` WHERE `products`.`id` = ".$id."";
		//tạo đối tượng prepare
		$stmt=$db->prepare($sql);
		if($stmt->execute()==true){
			return true;
		}else{
			return false;
		}
	}
}
?>