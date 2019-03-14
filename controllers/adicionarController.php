<?php
// homeController.php

class adicionarController extends Controller {

	public function index() {

		$dados = array();

		$this->loadTemplate('adicionar', $dados);
	}

}