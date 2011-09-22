<?php

require_once "Zend/Test/PHPUnit/ControllerTestCase.php";

class TrackableTest extends Zend_Test_PHPUnit_ControllerTestCase
{
	protected $trackable;

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
		$this->trackable = new Application_Model_Trackable();
        parent::setUp();
    }

	public function testGetId()
	{
		$this->assertEquals(null, $this->trackable->getId());
	}

	/*
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

	/*
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

	/*
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

	/*
	 * @depends testGetUserId
	 */
    public function testSetUserId()
    {
		$this->trackable->setUserId(14);
		$this->assertEquals(14, $this->trackable->getUserId());
	}

	public function testGetMapper()
	{
		//TODO fix this with dependency injection
		//$this->assertEquals($this->trackable->getMapper(), new Application_Model_TrackablesMapper());
	}
}
