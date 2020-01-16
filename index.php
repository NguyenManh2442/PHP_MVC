<?php
	session_start();
	require_once('database.php');
	define('PATH', 'http://localhost/php0519E/PRJ_Web_PHP/');
	if(isset($_GET['controller'])){

		$controller=$_GET['controller'];

		if(isset($_GET['action'])){

			$action=$_GET['action'];
		}
		else{
			$action='index';
		}
	}
	else{
		$controller='product';
		$action='index';
	}
	require_once('route.php');
?>