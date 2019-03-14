<?php
// homeController.php

class categoriesController extends Controller {

	public function __construct() {
		$this->lang = new Language();
	}

	public function index() {
		header("Location: ".BASE_URL);
	}

	public function enter($id) {
		$store = new Store();
		$dados = $store->getTemplateData();

		$categories = new Categories();
		$products = new Products();
		$f = new Filters();

		$dados['category_name'] = $categories->getCategoryName($id);
		

		if(!empty($dados['category_name'])) {

			$filters = array();
			if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
				$filters = $_GET['filter'];
			}

			$currentPage = 1;
			$offset = 0;
			$limit = 50;


			if(!empty($_GET['p'])) {
				$currentPage = $_GET['p'];
			}

			$offset = ($currentPage * $limit) - $limit;

			$filters['category'] = $id;

			$dados['category_filters'] = $categories->getCategoryTree($id);
			$dados['list'] = $products->getList($offset, $limit, $filters);
			$dados['totalItems'] = $products->getTotal($filters);
			$dados['numberOfPages'] = ceil($dados['totalItems'] / $limit);
			$dados['currentPage'] = $currentPage;
			$dados['id_category'] = $id;

			

			$dados['filters'] = $f->getFilters($filters);
			$dados['filters_selected'] = $filters;

			$dados['sidebar'] = true;

			$this->loadTemplate('categories', $dados);
		} else {
			header("Location: ".BASE_URL);
		}

		
	}

}