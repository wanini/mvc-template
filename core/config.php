<?php

/**
 * Define global vars
 */

define("URI", str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]));
define("ROOT", str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));

/**
 * Define global configuration (database, etc)
 */

$CONFIG = array(
	"database" => array(
		"host" => "localhost",
		"dbname" => "myanimes",
		"user" => "root",
		"pass" => "root",
	),
	// can create others conf vars
);

?>