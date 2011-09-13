<?php

class Application_Model_DbTable_States extends Zend_Db_Table_Abstract
{

    protected $_name = 'status_states';

	//not needed for InnoDB tables, needed for any db that doesn't support referential integrity for cascading onupdate or ondelete
	//protected $_dependentTables = array('Application_Model_DbTable_Statuses');
}

