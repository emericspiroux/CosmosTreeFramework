<?php

/*
** Get post from formulaire, clean xss and escape special char.
** checklist id the same of codeigniter :
** https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html#rulereference
*/

class post
{
	private	$name;
	public	$nbError = 0;

	public function __construct()
	{
		ini_set("file_uploads", "On");
		ini_set("post_max_size", "12M");
		ini_set("upload_max_filesize", "12M");
		ini_set("memory_limit","-1");
	}

	public function getValidClean($nameForm, $explainName, $checklist)
	{
		$rtn = false;
		$this->name = $explainName;
		echo "checklist :".$checklist;
		if (array_key_exists($nameForm, $_POST))
		{
			$rtn = $_POST[$nameForm];
			$checklist = explode("|", trim($checklist));
			print_r($checklist);
			foreach ($checklist as $value) {
				if ($exp = $this->getCheckNum($value))
				{
					if (!$this->{$exp['function']}($rtn, $exp['value']))
						$this->nbError++;
				}
				else if (!$this->{$value}($rtn))
					$this->nbError++;
			}
		}
		return ($this->xss_clean(trim($rtn)));
	}

	public function getClean($nameForm)
	{
		$rtn = false;
		if (array_key_exists($nameForm, $_POST))
			$rtn = $_POST[$nameForm];
		return ($this->xss_clean($rtn));
	}

	private function getCheckNum($value)
	{
		if  (strlen($value)
			&& preg_match('#\[(\w+)]#', $value))
		{
			$functExp = explode("[", $value);
			$valueExp = explode("]", $functExp[1]);
			$value = intval($valueExp[0]);
			$funct = $functExp[0];
			return (array("function"=>$funct, "value"=> $value));
		}
		return (false);
	}

	public function check()
	{
		if (!$this->nbError)
			return (true);
		return (false);
	}

	private function required($str)
	{
		$str = trim($str);
		if (!isset($str) || empty($str) || $str == "" || strlen($str) == 0)
		{
			$GLOBALS['postError'][] = "Le champs ".$this->name." est requis.";
			return (false);
		}
		return (true);
	}

	private function email($str)
	{
		if (!filter_var($str, FILTER_VALIDATE_EMAIL)) {
			$GLOBALS['postError'][] = "Format de l'email : exemple@exemple.fr";
			return (false);
		}
		return (true);
	}

	private function minLenght($str, $num)
	{
		if (!(strlen($str) >= $num)) {
			$GLOBALS['postError'][] = "Le champs ".$this->name." doit contenir plus de ".$num." caratères.";
			return (false);
		}
		return (true);
	}

	private function maxLenght($str, $num)
	{
		if (strlen($str) > $num) {
			$GLOBALS['postError'][] = "Le champs ".$this->name." doit contenir au maximum ".$num." caratères.";
			return (false);
		}
		return (true);
	}

	private function alphaNum($str)
	{
		if (!strlen($str) || !ctype_alnum($str)) {
			$GLOBALS['postError'][] = "Le champs ".$this->name." ne peut contenir que des caractères alphanumérique.";
			return (false);
		}
		return (true);
	}

	private function xss_clean($data)
	{
		$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
		$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
		$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
		$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

		$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

		$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

		$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

		do
		{
			$old_data = $data;
			$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
		}
		while ($old_data !== $data);

		return $data;
	}


	//User add error
	public function addError($error)
	{
		$GLOBALS['postError'][] = $error;
		$this->nbError++;
	}

	//UploadFile
	public function upload($nameForm, $storagePath, $extension = "png", $size = 1000)
	{
		if (isset($_FILES) && array_key_exists($nameForm, $_FILES))
			$fileInput = $_FILES[$nameForm];
		else
		{
			$this->addError("Aucun fichier uploader.");
			return (false);
		}

		if ($fileInput['error'] != UPLOAD_ERR_OK)
		{
			$this->addError("Erreur lors de l'upload.");
			return (false);
		}

		if ($fileInput['size'] > 1000000)
		{
        	$this->addError("Le fichier est trop volumineux (max ".$size."ko).");
        	return (false);
		}

   		$finfo = new finfo(FILEINFO_MIME_TYPE);
   		if (false == array_search(
   		    $finfo->file($fileInput['tmp_name']),
   		    array(
   		        'png' => 'image/png',
   		        'jpg' => 'image/jpeg'
   		    ),
   		    true
   		)) {
   		    $this->addError("Seul les fichiers d'extension jpg ou png sont autorisés.");
   		}

   		$path = sprintf('%s/%s.%s', $storagePath, sha1_file($fileInput['tmp_name']), "jpg");
   		try {
   		move_uploaded_file( $fileInput['tmp_name'], $path);
    	} catch (Exception $e){
   		    $this->addError($e->getmessage());
    	}
    	if (!$this->check())
    		return (false);
    	return ($path);
	}
}

/*
** developer can get error messages from validation in his view.
*/
function getPostError($start, $end)
{
	$str = "";
	if (array_key_exists("postError", $GLOBALS))
	foreach ($GLOBALS['postError'] as $value) {
		$str .= $start.$value.$end;
	}
	$GLOBALS['postError'] = array();
	return ($str);
}

?>
