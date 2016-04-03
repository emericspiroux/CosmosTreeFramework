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
		$this->mail->Host = "smtp.spiroux-web.fr";
		$this->mail->Port = 465;
		$this->mail->IsHTML(true);
		$this->mail->Username = "noreply@spiroux-web.fr";
		$this->mail->Password = "cvtcW299Pg";
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
