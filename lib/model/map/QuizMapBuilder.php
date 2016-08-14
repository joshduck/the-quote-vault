<?php



class QuizMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.QuizMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('quiz');
		$tMap->setPhpName('Quiz');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('ITEM_ID', 'ItemId', 'string', CreoleTypes::BIGINT, true, null);

	} 
} 