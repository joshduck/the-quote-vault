<?php


abstract class BaseImagePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'image';

	
	const CLASS_DEFAULT = 'lib.model.Image';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'image.ID';

	
	const FULL_PATH = 'image.FULL_PATH';

	
	const HEIGHT = 'image.HEIGHT';

	
	const WIDTH = 'image.WIDTH';

	
	const MIMETYPE = 'image.MIMETYPE';

	
	const USER_ID = 'image.USER_ID';

	
	const CREATED_AT = 'image.CREATED_AT';

	
	const UPDATED_AT = 'image.UPDATED_AT';

	
	const DELETED = 'image.DELETED';

	
	const NAME = 'image.NAME';

	
	const FILESIZE = 'image.FILESIZE';

	
	const COPYRIGHT = 'image.COPYRIGHT';

	
	const MEDIUM_PATH = 'image.MEDIUM_PATH';

	
	const TINY_PATH = 'image.TINY_PATH';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FullPath', 'Height', 'Width', 'Mimetype', 'UserId', 'CreatedAt', 'UpdatedAt', 'Deleted', 'Name', 'Filesize', 'Copyright', 'MediumPath', 'TinyPath', ),
		BasePeer::TYPE_COLNAME => array (ImagePeer::ID, ImagePeer::FULL_PATH, ImagePeer::HEIGHT, ImagePeer::WIDTH, ImagePeer::MIMETYPE, ImagePeer::USER_ID, ImagePeer::CREATED_AT, ImagePeer::UPDATED_AT, ImagePeer::DELETED, ImagePeer::NAME, ImagePeer::FILESIZE, ImagePeer::COPYRIGHT, ImagePeer::MEDIUM_PATH, ImagePeer::TINY_PATH, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'full_path', 'height', 'width', 'mimetype', 'user_id', 'created_at', 'updated_at', 'deleted', 'name', 'filesize', 'copyright', 'medium_path', 'tiny_path', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FullPath' => 1, 'Height' => 2, 'Width' => 3, 'Mimetype' => 4, 'UserId' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, 'Deleted' => 8, 'Name' => 9, 'Filesize' => 10, 'Copyright' => 11, 'MediumPath' => 12, 'TinyPath' => 13, ),
		BasePeer::TYPE_COLNAME => array (ImagePeer::ID => 0, ImagePeer::FULL_PATH => 1, ImagePeer::HEIGHT => 2, ImagePeer::WIDTH => 3, ImagePeer::MIMETYPE => 4, ImagePeer::USER_ID => 5, ImagePeer::CREATED_AT => 6, ImagePeer::UPDATED_AT => 7, ImagePeer::DELETED => 8, ImagePeer::NAME => 9, ImagePeer::FILESIZE => 10, ImagePeer::COPYRIGHT => 11, ImagePeer::MEDIUM_PATH => 12, ImagePeer::TINY_PATH => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'full_path' => 1, 'height' => 2, 'width' => 3, 'mimetype' => 4, 'user_id' => 5, 'created_at' => 6, 'updated_at' => 7, 'deleted' => 8, 'name' => 9, 'filesize' => 10, 'copyright' => 11, 'medium_path' => 12, 'tiny_path' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ImageMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ImageMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ImagePeer::getTableMap();
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
		return str_replace(ImagePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ImagePeer::ID);

		$criteria->addSelectColumn(ImagePeer::FULL_PATH);

		$criteria->addSelectColumn(ImagePeer::HEIGHT);

		$criteria->addSelectColumn(ImagePeer::WIDTH);

		$criteria->addSelectColumn(ImagePeer::MIMETYPE);

		$criteria->addSelectColumn(ImagePeer::USER_ID);

		$criteria->addSelectColumn(ImagePeer::CREATED_AT);

		$criteria->addSelectColumn(ImagePeer::UPDATED_AT);

		$criteria->addSelectColumn(ImagePeer::DELETED);

		$criteria->addSelectColumn(ImagePeer::NAME);

		$criteria->addSelectColumn(ImagePeer::FILESIZE);

		$criteria->addSelectColumn(ImagePeer::COPYRIGHT);

		$criteria->addSelectColumn(ImagePeer::MEDIUM_PATH);

		$criteria->addSelectColumn(ImagePeer::TINY_PATH);

	}

	const COUNT = 'COUNT(image.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT image.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ImagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ImagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ImagePeer::doSelectRS($criteria, $con);
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
		$objects = ImagePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ImagePeer::populateObjects(ImagePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ImagePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ImagePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ImagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ImagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ImagePeer::USER_ID, UserPeer::ID);

		$rs = ImagePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinUser(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ImagePeer::addSelectColumns($c);
		$startcol = (ImagePeer::NUM_COLUMNS - ImagePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		UserPeer::addSelectColumns($c);

		$c->addJoin(ImagePeer::USER_ID, UserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ImagePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addImage($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initImages();
				$obj2->addImage($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ImagePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ImagePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ImagePeer::USER_ID, UserPeer::ID);

		$rs = ImagePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ImagePeer::addSelectColumns($c);
		$startcol2 = (ImagePeer::NUM_COLUMNS - ImagePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

		$c->addJoin(ImagePeer::USER_ID, UserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ImagePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addImage($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initImages();
				$obj2->addImage($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return ImagePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ImagePeer::ID); 

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
			$comparison = $criteria->getComparison(ImagePeer::ID);
			$selectCriteria->add(ImagePeer::ID, $criteria->remove(ImagePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ImagePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ImagePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Image) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ImagePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Image $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ImagePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ImagePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ImagePeer::DATABASE_NAME, ImagePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ImagePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ImagePeer::DATABASE_NAME);

		$criteria->add(ImagePeer::ID, $pk);


		$v = ImagePeer::doSelect($criteria, $con);

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
			$criteria->add(ImagePeer::ID, $pks, Criteria::IN);
			$objs = ImagePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseImagePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ImageMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ImageMapBuilder');
}
