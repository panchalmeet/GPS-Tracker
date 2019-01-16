<?php

class Api extends CI_Controller{
	
	public function index()
	{
		echo "Hello";
	}

	public function getUser(){

		$data = $this->Crud->get_users();

	   echo json_encode (array('status' => true, 'message' =>'request success','response'=>$data));
	}
}

?>