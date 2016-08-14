<?php


abstract class BaseImage extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $full_path = 'null';


	
	protected $height = 0;


	
	protected $width = 0;


	
	protected $mimetype = 'null';


	
	protected $user_id;


	
	protected $created_at = 943880400;


	
	protected $updated_at = 943880400;


	
	protected $deleted = 0;


	
	protected $name = 'null';


	
	protected $filesize = '0';


	
	protected $copyright = 'null';


	
	protected $medium_path = 'null';


	
	protected $tiny_path = 'null';

	
	protected $aUser;

	
	protected $collItemImages;

	
	protected $lastItemImageCriteria = null;

	
	protected $collUsers;

	
	protected $lastUserCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFullPath()
	{

		return $this->full_path;
	}

	
	public function getHeight()
	{

		return $this->height;
	}

	
	public function getWidth()
	{

		return $this->width;
	}

	
	public function getMimetype()
	{

		return $this->mimetype;
	}

	
	public function getUserId()
	{

		return $this->user_id;
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

	
	public function getDeleted()
	{

		return $this->deleted;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getFilesize()
	{

		return $this->filesize;
	}

	
	public function getCopyright()
	{

		return $this->copyright;
	}

	
	public function getMediumPath()
	{

		return $this->medium_path;
	}

	
	public function getTinyPath()
	{

		return $this->tiny_path;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ImagePeer::ID;
		}

	} 
	
	public function setFullPath($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->full_path !== $v || $v === 'null') {
			$this->full_path = $v;
			$this->modifiedColumns[] = ImagePeer::FULL_PATH;
		}

	} 
	
	public function setHeight($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->height !== $v || $v === 0) {
			$this->height = $v;
			$this->modifiedColumns[] = ImagePeer::HEIGHT;
		}

	} 
	
	public function setWidth($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->width !== $v || $v === 0) {
			$this->width = $v;
			$this->modifiedColumns[] = ImagePeer::WIDTH;
		}

	} 
	
	public function setMimetype($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mimetype !== $v || $v === 'null') {
			$this->mimetype = $v;
			$this->modifiedColumns[] = ImagePeer::MIMETYPE;
		}

	} 
	
	public function setUserId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = ImagePeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
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
			$this->modifiedColumns[] = ImagePeer::CREATED_AT;
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
			$this->modifiedColumns[] = ImagePeer::UPDATED_AT;
		}

	} 
	
	public function setDeleted($v)
	{

		
		
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->deleted !== $v || $v === 0) {
			$this->deleted = $v;
			$this->modifiedColumns[] = ImagePeer::DELETED;
		}

	} 
	
	public function setName($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v || $v === 'null') {
			$this->name = $v;
			$this->modifiedColumns[] = ImagePeer::NAME;
		}

	} 
	
	public function setFilesize($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->filesize !== $v || $v === '0') {
			$this->filesize = $v;
			$this->modifiedColumns[] = ImagePeer::FILESIZE;
		}

	} 
	
	public function setCopyright($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->copyright !== $v || $v === 'null') {
			$this->copyright = $v;
			$this->modifiedColumns[] = ImagePeer::COPYRIGHT;
		}

	} 
	
	public function setMediumPath($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->medium_path !== $v || $v === 'null') {
			$this->medium_path = $v;
			$this->modifiedColumns[] = ImagePeer::MEDIUM_PATH;
		}

	} 
	
	public function setTinyPath($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tiny_path !== $v || $v === 'null') {
			$this->tiny_path = $v;
			$this->modifiedColumns[] = ImagePeer::TINY_PATH;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->full_path = $rs->getString($startcol + 1);

			$this->height = $rs->getInt($startcol + 2);

			$this->width = $rs->getInt($startcol + 3);

			$this->mimetype = $rs->getString($startcol + 4);

			$this->user_id = $rs->getString($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->deleted = $rs->getInt($startcol + 8);

			$this->name = $rs->getString($startcol + 9);

			$this->filesize = $rs->getString($startcol + 10);

			$this->copyright = $rs->getString($startcol + 11);

			$this->medium_path = $rs->getString($startcol + 12);

			$this->tiny_path = $rs->getString($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Image object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ImagePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ImagePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ImagePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ImagePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ImagePeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ImagePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ImagePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collItemImages !== null) {
				foreach($this->collItemImages as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUsers !== null) {
				foreach($this->collUsers as $referrerFK) {
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


			if (($retval = ImagePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collItemImages !== null) {
					foreach($this->collItemImages as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUsers !== null) {
					foreach($this->collUsers as $referrerFK) {
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
		$pos = ImagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFullPath();
				break;
			case 2:
				return $this->getHeight();
				break;
			case 3:
				return $this->getWidth();
				break;
			case 4:
				return $this->getMimetype();
				break;
			case 5:
				return $this->getUserId();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getUpdatedAt();
				break;
			case 8:
				return $this->getDeleted();
				break;
			case 9:
				return $this->getName();
				break;
			case 10:
				return $this->getFilesize();
				break;
			case 11:
				return $this->getCopyright();
				break;
			case 12:
				return $this->getMediumPath();
				break;
			case 13:
				return $this->getTinyPath();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ImagePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFullPath(),
			$keys[2] => $this->getHeight(),
			$keys[3] => $this->getWidth(),
			$keys[4] => $this->getMimetype(),
			$keys[5] => $this->getUserId(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedAt(),
			$keys[8] => $this->getDeleted(),
			$keys[9] => $this->getName(),
			$keys[10] => $this->getFilesize(),
			$keys[11] => $this->getCopyright(),
			$keys[12] => $this->getMediumPath(),
			$keys[13] => $this->getTinyPath(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ImagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFullPath($value);
				break;
			case 2:
				$this->setHeight($value);
				break;
			case 3:
				$this->setWidth($value);
				break;
			case 4:
				$this->setMimetype($value);
				break;
			case 5:
				$this->setUserId($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setUpdatedAt($value);
				break;
			case 8:
				$this->setDeleted($value);
				break;
			case 9:
				$this->setName($value);
				break;
			case 10:
				$this->setFilesize($value);
				break;
			case 11:
				$this->setCopyright($value);
				break;
			case 12:
				$this->setMediumPath($value);
				break;
			case 13:
				$this->setTinyPath($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ImagePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFullPath($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHeight($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setWidth($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMimetype($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUserId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDeleted($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setName($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFilesize($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCopyright($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMediumPath($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTinyPath($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ImagePeer::DATABASE_NAME);

		if ($this->isColumnModified(ImagePeer::ID)) $criteria->add(ImagePeer::ID, $this->id);
		if ($this->isColumnModified(ImagePeer::FULL_PATH)) $criteria->add(ImagePeer::FULL_PATH, $this->full_path);
		if ($this->isColumnModified(ImagePeer::HEIGHT)) $criteria->add(ImagePeer::HEIGHT, $this->height);
		if ($this->isColumnModified(ImagePeer::WIDTH)) $criteria->add(ImagePeer::WIDTH, $this->width);
		if ($this->isColumnModified(ImagePeer::MIMETYPE)) $criteria->add(ImagePeer::MIMETYPE, $this->mimetype);
		if ($this->isColumnModified(ImagePeer::USER_ID)) $criteria->add(ImagePeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(ImagePeer::CREATED_AT)) $criteria->add(ImagePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ImagePeer::UPDATED_AT)) $criteria->add(ImagePeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ImagePeer::DELETED)) $criteria->add(ImagePeer::DELETED, $this->deleted);
		if ($this->isColumnModified(ImagePeer::NAME)) $criteria->add(ImagePeer::NAME, $this->name);
		if ($this->isColumnModified(ImagePeer::FILESIZE)) $criteria->add(ImagePeer::FILESIZE, $this->filesize);
		if ($this->isColumnModified(ImagePeer::COPYRIGHT)) $criteria->add(ImagePeer::COPYRIGHT, $this->copyright);
		if ($this->isColumnModified(ImagePeer::MEDIUM_PATH)) $criteria->add(ImagePeer::MEDIUM_PATH, $this->medium_path);
		if ($this->isColumnModified(ImagePeer::TINY_PATH)) $criteria->add(ImagePeer::TINY_PATH, $this->tiny_path);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ImagePeer::DATABASE_NAME);

		$criteria->add(ImagePeer::ID, $this->id);

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

		$copyObj->setFullPath($this->full_path);

		$copyObj->setHeight($this->height);

		$copyObj->setWidth($this->width);

		$copyObj->setMimetype($this->mimetype);

		$copyObj->setUserId($this->user_id);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setDeleted($this->deleted);

		$copyObj->setName($this->name);

		$copyObj->setFilesize($this->filesize);

		$copyObj->setCopyright($this->copyright);

		$copyObj->setMediumPath($this->medium_path);

		$copyObj->setTinyPath($this->tiny_path);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getItemImages() as $relObj) {
				$copyObj->addItemImage($relObj->copy($deepCopy));
			}

			foreach($this->getUsers() as $relObj) {
				$copyObj->addUser($relObj->copy($deepCopy));
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
			self::$peer = new ImagePeer();
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

				$criteria->add(ItemImagePeer::IMAGE_ID, $this->getId());

				ItemImagePeer::addSelectColumns($criteria);
				$this->collItemImages = ItemImagePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemImagePeer::IMAGE_ID, $this->getId());

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

		$criteria->add(ItemImagePeer::IMAGE_ID, $this->getId());

		return ItemImagePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addItemImage(ItemImage $l)
	{
		$this->collItemImages[] = $l;
		$l->setImage($this);
	}


	
	public function getItemImagesJoinItem($criteria = null, $con = null)
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

				$criteria->add(ItemImagePeer::IMAGE_ID, $this->getId());

				$this->collItemImages = ItemImagePeer::doSelectJoinItem($criteria, $con);
			}
		} else {
									
			$criteria->add(ItemImagePeer::IMAGE_ID, $this->getId());

			if (!isset($this->lastItemImageCriteria) || !$this->lastItemImageCriteria->equals($criteria)) {
				$this->collItemImages = ItemImagePeer::doSelectJoinItem($criteria, $con);
			}
		}
		$this->lastItemImageCriteria = $criteria;

		return $this->collItemImages;
	}

	
	public function initUsers()
	{
		if ($this->collUsers === null) {
			$this->collUsers = array();
		}
	}

	
	public function getUsers($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsers === null) {
			if ($this->isNew()) {
			   $this->collUsers = array();
			} else {

				$criteria->add(UserPeer::IMAGE_ID, $this->getId());

				UserPeer::addSelectColumns($criteria);
				$this->collUsers = UserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UserPeer::IMAGE_ID, $this->getId());

				UserPeer::addSelectColumns($criteria);
				if (!isset($this->lastUserCriteria) || !$this->lastUserCriteria->equals($criteria)) {
					$this->collUsers = UserPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUserCriteria = $criteria;
		return $this->collUsers;
	}

	
	public function countUsers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UserPeer::IMAGE_ID, $this->getId());

		return UserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addUser(User $l)
	{
		$this->collUsers[] = $l;
		$l->setImage($this);
	}

} 