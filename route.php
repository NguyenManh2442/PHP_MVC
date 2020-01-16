<?php
	
	$controllers=array(
		'product'	=> ['index','detail','addcart','updatecart','loadmore','sortProductByPrice'],
		'page'		=> ['index', 'error'],
		'customer'	=> ['signup','signin','profile','ordermanagement','proccess_signup','proccess_signin', 'signout', 'TTcaNhan','fbCallback','suaTTcaNhan'],
		'admin'=>['index','login','quanTriSanPham','logout','updateProduct','addProduct','deleteProduct'],
		'category'=>['getproductbycatid','getproductbySearch'],
		'cart'=>['getcart']
	);

	if(!array_key_exists($controller, $controllers)||!in_array($action, $controllers[$controller])){
		$controller='page';
		$action='error';
	}
	require_once('controllers/'.$controller.'_controller.php');

	$klass=str_replace('_','', ucwords($controller,'_'))."Controller";

	$controller=new $klass;
	$controller->$action();
?>