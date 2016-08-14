<?php


abstract class BaseUserPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'user';

	
	const CLASS_DEFAULT = 'lib.model.User';

	
	const NUM_COLUMNS = 21;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'user.ID';

	
	const EMAIL = 'user.EMAIL';

	
	const DISPLAY_NAME = 'user.DISPLAY_NAME';

	
	const AUTHENTICATED = 'user.AUTHENTICATED';

	
	const DELETED = 'user.DELETED';

	
	const CREATED_AT = 'user.CREATED_AT';

	
	const UPDATED_AT = 'user.UPDATED_AT';

	
	const NEWSLETTER_SUBSCRIBE = 'user.NEWSLETTER_SUBSCRIBE';

	
	const DOB = 'user.DOB';

	
	const GENDER = 'user.GENDER';

	
	const COUNTRY = 'user.COUNTRY';

	
	const PROFILE = 'user.PROFILE';

	
	const FIRST_NAME = 'user.FIRST_NAME';

	
	const LAST_NAME = 'user.LAST_NAME';

	
	const ZIP_CODE = 'user.ZIP_CODE';

	
	const STATE = 'user.STATE';

	
	const CITY = 'user.CITY';

	
	const PASSWORD_HASH = 'user.PASSWORD_HASH';

	
	const PROFILE_PRIVATE = 'user.PROFILE_PRIVATE';

	
	const PERSONAL_PRIVATE = 'user.PERSONAL_PRIVATE';

	
	const IMAGE_ID = 'user.IMAGE_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Email', 'DisplayName', 'Authenticated', 'Deleted', 'CreatedAt', 'UpdatedAt', 'NewsletterSubscribe', 'Dob', 'Gender', 'Country', 'Profile', 'FirstName', 'LastName', 'ZipCode', 'State', 'City', 'PasswordHash', 'ProfilePrivate', 'PersonalPrivate', 'ImageId', ),
		BasePeer::TYPE_COLNAME => array (UserPeer::ID, UserPeer::EMAIL, UserPeer::DISPLAY_NAME, UserPeer::AUTHENTICATED, UserPeer::DELETED, UserPeer::CREATED_AT, UserPeer::UPDATED_AT, UserPeer::NEWSLETTER_SUBSCRIBE, UserPeer::DOB, UserPeer::GENDER, UserPeer::COUNTRY, UserPeer::PROFILE, UserPeer::FIRST_NAME, UserPeer::LAST_NAME, UserPeer::ZIP_CODE, UserPeer::STATE, UserPeer::CITY, UserPeer::PASSWORD_HASH, UserPeer::PROFILE_PRIVATE, UserPeer::PERSONAL_PRIVATE, UserPeer::IMAGE_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'email', 'display_name', 'authenticated', 'deleted', 'created_at', 'updated_at', 'newsletter_subscribe', 'dob', 'gender', 'country', 'profile', 'first_name', 'last_name', 'zip_code', 'state', 'city', 'password_hash', 'profile_private', 'personal_private', 'image_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Email' => 1, 'DisplayName' => 2, 'Authenticated' => 3, 'Deleted' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, 'NewsletterSubscribe' => 7, 'Dob' => 8, 'Gender' => 9, 'Country' => 10, 'Profile' => 11, 'FirstName' => 12, 'LastName' => 13, 'ZipCode' => 14, 'State' => 15, 'City' => 16, 'PasswordHash' => 17, 'ProfilePrivate' => 18, 'PersonalPrivate' => 19, 'ImageId' => 20, ),
		BasePeer::TYPE_COLNAME => array (UserPeer::ID => 0, UserPeer::EMAIL => 1, UserPeer::DISPLAY_NAME => 2, UserPeer::AUTHENTICATED => 3, UserPeer::DELETED => 4, UserPeer::CREATED_AT => 5, UserPeer::UPDATED_AT => 6, UserPeer::NEWSLETTER_SUBSCRIBE => 7, UserPeer::DOB => 8, UserPeer::GENDER => 9, UserPeer::COUNTRY => 10, UserPeer::PROFILE => 11, UserPeer::FIRST_NAME => 12, UserPeer::LAST_NAME => 13, UserPeer::ZIP_CODE => 14, UserPeer::STATE => 15, UserPeer::CITY => 16, UserPeer::PASSWORD_HASH => 17, UserPeer::PROFILE_PRIVATE => 18, UserPeer::PERSONAL_PRIVATE => 19, UserPeer::IMAGE_ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'email' => 1, 'display_name' => 2, 'authenticated' => 3, 'deleted' => 4, 'created_at' => 5, 'updated_at' => 6, 'newsletter_subscribe' => 7, 'dob' => 8, 'gender' => 9, 'country' => 10, 'profile' => 11, 'first_name' => 12, 'last_name' => 13, 'zip_code' => 14, 'state' => 15, 'city' => 16, 'password_hash' => 17, 'profile_private' => 18, 'personal_private' => 19, 'image_id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/UserMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.UserMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = UserPeer::getTableMap();
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
		return str_replace(UserPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(UserPeer::ID);

		$criteria->addSelectColumn(UserPeer::EMAIL);

		$criteria->addSelectColumn(UserPeer::DISPLAY_NAME);

		$criteria->addSelectColumn(UserPeer::AUTHENTICATED);

		$criteria->addSelectColumn(UserPeer::DELETED);

		$criteria->addSelectColumn(UserPeer::CREATED_AT);

		$criteria->addSelectColumn(UserPeer::UPDATED_AT);

		$criteria->addSelectColumn(UserPeer::NEWSLETTER_SUBSCRIBE);

		$criteria->addSelectColumn(UserPeer::DOB);

		$criteria->addSelectColumn(UserPeer::GENDER);

		$criteria->addSelectColumn(UserPeer::COUNTRY);

		$criteria->addSelectColumn(UserPeer::PROFILE);

		$criteria->addSelectColumn(UserPeer::FIRST_NAME);

		$criteria->addSelectColumn(UserPeer::LAST_NAME);

		$criteria->addSelectColumn(UserPeer::ZIP_CODE);

		$criteria->addSelectColumn(UserPeer::STATE);

		$criteria->addSelectColumn(UserPeer::CITY);

		$criteria->addSelectColumn(UserPeer::PASSWORD_HASH);

		$criteria->addSelectColumn(UserPeer::PROFILE_PRIVATE);

		$criteria->addSelectColumn(UserPeer::PERSONAL_PRIVATE);

		$criteria->addSelectColumn(UserPeer::IMAGE_ID);

	}

	const COUNT = 'COUNT(user.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT user.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(UserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(UserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = UserPeer::doSelectRS($criteria, $con);
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
		$objects = UserPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return UserPeer::populateObjects(UserPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			UserPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = UserPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinImage(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(UserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(UserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(UserPeer::IMAGE_ID, ImagePeer::ID);

		$rs = UserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinImage(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		UserPeer::addSelectColumns($c);
		$startcol = (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ImagePeer::addSelectColumns($c);

		$c->addJoin(UserPeer::IMAGE_ID, ImagePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = UserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ImagePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getImage(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addUser($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initUsers();
				$obj2->addUser($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(UserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(UserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(UserPeer::IMAGE_ID, ImagePeer::ID);

		$rs = UserPeer::doSelectRS($criteria, $con);
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

		UserPeer::addSelectColumns($c);
		$startcol2 = (UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ImagePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ImagePeer::NUM_COLUMNS;

		$c->addJoin(UserPeer::IMAGE_ID, ImagePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ImagePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getImage(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addUser($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initUsers();
				$obj2->addUser($obj1);
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
		return UserPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(UserPeer::ID);
			$selectCriteria->add(UserPeer::ID, $criteria->remove(UserPeer::ID), $comparison);

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
			$affectedRows += UserPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(UserPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(UserPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof User) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(UserPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += UserPeer::doOnDeleteCascade($criteria, $con);
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected static function doOnDeleteCascade(Criteria $criteria, Connection $con)
	{
				$affectedRows = 0;

				$objects = UserPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/Bookmark.php';

						$c = new Criteria();
			
			$c->add(BookmarkPeer::USER_ID, $obj->getId());
			$affectedRows += BookmarkPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(User $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(UserPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(UserPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(UserPeer::DATABASE_NAME, UserPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = UserPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		$criteria->add(UserPeer::ID, $pk);


		$v = UserPeer::doSelect($criteria, $con);

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
			$criteria->add(UserPeer::ID, $pks, Criteria::IN);
			$objs = UserPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseUserPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/UserMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.UserMapBuilder');
}
