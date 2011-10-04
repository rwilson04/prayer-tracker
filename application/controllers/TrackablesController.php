<?php

class TrackablesController extends Zend_Controller_Action
{
	protected $_container;
	protected $_newTrackable;

    public function init()
    {
        /* Initialize action controller here */
		$container = new Shinymayhem_Application_Container();
		$container->table = "Application_Model_DbTable_Trackables"; 
		$container->exceptionClass = "Shinymayhem_Application_Exception"; 
		//$container->model = $container->asShared(function ($c){
			//return new Application_Model_Trackable($c->mapper,"Shinymayhem_Application_Exception");	
		////});
		$container->modelClass = "Application_Model_Trackable";
		$container->model = function ($c){
			return new Application_Model_Trackable($c->mapper,$c->exceptionClass);	
		};
		$container->mapper = $container->asShared(function ($c){
			return new Application_Model_TrackablesMapper($c->table, $c->modelClass, $c->exceptionClass);	
		});
		$this->_container = $container;
		$this->_newTrackable = $container->model;
    }

    public function indexAction()
    {
        // action body
    }


}

