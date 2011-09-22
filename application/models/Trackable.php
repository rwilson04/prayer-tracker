<?php
//referenced http://www.agiledata.org/essays/mappingObjects.html
class Application_Model_Trackable
{

	protected $_id;
	protected $_title;
	protected $_typeId;
	protected $_userId;

	public function __construct()
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

	public function setTitle($title)
	{
		$this->_title= $title;
		return $this;
	}

	public function getTitle()
	{
		return $this->_title;
	}

	public function setTypeId($typeId)
	{
		$this->_typeId= $typeId;
		return $this;
	}

	public function getTypeId()
	{
		return $this->_typeId;
	}

	public function setUserId($userId)
	{
		$this->_userId= $userId;
		return $this;
	}

	public function getUserId()
	{
		return $this->_userId;
	}

	public function toArray()
	{
		return array (
			'id'=>$this->getId(),
			'name'=>$this->getName(),
			'typeId'=>$this->getTypeId(),
			'userId'=>$this->getUserId()
		);
	}

	public function getMapper()
	{
		//return $this->trackableMapper;//new Application_Model_TrackablesMapper();
	}

	public static function get($id)
	{
		$trackable = new Application_Model_Trackable();
		return $trackable->findById($id);
	}

	public function findById($id)
	{
		$this->getMapper()->find($id, $this);
	}


	public function getUser()
	{
		return Application_Model_User::get($this->getUserId());
	}

	public function getType() //TODO since this is syntax highlighted, make sure its case makes it distinguishable from reserved gettype() function
	{
		return Application_Model_Type::get($this->getTypeId());
	}

	public function setUser(Application_Model_User $user)
	{
		$this->setUserId($user->getId());
	}

	public function setType(Application_Model_Type $type)
	{
		$this->setTypeId($type->getId());
	}

	public function getGroups()
	{
		return Application_Model_Group::getAllByTrackableId($this->getId());
		//TODO find out which is better, above or below
		$group = new Application_Model_Group();
		return $group->findAllByTrackableId($this->getId());
	}

	public function setGroups($groups)
	{
		if (!is_array($groups))
		{
			throw new Tracker_Application_Exception("groups is not an array");
		}
		$this->clearGroups();
		foreach ($groups as $group)
		{
			if (!($group instanceof Application_Model_Group))
			{
				throw new Tracker_Application_Exception("group is not an instance of Application_Model_Group");
			}
			$this->addGroup($group);
		}
	}

	public function addGroup(Application_Model_group $group)
	{
		//TODO
	}

	public function removeGroup(Application_Model_group $group)
	{
		//TODO
	}

	public function clearGroups()
	{
		//TODO
	}


}


