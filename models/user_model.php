<?php

/**
*
*/
class user_model extends CF_model
{
	public function connect($email, $password)
	{
		$res = $this->doQuery('Select id, email, pseudo FROM users WHERE password = ? AND email = ? AND confirm = 1', hash('whirlpool', $password), $email);
		if (!count($res))
			return (false);
		return ($res[0]);
	}

	public function newPassword($email, $newpass)
	{
		return ($this->update('users', array('password' => hash('whirlpool',$newpass)), array('email' =>$email)));
	}

	public function emailExist($email)
	{
		$res = $this->doQuery('Select id FROM users WHERE email = ?', $email);
		if (!count($res))
			return (false);
		return (true);
	}

	public function add($email, $password, $pseudo)
	{
		$code = mt_rand();
		if (!($this->insert('users', array('email' => $email, 'pseudo' => $pseudo, 'password' => hash('whirlpool', $password), 'confirm_code' => $code))))
			return (false);
		return($code);
	}

	public function registerConfirm($validCode)
	{
		return ($this->update('users', array('confirm' => 1), array('confirm_code' =>$validCode)));
	}
}

?>
