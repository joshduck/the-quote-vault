<?php



class ItemImageMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ItemImageMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('item_image');
		$tMap->setPhpName('ItemImage');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addForeignKey('IMAGE_ID', 'ImageId', 'string', CreoleTypes::BIGINT, 'image', 'ID', true, null);

		$tMap->addForeignKey('ITEM_ID', 'ItemId', 'string', CreoleTypes::BIGINT, 'item', 'ID', true, null);

		$tMap->addColumn('CAPTION', 'Caption', 'string', CreoleTypes::VARCHAR, true, 255);

	} 
} 