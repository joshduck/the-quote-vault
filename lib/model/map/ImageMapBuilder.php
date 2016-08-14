<?php



class ImageMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ImageMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('image');
		$tMap->setPhpName('Image');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('FULL_PATH', 'FullPath', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('HEIGHT', 'Height', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('WIDTH', 'Width', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MIMETYPE', 'Mimetype', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addForeignKey('USER_ID', 'UserId', 'string', CreoleTypes::BIGINT, 'user', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('DELETED', 'Deleted', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('FILESIZE', 'Filesize', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('COPYRIGHT', 'Copyright', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('MEDIUM_PATH', 'MediumPath', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TINY_PATH', 'TinyPath', 'string', CreoleTypes::VARCHAR, true, 255);

	} 
} 