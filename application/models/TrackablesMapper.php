<?php

class Application_Model_TrackablesMapper extends Shinymayhem_Model_Mapper
{

	public function find($id, Application_Model_Trackable $trackable)
	{
		$result = $this->getDbTable()->find($id);	
		if (count($result) == 0)
		{
			return;
		}
		$this->populate($result, $trackable);
	}

	//map db properties to model object properties
	private function populate($row, Application_Model_Trackable $trackable)
	{
		if (is_array($row))
		{
			$row = new ArrayObject($row, ArrayObject::ARRAY_AS_PROPS);
		}	
		if (isset ($row->id))
		{
			$trackable->setId($row->id);
		}
		if (isset ($row->title))
		{
			$trackable->setTitle($row->title);
		}
		if (isset ($row->type_id))
		{
			$trackable->setTypeId($row->type_id);
		}
		if (isset ($row->user_id))
		{
			$trackable->setUserId($row->user_id);
		}
	}
}

