<?php

class Application_Model_DbTable_Trackables extends Zend_Db_Table_Abstract
{

    protected $_name = 'trackables';

	//not needed for InnoDB tables, needed for any db that doesn't support referential integrity for cascading onupdate or ondelete
	//protected $_dependentTables = array('Application_Model_DbTable_TrackableGroups', 'Application_Model_DbTable_Statuses');

	protected $_referenceMap = array(
		"TrackableType" => array(
			'columns' 			=> 'trackable_type_id',
			'refTableClass' 	=> 'Application_Model_DbTable_Types',
			'refColumns'		=> 'id'
		),
		"TrackableUser" => array(
			'columns' 			=> 'user_id',
			'refTableClass' 	=> 'Application_Model_DbTable_Users',
			'refColumns'		=> 'id'
		)
	);
	
	//not needed for InnoDB tables, needed for any db that doesn't support referential integrity for cascading onupdate or ondelete
	//protected $_dependentTables = array('Application_Model_DbTable_TrackableGroups');

}

