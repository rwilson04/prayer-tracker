<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		$auth = Zend_Auth::getInstance();
		$id = $auth->getIdentity();
		var_dump($id);
    }

    public function loginAction()
    {
        // action body
    }


}



