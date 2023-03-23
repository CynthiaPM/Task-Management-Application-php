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

	public function TaskListAction(){
		
		$taskList= new task();
		$taskList->getTasks();
		$this->view->_data = $taskList->getTasks();	
	}

	public function viewAction(){
		$lista = new task();
		$this->view->_data = $lista->getTasks();
	}
}

?>
