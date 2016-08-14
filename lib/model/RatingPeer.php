<?php

/**
 * Subclass for performing query and update operations on the 'rating' table.
 *
 * 
 *
 * @package lib.model
 */ 
class RatingPeer extends BaseRatingPeer
{
	public static function retrieveByItemAndUser($item, $ip = '', $user = null)
	{
		$c = new Criteria();
		$c->add(RatingPeer::ITEM_ID, $item->getId());
		if ($user)
		{
			$c->add(RatingPeer::USER_ID, $user->getId());
		}
		else
		{
			$c->add(RatingPeer::USER_IP, $ip);
			$c->add(RatingPeer::CREATED_AT, time() - 24*60*60, Criteria::GREATER_THAN);
		}
		return RatingPeer::doSelectOne($c);
	}
}
