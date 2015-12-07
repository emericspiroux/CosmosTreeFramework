<?php

function getFolder($constFile){
	$pathFile = explode("/", $constFile);
	for ($i=0; $i < (count($pathFile) - 1); $i++) {
		$basePath .= $pathFile[$i];
	}
	return ($basePath);
}

?>
