<?php


abstract class BaseCreator extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $given_names;


	
	protected $slug = 'null';


	
	protected $surname = 'null';


	
	protected $title;


	
	protected $biography;


	
	protected $summary;


	
	protected $image_id;

	
	protected $collItems;

	
	protected $lastItemCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getGivenNames()
	{

		return $this->given_names;
	}

	
	public function getSlug()
	{

		return $this->slug;
	}

	
	public function getSurname()
	{

		return $this->surname;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getBiography()
	{

		return $this->biography;
	}

	
	public function getSummary()
	{

		return $this->summary;
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

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CreatorPeer::ID;
		}

	} 
	
	public function setGivenNames($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->given_names !== $v) {
			$this->given_names = $v;
			$this->modifiedColumns[] = CreatorPeer::GIVEN_NAMES;
		}

	} 
	
	public function setSlug($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->slug !== $v || $v === 'null') {
			$this->slug = $v;
			$this->modifiedColumns[] = CreatorPeer::SLUG;
		}

	} 
	
	public function setSurname($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->surname !== $v || $v === 'null') {
			$this->surname = $v;
			$this->modifiedColumns[] = CreatorPeer::SURNAME;
		}

	} 
	
	public function setTitle($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = CreatorPeer::TITLE;
		}

	} 
	
	public function setBiography($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->biography !== $v) {
			$this->biography = $v;
			$this->modifiedColumns[] = CreatorPeer::BIOGRAPHY;
		}

	} 
	
	public function setSummary($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->summary !== $v) {
			$this->summary = $v;
			$this->modifiedColumns[] = CreatorPeer::SUMMARY;
		}

	} 
	
	public function setImageId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->image_id !== $v) {
			$this->image_id = $v;
			$this->modifiedColumns[] = CreatorPeer::IMAGE_ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->given_names = $rs->getString($startcol + 1);

			$this->slug = $rs->getString($startcol + 2);

			$this->surname = $rs->getString($startcol + 3);

			$this->title = $rs->getString($startcol + 4);

			$this->biography = $rs->getString($startcol + 5);

			$this->summary = $rs->getString($startcol + 6);

			$this->image_id = $rs->getString($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Creator object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CreatorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CreatorPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CreatorPeer::DATABASE_NAME);
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
					$pk = CreatorPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CreatorPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collItems !== null) {
				foreach($this->collItems as $referrerFK) {
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


			if (($retval = CreatorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collItems !== null) {
					foreach($this->collItems as $referrerFK) {
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
		$pos = CreatorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getGivenNames();
				break;
			case 2:
				return $this->getSlug();
				break;
			case 3:
				return $this->getSurname();
				break;
			case 4:
				return $this->getTitle();
				break;
			case 5:
				return $this->getBiography();
				break;
			case 6:
				return $this->getSummary();
				break;
			case 7:
				return $this->getImageId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CreatorPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getGivenNames(),
			$keys[2] => $this->getSlug(),
			$keys[3] => $this->getSurname(),
			$keys[4] => $this->getTitle(),
			$keys[5] => $this->getBiography(),
			$keys[6] => $this->getSummary(),
			$keys[7] => $this->getImageId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CreatorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setGivenNames($value);
				break;
			case 2:
				$this->setSlug($value);
				break;
			case 3:
				$this->setSurname($value);
				break;
			case 4:
				$this->setTitle($value);
				break;
			case 5:
				$this->setBiography($value);
				break;
			case 6:
				$this->setSummary($value);
				break;
			case 7:
				$this->setImageId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CreatorPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setGivenNames($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSlug($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSurname($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTitle($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setBiography($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSummary($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setImageId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CreatorPeer::DATABASE_NAME);

		if ($this->isColumnModified(CreatorPeer::ID)) $criteria->add(CreatorPeer::ID, $this->id);
		if ($this->isColumnModified(CreatorPeer::GIVEN_NAMES)) $criteria->add(CreatorPeer::GIVEN_NAMES, $this->given_names);
		if ($this->isColumnModified(CreatorPeer::SLUG)) $criteria->add(CreatorPeer::SLUG, $this->slug);
		if ($this->isColumnModified(CreatorPeer::SURNAME)) $criteria->add(CreatorPeer::SURNAME, $this->surname);
		if ($this->isColumnModified(CreatorPeer::TITLE)) $criteria->add(CreatorPeer::TITLE, $this->title);
		if ($this->isColumnModified(CreatorPeer::BIOGRAPHY)) $criteria->add(CreatorPeer::BIOGRAPHY, $this->biography);
		if ($this->isColumnModified(CreatorPeer::SUMMARY)) $criteria->add(CreatorPeer::SUMMARY, $this->summary);
		if ($this->isColumnModified(CreatorPeer::IMAGE_ID)) $criteria->add(CreatorPeer::IMAGE_ID, $this->image_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CreatorPeer::DATABASE_NAME);

		$criteria->add(CreatorPeer::ID, $this->id);

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

		$copyObj->setGivenNames($this->given_names);

		$copyObj->setSlug($this->slug);

		$copyObj->setSurname($this->surname);

		$copyObj->setTitle($this->title);

		$copyObj->setBiography($this->biography);

		$copyObj->setSummary($this->summary);

		$copyObj->setImageId($this->image_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getItems() as $relObj) {
				$copyObj->addItem($relObj->copy($deepCopy));
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
			self::$peer = new CreatorPeer();
		}
		return self::$peer;
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

				$criteria->add(ItemPeer::CREATOR_ID, $this->getId());

				ItemPeer::addSelectColumns($criteria);
				$this->collItems = ItemPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ItemPeer::CREATOR_ID, $this->getId());

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

		$criteria->add(ItemPeer::CREATOR_ID, $this->getId());

		return ItemPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addItem(Item $l)
	{
		$this->collItems[] = $l;
		$l->setCreator($this);
	}


	
	public function getItemsJoinUser($criteria = null, $con = null)
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

				$criteria->add(ItemPeer::CREATOR_ID, $this->getId());

				$this->collItems = ItemPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(ItemPeer::CREATOR_ID, $this->getId());

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinUser($criteria, $con);
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

				$criteria->add(ItemPeer::CREATOR_ID, $this->getId());

				$this->collItems = ItemPeer::doSelectJoinCategory($criteria, $con);
			}
		} else {
									
			$criteria->add(ItemPeer::CREATOR_ID, $this->getId());

			if (!isset($this->lastItemCriteria) || !$this->lastItemCriteria->equals($criteria)) {
				$this->collItems = ItemPeer::doSelectJoinCategory($criteria, $con);
			}
		}
		$this->lastItemCriteria = $criteria;

		return $this->collItems;
	}

} 