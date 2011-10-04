<?php
//referenced http://www.agiledata.org/essays/mappingObjects.html
class Application_Model_Trackable extends Shinymayhem_Model
{

	protected $_title;
	protected $_typeId;
	protected $_userId;

	public function setTitle($title)
	{
		$this->requireString($title);
		$this->_title= $title;
		return $this;
	}

	public function getTitle()
	{
		return $this->_title;
	}

	public function setTypeId($typeId)
	{
		$this->requireInt($typeId);
		$this->_typeId = $typeId;
		return $this;
	}

	public function getTypeId()
	{
		return $this->_typeId;
	}

	public function setUserId($userId)
	{
		$this->requireInt($userId);
		$this->_userId= $userId;
		return $this;
	}

	public function getUserId()
	{
		return $this->_userId;
	}

	public function findById($id)
	{
		return $this->getMapper()->find($id, $this);
	}


	//public function getUser()
	//{
		//if (empty($this->_newUserModel))
		//{
			//throw new $this->_exceptionClass("User was not passed to constructor to use this function (getUser())");
		//}
		//return $this->_newUserModel->findById($this->getUserId()); //this->_newUserModel creates a new users
		//return Application_Model_User::get($this->getUserId());
	//}

	//public function getType() 
	//{
	//	if (empty($this->_newTypeModel))
	//	{
	//		//TODO move this to closure in container?
	//		throw new $this->_exceptionClass("Type was not passed to constructor to use this function (getType())");
	//	}
	//	return $this->_newTypeModel->findById($this->getTypeId()); //this->_newTypeModel creates a new users
	//	//return Application_Model_Type::get($this->getTypeId());
	//}

	//public function setUser(Application_Model_User $user)
	//{
		//$this->setUserId($user->getId());
		//TODO save?
	//}

	//public function setType(Application_Model_Type $type)
	//{
		//$this->setTypeId($type->getId());
		//TODO save?
	//}

	//public function getGroups()
	//{
	//	$group = $this->_newGroupModel;
	//	return $group->findAllByTrackableId($this->getId());
	//}

	//public function setGroups($groups)
	//{
	//	$this->requireArray($groups);
	//	$this->clearGroups();
		//foreach ($groups as $group)
		//{
			//$this->addGroup($group);
		//}
	//}


	//TODO figure out where persistence factors in
	//public function addGroup(Application_Model_Group $group)
	//{
		//TODO is this necessary, since type hinting?
		//$class = get_class($this->_newGroupModel);
		//if (!($group instanceof $class))
		//{
			//throw new $this->_exceptionClass("Group cannot be added because it is not an instance of $class");
		//}
		//TODO
	//}

	//public function removeGroup(Application_Model_Group $group)
	//{
		//TODO
	//}

	//public function clearGroups()
	//{
		//TODO
	//}

}


