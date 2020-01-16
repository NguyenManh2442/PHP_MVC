<?php
// session_start();
require_once("controllers/base_controller.php");
require_once("model/customer.php");
/**
 * 
 */
class CustomerController extends BaseController
{
	
	public function __construct()
	{
		$this->folder = "customer";
		unset($_SESSION['admin_status2']);
	}
	public function signup(){
		$this->render('signup');
	}
	//--------------------HÀM ĐĂNG KÝ TÀI KHOẢN CỦA USER------------------
	public function proccess_signup(){
		if(isset($_POST['signup'])){
			//tạo ra các biến để nhận dữ liệu từ form gửi lên 
			$email=$_POST['email'];
			$userName=$_POST['userName'];
			$pass=$_POST['pass1'];

			if(Customer::checkSignup($userName, $pass, $email)==1){
				//neu da ton tai thi tiến hành cấp phiên làm việc cho khách hàng và điều hướng ra trang chủ
				$_SESSION['message']="Đăng ký thành công!";
				header('location:'.PATH.'?controller=customer&action=signin');
			}
			else{
				$_SESSION['message']='Đăng ký thất bại!';
				header('location:'.PATH.'?controller=customer&action=signup');
			}
		}
	}
	public function signin(){
		$this->render("signin");
	}
	// --------------------HÀM ĐĂNG NHẬP USER-----------------------------------

	public function proccess_signin(){
		if(isset($_POST['signin'])){
			$email= $_POST['email'];
			$pass= $_POST['pass'];
			//kiem tra su ton tai cua tai khoan duoi CSDL
			if(Customer::checkSignin($email, $pass)!=0){

				$data=Customer::checkSignin($email, $pass);
				foreach ($data as $key => $value) {
					$_SESSION['customer2']=$value['username'];
					$_SESSION['email']=$value['email'];
				}
				$_SESSION['logged_in2']=true;
				header('location:'.PATH);
			}
			else{
				$_SESSION['message']='Dang nhap that bai!';
				header('location:'.PATH.'?controller=customer&action=signin');
			}
		}
	}
	//----------------- HÀM ĐĂNG XUẤT TÀI KHOẢN----------------------------

	public function signout(){
		unset($_SESSION['customer2']);
		$_SESSION['logged_in2']=false;
		header("location:".PATH);
	}

//----------------- HIỂN THỊ THÔNG TIN CÁ NHÂN-----------------------------

	public function TTcaNhan(){
		if (isset($_SESSION['customer2'])) {

			$kiemtraUserName=$_SESSION['customer2'];
			$data = Customer::thontinCaNhan($kiemtraUserName);
			$this->render("suatt",$data);
		}
	}
	public function suaTTcaNhan(){
		if(isset($_POST['btnLuu'])){
			$username=$_POST['username'];
			$fullName= $_POST['fullName'];
			$phone= $_POST['phone'];
			$address= $_POST['address'];
			$birthDay= $_POST['birthDay'];
			$email = isset($_SESSION['email'])?$_SESSION['email']:"";

			//kiem tra su ton tai cua tai khoan duoi CSDL
			if(Customer::CapNhatThontinCaNhan($username, $fullName, $phone, $address, $birthDay, $email)==1){
				
				header('location:'.PATH.'?controller=customer&action=TTcaNhan');
			}
			else{
				echo "lỗi";
			}
		}
	}
//  -------------------------------HÀM CALLBACK CỦA FACEBOOK-----------------------

	public function fbCallback(){

				require_once('Facebook/autoload.php');

				$fb = new Facebook\Facebook([
					'app_id' => '2703555089871471', // Replace {app-id} with your app id
					'app_secret' => 'f0b54a076206b146d8de5f30bbf148e9',
					'default_graph_version' => 'v4.0'
				]);

					$helper = $fb->getRedirectLoginHelper();
				if (isset($_GET['state'])) {
				    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
				}
				try {
				    $accessToken = $helper->getAccessToken();
				} catch (Facebook\Exceptions\FacebookResponseException $e) {
				    // When Graph returns an error
				    echo 'Graph returned an error: ' . $e->getMessage();
				    exit;
				} catch (Facebook\Exceptions\FacebookSDKException $e) {
				    // When validation fails or other local issues
				    echo 'Facebook SDK returned an error: ' . $e->getMessage();
				    exit;
				}

				if (!isset($accessToken)) {
				    if ($helper->getError()) {
				        header('HTTP/1.0 401 Unauthorized');
				        echo "Error: " . $helper->getError() . "\n";
				        echo "Error Code: " . $helper->getErrorCode() . "\n";
				        echo "Error Reason: " . $helper->getErrorReason() . "\n";
				        echo "Error Description: " . $helper->getErrorDescription() . "\n";
				    } else {
				        header('HTTP/1.0 400 Bad Request');
				        echo 'Bad request';
				    }
				    exit;
				}

				//Lấy thông tin của người dùng trên Facebook
				try {
				    // Returns a `Facebook\FacebookResponse` object
				    $response = $fb->get('/me?fields=id,first_name,email', $accessToken->getValue());
				} catch (Facebook\Exceptions\FacebookResponseException $e) {
				    echo 'Graph returned an error: ' . $e->getMessage();
				    exit;
				} catch (Facebook\Exceptions\FacebookSDKException $e) {
				    echo 'Facebook SDK returned an error: ' . $e->getMessage();
				    exit;
				}

				$fbUser = $response->getGraphUser();
				// echo $fbUser; exit;
				if (!empty($fbUser)) {

				   if( Customer::loginFromSocialCallBack($fbUser)!=0){

				   		$data = Customer::loginFromSocialCallBack($fbUser);

						foreach ($data as $key => $value) {
							$_SESSION['customer2']=$value['username'];
							$_SESSION['email']=$value['email'];

						}
						$_SESSION['logged_in2']=true;
						header('location:'.PATH);
				   }
				    
				}

	}
}
?>