<?php

/**
*
*/
class gallery_model extends CF_model
{
	public function addImage($url)
	{
		return ($this->insert('gallery', array(
				'id_user' => $_SESSION['user']['id'],
				'url' => $url
			)));
	}

	public function getAllImgs($start = 0, $end = 10)
	{
		$start = intval($start);
		$end = intval($end);
		$res = $this->doQuery("Select gallery.id, gallery.id_user, gallery.url, users.pseudo FROM users, gallery WHERE gallery.id_user = users.id ORDER BY gallery.date DESC LIMIT $start, $end");
		if (!count($res))
			return (false);

		$newres = $res;
		foreach ($res as $key => $value) {
			$comment = $this->doQuery('Select comment.id_user, comment.text, comment.date, users.pseudo FROM users, comment WHERE comment.id_gallery = ? AND users.id = comment.id_user', $value['id']);
				$newres[$key]['comment'] = (count($comment))?$comment:false;
			$like = $this->doQuery('Select COUNT(id) as nb_like FROM love WHERE id_gallery = ?', $value['id']);
				$newres[$key]['nb_like'] = (count($like))?$like[0]['nb_like']:0;
			$like = $this->doQuery('Select id FROM love WHERE id_gallery = ? AND id_user = ?', $value['id'], $_SESSION['user']['id']);
				$newres[$key]['liked'] = (count($like))?true:false;
		}
		return ($newres);
	}

	public function getImgs($id_user)
	{
		$res = $this->doQuery('Select gallery.id, gallery.id_user, gallery.url, users.pseudo FROM users, gallery WHERE gallery.id_user = users.id AND users.id = ?', $id_user);
		if (!count($res))
			return (false);
		return ($res);
	}

	public function getImgsById($id_gallery)
	{
		$res = $this->doQuery('Select gallery.*, users.id as "id_user", users.pseudo, users.email FROM gallery, users WHERE gallery.id = ? AND gallery.id_user = users.id', $id_gallery);
		if (!count($res))
			return (false);
		return ($res[0]);
	}

	public function getNbImgs()
	{
		$res = $this->doQuery('Select count(id) as nb_img FROM gallery');
		if (!count($res))
			return (false);
		return (intval($res[0]['nb_img']));
	}

	public function addComment($id_gallery, $comment)
	{
		return ($this->insert('comment', array(
				'id_user' => $_SESSION['user']['id'],
				'id_gallery' => $id_gallery,
				'text' => $comment
		)));
	}

	public function like($id_gallery)
	{
		if (!$this->doQuery('Select id FROM love WHERE id_gallery = ? AND id_user = ?', $id_gallery, $_SESSION['user']['id']))
		return ($this->insert('love', array(
				'id_user' => $_SESSION['user']['id'],
				'id_gallery' => $id_gallery
		)));
		else
			return (false);
	}

	public function unlike($id_gallery)
	{
		return ($this->delete('love', array('id_user' => $_SESSION['user']['id'], 'id_gallery' => $id_gallery)));
	}

	public function deleteImg($id)
	{
		$img = $this->getImgsById($id);
		if (intval($img['id_user']) == intval($_SESSION['user']['id']))
		{
			$this->delete('gallery', array('id' => $id));
			$this->delete('comment', array('id_gallery' => $id));
			$this->delete('love', array('id_gallery' => $id));
			return (true);
		}
		return (false);
	}
}

?>
