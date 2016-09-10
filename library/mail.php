<?php
class mail extends CF_library
{
	private $mailer;
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Etc/UTC');
		$this->mail->IsSMTP();
		$this->mail->SMTPDebug = 0;
		$this->mail->SMTPAuth = true;
		$this->mail->SMTPSecure = 'ssl';
		$this->mail->Timeout = 3600;
		$this->mail->Host = 'mail.gandi.net';
		$this->mail->Port = "465";
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
		if(!$this->mail->Send()) {
			echo $this->mail->ErrorInfo;
		    	return (false);
		 } else {
		 	return (true);
		 }
	}
}
