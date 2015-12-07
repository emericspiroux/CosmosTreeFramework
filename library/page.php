<?php

class page extends CF_library
{
	private function header($login)
	{
		$this->view->display("basics/header");
		$this->view->display("header", array('login'=>$login));
	}

	private function footer()
	{
		$this->view->display("basics/javascript");
		$this->view->display("footer");
		$this->view->display("basics/footer");
	}

	public function login()
	{
		$this->header(false);
		$this->view->display("login");
		$this->footer();
	}

	public function register()
	{
		$this->header(false);
		$this->view->display("register");
		$this->footer();
	}

	public function forget($sent = false)
	{
		$this->header(false);
		$this->view->display("forget", array('sent' => $sent));
		$this->footer();
	}

	public function maker()
	{
		$this->header(true);
		$imgs = $this->imgSample_model->getImgs();
		$myimgs = $this->gallery_model->getImgs($_SESSION['user']['id']);
		$this->view->display("maker", array('imgSample' => $imgs));
		$this->view->display("listMaker", array('myImgs' => $myimgs));
		$this->footer();
	}

	public function gallery($start = 0, $end = 10)
	{
		$this->header(true);
		$allImgs = $this->gallery_model->getAllImgs($start, $end);
		$nbImgs = $this->gallery_model->getNbImgs();
		$this->view->display("gallery", array('allImgs' => $allImgs, 'nbImgs' => $nbImgs));
		$this->footer();
	}

	public function RegisterConfirm($pseudo, $email)
	{
		$this->header(false);
		$this->view->display("registerConfirm", array('pseudo' => $pseudo, 'email' => $email));
		$this->footer();
	}
}
