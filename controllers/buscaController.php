<?php
// homeController.php

class buscaController extends Controller {

	public function __construct() {
		$this->lang = new Language();
	}

	public function index() {
		$store = new Store();
		$dados = $store->getTemplateData();

		$products = new Products();
		$categories = new Categories();
		$f = new Filters();

		if(!empty($_GET['s'])) {


			$searchTerm = $_GET['s'];
			$category = $_GET['category'];

			$filters = array();
			if(!empty($_GET['filter']) && is_array($_GET['filter'])) {
				$filters = $_GET['filter'];
			}

			$filters['searchTerm'] = $searchTerm;
			$filters['category'] = $category;


			$currentPage = 1;
			$offset = 0;
			$limit = 50;

			if(!empty($_GET['p'])) {
				$currentPage = $_GET['p'];
			}

			$offset = ($currentPage * $limit) - $limit;

			$dados['list'] = $products->getList($offset, $limit, $filters);
			$dados['totalItems'] = $products->getTotal($filters);
			$dados['numberOfPages'] = ceil($dados['totalItems'] / $limit);
			$dados['currentPage'] = $currentPage;

			$dados['categories'] = $categories->getList();

			$dados['filters'] = $f->getFilters($filters);
			$dados['filters_selected'] = $filters;

			

			$dados['searchTerm'] = $searchTerm;
			$dados['category'] = $category;

			$dados['sidebar'] = true;

			$this->loadTemplate('busca', $dados);
		} else {
			header("Location: ".BASE_URL);
		}
	}

}