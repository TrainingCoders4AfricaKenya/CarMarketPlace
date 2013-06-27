<?php
class Dealers_area extends CI_Controller{
	
	
	public function __construct()
	{	
		//function construct to check if user is logged in n autoload dealers model
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('dealer_model');
	}
	
	public function is_logged_in()
	{	
		//to check if user is logged in and grab session variables from sessionm to store in our cookies
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		if (!isset($is_logged_in) || $is_logged_in != true)
		{
			//NEVER ECHO FROM CONTROLLER, LOAD FROM A VIEW
			echo 'You don\'t have permision to access this page. <a href="../dealer_login/dealer_login">LOGIN </a> ';
			die();
		}
		
	}
	
	public function Dealer_area()
	{
		$data['main_content'] = 'dealer/dealer_area'; //we are lading view from our templates
		$this->load->view('includes/template', $data);
	}
}