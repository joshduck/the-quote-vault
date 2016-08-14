<?php

/**
 * Subclass for performing query and update operations on the 'creator' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CreatorPeer extends BaseCreatorPeer
{
	public static function retrieveBySlug($slug = null)
	{
		$c = new Criteria();
		$c->add(CreatorPeer::SLUG, $slug);
		return CreatorPeer::doSelectOne($c);
	}

	public static function getListCriteria($letter)
	{
		$c = new Criteria();
		$c->add(CreatorPeer::SURNAME, $letter . '%', Criteria::LIKE);
		$c->addAscendingOrderByColumn(CreatorPeer::SURNAME);
		return $c;
	}

	public static function getList($letter)
	{
		return CreatorPeer::doSelect(CreatorPeer::getListCriteria($letter));
	}

	public static function getPopular($limit = 10)
	{
		$query = "SELECT c.id FROM %s c JOIN %s i ON c.id = i.creator_id GROUP BY c.id ORDER BY (SUM(i.rating) / COUNT(i.id)), COUNT(i.id) DESC LIMIT %d";
		$query = sprintf($query, CreatorPeer::TABLE_NAME, ItemPeer::TABLE_NAME, $limit);
		$connection = Propel::getConnection();
		$statement = $connection->prepareStatement($query);
		$resultSet = $statement->executeQuery();

		$creators = array();
		while ($resultSet->next())
		{
			$creators[] = CreatorPeer::retrieveByPk($resultSet->getInt('id'));
		}
		return $creators;
	}
}
