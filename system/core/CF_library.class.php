<?php

	/**
	*  CF_controller link all library
	*/
	class CF_library
	{
		public $data = array();

		public function __construct()
		{
			$this->load = new loader();
			if (is_array(($arrayLib = $this->load->systemLibrary())))
			foreach ($arrayLib as $lib) {
				$this->data[$lib] =& new $lib();
			}
			if (is_array(($arrayMod = $this->load->models())))
			foreach ($arrayMod as $mod) {
				$this->data[$mod] =& new $mod();
			}

			$this->data['mail'] = new PHPmailer();
		}

		public function __get($name)
    	{
        	if (array_key_exists($name, $this->data))
            	return $this->data[$name];
        }
	}

