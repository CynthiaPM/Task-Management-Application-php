<?php

class TestController extends ApplicationController
{
	public function indexAction()
	{
		$this->view->message = "hello from test::index";
	}
	
	public function checkAction()
	{
		echo "hello from test registration::check";

		die;
	}

	public function saludoAction(){

	echo "este es el saludo";
	}
}
?>