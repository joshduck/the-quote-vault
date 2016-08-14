<?php



class ItemMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ItemMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('item');
		$tMap->setPhpName('Item');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'string', CreoleTypes::BIGINT, 'user', 'ID', false, null);

		$tMap->addColumn('TEXT', 'Text', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('DATE', 'Date', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('RATING', 'Rating', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('COMMENT_COUNT', 'CommentCount', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('APPROVED', 'Approved', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('DELETED', 'Deleted', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('SLUG', 'Slug', 'string', CreoleTypes::VARCHAR, true, 60);

		$tMap->addForeignKey('CREATOR_ID', 'CreatorId', 'string', CreoleTypes::BIGINT, 'creator', 'ID', false, null);

		$tMap->addForeignKey('CATEGORY_ID', 'CategoryId', 'string', CreoleTypes::BIGINT, 'category', 'ID', false, null);

	} 
} 