<?php

class Application_Model_DbTable_TrackableGroups extends Zend_Db_Table_Abstract
{

    protected $_name = 'trackable_groups';


	protected $_referenceMap = array(
		"TrackableGroupTrackable" => array(
			'columns' 			=> 'trackable_id',
			'refTableClass' 	=> 'Application_Model_DbTable_Trackables',
			'refColumns'		=> 'id'
		),
		"TrackableGroupGroup" => array(
			'columns' 			=> 'group_id',
			'refTableClass' 	=> 'Application_Model_DbTable_Groups',
			'refColumns'		=> 'id'
		)
	);
}

