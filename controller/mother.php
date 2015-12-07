<?php
/*
* mother controller
* Index is required for the "404 page". he'll redirect to __BASE_CTRL__
*/
class mother extends CF_controller
{
	public function index()
	{
		if (isset($_SESSION['user']))
			redirect(__BASE_URL__."/user/maker");
		$this->page->login();
	}
}
