<?php

/**
 * Base controller for the application.
 * Add general things in this controller.
 */
require_once (__DIR__ .'/../models/task.class.php');

class ApplicationController extends Controller 
{
	public function indexAction()
	{
		$this->view->message = "hello from test::index";
	}

	public function taskListAction(){
		
		$taskList= new task();
		$this->view->_data = $taskList->getTasks();	
	}

}

?>
