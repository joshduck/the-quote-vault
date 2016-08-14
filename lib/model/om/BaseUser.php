<?php


abstract class BaseUser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id = 'null';


	
	protected $email = 'null';


	
	protected $display_name = 'null';


	
	protected $authenticated = 0;


	
	protected $deleted = 0;


	
	protected $created_at = 943880400;


	
	protected $updated_at = 943880400;


	
	protected $newsletter_subscribe = 0;


	
	protected $dob;


	
	protected $gender;


	
	protected $country;


	
	protected $profile;


	
	protected $first_name;


	
	protected $last_name;


	
	protected $zip_code;


	
	protected $state;


	
	protected $city;


	
	protected $password_hash = 'null';


	
	protected $profile_private;


	
	protected $personal_private;


	
	protected $image_id;

	
	protected $aImage;

	
	protected $collBookmarks;

	
	protected $lastBookmarkCriteria = null;

	
	protected $collImages;

	
	protected $lastImageCriteria = null;

	
	protected $collItems;

	
	protected $lastItemCriteria = null;

	
	protected $collRatings;

	
	protected $lastRatingCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getDisplayName()
	{

		return $this->display_name;
	}

	
	public function getAuthenticated()
	{

		return $this->authenticated;
	}

	
	public function getDeleted()
	{

		return $this->deleted;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNewsletterSubscribe()
	{

		return $this->newsletter_subscribe;
	}

	
	public function getDob($format = 'Y-m-d')
	{

		if ($this->dob === null || $this->dob === '') {
			return null;
		} elseif (!is_int($this->dob)) {
						$ts = strtotime($this->dob);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [dob] as date/time value: " . var_export($this->dob, true));
			}
		} else {
			$ts = $this->dob;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getGender()
	{

		return $this->gender;
	}

	
	public function getCountry()
	{

		return $this->country;
	}

	
	public function getProfile()
	{

		return $this->profile;
	}

	
	public function getFirstName()
	{

		return $this->first_name;
	}

	
	public function getLastName()
	{

		return $this->last_name;
	}

	
	public function getZipCode()
	{

		return $this->zip_code;
	}

	
	public function getState()
	{

		return $this->state;
	}

	
	public function getCity()
	{

		return $this->city;
	}

	
	public function getPasswordHash()
	{

		return $this->password_hash;
	}

	
	public function getProfilePrivate()
	{

		return $this->profile_private;
	}

	
	public function getPersonalPrivate()
	{

		return $this->personal_private;
	}

	
	public function getImageId()
	{

		return $this->image_id;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v || $v === 'null') {
			$this->id = $v;
			$this->modifiedColumns[] = UserPeer::ID;
		}

	} 
	
	public function setEmail($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v || $v === 'null') {
			$this->email = $v;
			$this->modifiedColumns[] = UserPeer::EMAIL;
		}

	} 
	
	public function setDisplayName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->display_name !== $v || $v === 'null') {
			$this->display_name = $v;
			$this->modifiedColumns[] = UserPeer::DISPLAY_NAME;
		}

	} 
	
	public function setAuthenticated($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->authenticated !== $v || $v === 0) {
			$this->authenticated = $v;
			$this->modifiedColumns[] = UserPeer::AUTHENTICATED;
		}

	} 
	
	public function setDeleted($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted !== $v || $v === 0) {
			$this->deleted = $v;
			$this->modifiedColumns[] = UserPeer::DELETED;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts || $ts === 943880400) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = UserPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts || $ts === 943880400) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = UserPeer::UPDATED_AT;
		}

	} 
	
	public function setNewsletterSubscribe($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->newsletter_subscribe !== $v || $v === 0) {
			$this->newsletter_subscribe = $v;
			$this->modifiedColumns[] = UserPeer::NEWSLETTER_SUBSCRIBE;
		}

	} 
	
	public function setDob($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [dob] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->dob !== $ts) {
			$this->dob = $ts;
			$this->modifiedColumns[] = UserPeer::DOB;
		}

	} 
	
	public function setGender($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->gender !== $v) {
			$this->gender = $v;
			$this->modifiedColumns[] = UserPeer::GENDER;
		}

	} 
	
	public function setCountry($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->country !== $v) {
			$this->country = $v;
			$this->modifiedColumns[] = UserPeer::COUNTRY;
		}

	} 
	
	public function setProfile($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->profile !== $v) {
			$this->profile = $v;
			$this->modifiedColumns[] = UserPeer::PROFILE;
		}

	} 
	
	public function setFirstName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->first_name !== $v) {
			$this->first_name = $v;
			$this->modifiedColumns[] = UserPeer::FIRST_NAME;
		}

	} 
	
	public function setLastName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->last_name !== $v) {
			$this->last_name = $v;
			$this->modifiedColumns[] = UserPeer::LAST_NAME;
		}

	} 
	
	public function setZipCode($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->zip_code !== $v) {
			$this->zip_code = $v;
			$this->modifiedColumns[] = UserPeer::ZIP_CODE;
		}

	} 
	
	public function setState($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->state !== $v) {
			$this->state = $v;
			$this->modifiedColumns[] = UserPeer::STATE;
		}

	} 
	
	public function setCity($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->city !== $v) {
			$this->city = $v;
			$this->modifiedColumns[] = UserPeer::CITY;
		}

	} 
	
	public function setPasswordHash($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->password_hash !== $v || $v === 'null') {
			$this->password_hash = $v;
			$this->modifiedColumns[] = UserPeer::PASSWORD_HASH;
		}

	} 
	
	public function setProfilePrivate($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->profile_private !== $v) {
			$this->profile_private = $v;
			$this->modifiedColumns[] = UserPeer::PROFILE_PRIVATE;
		}

	} 
	
	public function setPersonalPrivate($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->personal_private !== $v) {
			$this->personal_private = $v;
			$this->modifiedColumns[] = UserPeer::PERSONAL_PRIVATE;
		}

	} 
	
	public function setImageId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->image_id !== $v) {
			$this->image_id = $v;
			$this->modifiedColumns[] = UserPeer::IMAGE_ID;
		}

		if ($this->aImage !== null && $this->aImage->getId() !== $v) {
			$this->aImage = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->email = $rs->getString($startcol + 1);

			$this->display_name = $rs->getString($startcol + 2);

			$this->authenticated = $rs->getInt($startcol + 3);

			$this->deleted = $rs->getInt($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->newsletter_subscribe = $rs->getInt($startcol + 7);

			$this->dob = $rs->getDate($startcol + 8, null);

			$this->gender = $rs->getString($startcol + 9);

			$this->country = $rs->getString($startcol + 10);

			$this->profile = $rs->getString($startcol + 11);

			$this->first_name = $rs->getString($startcol + 12);

			$this->last_name = $rs->getString($startcol + 13);

			$this->zip_code = $rs->getString($startcol + 14);

			$this->state = $rs->getString($startcol + 15);

			$this->city = $rs->getString($startcol + 16);

			$this->password_hash = $rs->getString($startcol + 17);

			$this->profile_private = $rs->getInt($startcol + 18);

			$this->personal_private = $rs->getInt($startcol + 19);

			$this->image_id = $rs->getString($startcol + 20);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 21; 
		} catch (Exception $e) {
			throw new PropelException("Error populating User object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UserPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(UserPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(UserPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aImage !== null) {
				if ($this->aImage->isModified()) {
					$affectedRows += $this->aImage->save($con);
				}
				$this->setImage($this->aImage);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += UserPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collBookmarks !== null) {
				foreach($this->collBookmarks as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collImages !== null) {
				foreach($this->collImages as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collItems !== null) {
				foreach($this->collItems as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRatings !== null) {
				foreach($this->collRatings as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aImage !== null) {
				if (!$this->aImage->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aImage->getValidationFailures());
				}
			}


			if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collBookmarks !== null) {
					foreach($this->collBookmarks as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collImages !== null) {
					foreach($this->collImages as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collItems !== null) {
					foreach($this->collItems as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRatings !== null) {
					foreach($this->collRatings as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getEmail();
				break;
			case 2:
				return $this->getDisplayName();
				break;
			case 3:
				return $this->getAuthenticated();
				break;
			case 4:
				return $this->getDeleted();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			case 7:
				return $this->getNewsletterSubscribe();
				break;
			case 8:
				return $this->getDob();
				break;
			case 9:
				return $this->getGender();
				break;
			case 10:
				return $this->getCountry();
				break;
			case 11:
				return $this->getProfile();
				break;
			case 12:
				return $this->getFirstName();
				break;
			case 13:
				return $this->getLastName();
				break;
			case 14:
				return $this->getZipCode();
				break;
			case 15:
				return $this->getState();
				break;
			case 16:
				return $this->getCity();
				break;
			case 17:
				return $this->getPasswordHash();
				break;
			case 18:
				return $this->getProfilePrivate();
				break;
			case 19:
				return $this->getPersonalPrivate();
				break;
			case 20:
				return $this->getImageId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEmail(),
			$keys[2] => $this->getDisplayName(),
			$keys[3] => $this->getAuthenticated(),
			$keys[4] => $this->getDeleted(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getNewsletterSubscribe(),
			$keys[8] => $this->getDob(),
			$keys[9] => $this->getGender(),
			$keys[10] => $this->getCountry(),
			$keys[11] => $this->getProfile(),
			$keys[12] => $this->getFirstName(),
			$keys[13] => $this->getLastName(),
			$keys[14] => $this->getZipCode(),
			$keys[15] => $this->getState(),
			$keys[16] => $this->getCity(),
			$keys[17] => $this->getPasswordHash(),
			$keys[18] => $this->getProfilePrivate(),
			$keys[19] => $this->getPersonalPrivate(),
			$keys[20] => $this->getImageId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setEmail($value);
				break;
			case 2:
				$this->setDisplayName($value);
				break;
			case 3:
				$this->setAuthenticated($value);
				break;
			case 4:
				$this->setDeleted($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
			case 7:
				$this->setNewsletterSubscribe($value);
				break;
			case 8:
				$this->setDob($value);
				break;
			case 9:
				$this->setGender($value);
				break;
			case 10:
				$this->setCountry($value);
				break;
			case 11:
				$this->setProfile($value);
				break;
			case 12:
				$this->setFirstName($value);
				break;
			case 13:
				$this->setLastName($value);
				break;
			case 14:
				$this->setZipCode($value);
				break;
			case 15:
				$this->setState($value);
				break;
			case 16:
				$this->setCity($value);
				break;
			case 17:
				$this->setPasswordHash($value);
				break;
			case 18:
				$this->setProfilePrivate($value);
				break;
			case 19:
				$this->setPersonalPrivate($value);
				break;
			case 20:
				$this->setImageId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmail($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDisplayName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAuthenticated($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDeleted($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNewsletterSubscribe($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDob($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setGender($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCountry($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setProfile($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFirstName($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setLastName($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setZipCode($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setState($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCity($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setPasswordHash($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setProfilePrivate($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setPersonalPrivate($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setImageId($arr[$keys[20]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		if ($this->isColumnModified(UserPeer::ID)) $criteria->add(UserPeer::ID, $this->id);
		if ($this->isColumnModified(UserPeer::EMAIL)) $criteria->add(UserPeer::EMAIL, $this->email);
		if ($this->isColumnModified(UserPeer::DISPLAY_NAME)) $criteria->add(UserPeer::DISPLAY_NAME, $this->display_name);
		if ($this->isColumnModified(UserPeer::AUTHENTICATED)) $criteria->add(UserPeer::AUTHENTICATED, $this->authenticated);
		if ($this->isColumnModified(UserPeer::DELETED)) $criteria->add(UserPeer::DELETED, $this->deleted);
		if ($this->isColumnModified(UserPeer::CREATED_AT)) $criteria->add(UserPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(UserPeer::UPDATED_AT)) $criteria->add(UserPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(UserPeer::NEWSLETTER_SUBSCRIBE)) $criteria->add(UserPeer::NEWSLETTER_SUBSCRIBE, $this->newsletter_subscribe);
		if ($this->isColumnModified(UserPeer::DOB)) $criteria->add(UserPeer::DOB, $this->dob);
		if ($this->isColumnModified(UserPeer::GENDER)) $criteria->add(UserPeer::GENDER, $this->gender);
		if ($this->isColumnModified(UserPeer::COUNTRY)) $criteria->add(UserPeer::COUNTRY, $this->country);
		if ($this->isColumnModified(UserPeer::PROFILE)) $criteria->add(UserPeer::PROFILE, $this->profile);
		if ($this->isColumnModified(UserPeer::FIRST_NAME)) $criteria->add(UserPeer::FIRST_NAME, $this->first_name);
		if ($this->isColumnModified(UserPeer::LAST_NAME)) $criteria->add(UserPeer::LAST_NAME, $this->last_name);
		if ($this->isColumnModified(UserPeer::ZIP_CODE)) $criteria->add(UserPeer::ZIP_CODE, $this->zip_code);
		if ($this->isColumnModified(UserPeer::STATE)) $criteria->add(UserPeer::STATE, $this->state);
		if ($this->isColumnModified(UserPeer::CITY)) $criteria->add(UserPeer::CITY, $this->city);
		if ($this->isColumnModified(UserPeer::PASSWORD_HASH)) $criteria->add(UserPeer::PASSWORD_HASH, $this->password_hash);
		if ($this->isColumnModified(UserPeer::PROFILE_PRIVATE)) $criteria->add(UserPeer::PROFILE_PRIVATE, $this->profile_private);
		if ($this->isColumnModified(UserPeer::PERSONAL_PRIVATE)) $criteria->add(UserPeer::PERSONAL_PRIVATE, $this->personal_private);
		if ($this->isColumnModified(UserPeer::IMAGE_ID)) $criteria->add(UserPeer::IMAGE_ID, $this->image_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		$criteria->add(UserPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setEmail($this->email);

		$copyObj->setDisplayName($this->display_name);

		$copyObj->setAuthenticated($this->authenticated);

		$copyObj->setDeleted($this->deleted);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setNewsletterSubscribe($this->newsletter_subscribe);

		$copyObj->setDob($this->dob);

		$copyObj->setGender($this->gender);

		$copyObj->setCountry($this->country);

		$copyObj->setProfile($this->profile);

		$copyObj->setFirstName($this->first_name);

		$copyObj->setLastName($this->last_name);

		$copyObj->setZipCode($this->zip_code);

		$copyObj->setState($this->state);

		$copyObj->setCity($this->city);

		$copyObj->setPasswordHash($this->password_hash);

		$copyObj->setProfilePrivate($this->profile_private);

		$copyObj->setPersonalPrivate($this->personal_private);

		$copyObj->setImageId($this->image_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getBookmarks() as $relObj) {
				$copyObj->addBookmark($relObj->copy($deepCopy));
			}

			foreach($this->getImages() as $relObj) {
				$copyObj->addImage($relObj->copy($deepCopy));
			}

			foreach($this->getItems() as $relObj) {
				$copyObj->addItem($relObj->copy($deepCopy));
			}

			foreach($this->getRatings() as $relObj) {
				$copyObj->addRating($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId('null'); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UserPeer();
		}
		return self::$peer;
	}

	
	public function setImage($v)
	{


		if ($v === null) {
			$this->setImageId(NULL);
		} else {
			$this->setImageId($v->getId());
		}


		$this->aImage = $v;
	}


	
	public function getImage($con = null)
	{
		if ($this->aImage === null && (($this->image_id !== "" && $this->image_id !== null))) {
						include_once 'lib/model/om/BaseImagePeer.php';

			$this->aImage = ImagePeer::retrieveByPK($this->image_id, $con);

			
		}
		return $this->aImage;
	}

	
	public function initBookmarks()
	{
		if ($this->collBookmarks === null) {
			$this->collBookmarks = array();
		}
	}

	
	public function getBookmarks($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBookmarkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBookmarks === null) {
			if ($this->isNew()) {
			   $this->collBookmarks = array();
			} else {

				$criteria->add(BookmarkPeer::USER_ID, $this->getId());

				BookmarkPeer::addSelectColumns($criteria);
				$this->collBookmarks = BookmarkPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BookmarkPeer::USER_ID, $this->getId());

				BookmarkPeer::addSelectColumns($criteria);
				if (!isset($this->lastBookmarkCriteria) || !$this->lastBookmarkCriteria->equals($criteria)) {
					$this->collBookmarks = BookmarkPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBookmarkCriteria = $criteria;
		return $this->collBookmarks;
	}

	
	public function countBookmarks($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseBookmarkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(BookmarkPeer::USER_ID, $this->getId());

		return BookmarkPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBookmark(Bookmark $l)
	{
		$this->collBookmarks[] = $l;
		$l->setUser($this);
	}


	
	public function getBookmarksJoinItem($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBookmarkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBookmarks === null) {
			if ($this->isNew()) {
				$this->collBookmarks = array();
			} else {

				$criteria->add(BookmarkPeer::USER_ID, $this->getId());

				$this->collBookmarks = BookmarkPeer::doSelectJoinItem($criteria, $con);
			}
		} else {
									
			$criteria->add(BookmarkPeer::USER_ID, $this->getId());

			if (!isset($this->lastBookmarkCriteria) || !$this->lastBookmarkCriteria->equals($criteria)) {
				$this->collBookmarks = BookmarkPeer::doSelectJoinItem($criteria, $con);
			}
		}
		$this->lastBookmarkCriteria = $criteria;

		return $this->collBookmarks;
	}

	
	public function initImages()
	{
		if ($this->collImages === null) {
			$this->collImages = array();
		}
	}

	
	public function getImages($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseImagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collImages === null) {
			if ($this->isNew()) {
			   $this->collImages = array();
			} else {

				$criteria->add(ImagePeer::USER_ID, $this->getId());

				ImagePeer::addSelectColumns($criteria);
				$this->collImages = ImagePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ImagePeer::USER_ID, $this->getId());

				ImagePeer::addSelectColumns($criteria);
				if (!isset($this->lastImageCriteria) || !$this->lastImageCriteria->equals($criteria)) {
					$this->collImages = ImagePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastImageCriteria = $criteria;
		return $this->collImages;
	}

	
	public function countImages($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseImagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ImagePeer::USER_ID, $this->getId());

		return ImagePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addImage(Image $l)
	{
		$this->collImages[] = $l;
		$l->setUser($this);
	}

	
	public function initItems()
	{
		if ($this->collItems === null) {
			$this->collItems = array();
		}
	}

	
	public function getItems($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
			   $this->collItems = array();
			} else {

				$criteria->add(ItemPeer::USER_ID, $this->getId());

				ItemPeer::addSelectColumns($criteria);
				$this->collItems = ItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemPeer::USER_ID, $this->getId());

				ItemPeer::addSelectColumns($criteria);
				if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
					$this->collItems = ItemPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastItemCriteria = $criteria;
		return $this->collItems;
	}

	
	public function countItems($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ItemPeer::USER_ID, $this->getId());

		return ItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addItem(Item $l)
	{
		$this->collItems[] = $l;
		$l->setUser($this);
	}


	
	public function getItemsJoinCreator($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::USER_ID, $this->getId());

				$this->collItems = ItemPeer::doSelectJoinCreator($criteria, $con);
			}
		} else {
									
			$criteria->add(ItemPeer::USER_ID, $this->getId());

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinCreator($criteria, $con);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}


	
	public function getItemsJoinCategory($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseItemPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItems === null) {
			if ($this->isNew()) {
				$this->collItems = array();
			} else {

				$criteria->add(ItemPeer::USER_ID, $this->getId());

				$this->collItems = ItemPeer::doSelectJoinCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ItemPeer::USER_ID, $this->getId());

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinCategory($criteria, $con);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}

	
	public function initRatings()
	{
		if ($this->collRatings === null) {
			$this->collRatings = array();
		}
	}

	
	public function getRatings($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRatingPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRatings === null) {
			if ($this->isNew()) {
			   $this->collRatings = array();
			} else {

				$criteria->add(RatingPeer::USER_ID, $this->getId());

				RatingPeer::addSelectColumns($criteria);
				$this->collRatings = RatingPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RatingPeer::USER_ID, $this->getId());

				RatingPeer::addSelectColumns($criteria);
				if (!isset($this->lastRatingCriteria) || !$this->lastRatingCriteria->equals($criteria)) {
					$this->collRatings = RatingPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRatingCriteria = $criteria;
		return $this->collRatings;
	}

	
	public function countRatings($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRatingPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RatingPeer::USER_ID, $this->getId());

		return RatingPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRating(Rating $l)
	{
		$this->collRatings[] = $l;
		$l->setUser($this);
	}


	
	public function getRatingsJoinItem($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRatingPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRatings === null) {
			if ($this->isNew()) {
				$this->collRatings = array();
			} else {

				$criteria->add(RatingPeer::USER_ID, $this->getId());

				$this->collRatings = RatingPeer::doSelectJoinItem($criteria, $con);
			}
		} else {
									
			$criteria->add(RatingPeer::USER_ID, $this->getId());

			if (!isset($this->lastRatingCriteria) || !$this->lastRatingCriteria->equals($criteria)) {
				$this->collRatings = RatingPeer::doSelectJoinItem($criteria, $con);
			}
		}
		$this->lastRatingCriteria = $criteria;

		return $this->collRatings;
	}

} 