<?php
//referenced http://www.agiledata.org/essays/mappingObjects.html

class Application_Model_Group
{

	protected $_id;

	public function __construct(array $options = null)
	{
	}

	public function setId($id)
	{
		$this->_id = $id;
		return $this;
	}

	public function getId()
	{
		return $this->_id;
	}
	public static function getAllByTrackableId()
	{
		//TODO finish this
	}

	public function findAllByTrackableId()
	{
	}

}

