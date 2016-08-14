<?php



class BookmarkMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BookmarkMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bookmark');
		$tMap->setPhpName('Bookmark');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addForeignKey('ITEM_ID', 'ItemId', 'string', CreoleTypes::BIGINT, 'item', 'ID', true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'string', CreoleTypes::BIGINT, 'user', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

	} 
} 