<?php


abstract class BaseRating extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $item_id = '0';


	
	protected $user_id;


	
	protected $user_ip;


	
	protected $created_at = 943880400;


	
	protected $rating = 0;

	
	protected $aItem;

	
	protected $aUser;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getItemId()
	{

		return $this->item_id;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getUserIp()
	{

		return $this->user_ip;
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

	
	public function getRating()
	{

		return $this->rating;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RatingPeer::ID;
		}

	} 
	
	public function setItemId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->item_id !== $v || $v === '0') {
			$this->item_id = $v;
			$this->modifiedColumns[] = RatingPeer::ITEM_ID;
		}

		if ($this->aItem !== null && $this->aItem->getId() !== $v) {
			$this->aItem = null;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = RatingPeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function setUserIp($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_ip !== $v) {
			$this->user_ip = $v;
			$this->modifiedColumns[] = RatingPeer::USER_IP;
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
			$this->modifiedColumns[] = RatingPeer::CREATED_AT;
		}

	} 
	
	public function setRating($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->rating !== $v || $v === 0) {
			$this->rating = $v;
			$this->modifiedColumns[] = RatingPeer::RATING;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->item_id = $rs->getString($startcol + 1);

			$this->user_id = $rs->getString($startcol + 2);

			$this->user_ip = $rs->getString($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->rating = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Rating object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RatingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RatingPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(RatingPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RatingPeer::DATABASE_NAME);
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


												
			if ($this->aItem !== null) {
				if ($this->aItem->isModified()) {
					$affectedRows += $this->aItem->save($con);
				}
				$this->setItem($this->aItem);
			}

			if ($this->aUser !== null) {
				if ($this->aUser->isModified()) {
					$affectedRows += $this->aUser->save($con);
				}
				$this->setUser($this->aUser);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RatingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RatingPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aItem !== null) {
				if (!$this->aItem->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aItem->getValidationFailures());
				}
			}

			if ($this->aUser !== null) {
				if (!$this->aUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
				}
			}


			if (($retval = RatingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RatingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getItemId();
				break;
			case 2:
				return $this->getUserId();
				break;
			case 3:
				return $this->getUserIp();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			case 5:
				return $this->getRating();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RatingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getItemId(),
			$keys[2] => $this->getUserId(),
			$keys[3] => $this->getUserIp(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getRating(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RatingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setItemId($value);
				break;
			case 2:
				$this->setUserId($value);
				break;
			case 3:
				$this->setUserIp($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
			case 5:
				$this->setRating($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RatingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setItemId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUserId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUserIp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRating($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RatingPeer::DATABASE_NAME);

		if ($this->isColumnModified(RatingPeer::ID)) $criteria->add(RatingPeer::ID, $this->id);
		if ($this->isColumnModified(RatingPeer::ITEM_ID)) $criteria->add(RatingPeer::ITEM_ID, $this->item_id);
		if ($this->isColumnModified(RatingPeer::USER_ID)) $criteria->add(RatingPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(RatingPeer::USER_IP)) $criteria->add(RatingPeer::USER_IP, $this->user_ip);
		if ($this->isColumnModified(RatingPeer::CREATED_AT)) $criteria->add(RatingPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(RatingPeer::RATING)) $criteria->add(RatingPeer::RATING, $this->rating);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RatingPeer::DATABASE_NAME);

		$criteria->add(RatingPeer::ID, $this->id);

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

		$copyObj->setItemId($this->item_id);

		$copyObj->setUserId($this->user_id);

		$copyObj->setUserIp($this->user_ip);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setRating($this->rating);


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
			self::$peer = new RatingPeer();
		}
		return self::$peer;
	}

	
	public function setItem($v)
	{


		if ($v === null) {
			$this->setItemId('0');
		} else {
			$this->setItemId($v->getId());
		}


		$this->aItem = $v;
	}


	
	public function getItem($con = null)
	{
		if ($this->aItem === null && (($this->item_id !== "" && $this->item_id !== null))) {
						include_once 'lib/model/om/BaseItemPeer.php';

			$this->aItem = ItemPeer::retrieveByPK($this->item_id, $con);

			
		}
		return $this->aItem;
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

} 