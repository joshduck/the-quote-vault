<?php



class ForeignMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForeignMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('foreign');
		$tMap->setPhpName('Foreign');

		$tMap->setUseIdGenerator(false);

	} 
} 