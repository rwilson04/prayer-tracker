<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initDoctype()
	{
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('HTML5');
	}

	protected function _initAutoload()
	{
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->registerNamespace(array('Shinymayhem_'));
		return $autoloader;
	}

	//protected function _initPlugin()
	//{
		//$fc = Zend_Controller_Front::getInstance();
		//$fc->registerPlugin(new Shinymayhem_Plugin_PluginName());
	//}
	
	protected function _initAuthentication()
	{
	  $fc = Zend_Controller_Front::getInstance();
	  $plugin = new Shinymayhem_Plugin_Authentication();
	  $plugin->loginModule = "default";
	  $plugin->loginController = "users";
	  $plugin->loginAction = "login";
	  $plugin->modular = true;
	  //$plugin->acl = $acl;
	  $fc->registerPlugin($plugin);
	}

	protected function _initDebugPlaceholder()
	{
		$this->bootstrap('view');
		$view = $this->getResource('View');
		$view->placeholder('debug')
			->setPrefix("<pre>")
			->setSeparator("<br />")
			->setPostfix("</pre>");
	}

	protected function _initDebugRegistry()
	{
		Zend_Registry::set('debug', null);
	}
									
}

