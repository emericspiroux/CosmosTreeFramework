<?php
/*
* mother controller
* Index is required for the "404 page". he'll redirect to __BASE_CTRL__
*/
class gallery extends CF_controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['user']))
			redirect(__BASE_URL__);
	}

	public function index($start = 0, $end = 10)
	{
		$this->page->gallery($start, $end);
	}

	public function addComment()
	{
		$comment = $this->post->getClean("comment");
		$id_gallery = $this->post->getValidClean("id_gallery", "id de l'image", "required");

		if ($this->post->check())
		{
			$this->gallery_model->addComment($id_gallery, $comment);
			$img = $this->gallery_model->getImgsById($id_gallery);
			if ($_SESSION['user']['id'] != $img['id_user'])
				$this->mail->sendComment($img['email'], $_SESSION['user']['pseudo'], $comment);
		}
		redirect($this->_BaseUrl."/gallery");
	}

	public function like($id_gallery)
	{
		$this->gallery_model->like($id_gallery);
		redirect(__BASE_URL__."/gallery");
	}

	public function unlike($id_gallery)
	{
		$this->gallery_model->unlike($id_gallery);
		redirect(__BASE_URL__."/gallery");
	}

	public function delete($id_gallery)
	{
		$this->gallery_model->deleteImg($id_gallery);
		redirect(__BASE_URL__."/user/maker");
	}
}
