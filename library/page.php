<?php

class page extends CF_library
{
	private function header($login)
	{
		$this->view->display("basics/header");
		$this->view->display("header_html", array('login'=>$login));
	}

	private function footer()
	{
		$this->view->display("basics/javascript");
		$this->view->display("footer_html");
		$this->view->display("basics/footer");
	}

	public function welcome()
	{
		$this->header(false);
		$this->view->display("welcome");
		$this->footer();
	}
}
