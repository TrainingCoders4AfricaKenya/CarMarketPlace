<?php
class Dealer_login extends CI_Controller{
	/*
	 * 
	 */
	public function index(){
		
		$data['main_content'] = 'dealer/dealer_login'; //we are lading view from our templates
		$this->load->view('includes/template', $data);
		//$this->load->view('dealer/dealer_login');
	}
	
	public function validate_credentials()
	{
		//first  we grab username and password run query in db check to see if it matches, create session and login
		//to query db we load the model
		//call the validation method and make sure its equal to what was returned
		
		$this->load->model('dealer_model');
		$query = $this->dealer_model->validate();
		if ($query) {	//if users credentials validated //create new data() equal to an array
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => TRUE
			);
			$this->session->set_userdata($data); //set_userdata is appending info to the session 
			redirect('dealers_area/is_logged_in');
		}
		else {
			echo "error in validation";
			$this->index();
		}
	}
	public function register()
	{
		/*we grab info and send it to model array is used to post content to the table, we didnt autoload model */
		//the password field needs to be encrypted
		$data['main_content'] = 'dealer/dealer_register';
		$this->load->view('includes/template', $data);
	}
	public function createMember()
	{
		$this->load->library('form_validation');
		
		//Method takes field name, error messages, validation rules	
		$this->form_validation->set_rules('Name', 'Name', 'trim|required');
		$this->form_validation->set_rules('Contact', 'Contact', 'trim|required');
		$this->form_validation->set_rules('Phone1', 'Phone1', 'trim|required');
		$this->form_validation->set_rules('Phone2', 'Phone2', 'trim|required');
		$this->form_validation->set_rules('Country', 'Country', 'trim|required');
		$this->form_validation->set_rules('City', 'City', 'trim|required');
		
		$this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		
		//To check validation
		if ($this->form_validation->run() == FALSE ) 
		{
			$this->register();
		}
		else
		{
			$this->load->model('dealer_model');
			if ($query = $this->dealer_model->create_member()) 
			{
				$data['main_content'] = 'dealer/registration_succesfull';
				$this->load->view('includes/template', $data);
			}
			else 
			{
				$this->load->view('dealer/Dealer_register');
			}
		}
	}
}		