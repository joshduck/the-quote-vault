<?php



class LocalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LocalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('local');
		$tMap->setPhpName('Local');

		$tMap->setUseIdGenerator(false);

	} 
} 