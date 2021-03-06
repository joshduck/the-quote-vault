﻿<?php
// auto-generated by sfPropelCrud
// date: 2007/08/18 23:00:02
?>
<?php

/**
 * user actions.
 *
 * @package    quotes
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class userActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('user', 'list');
  }

  public function executeList()
  {
    $this->users = UserPeer::doSelect(new Criteria());
  }

  public function executeShow()
  {
    $this->user = UserPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->user);
  }

  public function executeCreate()
  {
    $this->user = new User();

    $this->setTemplate('edit');
  }

  public function executeEdit()
  {
    $this->user = UserPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->user);
  }

  public function executeUpdate()
  {
    if (!$this->getRequestParameter('id'))
    {
      $user = new User();
    }
    else
    {
      $user = UserPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($user);
    }

    $user->setId($this->getRequestParameter('id'));
    $user->setEmail($this->getRequestParameter('email'));
    $user->setDisplayName($this->getRequestParameter('display_name'));
    $user->setAuthenticated($this->getRequestParameter('authenticated'));
    $user->setDeleted($this->getRequestParameter('deleted'));
    $user->setNewsletterSubscribe($this->getRequestParameter('newsletter_subscribe'));
    if ($this->getRequestParameter('dob'))
    {
      list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('dob'), $this->getUser()->getCulture());
      $user->setDob("$y-$m-$d");
    }
    $user->setGender($this->getRequestParameter('gender'));
    $user->setCountry($this->getRequestParameter('country'));
    $user->setProfile($this->getRequestParameter('profile'));
    $user->setFirstName($this->getRequestParameter('first_name'));
    $user->setLastName($this->getRequestParameter('last_name'));
    $user->setZipCode($this->getRequestParameter('zip_code'));
    $user->setState($this->getRequestParameter('state'));
    $user->setCity($this->getRequestParameter('city'));
    $user->setPasswordHash($this->getRequestParameter('password_hash'));
    $user->setProfilePrivate($this->getRequestParameter('profile_private'));
    $user->setPersonalPrivate($this->getRequestParameter('personal_private'));
    $user->setImageId($this->getRequestParameter('image_id'));

    $user->save();

    return $this->redirect('user/show?id='.$user->getId());
  }

  public function executeDelete()
  {
    $user = UserPeer::retrieveByPk($this->getRequestParameter('id'));

    $this->forward404Unless($user);

    $user->delete();

    return $this->redirect('user/list');
  }
}
