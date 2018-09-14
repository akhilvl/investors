<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

spl_autoload_register(function ($class_name) {
	if ( file_exists( "classes/" . $class_name . ".php" ) ) {
		include "classes/" . $class_name . '.php';
	}
});
require_once "classes/functions.php";

$reference = Input::fetch('reference');

if( class_exists($reference) ){
	$obj = new $reference();
	$obj->doTask();
}
else{
	response('Ajax reference not found');
}
