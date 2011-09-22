<?php

require_once "Zend/Test/PHPUnit/ControllerTestCase.php";

class StatusTest extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
		$this->status = new Application_Model_Status();
        parent::setUp();
    }

	public function testGetId()
	{
		$this->assertEquals(null, $this->status->getId());
	}

	/*
	 * @depends testGetId
	 */
    public function testSetId()
    {
		$this->status->setId(1);
		$this->assertEquals(1, $this->status->getId());
	}
}
