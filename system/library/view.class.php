<?php

include_once "config/route.php";
require_once "system/helpers/getBasePath.php";

/*
* loading view form to module view system.
*/
class view
{
	private $basePathView;

	function __construct()
	{
		$this->basePathView = "views/";
	}

	function display($pathFile, $var = array())
	{
		foreach ($var as $key => $value) {
			${$key} = $value;
		}
		if (!(include $this->basePathView.$pathFile.".php"))
			include $this->basePathView.$pathFile.".html";
	}
}

?>
