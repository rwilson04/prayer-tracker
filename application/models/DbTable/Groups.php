<?php

class Application_Model_DbTable_Groups extends Zend_Db_Table_Abstract
{

    protected $_name = 'groups';

	//not needed for InnoDB tables, needed for any db that doesn't support referential integrity for cascading onupdate or ondelete
	//protected $_dependentTables = array('Application_Model_DbTable_TrackableGroups', 'Application_Model_DbTable_UserGroups');

}

