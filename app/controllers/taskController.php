<?php

/**
 * Base controller for the application.
 * Add general things in this controller.
 */
require_once (__DIR__ .'/../models/task.class.php');

class TaskController extends Controller 
{
	public function indexAction()
	{
		$this->view->content();
	}

	public function taskListAction(){
				
		$taskList= new task();
		$this->view->content = $taskList->getTasks();	
	}

	public function viewTaskAction(){
		$taskList= new task();
		$this->view->content = $taskList->getTaskById($_GET['id']);
	}

}

?>
