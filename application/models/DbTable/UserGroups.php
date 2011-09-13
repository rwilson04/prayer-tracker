<?php

class Application_Model_DbTable_UserGroups extends Zend_Db_Table_Abstract
{

    protected $_name = 'user_groups';

	protected $_referenceMap = array(
		"UserGroupUser" => array(
			'columns' 			=> 'user_id',
			'refTableClass' 	=> 'Application_Model_DbTable_Users',
			'refColumns'		=> 'id'
		),
		"UserGroupGroup" => array(
			'columns' 			=> 'group_id',
			'refTableClass' 	=> 'Application_Model_DbTable_Groups',
			'refColumns'		=> 'id'
		)
	);

}

