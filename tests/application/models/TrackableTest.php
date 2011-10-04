<?php

require_once "Zend/Test/PHPUnit/ControllerTestCase.php";

class TrackableTest extends Zend_Test_PHPUnit_ControllerTestCase
{
	protected $_container;
	protected $trackable;

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
		$this->setUpContainer();
		//$this->trackable = new Application_Model_Trackable();
        parent::setUp();
    }

	public function setUpContainer()
	{
		$container = new Shinymayhem_Application_Container();
		$container->mapper = $this->getMock('Application_Model_TrackablesMapper', array(), array(), '', false);
		//TODO create type model?
		//TODO remove functions array once models are created
		//$container->typeModel = $this->getMock('Application_Model_Type', array('getId', 'findById'), array(), '', false);
		//$container->userModel = $this->getMock('Application_Model_User', array(), array(), '', false);
		//$container->groupModel = $this->getMock('Application_Model_Group', array(), array(), '', false);
		$container->trackable = $container->asShared(function ($c){
			return new Application_Model_Trackable($c->mapper);	
		});
		$this->_container = $container;
		$this->trackable = $container->trackable;
	}

	public function testGetId()
	{
		//$this->assertEquals(null, $this->trackable->getId());
		$this->assertEquals(null, $this->trackable->getId());
	}

	/**
	 * @depends testGetId
	 */
    public function testSetId()
    {
		$this->trackable->setId(1);
		$this->assertEquals(1, $this->trackable->getId());
	}

	public function testGetTitle()
	{
		$this->assertEquals(null, $this->trackable->getTitle());
	}

	/**
	 * @depends testGetTitle
	 */
    public function testSetTitle()
    {
		$this->trackable->setTitle("NewTitle");
		$this->assertEquals("NewTitle", $this->trackable->getTitle());
	}

	public function testGetTypeId()
	{
		$this->assertEquals(null, $this->trackable->getTypeId());
	}

	/**
	 * @depends testGetTypeId
	 */
    public function testSetTypeId()
    {
		$this->trackable->setTypeId(13);
		$this->assertEquals(13, $this->trackable->getTypeId());
	}
	
	public function testGetUserId()
	{
		$this->assertEquals(null, $this->trackable->getUserId());
	}

	/**
	 * @depends testGetUserId
	 */
    public function testSetUserId()
    {
		$this->trackable->setUserId(14);
		$this->assertEquals(14, $this->trackable->getUserId());
	}

	public function testGetMapper()
	{
		$this->assertEquals($this->trackable->getMapper(), $this->_container->mapper);
	}

	//TODO find if these depends are needed, since it is a function of the implementation, which might change
	/**
	 * @depends testGetId 
	 * @depends testGetTitle 
	 * @depends testGetUserId 
	 * @depends testGetTypeId
	 */
	public function testToArray()
	{
		//$result = 
		$mapper = $this->_container->mapper;
		$mapper->expects($this->once())
				->method('toArray')
				->with($this->trackable);
		$array = $this->trackable->toArray();	
		//$this->assertTrue(array_key_exists('id', $array));
		//$this->assertTrue(array_key_exists('title', $array));
		//$this->assertTrue(array_key_exists('type_id', $array));
		//$this->assertTrue(array_key_exists('user_id', $array));
	}

	public function testFindById()
	{
		$mapper = $this->_container->mapper;
		//make sure mapper has this method called on it
		$mapper->expects($this->once())
				->method('find')
				->with($this->equalTo(27), $this->isInstanceOf('Application_Model_Trackable'));
		$this->trackable->findById(27);
	}

	//public function testGetUser()
	//{
	//	$user = $this->_container->userModel;
	//	$user->expects($this->once())
	//			->method('findById')
	//			->with($this->equalTo(27));
	//	$this->trackable->setUserId(27);
	//	$this->trackable->getUser();
	//}

	///**
	// * @expectedException Exception
	// * @expectedExceptionMessage User was not passed to constructor to use this function
	// */
	//public function testGetUserWithNullUserDependency()
	//{
	//	$container = new Shinymayhem_Application_Container();
	//	$container->mapper = $this->getMock('Application_Model_TrackablesMapper', array(), array(), '', false);
	//	$container->trackable = $container->asShared(function ($c){
	//		return new Application_Model_Trackable($c->mapper, null, null);	
	//	});

	//	$container->trackable->setUserId(27);
	//	$container->trackable->getUser();
	//}

	//public function testGetType()
	//{
	//	$type = $this->_container->typeModel;
	//	$type->expects($this->once())
	//			->method('findById')
	//			->with($this->equalTo(28));
	//	$this->trackable->setTypeId(28);
	//	$this->trackable->getType();
	//}

	///**
	// * @expectedException Exception
	// * @expectedExceptionMessage Type was not passed to constructor to use this function
	// */
	//public function testGetTypeWithNullUserDependency()
	//{
	//	$container = new Shinymayhem_Application_Container();
	//	$container->mapper = $this->getMock('Application_Model_TrackablesMapper', array(), array(), '', false);
	//	$container->trackable = $container->asShared(function ($c){
	//		return new Application_Model_Trackable($c->mapper, null, null);	
	//	});

	//	$container->trackable->setTypeId(27);
	//	$container->trackable->getType();
	//}


	///**
	// * @depends testGetUserId
	// */
	//public function testSetUser()
	//{
	//	$user = $this->_container->userModel;
	//	$user->expects($this->once())
	//			->method('getId')
	//			->will($this->returnValue(24));
	//	$this->trackable->setUser($user);
	//	$this->assertEquals(24, $this->trackable->getUserId());
	//}

	//public function testSetType()
	//{
	//	$type = $this->_container->typeModel;
	//	$type->expects($this->once())
	//			->method('getId')
	//			->will($this->returnValue(25));
	//	$this->trackable->setType($type);
	//	$this->assertEquals(25, $this->trackable->getTypeId());
	//}

	//public function testGetGroups()
	//{
	//	$group = $this->_container->groupModel;
	//	$group->expects($this->once())
	//			->method('findAllByTrackableId')
	//			->with(28);
	//	$this->trackable->setId(28);
	//	$this->trackable->getGroups();
	//}

	//public function testAddGroup()
	//{
	//}

	//public function testRemoveGroup()
	//{
	//}

	//public function testClearGroups()
	//{
	//}

	///**
	// * @depends testClearGroups 
	// * @depends testAddGroup 
	// */
	//public function testSetGroups()
	//{
	//}
}
