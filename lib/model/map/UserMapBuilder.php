<?php



class UserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.UserMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('user');
		$tMap->setPhpName('User');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'string', CreoleTypes::BIGINT, true, null);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('DISPLAY_NAME', 'DisplayName', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('AUTHENTICATED', 'Authenticated', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('DELETED', 'Deleted', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('NEWSLETTER_SUBSCRIBE', 'NewsletterSubscribe', 'int', CreoleTypes::TINYINT, true, null);

		$tMap->addColumn('DOB', 'Dob', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('GENDER', 'Gender', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('COUNTRY', 'Country', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PROFILE', 'Profile', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('FIRST_NAME', 'FirstName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('LAST_NAME', 'LastName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ZIP_CODE', 'ZipCode', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('STATE', 'State', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CITY', 'City', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('PASSWORD_HASH', 'PasswordHash', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('PROFILE_PRIVATE', 'ProfilePrivate', 'int', CreoleTypes::TINYINT, false, null);

		$tMap->addColumn('PERSONAL_PRIVATE', 'PersonalPrivate', 'int', CreoleTypes::TINYINT, false, null);

		$tMap->addForeignKey('IMAGE_ID', 'ImageId', 'string', CreoleTypes::BIGINT, 'image', 'ID', false, null);

	} 
} 