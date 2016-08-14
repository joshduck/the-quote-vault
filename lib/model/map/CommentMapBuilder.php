<?php



class CommentMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CommentMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('comment');
		$tMap->setPhpName('Comment');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('ITEM_ID', 'ItemId', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('USER_ID', 'UserId', 'string', CreoleTypes::BIGINT, false, null);

		$tMap->addColumn('USER_NAME', 'UserName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('USER_IP', 'UserIp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('APPROVED', 'Approved', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('DELETED', 'Deleted', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('TEXT', 'Text', 'string', CreoleTypes::LONGVARCHAR, false, null);

	} 
} 