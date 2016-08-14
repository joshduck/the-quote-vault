<?php

/**
 * Subclass for representing a row from the 'tag' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Tag extends BaseTag
{
	public function __toString()
	{
		return $this->getName();
	}

	public function getItemsCriteria()
	{
		$c = new Criteria();
		$c->add(ItemTagPeer::TAG_ID, $this->getId());
		$c->addJoin(ItemTagPeer::ITEM_ID, ItemPeer::ID);
		$c->add(ItemPeer::DELETED, 0);
		$c->add(ItemPeer::APPROVED, 1);
		return $c;
	}

	public function getItems()
	{
		return ItemPeer::doSelect($this->getItemsCriteria());
	}

	public function updateItemCount()
	{	
		//Update the summary
		$query = "UPDATE %s t SET item_count = (SELECT COUNT(*) FROM %s it WHERE it.tag_id = t.id) WHERE t.id = '%s'";
		$query = sprintf($query, TagPeer::TABLE_NAME, ItemTagPeer::TABLE_NAME, $this->getId());
		$connection = Propel::getConnection();
		$statement = $connection->prepareStatement($query);
		$resultset = $statement->executeQuery();
	}
}
