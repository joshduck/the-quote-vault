<?php


abstract class BaseItem extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $user_id;


	
	protected $text;


	
	protected $date;


	
	protected $rating;


	
	protected $comment_count = 0;


	
	protected $created_at = 943880400;


	
	protected $updated_at = 943880400;


	
	protected $approved = 0;


	
	protected $deleted = 0;


	
	protected $slug = 'null';


	
	protected $creator_id;


	
	protected $category_id;

	
	protected $aUser;

	
	protected $aCreator;

	
	protected $aCategory;

	
	protected $collBookmarks;

	
	protected $lastBookmarkCriteria = null;

	
	protected $collItemImages;

	
	protected $lastItemImageCriteria = null;

	
	protected $collItemTags;

	
	protected $lastItemTagCriteria = null;

	
	protected $collRatings;

	
	protected $lastRatingCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getText()
	{

		return $this->text;
	}

	
	public function getDate($format = 'Y-m-d')
	{

		if ($this->date === null || $this->date === '') {
			return null;
		} elseif (!is_int($this->date)) {
						$ts = strtotime($this->date);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [date] as date/time value: " . var_export($this->date, true));
			}
		} else {
			$ts = $this->date;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRating()
	{

		return $this->rating;
	}

	
	public function getCommentCount()
	{

		return $this->comment_count;
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

	
	public function getApproved()
	{

		return $this->approved;
	}

	
	public function getDeleted()
	{

		return $this->deleted;
	}

	
	public function getSlug()
	{

		return $this->slug;
	}

	
	public function getCreatorId()
	{

		return $this->creator_id;
	}

	
	public function getCategoryId()
	{

		return $this->category_id;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ItemPeer::ID;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = ItemPeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function setText($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->text !== $v) {
			$this->text = $v;
			$this->modifiedColumns[] = ItemPeer::TEXT;
		}

	} 
	
	public function setDate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [date] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->date !== $ts) {
			$this->date = $ts;
			$this->modifiedColumns[] = ItemPeer::DATE;
		}

	} 
	
	public function setRating($v)
	{

		if ($this->rating !== $v) {
			$this->rating = $v;
			$this->modifiedColumns[] = ItemPeer::RATING;
		}

	} 
	
	public function setCommentCount($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->comment_count !== $v || $v === 0) {
			$this->comment_count = $v;
			$this->modifiedColumns[] = ItemPeer::COMMENT_COUNT;
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
			$this->modifiedColumns[] = ItemPeer::CREATED_AT;
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
			$this->modifiedColumns[] = ItemPeer::UPDATED_AT;
		}

	} 
	
	public function setApproved($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->approved !== $v || $v === 0) {
			$this->approved = $v;
			$this->modifiedColumns[] = ItemPeer::APPROVED;
		}

	} 
	
	public function setDeleted($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted !== $v || $v === 0) {
			$this->deleted = $v;
			$this->modifiedColumns[] = ItemPeer::DELETED;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v || $v === 'null') {
			$this->slug = $v;
			$this->modifiedColumns[] = ItemPeer::SLUG;
		}

	} 
	
	public function setCreatorId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->creator_id !== $v) {
			$this->creator_id = $v;
			$this->modifiedColumns[] = ItemPeer::CREATOR_ID;
		}

		if ($this->aCreator !== null && $this->aCreator->getId() !== $v) {
			$this->aCreator = null;
		}

	} 
	
	public function setCategoryId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->category_id !== $v) {
			$this->category_id = $v;
			$this->modifiedColumns[] = ItemPeer::CATEGORY_ID;
		}

		if ($this->aCategory !== null && $this->aCategory->getId() !== $v) {
			$this->aCategory = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->user_id = $rs->getString($startcol + 1);

			$this->text = $rs->getString($startcol + 2);

			$this->date = $rs->getDate($startcol + 3, null);

			$this->rating = $rs->getFloat($startcol + 4);

			$this->comment_count = $rs->getInt($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->approved = $rs->getInt($startcol + 8);

			$this->deleted = $rs->getInt($startcol + 9);

			$this->slug = $rs->getString($startcol + 10);

			$this->creator_id = $rs->getString($startcol + 11);

			$this->category_id = $rs->getString($startcol + 12);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Item object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ItemPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ItemPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ItemPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME);
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


												
			if ($this->aUser !== null) {
				if ($this->aUser->isModified()) {
					$affectedRows += $this->aUser->save($con);
				}
				$this->setUser($this->aUser);
			}

			if ($this->aCreator !== null) {
				if ($this->aCreator->isModified()) {
					$affectedRows += $this->aCreator->save($con);
				}
				$this->setCreator($this->aCreator);
			}

			if ($this->aCategory !== null) {
				if ($this->aCategory->isModified()) {
					$affectedRows += $this->aCategory->save($con);
				}
				$this->setCategory($this->aCategory);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ItemPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ItemPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collBookmarks !== null) {
				foreach($this->collBookmarks as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collItemImages !== null) {
				foreach($this->collItemImages as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collItemTags !== null) {
				foreach($this->collItemTags as $referrerFK) {
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


												
			if ($this->aUser !== null) {
				if (!$this->aUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
				}
			}

			if ($this->aCreator !== null) {
				if (!$this->aCreator->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCreator->getValidationFailures());
				}
			}

			if ($this->aCategory !== null) {
				if (!$this->aCategory->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCategory->getValidationFailures());
				}
			}


			if (($retval = ItemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collBookmarks !== null) {
					foreach($this->collBookmarks as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collItemImages !== null) {
					foreach($this->collItemImages as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collItemTags !== null) {
					foreach($this->collItemTags as $referrerFK) {
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
		$pos = ItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUserId();
				break;
			case 2:
				return $this->getText();
				break;
			case 3:
				return $this->getDate();
				break;
			case 4:
				return $this->getRating();
				break;
			case 5:
				return $this->getCommentCount();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getUpdatedAt();
				break;
			case 8:
				return $this->getApproved();
				break;
			case 9:
				return $this->getDeleted();
				break;
			case 10:
				return $this->getSlug();
				break;
			case 11:
				return $this->getCreatorId();
				break;
			case 12:
				return $this->getCategoryId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ItemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUserId(),
			$keys[2] => $this->getText(),
			$keys[3] => $this->getDate(),
			$keys[4] => $this->getRating(),
			$keys[5] => $this->getCommentCount(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedAt(),
			$keys[8] => $this->getApproved(),
			$keys[9] => $this->getDeleted(),
			$keys[10] => $this->getSlug(),
			$keys[11] => $this->getCreatorId(),
			$keys[12] => $this->getCategoryId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUserId($value);
				break;
			case 2:
				$this->setText($value);
				break;
			case 3:
				$this->setDate($value);
				break;
			case 4:
				$this->setRating($value);
				break;
			case 5:
				$this->setCommentCount($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setUpdatedAt($value);
				break;
			case 8:
				$this->setApproved($value);
				break;
			case 9:
				$this->setDeleted($value);
				break;
			case 10:
				$this->setSlug($value);
				break;
			case 11:
				$this->setCreatorId($value);
				break;
			case 12:
				$this->setCategoryId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ItemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUserId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setText($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDate($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRating($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCommentCount($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setApproved($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDeleted($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSlug($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatorId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCategoryId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(ItemPeer::ID)) $criteria->add(ItemPeer::ID, $this->id);
		if ($this->isColumnModified(ItemPeer::USER_ID)) $criteria->add(ItemPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(ItemPeer::TEXT)) $criteria->add(ItemPeer::TEXT, $this->text);
		if ($this->isColumnModified(ItemPeer::DATE)) $criteria->add(ItemPeer::DATE, $this->date);
		if ($this->isColumnModified(ItemPeer::RATING)) $criteria->add(ItemPeer::RATING, $this->rating);
		if ($this->isColumnModified(ItemPeer::COMMENT_COUNT)) $criteria->add(ItemPeer::COMMENT_COUNT, $this->comment_count);
		if ($this->isColumnModified(ItemPeer::CREATED_AT)) $criteria->add(ItemPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ItemPeer::UPDATED_AT)) $criteria->add(ItemPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ItemPeer::APPROVED)) $criteria->add(ItemPeer::APPROVED, $this->approved);
		if ($this->isColumnModified(ItemPeer::DELETED)) $criteria->add(ItemPeer::DELETED, $this->deleted);
		if ($this->isColumnModified(ItemPeer::SLUG)) $criteria->add(ItemPeer::SLUG, $this->slug);
		if ($this->isColumnModified(ItemPeer::CREATOR_ID)) $criteria->add(ItemPeer::CREATOR_ID, $this->creator_id);
		if ($this->isColumnModified(ItemPeer::CATEGORY_ID)) $criteria->add(ItemPeer::CATEGORY_ID, $this->category_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ItemPeer::DATABASE_NAME);

		$criteria->add(ItemPeer::ID, $this->id);

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

		$copyObj->setUserId($this->user_id);

		$copyObj->setText($this->text);

		$copyObj->setDate($this->date);

		$copyObj->setRating($this->rating);

		$copyObj->setCommentCount($this->comment_count);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setApproved($this->approved);

		$copyObj->setDeleted($this->deleted);

		$copyObj->setSlug($this->slug);

		$copyObj->setCreatorId($this->creator_id);

		$copyObj->setCategoryId($this->category_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getBookmarks() as $relObj) {
				$copyObj->addBookmark($relObj->copy($deepCopy));
			}

			foreach($this->getItemImages() as $relObj) {
				$copyObj->addItemImage($relObj->copy($deepCopy));
			}

			foreach($this->getItemTags() as $relObj) {
				$copyObj->addItemTag($relObj->copy($deepCopy));
			}

			foreach($this->getRatings() as $relObj) {
				$copyObj->addRating($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
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
			self::$peer = new ItemPeer();
		}
		return self::$peer;
	}

	
	public function setUser($v)
	{


		if ($v === null) {
			$this->setUserId(NULL);
		} else {
			$this->setUserId($v->getId());
		}


		$this->aUser = $v;
	}


	
	public function getUser($con = null)
	{
		if ($this->aUser === null && (($this->user_id !== "" && $this->user_id !== null))) {
						include_once 'lib/model/om/BaseUserPeer.php';

			$this->aUser = UserPeer::retrieveByPK($this->user_id, $con);

			
		}
		return $this->aUser;
	}

	
	public function setCreator($v)
	{


		if ($v === null) {
			$this->setCreatorId(NULL);
		} else {
			$this->setCreatorId($v->getId());
		}


		$this->aCreator = $v;
	}


	
	public function getCreator($con = null)
	{
		if ($this->aCreator === null && (($this->creator_id !== "" && $this->creator_id !== null))) {
						include_once 'lib/model/om/BaseCreatorPeer.php';

			$this->aCreator = CreatorPeer::retrieveByPK($this->creator_id, $con);

			
		}
		return $this->aCreator;
	}

	
	public function setCategory($v)
	{


		if ($v === null) {
			$this->setCategoryId(NULL);
		} else {
			$this->setCategoryId($v->getId());
		}


		$this->aCategory = $v;
	}


	
	public function getCategory($con = null)
	{
		if ($this->aCategory === null && (($this->category_id !== "" && $this->category_id !== null))) {
						include_once 'lib/model/om/BaseCategoryPeer.php';

			$this->aCategory = CategoryPeer::retrieveByPK($this->category_id, $con);

			
		}
		return $this->aCategory;
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

				$criteria->add(BookmarkPeer::ITEM_ID, $this->getId());

				BookmarkPeer::addSelectColumns($criteria);
				$this->collBookmarks = BookmarkPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BookmarkPeer::ITEM_ID, $this->getId());

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

		$criteria->add(BookmarkPeer::ITEM_ID, $this->getId());

		return BookmarkPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBookmark(Bookmark $l)
	{
		$this->collBookmarks[] = $l;
		$l->setItem($this);
	}


	
	public function getBookmarksJoinUser($criteria = null, $con = null)
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

				$criteria->add(BookmarkPeer::ITEM_ID, $this->getId());

				$this->collBookmarks = BookmarkPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(BookmarkPeer::ITEM_ID, $this->getId());

			if (!isset($this->lastBookmarkCriteria) || !$this->lastBookmarkCriteria->equals($criteria)) {
				$this->collBookmarks = BookmarkPeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastBookmarkCriteria = $criteria;

		return $this->collBookmarks;
	}

	
	public function initItemImages()
	{
		if ($this->collItemImages === null) {
			$this->collItemImages = array();
		}
	}

	
	public function getItemImages($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseItemImagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItemImages === null) {
			if ($this->isNew()) {
			   $this->collItemImages = array();
			} else {

				$criteria->add(ItemImagePeer::ITEM_ID, $this->getId());

				ItemImagePeer::addSelectColumns($criteria);
				$this->collItemImages = ItemImagePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemImagePeer::ITEM_ID, $this->getId());

				ItemImagePeer::addSelectColumns($criteria);
				if (!isset($this->lastItemImageCriteria) || !$this->lastItemImageCriteria->equals($criteria)) {
					$this->collItemImages = ItemImagePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastItemImageCriteria = $criteria;
		return $this->collItemImages;
	}

	
	public function countItemImages($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseItemImagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ItemImagePeer::ITEM_ID, $this->getId());

		return ItemImagePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addItemImage(ItemImage $l)
	{
		$this->collItemImages[] = $l;
		$l->setItem($this);
	}


	
	public function getItemImagesJoinImage($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseItemImagePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItemImages === null) {
			if ($this->isNew()) {
				$this->collItemImages = array();
			} else {

				$criteria->add(ItemImagePeer::ITEM_ID, $this->getId());

				$this->collItemImages = ItemImagePeer::doSelectJoinImage($criteria, $con);
			}
		} else {
									
			$criteria->add(ItemImagePeer::ITEM_ID, $this->getId());

			if (!isset($this->lastItemImageCriteria) || !$this->lastItemImageCriteria->equals($criteria)) {
				$this->collItemImages = ItemImagePeer::doSelectJoinImage($criteria, $con);
			}
		}
		$this->lastItemImageCriteria = $criteria;

		return $this->collItemImages;
	}

	
	public function initItemTags()
	{
		if ($this->collItemTags === null) {
			$this->collItemTags = array();
		}
	}

	
	public function getItemTags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseItemTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItemTags === null) {
			if ($this->isNew()) {
			   $this->collItemTags = array();
			} else {

				$criteria->add(ItemTagPeer::ITEM_ID, $this->getId());

				ItemTagPeer::addSelectColumns($criteria);
				$this->collItemTags = ItemTagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemTagPeer::ITEM_ID, $this->getId());

				ItemTagPeer::addSelectColumns($criteria);
				if (!isset($this->lastItemTagCriteria) || !$this->lastItemTagCriteria->equals($criteria)) {
					$this->collItemTags = ItemTagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastItemTagCriteria = $criteria;
		return $this->collItemTags;
	}

	
	public function countItemTags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseItemTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ItemTagPeer::ITEM_ID, $this->getId());

		return ItemTagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addItemTag(ItemTag $l)
	{
		$this->collItemTags[] = $l;
		$l->setItem($this);
	}


	
	public function getItemTagsJoinTag($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseItemTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItemTags === null) {
			if ($this->isNew()) {
				$this->collItemTags = array();
			} else {

				$criteria->add(ItemTagPeer::ITEM_ID, $this->getId());

				$this->collItemTags = ItemTagPeer::doSelectJoinTag($criteria, $con);
			}
		} else {
									
			$criteria->add(ItemTagPeer::ITEM_ID, $this->getId());

			if (!isset($this->lastItemTagCriteria) || !$this->lastItemTagCriteria->equals($criteria)) {
				$this->collItemTags = ItemTagPeer::doSelectJoinTag($criteria, $con);
			}
		}
		$this->lastItemTagCriteria = $criteria;

		return $this->collItemTags;
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

				$criteria->add(RatingPeer::ITEM_ID, $this->getId());

				RatingPeer::addSelectColumns($criteria);
				$this->collRatings = RatingPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RatingPeer::ITEM_ID, $this->getId());

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

		$criteria->add(RatingPeer::ITEM_ID, $this->getId());

		return RatingPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRating(Rating $l)
	{
		$this->collRatings[] = $l;
		$l->setItem($this);
	}


	
	public function getRatingsJoinUser($criteria = null, $con = null)
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

				$criteria->add(RatingPeer::ITEM_ID, $this->getId());

				$this->collRatings = RatingPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(RatingPeer::ITEM_ID, $this->getId());

			if (!isset($this->lastRatingCriteria) || !$this->lastRatingCriteria->equals($criteria)) {
				$this->collRatings = RatingPeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastRatingCriteria = $criteria;

		return $this->collRatings;
	}

} 