<?php

/**
 * Subclass for representing a row from the 'category' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Category extends BaseCategory
{
	public static function getCategoriesCriteria()
	{
		$c = new Critieria();
		$c->add(CategoryPeer::PARENT_CATEOGORY_ID, $this->getId());
		$c->add(CategoryPeer::LISTED, 1);
		$c->addAscentingOrderByColumn(CategoryPeer::NAME);
		return $c;
	}

	public function getCategories()
	{
		return CategoryPeer::doSelect($c);
	}
}
