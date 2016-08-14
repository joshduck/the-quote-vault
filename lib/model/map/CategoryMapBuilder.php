<?php



class CategoryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CategoryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('category');
		$tMap->setPhpName('Category');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('PARENT_CATEGORY_ID', 'ParentCategoryId', 'string', CreoleTypes::BIGINT, false, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('SLUG', 'Slug', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('LISTED', 'Listed', 'int', CreoleTypes::TINYINT, true, null);

	} 
} 