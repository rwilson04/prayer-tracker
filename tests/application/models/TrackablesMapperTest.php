<?php

require_once "Zend/Test/PHPUnit/ControllerTestCase.php";

class TrackablesMapperTest extends Zend_Test_PHPUnit_ControllerTestCase
{
	protected $_container;
	protected $mapper;

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
		$this->setUpContainer();
		//$this->_mapper = new Application_Model_TrackablesMapper($dbTable);
		$this->mapper = $this->_container->trackablesMapper;
        parent::setUp();
    }

	public function setUpContainer()
	{
		$container = new Shinymayhem_Application_Container();
		$container->exceptionClass = 'Tracker_Application_Exception';

		//use mock in this function when only one will be needed?
		$container->trackablesTable = $this->getMock('Zend_Db_Table'); //mock Zend_Db_Table_Abstract or subclass
		//use class in this function when multiple mocks will be created?
		$container->trackableClass = 'Application_Model_Trackable';

		//$container->trackable = $container->asShared(function ($c) 
		//{
			//return new Application_Model_Trackable();
		//});
		$container->trackablesMapper = $container->asShared(function ($c)
		{
			$mapper = new Application_Model_TrackablesMapper($c->trackablesTable);
			$mapper->setExceptionClass($c->exceptionClass);
			return $mapper;
		});
		$this->_container = $container;

	}


	public function testFind()
	{
		//mock array that would be returned by dbTable find method
		$result = array(
			'id'=>'1',
			'title'=>'theTitle',
			'type_id'=>2,
			'user_id'=>3
		);
		
		$trackable = $this->getMock($this->_container->trackableClass);

		//make sure each of these methods is called
		$trackable->expects($this->once())
				->method('setId')
				->with($this->equalTo(1));
		$trackable->expects($this->once())
				->method('setTitle')
				->with($this->equalTo('theTitle'));
		$trackable->expects($this->once())
				->method('setTypeId')
				->with($this->equalTo(2));
		$trackable->expects($this->once())
				->method('setUserId')
				->with($this->equalTo(3));

		$this->_container->trackablesTable->expects($this->once())
				->method('find')
				->with($this->equalTo(1))
				->will($this->returnValue($result));
		$this->mapper->find(1, $trackable);
	}

	public function testFindNonExisting()
	{
		$result = array(
		);

		$trackable = $this->getMock($this->_container->trackableClass);

		//make sure none of the attributes are set when nothing is found
		$trackable->expects($this->never())
				->method('setId');
		$trackable->expects($this->never())
				->method('setTitle');
		$trackable->expects($this->never())
				->method('setTypeId');
		$trackable->expects($this->never())
				->method('setUserId');

		//try to find a user with a non existant id
		$this->_container->trackablesTable->expects($this->once())
				->method('find')
				->with($this->equalTo(0))
				->will($this->returnValue($result));
		$this->mapper->find(0, $trackable);
	}
}
