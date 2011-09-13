<?php

class Application_Model_DbTable_Statuses extends Zend_Db_Table_Abstract
{

    protected $_name = 'trackable_statuses';

	protected $_referenceMap = array(
		"StatusState" => array(
			'columns' 			=> 'status_state_id',
			'refTableClass' 	=> 'Application_Model_DbTable_States',
			'refColumns'		=> 'id'
		),
		"StatusTrackable" => array(
			'columns' 			=> 'trackable_id',
			'refTableClass' 	=> 'Application_Model_DbTable_Trackables',
			'refColumns'		=> 'id'
		)
	);
}

