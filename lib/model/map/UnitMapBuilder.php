<?php



class UnitMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UnitMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('unit');
		$tMap->setPhpName('Unit');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('BASE_UNIT_ID', 'BaseUnitId', 'string', CreoleTypes::BIGINT, false, null);

		$tMap->addColumn('BASE_UNIT_AMOUNT', 'BaseUnitAmount', 'double', CreoleTypes::FLOAT, false, null);

		$tMap->addColumn('US_IMPERIAL', 'UsImperial', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('DETAILS', 'Details', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('ABBRVIATION', 'Abbrviation', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('METRIC', 'Metric', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('UK_IMPERIAL', 'UkImperial', 'int', CreoleTypes::TINYINT, true, null);

	} 
} 