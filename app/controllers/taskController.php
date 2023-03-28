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

	public function createTaskAction() {
		$taskList = new task();
		$isValid = true;

		$errors = [
			'id' => '',
			'user' => "",
			'task' => "",
			'status' => "",
			'start_date' => "",
		];
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$data = $_POST;
			// Start of validation
			if (!$data['user']) {
				$isValid = false;
				$errors['user'] = 'Name is mandatory';
			}
			if (!$data['task']) {
				$isValid = false;
				$errors['task'] = 'Task is required';
			}
			// End of validation
			if ($isValid) {
				$taskList->createTask($_POST['user'], $_POST['task']);
				header('Location: index');
				exit;
			}
		}
		
	}	

	public function editTaskAction(){
		$taskList= new task();
		$this->view->content = $taskList->getTaskById($_GET['id']);
				
		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$taskList -> editTask($_GET["id"],$_POST['user'],$_POST['task'],$_POST['status']);
			
			//le indico donde ir una vez suceda el post
			// header( 'location: index');
		}

		$taskList= new task();

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			if($_POST['status'] === 'completed'){

				$taskList -> completeTask($_GET['id']);	

				header( 'location: index');
			}

			header( 'location: index');
		}		
					
	}

	public function deleteAction(){
        $taskList= new task();
        $this->view->content = $taskList-> deleteTask($_GET['id']);

        header( 'location: index');
    }

}

?>
