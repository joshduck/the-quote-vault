<?php

/**
 * Subclass for representing a row from the 'comment' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Comment extends BaseComment
{
	function save($conn = null)
	{
		parent::save($conn);
		$this->getItem()->updateCommentCount();
	}

	public function isPublic()
	{
		return $this->getApproved() && !$this->getDeleted();
	}

	function getItem()
	{
		return ItemPeer::retrieveByPk($this->getItemId());
	}

	function canUserEdit()
	{
		return $this->belongsToUser() && !$this->hasEditTimedOut();
	}

	function belongsToUser()
	{
		if ($this->getUserId())
		{
			return ($this->getUserId() == $this->getUser()->getAttribute('id'));
		}
		else
		{
			return ($this->getUserIp() == $_SERVER['REMOTE_ADDR']);
		}
	}

	function hasEditTimedOut()
	{
		return (strtotime($this->getCreatedAt()) < time() - 3600);
	}
}
