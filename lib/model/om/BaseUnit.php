<?php


abstract class BaseUnit extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name = 'null';


	
	protected $base_unit_id;


	
	protected $base_unit_amount;


	
	protected $us_imperial = 0;


	
	protected $details = 'null';


	
	protected $abbrviation = 'null';


	
	protected $metric = 0;


	
	protected $uk_imperial = 0;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getBaseUnitId()
	{

		return $this->base_unit_id;
	}

	
	public function getBaseUnitAmount()
	{

		return $this->base_unit_amount;
	}

	
	public function getUsImperial()
	{

		return $this->us_imperial;
	}

	
	public function getDetails()
	{

		return $this->details;
	}

	
	public function getAbbrviation()
	{

		return $this->abbrviation;
	}

	
	public function getMetric()
	{

		return $this->metric;
	}

	
	public function getUkImperial()
	{

		return $this->uk_imperial;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UnitPeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v || $v === 'null') {
			$this->name = $v;
			$this->modifiedColumns[] = UnitPeer::NAME;
		}

	} 
	
	public function setBaseUnitId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->base_unit_id !== $v) {
			$this->base_unit_id = $v;
			$this->modifiedColumns[] = UnitPeer::BASE_UNIT_ID;
		}

	} 
	
	public function setBaseUnitAmount($v)
	{

		if ($this->base_unit_amount !== $v) {
			$this->base_unit_amount = $v;
			$this->modifiedColumns[] = UnitPeer::BASE_UNIT_AMOUNT;
		}

	} 
	
	public function setUsImperial($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->us_imperial !== $v || $v === 0) {
			$this->us_imperial = $v;
			$this->modifiedColumns[] = UnitPeer::US_IMPERIAL;
		}

	} 
	
	public function setDetails($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->details !== $v || $v === 'null') {
			$this->details = $v;
			$this->modifiedColumns[] = UnitPeer::DETAILS;
		}

	} 
	
	public function setAbbrviation($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->abbrviation !== $v || $v === 'null') {
			$this->abbrviation = $v;
			$this->modifiedColumns[] = UnitPeer::ABBRVIATION;
		}

	} 
	
	public function setMetric($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->metric !== $v || $v === 0) {
			$this->metric = $v;
			$this->modifiedColumns[] = UnitPeer::METRIC;
		}

	} 
	
	public function setUkImperial($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->uk_imperial !== $v || $v === 0) {
			$this->uk_imperial = $v;
			$this->modifiedColumns[] = UnitPeer::UK_IMPERIAL;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getString($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->base_unit_id = $rs->getString($startcol + 2);

			$this->base_unit_amount = $rs->getFloat($startcol + 3);

			$this->us_imperial = $rs->getInt($startcol + 4);

			$this->details = $rs->getString($startcol + 5);

			$this->abbrviation = $rs->getString($startcol + 6);

			$this->metric = $rs->getInt($startcol + 7);

			$this->uk_imperial = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Unit object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UnitPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UnitPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(UnitPeer::DATABASE_NAME);
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
					$pk = UnitPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += UnitPeer::doUpdate($this, $con);
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


			if (($retval = UnitPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UnitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getBaseUnitId();
				break;
			case 3:
				return $this->getBaseUnitAmount();
				break;
			case 4:
				return $this->getUsImperial();
				break;
			case 5:
				return $this->getDetails();
				break;
			case 6:
				return $this->getAbbrviation();
				break;
			case 7:
				return $this->getMetric();
				break;
			case 8:
				return $this->getUkImperial();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UnitPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getBaseUnitId(),
			$keys[3] => $this->getBaseUnitAmount(),
			$keys[4] => $this->getUsImperial(),
			$keys[5] => $this->getDetails(),
			$keys[6] => $this->getAbbrviation(),
			$keys[7] => $this->getMetric(),
			$keys[8] => $this->getUkImperial(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UnitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setBaseUnitId($value);
				break;
			case 3:
				$this->setBaseUnitAmount($value);
				break;
			case 4:
				$this->setUsImperial($value);
				break;
			case 5:
				$this->setDetails($value);
				break;
			case 6:
				$this->setAbbrviation($value);
				break;
			case 7:
				$this->setMetric($value);
				break;
			case 8:
				$this->setUkImperial($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UnitPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBaseUnitId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setBaseUnitAmount($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUsImperial($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDetails($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAbbrviation($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMetric($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUkImperial($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UnitPeer::DATABASE_NAME);

		if ($this->isColumnModified(UnitPeer::ID)) $criteria->add(UnitPeer::ID, $this->id);
		if ($this->isColumnModified(UnitPeer::NAME)) $criteria->add(UnitPeer::NAME, $this->name);
		if ($this->isColumnModified(UnitPeer::BASE_UNIT_ID)) $criteria->add(UnitPeer::BASE_UNIT_ID, $this->base_unit_id);
		if ($this->isColumnModified(UnitPeer::BASE_UNIT_AMOUNT)) $criteria->add(UnitPeer::BASE_UNIT_AMOUNT, $this->base_unit_amount);
		if ($this->isColumnModified(UnitPeer::US_IMPERIAL)) $criteria->add(UnitPeer::US_IMPERIAL, $this->us_imperial);
		if ($this->isColumnModified(UnitPeer::DETAILS)) $criteria->add(UnitPeer::DETAILS, $this->details);
		if ($this->isColumnModified(UnitPeer::ABBRVIATION)) $criteria->add(UnitPeer::ABBRVIATION, $this->abbrviation);
		if ($this->isColumnModified(UnitPeer::METRIC)) $criteria->add(UnitPeer::METRIC, $this->metric);
		if ($this->isColumnModified(UnitPeer::UK_IMPERIAL)) $criteria->add(UnitPeer::UK_IMPERIAL, $this->uk_imperial);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UnitPeer::DATABASE_NAME);

		$criteria->add(UnitPeer::ID, $this->id);

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

		$copyObj->setName($this->name);

		$copyObj->setBaseUnitId($this->base_unit_id);

		$copyObj->setBaseUnitAmount($this->base_unit_amount);

		$copyObj->setUsImperial($this->us_imperial);

		$copyObj->setDetails($this->details);

		$copyObj->setAbbrviation($this->abbrviation);

		$copyObj->setMetric($this->metric);

		$copyObj->setUkImperial($this->uk_imperial);


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
			self::$peer = new UnitPeer();
		}
		return self::$peer;
	}

} 