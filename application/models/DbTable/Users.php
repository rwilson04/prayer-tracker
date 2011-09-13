<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';

	protected $_referenceMap = array(
		"AuthSource" => array(
			'columns' 			=> 'auth_source_id',
			'refTableClass' 	=> 'Application_Model_DbTable_AuthSources',
			'refColumns'		=> 'id'
		)
	);

	//not needed for InnoDB tables, needed for any db that doesn't support referential integrity for cascading onupdate or ondelete
	//protected $_dependentTables = array('Application_Model_DbTable_Trackables', 'Application_Model_DbTable_UserGroups');

}

