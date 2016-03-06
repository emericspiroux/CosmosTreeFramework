<?php
/*
* mother controller
* Index is required for the "404 page". he'll redirect to __BASE_CTRL__
*/
class mother extends CF_controller
{
	public function index()
	{
		$this->page->welcome();
	}

	public function cv()
	{
		header("Content-type: application/pdf");
		header("Content-Disposition: inline;filename=cvEmericSpiroux2016.pdf");
		echo file_get_contents(__BASE_URL__."assets/cvEmericSpiroux2016.pdf");
	}
}
