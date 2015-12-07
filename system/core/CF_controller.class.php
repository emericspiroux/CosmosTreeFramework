<?php
	include "config/route.php";
	/**
	*  CF_controller link all library
	*/
	class CF_controller
	{
		public $data = array();
		protected $_BaseUrl;

		public function __construct()
		{
			global $_BaseUrl;

			$this->_BaseUrl = $_BaseUrl;

			$this->load = new loader();
			if (is_array(($arrayMod = $this->load->models())))
			foreach ($arrayMod as $mod) {
				$this->data[$mod] =& new $mod();
			}
			if (is_array(($arrayLib = $this->load->systemLibrary())))
			foreach ($arrayLib as $lib) {
				$this->data[$lib] =& new $lib();
			}
			if (is_array(($arrayLib = $this->load->library())))
			foreach ($arrayLib as $lib) {
				$this->data[$lib] =& new $lib();
			}
		}

		public function __get($name)
    	{
        	if (array_key_exists($name, $this->data))
            	return $this->data[$name];
        }
	}

