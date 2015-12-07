<?php
/*
** Start page where we catch object and methode
*/
require "system/cosmosFramework.class.php";
require "config/route.php";

try
{
	$CF = new cosmosFramework("!E_ALL");
} catch (Exception $e){
	echo $e->getMessage();
}

 ?>
