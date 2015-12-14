<?php

class Controller{

	public $view = array();
	public $layout = "default";

	public function toView($array){
		if(is_array($array)){
			$this->view = array_merge($this->view, $array);
		}else{
			return false;
		}
	}

	public function render($action){
		extract($this->view);
		ob_start();
		include ROOT . "views/" . get_class($this) . "/" . $action . ".php";
		$content = ob_get_clean();
		include ROOT . "views/layout/" . $this->layout . ".php";
	}

	public function loadModel($model){
		require ROOT . "models/" . $model . ".php";
		return new $model();
	}

}

?>