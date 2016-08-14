<?php

/**
 * default actions.
 *
 * @package    quotes
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class defaultActions extends sfActions
{
  /**
   * Executes index action
   *
   */
	public function executeIndex()
	{
		$this->tags = TagPeer::getPopular(75);
		$this->creators = CreatorPeer::getPopular(10);
		$this->creatorCount = CreatorPeer::doCount(new Criteria());
		$this->itemCount = ItemPeer::doCount(new Criteria());
	}

	public function executeError404()
	{
	}

	public function executeTerms()
	{
	}
}
