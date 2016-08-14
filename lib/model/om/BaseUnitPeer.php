<?php


abstract class BaseUnitPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'unit';

	
	const CLASS_DEFAULT = 'lib.model.Unit';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'unit.ID';

	
	const NAME = 'unit.NAME';

	
	const BASE_UNIT_ID = 'unit.BASE_UNIT_ID';

	
	const BASE_UNIT_AMOUNT = 'unit.BASE_UNIT_AMOUNT';

	
	const US_IMPERIAL = 'unit.US_IMPERIAL';

	
	const DETAILS = 'unit.DETAILS';

	
	const ABBRVIATION = 'unit.ABBRVIATION';

	
	const METRIC = 'unit.METRIC';

	
	const UK_IMPERIAL = 'unit.UK_IMPERIAL';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'BaseUnitId', 'BaseUnitAmount', 'UsImperial', 'Details', 'Abbrviation', 'Metric', 'UkImperial', ),
		BasePeer::TYPE_COLNAME => array (UnitPeer::ID, UnitPeer::NAME, UnitPeer::BASE_UNIT_ID, UnitPeer::BASE_UNIT_AMOUNT, UnitPeer::US_IMPERIAL, UnitPeer::DETAILS, UnitPeer::ABBRVIATION, UnitPeer::METRIC, UnitPeer::UK_IMPERIAL, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'base_unit_id', 'base_unit_amount', 'us_imperial', 'details', 'abbrviation', 'metric', 'uk_imperial', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'BaseUnitId' => 2, 'BaseUnitAmount' => 3, 'UsImperial' => 4, 'Details' => 5, 'Abbrviation' => 6, 'Metric' => 7, 'UkImperial' => 8, ),
		BasePeer::TYPE_COLNAME => array (UnitPeer::ID => 0, UnitPeer::NAME => 1, UnitPeer::BASE_UNIT_ID => 2, UnitPeer::BASE_UNIT_AMOUNT => 3, UnitPeer::US_IMPERIAL => 4, UnitPeer::DETAILS => 5, UnitPeer::ABBRVIATION => 6, UnitPeer::METRIC => 7, UnitPeer::UK_IMPERIAL => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'base_unit_id' => 2, 'base_unit_amount' => 3, 'us_imperial' => 4, 'details' => 5, 'abbrviation' => 6, 'metric' => 7, 'uk_imperial' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/UnitMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.UnitMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = UnitPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(UnitPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(UnitPeer::ID);

		$criteria->addSelectColumn(UnitPeer::NAME);

		$criteria->addSelectColumn(UnitPeer::BASE_UNIT_ID);

		$criteria->addSelectColumn(UnitPeer::BASE_UNIT_AMOUNT);

		$criteria->addSelectColumn(UnitPeer::US_IMPERIAL);

		$criteria->addSelectColumn(UnitPeer::DETAILS);

		$criteria->addSelectColumn(UnitPeer::ABBRVIATION);

		$criteria->addSelectColumn(UnitPeer::METRIC);

		$criteria->addSelectColumn(UnitPeer::UK_IMPERIAL);

	}

	const COUNT = 'COUNT(unit.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT unit.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(UnitPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(UnitPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = UnitPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = UnitPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return UnitPeer::populateObjects(UnitPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			UnitPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = UnitPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return UnitPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(UnitPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(UnitPeer::ID);
			$selectCriteria->add(UnitPeer::ID, $criteria->remove(UnitPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(UnitPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(UnitPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Unit) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(UnitPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Unit $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(UnitPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(UnitPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(UnitPeer::DATABASE_NAME, UnitPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = UnitPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(UnitPeer::DATABASE_NAME);

		$criteria->add(UnitPeer::ID, $pk);


		$v = UnitPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(UnitPeer::ID, $pks, Criteria::IN);
			$objs = UnitPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseUnitPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/UnitMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.UnitMapBuilder');
}
