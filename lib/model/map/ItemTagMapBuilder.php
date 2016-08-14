<?php



class ItemTagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ItemTagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('item_tag');
		$tMap->setPhpName('ItemTag');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addForeignKey('ITEM_ID', 'ItemId', 'string', CreoleTypes::BIGINT, 'item', 'ID', true, null);

		$tMap->addForeignKey('TAG_ID', 'TagId', 'string', CreoleTypes::BIGINT, 'tag', 'ID', true, null);

	} 
} 