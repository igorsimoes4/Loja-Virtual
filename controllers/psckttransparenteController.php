<?php
// homeController.php

class psckttransparenteController extends Controller {

	public function __construct() {
		$this->lang = new Language();
	}

	public function index() {
		$store = new Store();
		$products = new Products();

		$dados = $store->getTemplateData();

		$this->loadTemplate('cart_psckttransparente', $dados);
	}


}