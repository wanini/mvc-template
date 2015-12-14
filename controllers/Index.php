<?php

class Index extends Controller{

	public function __construct(){}

	public function index(){

		$AnimesModel = $this->loadModel("Animes");
		$animes = $AnimesModel->find();

		$view["topAnimes"] = $animes;

		$this->toView($view);
		$this->render("index");

	}

	public function view($id){

		if(!empty($id)){

			$AnimesModel = $this->loadModel("Animes");
			$anime = $AnimesModel->find("ID = " . $id);

			$view["anime"] = $anime[0];

			$this->toView($view);
			$this->render("view");

		}

	}
	
}

?>