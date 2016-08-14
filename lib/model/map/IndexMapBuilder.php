<?php



class IndexMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IndexMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('index');
		$tMap->setPhpName('Index');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('ITEM_ID', 'ItemId', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('TEXT', 'Text', 'string', CreoleTypes::LONGVARCHAR, false, null);

	} 
} 