<?php

/**
 * Subclass for representing a row from the 'creator' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Creator extends BaseCreator
{
	public function getName()
	{
		$name = $this->getGivenNames();
		$surname = $this->getSurname();
		$title = $this->getTitle();

		if ($surname) $name .= ' ' . $surname;
		if ($title) $name .= ', ' . $title;

		return $name;
	}

	public function getBiographicalName()
	{
		$name = $this->getGivenNames();
		$surname = $this->getSurname();
		$title = $this->getTitle();

		if (!$surname) $surname = $name;
		else if ($name) $surname .= ', ' . $name;
		if ($title) $surname .= ' ' . $title;

		return $surname;
	}

	public function getItemsCriteria()
	{
		$c = new Criteria();
		$c->add(ItemPeer::CREATOR_ID, $this->getId());
		$c->add(ItemPeer::APPROVED, 1);
		$c->addDescendingOrderByColumn(ItemPeer::RATING);
		return $c;
	}

	public function getItemCount()
	{
		return ItemPeer::doCount($this->getItemsCriteria());
	}

	public function getImage()
	{
		return ImagePeer::retrieveByPk($this->getImageId());
	}

	public function getTags($limit = null)
	{
		$connection = Propel::getConnection();
		$sql = "SELECT it.tag_id, COUNT(*) c "
		     . "FROM item i join item_tag it ON i.id = it.item_id "
			 . "WHERE i.creator_id = '%s' "
			 . "GROUP BY it.tag_id "
		     . "ORDER BY c DESC ";
		if ($limit > 0) $sql .= " LIMIT " . intval($limit);
		$sql = sprintf($sql, $this->getId());
		$statement = $connection->prepareStatement($sql);
		$resultset = $statement->executeQuery();

		$tags = array();	
		while ($resultset->next())
		{
			$tags[] = TagPeer::retrieveByPk($resultset->getInt('tag_id'));
		}
		return $tags;
	}
}
