<?php

class productController extends Controller {

	public function __construct() {
		$this->lang = new Language();
	}

	public function index() {
		header("Location: ".BASE_URL);
	}

	public function open($id) {
		$store = new Store();
		$dados = $store->getTemplateData();

		$products = new Products();
		$categories = new Categories();
		$f = new Filters();


		$filters = array();

		$info = $products->getProductInfo($id);

		if(count($info) > 0) {
			$dados['filters'] = $f->getFilters($filters);
			$dados['filters_selected'] = array();

			$dados['product_info'] = $info;
			$dados['product_images'] = $products->getImagesByProductId($id);
			$dados['product_options'] = $products->getOptionsByProductId($id);
			$dados['product_rates'] = $products->getRates($id, 5);

			$this->loadTemplate('product', $dados);
		} else {
			header("Location: ".BASE_URL);
		}

		
	}

}