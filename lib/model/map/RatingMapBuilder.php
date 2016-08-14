<?php



class RatingMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RatingMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rating');
		$tMap->setPhpName('Rating');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addForeignKey('ITEM_ID', 'ItemId', 'string', CreoleTypes::BIGINT, 'item', 'ID', true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'string', CreoleTypes::BIGINT, 'user', 'ID', false, null);

		$tMap->addColumn('USER_IP', 'UserIp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('RATING', 'Rating', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 