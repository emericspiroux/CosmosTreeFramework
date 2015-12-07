<?php

class mail extends CF_library
{
	private $mailer;
	public function __construct()
	{
		parent::__construct();
		$this->mail->IsSMTP();
		$this->mail->SMTPDebug = 1;
		$this->mail->SMTPAuth = true;
		$this->mail->SMTPSecure = 'ssl';
		$this->mail->Host = "smtp.gmail.com";
		$this->mail->Port = 465;
		$this->mail->IsHTML(true);
		$this->mail->Username = "emeric.spiroux@gmail.com";
		$this->mail->Password = "Emeric25";
		$this->mail->SetFrom("contact@espiroux.fr");
	}

	public function sendConfirm($email, $validCode)
	{
		$this->mail->Subject = "Validation Camagru Espiroux";
		$this->mail->Body = "Bonjour, <a href='".__BASE_URL__."/user/registerConfirm/".$validCode."'> confirmation inscription</a>";
		$this->mail->AddAddress($email);

		ob_start();
		if(!$this->mail->Send()) {
			ob_end_clean();
		    return (false);
		 } else {
		 	ob_end_clean();
		 	return (true);
		 }
	}

	public function newPassword($email, $newpass)
	{
		$this->mail->Subject = "Camagru, nouveau mot de passe";
		$this->mail->Body = "Bonjour, <br/>
							<b>Nouveau mot de passe:</b> <br/>
							- $newpass";
		$this->mail->AddAddress($email);

		ob_start();
		if(!$this->mail->Send()) {
			ob_end_clean();
		    return (false);
		} else {
		 	ob_end_clean();
		 	return (true);
		}
	}

	public function sendComment($email, $pseudo, $comment)
	{
		$this->mail->Subject = "Camagru, comment of $pseudo";
		$this->mail->Body = "Bonjour, <br/>
							<b>$pseudo vous à laissé un commentaire :</b> <br/>
							- $comment";
		$this->mail->AddAddress($email);

		ob_start();
		if(!$this->mail->Send()) {
			ob_end_clean();
		    return (false);
		} else {
		 	ob_end_clean();
		 	return (true);
		}
	}
}
