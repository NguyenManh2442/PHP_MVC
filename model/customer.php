<?php
/**
 * 
 */
class Customer
{
	public static function checkSignin($email, $pass){
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="SELECT password, email, username FROM customers WHERE email=? AND password=?";
		//tạo đối tượng prepare
		$stmt=$db->prepare($sql);

		$stmt->bindParam(1,$email);
		$stmt->bindParam(2,$pass);

		$stmt->execute();

		if($stmt->rowcount()>0){
			$items=array();
			while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

				$items[]=$row;
			}
			return $items;
		}

		else{
			return 0;
		}
		// while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		// 	$items[]=$row;
		// }
		// return $items;
	}
	public static function checkSignup($userName, $pass, $email){
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="INSERT INTO customers SET username=?, password=?, email=?";
		//tạo đối tượng prepare
		$stmt=$db->prepare($sql);

		$stmt->bindParam(1,$userName);
		$stmt->bindParam(2,$pass);
		$stmt->bindParam(3,$email);

		// $items=array();
		if($stmt->execute()==true){
			return 1;
		}
		else{
			return 0;
		}
	}
	public static function thontinCaNhan($kiemtraUserName){
		$db=DB::getConnection();
		// tạo truy vấn
		$sql="SELECT * FROM customers WHERE username =?";
		//tạo đối tượng prepare
		$stmt=$db->prepare($sql);
		$stmt->bindParam(1,$kiemtraUserName);
		$stmt->execute();
		$items=array();
		while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

			$items[]=$row;
		}
		return $items;
	}
	public static function CapNhatThontinCaNhan($username, $fullName, $phone, $address, $birthDay, $email){
		$db=DB::getConnection();

		$sql="UPDATE `customers` SET `username` = '$username',`fullName` = '$fullName',`phone` = '$phone', `address` = '$address' WHERE `customers`.`email` = '$email';";

			$stmt = $db->prepare($sql);
			// $stmt->bindParam(1,$fullName);
			// $stmt->bindParam(2,$phone);
			// $stmt->bindParam(3,$address);
			// $stmt->bindParam(4,$birthDay);
			// $stmt->bindParam(5,$email);

			if($stmt->execute()==true){
				return 1;
			}else{
				return 0;
			}
	}

// ----- CHỨC NĂNG ĐĂNG NHẬP FACEBOOK----------------------------------------------
	public static function loginFromSocialCallBack($socialUser){
		$db=DB::getConnection();
			$name=$socialUser['first_name'];
			$email=$socialUser['email'];

			$sql="SELECT * FROM customers WHERE email =?";
			$stmt=$db->prepare($sql);
			$stmt->bindParam(1,$email);
			$stmt->execute();
			// KIỂM TRA TRONG BẢNG ĐÃ CÓ TÀI KHOẢN EMAIL ĐÓ CHƯA
			if($stmt->rowcount()==0){
				// nếu chưa có thì thêm vào bảng username và email	
				$sql='INSERT INTO customers SET username=?, email=?';

				$stmt=$db->prepare($sql);
				$stmt->bindParam(1,$name);
				$stmt->bindParam(2,$email);

				if($stmt->execute()==true){
					// nếu thêm thành công thì đồng thời xuất ra thông tin user đó
					$sql="SELECT * FROM customers WHERE email =?";
					//tạo đối tượng prepare
					$stmt=$db->prepare($sql);
					$stmt->bindParam(1,$email);
					$stmt->execute();
					$items=array();
					while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

						$items[]=$row;
					}
					return $items;
				}
				else{
					return 0;
				}
			}
			else if ($stmt->rowcount()>0) {
				// nếu đã có thì xuất ra thông tin của user đó	
				$items=array();
				while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {

					$items[]=$row;
				}
				return $items;
			} 
			else {
				return 0;
			}

			
	}
	// ----- END CHỨC NĂNG ĐĂNG NHẬP FACEBOOK----------------------------------------------
}
?>