<?php
class user extends CF_controller
{
	public function connect()
	{
		$email = $this->post->getValidClean("email", "email",'required|email');
		$password = $this->post->getValidClean("password", "mot de passe", 'required|minLenght[8]');
		if ($this->post->check())
		{
			if ($user = $this->user_model->connect($email, $password))
			{
				$_SESSION['user'] = $user;
				redirect($this->_BaseUrl."/user/maker");
			}
			else
				$this->post->addError("Erreur email ou mot de passe");
		}
		$this->page->login();
	}

	public function resetPassword()
	{
		$email = $this->post->getValidClean('email', 'email', 'required|email');
		$response = false;

		if (!$this->user_model->emailExist($email))
			$this->post->addError("L'email n'existe pas.");

		if ($this->post->check())
		{
			$newpass = mt_rand(10000000, PHP_INT_MAX);
			$this->user_model->newPassword($email, $newpass);
			$this->mail->newPassword($email, $newpass);
			$response = true;
		}
		$this->page->forget($response);
	}

	public function maker()
	{
		if (!isset($_SESSION['user']))
			redirect(__BASE_URL__);
		$this->page->maker();
	}

	public function forget($sent = false)
	{
		if (isset($_SESSION['user']))
			redirect(__BASE_URL__."/user/maker");
		$this->page->forget(false);
	}

	public function addPicture()
	{
		if (!isset($_SESSION['user']))
			redirect(__BASE_URL__);
		$photoUrl = $this->post->getClean("photoWebcam");
		$mountId = $this->post->getClean("mountId");

		$photoUrl = explode(",", $photoUrl)[1];
		$mount = $this->imgSample_model->getImgById($mountId);

		$data = base64_decode($photoUrl);
		$im = imagecreatefromstring($data);

		$width = imagesx($im);
		$height = imagesy($im);
		$mountImg = $this->resize_image('assets/img/sample/'.$mount['url'], $width, $height);
		$black = imagecolorallocate($mountImg, 0, 0, 0);
		imagecolortransparent($mountImg, $black);
		imagecopymerge($im, $mountImg, 0, 0, -40, 0, $width, $height, 100);
		if ($im !== false) {
			$baseImg = 'assets/img/gallery/';
			$name = 'espiroux_'.date("Ymdts", time()).".png";
			$this->gallery_model->addImage($name);
		    imagepng($im, $baseImg.$name);
		    imagedestroy($mountImg);
		    imagedestroy($im);
		}
		redirect($this->_BaseUrl."/user/maker");
	}

	public function addPictureFile()
	{
		if (!isset($_SESSION['user']))
			redirect(__BASE_URL__);
		if ((!$photoFile = $this->post->upload('photoForm', 'assets/img/tmpMaker')))
		{
			$this->page->maker();
			exit ;
		}
		$mountId   = $this->post->getClean("mountId");

		$mount = $this->imgSample_model->getImgById($mountId);

		$data = $photoFile;
		$im = imagecreatefromjpeg($photoFile);

		$im = $this->resizeImageJpeg($photoFile, 300, 200, true);
		$width = imagesx($im);
		$height = imagesy($im);
		$mountImg = $this->resize_image('assets/img/sample/'.$mount['url'], $width, $height);
		$widthM = imagesx($mountImg);
		$heightM = imagesy($mountImg);
		$black = imagecolorallocate($mountImg, 0, 0, 0);
		imagecolortransparent($mountImg, $black);
		imagecopymerge($im, $mountImg, 0, 0, -40, 0, $width, $height, 100);
		if ($im !== false) {
			$baseImg = 'assets/img/gallery/';
			$name = $_SESSION['user']['pseudo'].date("Ymdts", time()).".jpg";
			$this->gallery_model->addImage($name);
		    imagepng($im, $baseImg.$name);
		    imagedestroy($mountImg);
		    imagedestroy($im);
		    unlink($photoFile);
		}
		redirect($this->_BaseUrl."/user/maker");
	}

	private function resize_image($file, $w, $h, $crop=FALSE) {
    	list($width, $height) = getimagesize($file);
    	$r = $width / $height;
    	if ($crop) {
    	    if ($width > $height) {
    	        $width = ceil($width-($width*abs($r-$w/$h)));
    	    } else {
    	        $height = ceil($height-($height*abs($r-$w/$h)));
    	    }
    	    $newwidth = $w;
    	    $newheight = $h;
    	} else {
    	    if ($w/$h > $r) {
    	        $newwidth = $h*$r;
    	        $newheight = $h;
    	    } else {
    	        $newheight = $w/$r;
    	        $newwidth = $w;
    	    }
    	}
    	$src = imagecreatefrompng($file);
    	$dst = imagecreatetruecolor($newwidth, $newheight);
    	imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    	return $dst;
	}

	private function resizeImageJpeg($file, $w, $h, $crop=FALSE) {
    	list($width, $height) = getimagesize($file);
    	$r = $width / $height;
    	if ($crop) {
    	    if ($width > $height) {
    	        $width = ceil($width-($width*abs($r-$w/$h)));
    	    } else {
    	        $height = ceil($height-($height*abs($r-$w/$h)));
    	    }
    	    $newwidth = $w;
    	    $newheight = $h;
    	} else {
    	    if ($w/$h > $r) {
    	        $newwidth = $h*$r;
    	        $newheight = $h;
    	    } else {
    	        $newheight = $w/$r;
    	        $newwidth = $w;
    	    }
    	}
    	$src = imagecreatefromjpeg($file);
    	$dst = imagecreatetruecolor($newwidth, $newheight);
    	imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    	return $dst;
	}

	public function logout()
	{
		unset($_SESSION['user']);
		redirect(__BASE_URL__);
	}

	public function addUser()
	{
		$pseudo = $this->post->getValidClean('pseudo', 'pseudo', 'required|alphaNum');
		$email = $this->post->getValidClean('email', 'email', 'email|required');
		$password = $this->post->getValidClean('password', 'mot de passe', 'required|minLenght[8]|alphaNum');
		$confirmPass =  $this->post->getValidClean('password_confirm', 'confirmation de mot de passe', 'required');

		if ($password != $confirmPass)
			$this->post->addError("Les mots de passe ne correspondent pas...");
		if ($this->user_model->emailExist($email))
			$this->post->addError("L'email existe déja.");

		if ($this->post->check())
		{
			$code = $this->user_model->add($email, $password, $pseudo);
			$this->mail->sendConfirm($email, $code);
			$this->page->RegisterConfirm($pseudo, $email);
		}
		else
			$this->page->register();

	}

	public function register()
	{
		if (isset($_SESSION['user']))
			redirect(__BASE_URL__."/user/maker");
		$this->page->register();
	}

	public function registerConfirm($validCode)
	{
		$this->user_model->registerConfirm($validCode);
		redirect(__BASE_URL__);
	}
}
