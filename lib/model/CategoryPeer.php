<?php

/**
 * Subclass for performing query and update operations on the 'category' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CategoryPeer extends BaseCategoryPeer
{
	public static function getRootCategories()
	{
		$c = new Critieria();
		$c->add(CategoryPeer::PARENT_CATEOGORY_ID, null);
		$c->add(CategoryPeer::LISTED, 1);
		$c->addAscentingOrderByColumn(CategoryPeer::NAME);
		return CategoryPeer::doSelect($c);
	}
}
