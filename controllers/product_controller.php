<?php
/**
 * 
 */
require_once('base_controller.php');
require_once("model/products.php");
class ProductController extends BaseController
{
	public function __construct(){
		$this->folder="product";
		unset($_SESSION['admin_status2']);
	}


	public function index(){
		$this->render("all");
	}


	public function detail(){
			$id=isset($_GET['id'])?$_GET['id']:"";
			if($id==""){
				header("location:".PATH."?controller=page&action=error");
			}
			else{
				$data=Product::getProductById($id);
				$this->render("get-one",$data);
			}
			
		}



	public function sortProductByPrice(){
		$sortVal = $_POST['sort'];
		if($sortVal==1){
			echo "tăng";
		}elseif ($sortVal==2) {
			echo "Giảm";
		}
	}

	public function loadmore(){
		if(isset($_POST['lastid'])){
			$lastid = $_POST['lastid'];
			$menuid = $_POST['menuid'];
			$data=Product::getProductByLoadmore($lastid, $menuid );
			// $this->render("loadmore",$data);
			// $pro = $data['product'];
			if($data!=null){
			foreach ($data as $key => $value) {
			echo '<div class="item1">
				        <div class="col-xs-12 col-sm-6 col-md-2 hang">
				        <a href="'.PATH.'?controller=product&action=detail&id='.$value['id'].'" class="chitiet">
				        	<img src="'.PATH.'assests/img/'.$value['image'].'" class="img-responsive center-block">
					        
					        <h4 class="text-center">'.$value['productName'].'</h4>

					        <h5 class="text-center" style="color:red;">
					        	'.$value['unitPrice'].'.Đ'.'</h5>
					        <h6 class="text-center"></h6>
				    	</a>
				        </div>
				    </div>';
				    
				    $lastid = $value["id"];
				    $menuId = $value["categoryID"];
				}

				
            echo '<button class="btn btn-info load-more" id="btnLoad" data-id="'.$lastid.'" data-mi="'.$menuId.'">Xem thêm...</button>';
			}
		}
	}


	public function addcart(){
			if (isset($_POST['id'])&&isset($_POST['num'])) {
				
				$id = $_POST['id'];
				$num = $_POST['num'];

				$data=Product::getProductById($id);

				if (!isset($_SESSION["cart"])) {

					$cart = array();
					$cart[$id]= array(
						'name'=> $data['productName'],
						'num'=>$num,
						'gia'=>$data['unitPrice'],
						'image'=>$data['image']
					);
				}
				else{
					$cart = $_SESSION["cart"];
					if (array_key_exists($id, $cart)) {

						$cart[$id]= array(
							'name'=> $data['productName'],
							'num'=>(int)$cart[$id]['num']+$num,
							'gia'=>$data['unitPrice'],
							'image'=>$data['image']
						);
					}
					else{
						$cart[$id]= array(
							'name'=> $data['productName'],
							'num'=>$num,
							'gia'=>$data['unitPrice'],
							'image'=>$data['image']
						);
					}
				}
				$_SESSION["cart"] = $cart;
				$numberCart=0;
				foreach ($cart as $key => $value) {
					$numberCart ++;
				}
				echo $numberCart;
			}
			
		}


	public function updatecart(){
		if (isset($_POST['id'])&&isset($_POST['num'])) {
				
				$id = $_POST['id'];
				$num = $_POST['num'];
				$cart = $_SESSION["cart"];
				if (array_key_exists($id, $cart)) {
					if ($num>0) {

						$cart[$id]= array(
							'name'=> $cart[$id]['name'],
							'num'=>$num,
							'gia'=>$cart[$id]['gia'],
							'image'=>$cart[$id]['image']
						);
					}
					else{
						unset($cart[$id]);
					}

					$_SESSION["cart"] = $cart;
				}
		}
	}
}
?>