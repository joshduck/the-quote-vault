<?php

/**
 * Subclass for performing query and update operations on the 'item' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ItemPeer extends BaseItemPeer
{
	public static function retrieveBySlug($slug = null)
	{
		$c = new Criteria();
		$c->add(ItemPeer::SLUG, $slug);
		return ItemPeer::doSelectOne($c);
	}

	public static function retrieveRandom()
	{
		$c = new Criteria();
		$c->add(ItemPeer::DELETED, 0);
		$c->add(ItemPeer::APPROVED, 1);
		$c->addAscendingOrderByColumn('RAND()');
		return ItemPeer::doSelectOne($c);
	}
}
