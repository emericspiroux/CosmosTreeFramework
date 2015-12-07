<?php
include_once ('config/route.php');
global $_BaseUrl;

if ( ! function_exists('redirect'))
{
	function redirect($uri = "", $method = 'location', $http_response_code = 302)
	{
		if ($uri == "")
			$uri = $_BaseUrl;

		switch($method)
		{
			case 'refresh'	: header("Refresh:0;url=".$uri);
				break;
			default			: header("Location: ".$uri, TRUE, $http_response_code);
				break;
		}
		exit;
	}
}
?>
