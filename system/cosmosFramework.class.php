<?php

include_once "system/core/loader.class.php";
include_once "system/core/CF_controller.class.php";
include_once "system/core/CF_library.class.php";
include_once "system/core/CF_model.class.php";
include_once "system/library/mail/PHPMailerAutoload.php";
include "config/route.php";

/*
* Cosmos Engine is the engine where all the application was load.
*/
class cosmosFramework
{
/*
* Attribute.
*/
	public $class = NULL;
	public $methode = "index";
	public $attributes = array();

	private $load;
	private $data = array();


/*
* Methode.
*/

	function __construct($errorDisplay = "!E_ALL")
	{
		global $_BaseUrl, $_BaseCtrl;

		session_start();
		error_reporting($errorDisplay);
		$this->load =& new loader();

		$this->load->controller();
		$this->load->systemHelpers();

		$urlSelf = explode("/", $_SERVER['PHP_SELF']);
		if ((count($urlSelf) - 1) > 1)
		{
			$this->class = $urlSelf[2];
			if (isset($urlSelf[3]))
				$this->methode = $urlSelf[3];
			if (count($urlSelf) > 4)
			{
				foreach ($urlSelf as $key => $value) {
					if ($key > 3 && $value != "")
						$this->attributes[] = $value;
				}
			}
		}
		try
		{
			$class = new ReflectionMethod($this->class, $this->methode);
			$class->invokeArgs(new $this->class(), $this->attributes);
		} catch (Exception $e){
			$class_default = $_BaseCtrl;
			$class = new ReflectionMethod($class_default, "index");
			$class->invokeArgs(new $class_default(), $this->attributes);
		}
	}

	public function __get($name)
	{
		if (array_key_exists($name, $this->data))
			return ($this->data[$name]);
		else
			throw new Exception("Can't reach ".$name, 404);
	}
}
