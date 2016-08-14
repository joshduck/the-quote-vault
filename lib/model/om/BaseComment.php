<?php


abstract class BaseComment extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $item_id = '0';


	
	protected $user_id;


	
	protected $user_name;


	
	protected $user_ip;


	
	protected $created_at = 943880400;


	
	protected $updated_at = 943880400;


	
	protected $approved = 0;


	
	protected $deleted = 0;


	
	protected $text;

	
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

	
	public function getUserName()
	{

		return $this->user_name;
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

	
	public function getText()
	{

		return $this->text;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CommentPeer::ID;
		}

	} 
	
	public function setItemId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->item_id !== $v || $v === '0') {
			$this->item_id = $v;
			$this->modifiedColumns[] = CommentPeer::ITEM_ID;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = CommentPeer::USER_ID;
		}

	} 
	
	public function setUserName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_name !== $v) {
			$this->user_name = $v;
			$this->modifiedColumns[] = CommentPeer::USER_NAME;
		}

	} 
	
	public function setUserIp($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_ip !== $v) {
			$this->user_ip = $v;
			$this->modifiedColumns[] = CommentPeer::USER_IP;
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
			$this->modifiedColumns[] = CommentPeer::CREATED_AT;
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
			$this->modifiedColumns[] = CommentPeer::UPDATED_AT;
		}

	} 
	
	public function setApproved($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->approved !== $v || $v === 0) {
			$this->approved = $v;
			$this->modifiedColumns[] = CommentPeer::APPROVED;
		}

	} 
	
	public function setDeleted($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted !== $v || $v === 0) {
			$this->deleted = $v;
			$this->modifiedColumns[] = CommentPeer::DELETED;
		}

	} 
	
	public function setText($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->text !== $v) {
			$this->text = $v;
			$this->modifiedColumns[] = CommentPeer::TEXT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->item_id = $rs->getString($startcol + 1);

			$this->user_id = $rs->getString($startcol + 2);

			$this->user_name = $rs->getString($startcol + 3);

			$this->user_ip = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->approved = $rs->getInt($startcol + 7);

			$this->deleted = $rs->getInt($startcol + 8);

			$this->text = $rs->getString($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Comment object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CommentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CommentPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(CommentPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(CommentPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CommentPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CommentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CommentPeer::doUpdate($this, $con);
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


			if (($retval = CommentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CommentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getUserName();
				break;
			case 4:
				return $this->getUserIp();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			case 7:
				return $this->getApproved();
				break;
			case 8:
				return $this->getDeleted();
				break;
			case 9:
				return $this->getText();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CommentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getItemId(),
			$keys[2] => $this->getUserId(),
			$keys[3] => $this->getUserName(),
			$keys[4] => $this->getUserIp(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getApproved(),
			$keys[8] => $this->getDeleted(),
			$keys[9] => $this->getText(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CommentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUserName($value);
				break;
			case 4:
				$this->setUserIp($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
			case 7:
				$this->setApproved($value);
				break;
			case 8:
				$this->setDeleted($value);
				break;
			case 9:
				$this->setText($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CommentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setItemId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUserId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUserName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUserIp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setApproved($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDeleted($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setText($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CommentPeer::DATABASE_NAME);

		if ($this->isColumnModified(CommentPeer::ID)) $criteria->add(CommentPeer::ID, $this->id);
		if ($this->isColumnModified(CommentPeer::ITEM_ID)) $criteria->add(CommentPeer::ITEM_ID, $this->item_id);
		if ($this->isColumnModified(CommentPeer::USER_ID)) $criteria->add(CommentPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(CommentPeer::USER_NAME)) $criteria->add(CommentPeer::USER_NAME, $this->user_name);
		if ($this->isColumnModified(CommentPeer::USER_IP)) $criteria->add(CommentPeer::USER_IP, $this->user_ip);
		if ($this->isColumnModified(CommentPeer::CREATED_AT)) $criteria->add(CommentPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(CommentPeer::UPDATED_AT)) $criteria->add(CommentPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(CommentPeer::APPROVED)) $criteria->add(CommentPeer::APPROVED, $this->approved);
		if ($this->isColumnModified(CommentPeer::DELETED)) $criteria->add(CommentPeer::DELETED, $this->deleted);
		if ($this->isColumnModified(CommentPeer::TEXT)) $criteria->add(CommentPeer::TEXT, $this->text);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CommentPeer::DATABASE_NAME);

		$criteria->add(CommentPeer::ID, $this->id);

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

		$copyObj->setUserName($this->user_name);

		$copyObj->setUserIp($this->user_ip);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setApproved($this->approved);

		$copyObj->setDeleted($this->deleted);

		$copyObj->setText($this->text);


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
			self::$peer = new CommentPeer();
		}
		return self::$peer;
	}

} 