<?php
	require_once("model/products.php");
	require_once('base_controller.php');
	/**
	 * 
	 */
	class SlideshowController extends BaseController
	{
		
		public function __construct(){
			$this->folder="product";
		}
		public function slide(){
			$slide = Product::getSlide();
			$this->render('slide',$slide);
		}
	}
?>