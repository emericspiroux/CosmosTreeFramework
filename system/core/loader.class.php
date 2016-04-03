<?php

/**
* loader of all
*/
class loader
{
	function __construct()
	{
	}


/*
** User loader
*/

	public function controller()
	{
		$controllers = array();
		foreach (glob("controller/*.php") as $filename)
		{
			include_once $filename;
			$filename = explode("/", $filename);
			$filename = $filename[1];
    		$filename = explode(".", $filename);
    		$controllers[] = $filename[0];
		}

		return ($controllers);
	}

	public function library()
	{
		$library = array();
		foreach (glob("library/*.php") as $filename)
		{
			include_once $filename;
			$filename = explode("/", $filename);
			$endStr = count($filename) - 1;
    		$filename = explode(".", $filename[$endStr]);
    		$library[] = $filename[0];
		}

		return ($library);
	}

	public function models()
	{
		$models = array();
		foreach (glob("models/*.php") as $filename)
		{
			include_once $filename;
			$filename = explode("/", $filename);
			$endStr = count($filename) - 1;
    		$filename = explode(".", $filename[$endStr]);
    		$models[] = $filename[0];
		}
		return ($models);
	}


/*
** System loader
*/

	public function systemLibrary()
	{
		$library = array();
		foreach (glob("system/library/*.php") as $filename)
		{
			include_once $filename;
			$filename = explode("/", $filename);
			$endStr = count($filename) - 1;
    		$filename = explode(".", $filename[$endStr]);
    		$library[] = $filename[0];
		}

		return ($library);
	}

	public function systemHelpers()
	{
		$helpers = array();
		foreach (glob("system/helpers/*.php") as $filename)
			include_once $filename;

		return ($helpers);
	}
}
