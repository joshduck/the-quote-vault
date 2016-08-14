<?php


abstract class BaseItemImage extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $image_id = '0';


	
	protected $item_id = '0';


	
	protected $caption = 'null';

	
	protected $aImage;

	
	protected $aItem;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getImageId()
	{

		return $this->image_id;
	}

	
	public function getItemId()
	{

		return $this->item_id;
	}

	
	public function getCaption()
	{

		return $this->caption;
	}

	
	public function setId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ItemImagePeer::ID;
		}

	} 
	
	public function setImageId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->image_id !== $v || $v === '0') {
			$this->image_id = $v;
			$this->modifiedColumns[] = ItemImagePeer::IMAGE_ID;
		}

		if ($this->aImage !== null && $this->aImage->getId() !== $v) {
			$this->aImage = null;
		}

	} 
	
	public function setItemId($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->item_id !== $v || $v === '0') {
			$this->item_id = $v;
			$this->modifiedColumns[] = ItemImagePeer::ITEM_ID;
		}

		if ($this->aItem !== null && $this->aItem->getId() !== $v) {
			$this->aItem = null;
		}

	} 
	
	public function setCaption($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->caption !== $v || $v === 'null') {
			$this->caption = $v;
			$this->modifiedColumns[] = ItemImagePeer::CAPTION;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->image_id = $rs->getString($startcol + 1);

			$this->item_id = $rs->getString($startcol + 2);

			$this->caption = $rs->getString($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ItemImage object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ItemImagePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ItemImagePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ItemImagePeer::DATABASE_NAME);
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

			if ($this->aItem !== null) {
				if ($this->aItem->isModified()) {
					$affectedRows += $this->aItem->save($con);
				}
				$this->setItem($this->aItem);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ItemImagePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ItemImagePeer::doUpdate($this, $con);
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


												
			if ($this->aImage !== null) {
				if (!$this->aImage->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aImage->getValidationFailures());
				}
			}

			if ($this->aItem !== null) {
				if (!$this->aItem->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aItem->getValidationFailures());
				}
			}


			if (($retval = ItemImagePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ItemImagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getImageId();
				break;
			case 2:
				return $this->getItemId();
				break;
			case 3:
				return $this->getCaption();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ItemImagePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getImageId(),
			$keys[2] => $this->getItemId(),
			$keys[3] => $this->getCaption(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ItemImagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setImageId($value);
				break;
			case 2:
				$this->setItemId($value);
				break;
			case 3:
				$this->setCaption($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ItemImagePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setImageId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setItemId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCaption($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ItemImagePeer::DATABASE_NAME);

		if ($this->isColumnModified(ItemImagePeer::ID)) $criteria->add(ItemImagePeer::ID, $this->id);
		if ($this->isColumnModified(ItemImagePeer::IMAGE_ID)) $criteria->add(ItemImagePeer::IMAGE_ID, $this->image_id);
		if ($this->isColumnModified(ItemImagePeer::ITEM_ID)) $criteria->add(ItemImagePeer::ITEM_ID, $this->item_id);
		if ($this->isColumnModified(ItemImagePeer::CAPTION)) $criteria->add(ItemImagePeer::CAPTION, $this->caption);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ItemImagePeer::DATABASE_NAME);

		$criteria->add(ItemImagePeer::ID, $this->id);

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

		$copyObj->setImageId($this->image_id);

		$copyObj->setItemId($this->item_id);

		$copyObj->setCaption($this->caption);


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
			self::$peer = new ItemImagePeer();
		}
		return self::$peer;
	}

	
	public function setImage($v)
	{


		if ($v === null) {
			$this->setImageId('0');
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

} 