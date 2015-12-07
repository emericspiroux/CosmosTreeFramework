<?php

/**
*
*/
class imgSample_model extends CF_model
{
	public function getImgs()
	{
		$res = $this->doQuery('Select id, url FROM imgSample');
		if (!count($res))
			return (false);
		return ($res);
	}

	public function getImgById($id)
	{
		$res = $this->doQuery('Select id, url FROM imgSample WHERE id = ?', $id);
		if (!count($res))
			return (false);
		return ($res[0]);
	}
}

?>
