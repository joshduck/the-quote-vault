<?php

/**
 * Subclass for representing a row from the 'item' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Item extends BaseItem
{
	public function isPublic()
	{
		return $this->getApproved() && !$this->getDeleted();
	}

	public function save($con = null)
	{
		if ($this->getSlug() == null)
		{
			$text = $this->getText();
			$text = preg_replace('/[^a-zA-Z0-9]/', '_', substr($text, 0 , 32));
			$text = preg_replace('/_+/', '_', $text);
			
			$count = 1;
			$slug = $text;
			while (ItemPeer::retrieveBySlug($slug) != null) 
			{
				$slug = $text .= ++$count;
			} 
			
			$this->setSlug($text);
		}

		parent::save($con);
	}

	public function getCommentsCriteria()
	{
		$c = new Criteria();
		$c->add(CommentPeer::ITEM_ID, $this->getId());
		$c->add(CommentPeer::DELETED, 0);
		$c->add(CommentPeer::APPROVED, 1);
		$c->addDescendingOrderByColumn(CommentPeer::CREATED_AT);
		return $c;
	}

	public function getComments()
	{
		return CommentPeer::doSelect($this->getCommentsCriteria());
	}

	public function updateCommentCount()
	{
		$query = "UPDATE %s i SET comment_count = (SELECT COUNT(*) FROM %s c WHERE c.item_id = i.id AND c.approved = 1 AND c.deleted = 0) WHERE i.id = '%s'";
		$query = sprintf($query, ItemPeer::TABLE_NAME, CommentPeer::TABLE_NAME, $this->getId());
		$connection = Propel::getConnection();
		$statement = $connection->prepareStatement($query);
		$resultset = $statement->executeQuery();
	}

	public function getTags()
	{
		$c = new Criteria();
		$c->add(ItemTagPeer::ITEM_ID, $this->getId());
		$c->addJoin(ItemTagPeer::TAG_ID, TagPeer::ID);
		$c->addGroupByColumn(ItemTagPeer::TAG_ID);
		return TagPeer::doSelect($c);
	}

	public function updateRating()
	{
		$query = "UPDATE %s i SET rating = (SELECT SUM(r.rating) / COUNT(r.rating) FROM %s r WHERE r.item_id = i.id) WHERE i.id = '%s'";
		$query = sprintf($query, ItemPeer::TABLE_NAME, RatingPeer::TABLE_NAME, $this->getId());
		$connection = Propel::getConnection();
		$statement = $connection->prepareStatement($query);
		$resultset = $statement->executeQuery();
	}

	public function getRatingForUser($ip, $user)
	{
		return RatingPeer::retrieveByItemAndUser($this, $ip, $user);
	}

	public function setTags($newTags)
	{
		$oldTags = $this->getTags();
		foreach ($oldTags as $oldTag)
		{
			//Search list of new tags to see if we should retain each old one
			$found = false;
			$id = $oldTag->getId();
			foreach ($newTags as $index => &$newTag)
			{
				if ($newTag->getId() == $id)
				{
					//Don't need to add it in again
					unset($newTags[$index]);
					$found = true;
					break;
				}
			}

			if (!$found)
			{
				//Remove old list
				$c = new Criteria();
				$c->add(ItemTagPeer::ITEM_ID, $this->getId());
				$c->add(ItemTagPeer::TAG_ID, $oldTag->getId());
				if ($itemTag = ItemTagPeer::doSelectOne($c))
				{
					$itemTag->delete();
				}
			}
		}

		foreach ($newTags as $newTag)
		{
			$itemTag = new ItemTag();
			$itemTag->setItemId($this->getId());
			$itemTag->setTagId($newTag->getId());
			$itemTag->save();
		}
	}
}
