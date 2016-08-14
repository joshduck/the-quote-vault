<?php

/**
 * Subclass for performing query and update operations on the 'tag' table.
 *
 * 
 *
 * @package lib.model
 */ 
class TagPeer extends BaseTagPeer
{
	public static function retrieveByName($name = null)
	{
		$c = new Criteria();
		$c->add(TagPeer::NAME, $name);
		return TagPeer::doSelectOne($c);
	}

	public static function retrieveOrCreateByName($name = null)
	{
		if (!($tag = TagPeer::retrieveByName($name)))
		{
			$tag = new Tag();
			$tag->setName($name);
			$tag->save();
		}
		return $tag;
	}

	public static function getPopular($count = 100)
	{
		$c = new Criteria();
		$c->addDescendingOrderByColumn(TagPeer::ITEM_COUNT);
		$c->setLimit($count);
		return TagPeer::doSelect($c);
	}
}
