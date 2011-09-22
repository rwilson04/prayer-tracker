<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		//$trackable = new Application_Model_Trackable();
		//echo "<pre>";
		//$trackable->sd;
		echo get_include_path();
    }


}

