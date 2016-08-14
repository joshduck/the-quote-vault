<?php

/**
 * Subclass for representing a row from the 'item_tag' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ItemTag extends BaseItemTag
{
	public function save($conn = null)
	{
		parent::save($conn);
		$this->getTag()->updateItemCount();
	}

	public function delete($conn = null)
	{
		parent::delete($conn);
		$this->getTag()->updateItemCount();
	}
}
