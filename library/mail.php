<?php

class mail extends CF_library
{
	private $mailer;
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Etc/UTC');
		$this->mail->IsSMTP();
		$this->mail->SMTPDebug = 4;
		$this->mail->SMTPAuth = true;
		$this->mail->SMTPSecure = 'tls';
		$this->mail->Timeout = 3600;
		$this->mail->Host = 'smtp.gmail.com';
		$this->mail->Port = "587";
		$this->mail->IsHTML(true);
		$this->mail->Username = "emeric.spiroux@gmail.com";
		$this->mail->Password = "Larry&me25";
		$this->mail->SetFrom("noreply@spiroux-web.fr");
	}

	public function sendContact($name, $email, $phone, $message)
	{
		$this->mail->Subject = "Contact - Portfolio";
		$this->mail->Body = "	Bonjour Emeric,<br/>
								Vous avez été contacté par $name.<br/>
								Email : $email<br/>
								Phone : $phone<br/>
								Message : $message<br/>";
		$this->mail->AddAddress("contact@spiroux-web.fr");

		if(!$this->mail->Send()) {
			echo $this->mail->ErrorInfoy;
		    	return (false);
		 } else {
		 	return (true);
		 }
	}
}
