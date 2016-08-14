<?php


abstract class BaseItemPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'item';

	
	const CLASS_DEFAULT = 'lib.model.Item';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'item.ID';

	
	const USER_ID = 'item.USER_ID';

	
	const TEXT = 'item.TEXT';

	
	const DATE = 'item.DATE';

	
	const RATING = 'item.RATING';

	
	const COMMENT_COUNT = 'item.COMMENT_COUNT';

	
	const CREATED_AT = 'item.CREATED_AT';

	
	const UPDATED_AT = 'item.UPDATED_AT';

	
	const APPROVED = 'item.APPROVED';

	
	const DELETED = 'item.DELETED';

	
	const SLUG = 'item.SLUG';

	
	const CREATOR_ID = 'item.CREATOR_ID';

	
	const CATEGORY_ID = 'item.CATEGORY_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'UserId', 'Text', 'Date', 'Rating', 'CommentCount', 'CreatedAt', 'UpdatedAt', 'Approved', 'Deleted', 'Slug', 'CreatorId', 'CategoryId', ),
		BasePeer::TYPE_COLNAME => array (ItemPeer::ID, ItemPeer::USER_ID, ItemPeer::TEXT, ItemPeer::DATE, ItemPeer::RATING, ItemPeer::COMMENT_COUNT, ItemPeer::CREATED_AT, ItemPeer::UPDATED_AT, ItemPeer::APPROVED, ItemPeer::DELETED, ItemPeer::SLUG, ItemPeer::CREATOR_ID, ItemPeer::CATEGORY_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'user_id', 'text', 'date', 'rating', 'comment_count', 'created_at', 'updated_at', 'approved', 'deleted', 'slug', 'creator_id', 'category_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'UserId' => 1, 'Text' => 2, 'Date' => 3, 'Rating' => 4, 'CommentCount' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, 'Approved' => 8, 'Deleted' => 9, 'Slug' => 10, 'CreatorId' => 11, 'CategoryId' => 12, ),
		BasePeer::TYPE_COLNAME => array (ItemPeer::ID => 0, ItemPeer::USER_ID => 1, ItemPeer::TEXT => 2, ItemPeer::DATE => 3, ItemPeer::RATING => 4, ItemPeer::COMMENT_COUNT => 5, ItemPeer::CREATED_AT => 6, ItemPeer::UPDATED_AT => 7, ItemPeer::APPROVED => 8, ItemPeer::DELETED => 9, ItemPeer::SLUG => 10, ItemPeer::CREATOR_ID => 11, ItemPeer::CATEGORY_ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'user_id' => 1, 'text' => 2, 'date' => 3, 'rating' => 4, 'comment_count' => 5, 'created_at' => 6, 'updated_at' => 7, 'approved' => 8, 'deleted' => 9, 'slug' => 10, 'creator_id' => 11, 'category_id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ItemMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ItemMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ItemPeer::getTableMap();
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
		return str_replace(ItemPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ItemPeer::ID);

		$criteria->addSelectColumn(ItemPeer::USER_ID);

		$criteria->addSelectColumn(ItemPeer::TEXT);

		$criteria->addSelectColumn(ItemPeer::DATE);

		$criteria->addSelectColumn(ItemPeer::RATING);

		$criteria->addSelectColumn(ItemPeer::COMMENT_COUNT);

		$criteria->addSelectColumn(ItemPeer::CREATED_AT);

		$criteria->addSelectColumn(ItemPeer::UPDATED_AT);

		$criteria->addSelectColumn(ItemPeer::APPROVED);

		$criteria->addSelectColumn(ItemPeer::DELETED);

		$criteria->addSelectColumn(ItemPeer::SLUG);

		$criteria->addSelectColumn(ItemPeer::CREATOR_ID);

		$criteria->addSelectColumn(ItemPeer::CATEGORY_ID);

	}

	const COUNT = 'COUNT(item.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT item.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ItemPeer::doSelectRS($criteria, $con);
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
		$objects = ItemPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ItemPeer::populateObjects(ItemPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ItemPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ItemPeer::getOMClass();
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
			$criteria->addSelectColumn(ItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ItemPeer::USER_ID, UserPeer::ID);

		$rs = ItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCreator(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ItemPeer::CREATOR_ID, CreatorPeer::ID);

		$rs = ItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCategory(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ItemPeer::CATEGORY_ID, CategoryPeer::ID);

		$rs = ItemPeer::doSelectRS($criteria, $con);
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

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		UserPeer::addSelectColumns($c);

		$c->addJoin(ItemPeer::USER_ID, UserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ItemPeer::getOMClass();

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
										$temp_obj2->addItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initItems();
				$obj2->addItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCreator(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CreatorPeer::addSelectColumns($c);

		$c->addJoin(ItemPeer::CREATOR_ID, CreatorPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CreatorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCreator(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initItems();
				$obj2->addItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCategory(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CategoryPeer::addSelectColumns($c);

		$c->addJoin(ItemPeer::CATEGORY_ID, CategoryPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CategoryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCategory(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addItem($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initItems();
				$obj2->addItem($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ItemPeer::USER_ID, UserPeer::ID);

		$criteria->addJoin(ItemPeer::CREATOR_ID, CreatorPeer::ID);

		$criteria->addJoin(ItemPeer::CATEGORY_ID, CategoryPeer::ID);

		$rs = ItemPeer::doSelectRS($criteria, $con);
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

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

		CreatorPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CreatorPeer::NUM_COLUMNS;

		CategoryPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + CategoryPeer::NUM_COLUMNS;

		$c->addJoin(ItemPeer::USER_ID, UserPeer::ID);

		$c->addJoin(ItemPeer::CREATOR_ID, CreatorPeer::ID);

		$c->addJoin(ItemPeer::CATEGORY_ID, CategoryPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ItemPeer::getOMClass();


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
					$temp_obj2->addItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initItems();
				$obj2->addItem($obj1);
			}


					
			$omClass = CreatorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCreator(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initItems();
				$obj3->addItem($obj1);
			}


					
			$omClass = CategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getCategory(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addItem($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initItems();
				$obj4->addItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ItemPeer::CREATOR_ID, CreatorPeer::ID);

		$criteria->addJoin(ItemPeer::CATEGORY_ID, CategoryPeer::ID);

		$rs = ItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCreator(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ItemPeer::USER_ID, UserPeer::ID);

		$criteria->addJoin(ItemPeer::CATEGORY_ID, CategoryPeer::ID);

		$rs = ItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCategory(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ItemPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ItemPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ItemPeer::USER_ID, UserPeer::ID);

		$criteria->addJoin(ItemPeer::CREATOR_ID, CreatorPeer::ID);

		$rs = ItemPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptUser(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		CreatorPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + CreatorPeer::NUM_COLUMNS;

		CategoryPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CategoryPeer::NUM_COLUMNS;

		$c->addJoin(ItemPeer::CREATOR_ID, CreatorPeer::ID);

		$c->addJoin(ItemPeer::CATEGORY_ID, CategoryPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CreatorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCreator(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initItems();
				$obj2->addItem($obj1);
			}

			$omClass = CategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCategory(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initItems();
				$obj3->addItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCreator(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

		CategoryPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CategoryPeer::NUM_COLUMNS;

		$c->addJoin(ItemPeer::USER_ID, UserPeer::ID);

		$c->addJoin(ItemPeer::CATEGORY_ID, CategoryPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initItems();
				$obj2->addItem($obj1);
			}

			$omClass = CategoryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCategory(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initItems();
				$obj3->addItem($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCategory(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ItemPeer::addSelectColumns($c);
		$startcol2 = (ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

		CreatorPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + CreatorPeer::NUM_COLUMNS;

		$c->addJoin(ItemPeer::USER_ID, UserPeer::ID);

		$c->addJoin(ItemPeer::CREATOR_ID, CreatorPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ItemPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initItems();
				$obj2->addItem($obj1);
			}

			$omClass = CreatorPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCreator(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addItem($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initItems();
				$obj3->addItem($obj1);
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
		return ItemPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ItemPeer::ID); 

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
			$comparison = $criteria->getComparison(ItemPeer::ID);
			$selectCriteria->add(ItemPeer::ID, $criteria->remove(ItemPeer::ID), $comparison);

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
			$affectedRows += ItemPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(ItemPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Item) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ItemPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += ItemPeer::doOnDeleteCascade($criteria, $con);
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

				$objects = ItemPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/Bookmark.php';

						$c = new Criteria();
			
			$c->add(BookmarkPeer::ITEM_ID, $obj->getId());
			$affectedRows += BookmarkPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(Item $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ItemPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ItemPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ItemPeer::DATABASE_NAME, ItemPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ItemPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ItemPeer::DATABASE_NAME);

		$criteria->add(ItemPeer::ID, $pk);


		$v = ItemPeer::doSelect($criteria, $con);

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
			$criteria->add(ItemPeer::ID, $pks, Criteria::IN);
			$objs = ItemPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseItemPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ItemMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ItemMapBuilder');
}
