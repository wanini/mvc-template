<?php

/**
 * Loading configuration
 */

require "core/config.php";

/**
 * Loading Controller and Model classes
 */

require "core/Controller.class.php";
require "core/Model.class.php";

/**
 * Parsing url to get controller/action
 */

$url = $_GET["url"];

$controller = "Index";
$action = "index";
$urlParsed = array();

if(!empty($url)){
	if($urlParsed = explode("/", $url)){
		$controller = ucfirst($urlParsed[0]);
		if(!empty($urlParsed[1])) $action = $urlParsed[1];
	}
}

/**
 * Load the page
 */

require "controllers/" . $controller . ".php";
$Controller = new $controller();

if(method_exists($Controller, $action)){
	unset($urlParsed[0]); unset($urlParsed[1]);
	call_user_func_array(array($Controller, $action), $urlParsed);
	//$Controller->$action();
}else{
	die("ERREUR 404");
}

?>