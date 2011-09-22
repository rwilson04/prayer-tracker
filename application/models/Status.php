<?php
//referenced http://www.agiledata.org/essays/mappingObjects.html
class Application_Model_Status
{

	protected $_id;
	protected $_trackableId;
	protected $_statusText;
	protected $_date;
	protected $_stateId;

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

	public function setTrackableId($trackableId)
	{
		$this->_trackableId= $trackableId;
		return $this;
	}

	public function getTrackableId()
	{
		return $this->_trackableId;
	}

	public function setStatusText($statusText)
	{
		$this->_statusText= $statusText;
		return $this;
	}

	public function getStatusText()
	{
		return $this->_statusText;
	}

	public function setDate($date)
	{
		$this->_date= $date;
		return $this;
	}

	public function getDate()
	{
		return $this->_date;
	}

	public function setStateId($stateId)
	{
		$this->_stateId= $stateId;
		return $this;
	}

	public function getStateId()
	{
		return $this->_stateId;
	}

	public function toArray()
	{
		return array (
			'id'=>$this->getId(),
			'trackableId'=>$this->getTrackableId(),
			'statusText'=>$this->getStatusText(),
			'date'=>$this->getDate(),
			'stateId'=>$this->getStateId()
		);
	}

	public function getMapper()
	{
		return new Application_Model_StatusesMapper();
	}

	public static function get($id)
	{
		$status = new Application_Model_Status();
		return $status->findById($id);
	}

	public function findById($id)
	{
		$this->getMapper()->find($id, $this);
	}


	public function getTrackable()
	{
		return Application_Model_Trackable::get($this->getTrackableId());
	}

	public function getState()
	{
		return Application_Model_State::get($this->getStateId());
	}

	public function setState(Application_Model_State $state)
	{
		$this->setStateId($state->getId());
	}

}

