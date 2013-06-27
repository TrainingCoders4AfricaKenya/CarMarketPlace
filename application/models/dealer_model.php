<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dealer_model extends CI_Model{
	public function get_record()
	{	
		//used to get data from the database 'Dealer' is the table we retrieve data from
		//the result() returns query result as an array of objccts or an empty array
		$query = $this->db->get('Dealer');
		return $query->result();
	}
	
	public function get_individual($id)
	{
		
	}
		
	public function update_record($data)
	{	
		//update record where id=? $data is what we updating
		$this->db->where('id', 1);
		$this->db->update('data', $data);
	}
	
	public function delete_record()
	{
		//used to delete record with a given id
		$this->db->delete('data');
		$this->db->where('id', $this->uri->segment(3));
	}
	
    public function validate()
    {
		//access db find table, retrieve all records where username $ password = [WHATS TYPED]
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('Dealer');
		
		if ($query->num_rows == 1) {
			//create session and login
			return true;
		}
	}
	
    public function create_member($data)
	{
		//used to insert data to db, the $data is the data to be inserted
		$new_member_insert_data = array(
			    'Name' => $this->input->post('Name'),
				'Contact'=>$this->input->post('Contact'),
				'Phone1'=>$this->input->post('Phone1'),
				'Phone2'=>$this->input->post('Phone2'),
				'Email'=>$this->input->post('Email'),
				'PaymentStatus'=>$this->input->post('PaymentStatus'),
				'Country'=>$this->input->post('Country'),
				'City'=>$this->input->post('City'),
				'Street' => $this->input->post('Street'),
				'username' => $this->input->post('username'),
			    'password' => md5($this->input->post('password'))
				//'password2' => md5($this->input->post('password2'))
		);
		$this->db->set('registrationDate', 'NOW()', FALSE);
		$insert = $this->db->insert('Dealer', $new_member_insert_data);
		return $insert;
	}
	
}