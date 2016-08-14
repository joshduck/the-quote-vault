<?php

/**
 * search actions.
 *
 * @package    quotes
 * @subpackage search
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class searchActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
	TitleHelper::setTitle(sprintf('Search Quotes',  $this->tag));
  }

  public function executeSearch()
  {
	  $this->query = $this->getRequestParameter('query');
	  TitleHelper::setTitle(sprintf('Search Quotes',  $this->tag));
  }
}
