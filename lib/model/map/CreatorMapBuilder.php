<?php



class CreatorMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CreatorMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('creator');
		$tMap->setPhpName('Creator');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('GIVEN_NAMES', 'GivenNames', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('SLUG', 'Slug', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('SURNAME', 'Surname', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('BIOGRAPHY', 'Biography', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('SUMMARY', 'Summary', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('IMAGE_ID', 'ImageId', 'string', CreoleTypes::BIGINT, false, null);

	} 
} 