<?php

require_once "Zend/Test/PHPUnit/ControllerTestCase.php";

class GroupTest extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
		$this->group = new Application_Model_Group();
        parent::setUp();
    }

	public function testGetId()
	{
		$this->assertEquals(null, $this->group->getId());
	}

	/*
	 * @depends testGetId
	 */
    public function testSetId()
    {
		$this->group->setId(1);
		$this->assertEquals(1, $this->group->getId());
	}
}
