<?php

class Modal_airport extends CI_Model {

	var $table_user = 'users' ;
	var $table_airports = 'airports';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
		
    }

    

   
	//-----------------SEARCH DATA--------------------//
	public function search_airport($id){
		
		$query = $this->db->select('*');
		$this->db->where('airport_code' , $id);
		$this->db->where('deleted' , 0);
		$result = $this->db->get('airports');
		return $result->result();
		
		
	}
	/*************************************************/
	
	//-----------------GET ALL DATA--------------------//
	public function get_all(){
		
		$query = $this->db->select('*');
		$this->db->where('deleted' , 0);
		$result = $this->db->get('airports');
		return $result->result();
		
		
	}
	/*************************************************/



	//-----------------UPDATE DATA--------------------//
	public function update_airport($data){
	
		$this->db->where('id', $data['id']);
		$this->db->update('airports', $data); 
	}
	/*************************************************/

  //-----------------ADD DATA--------------------//
	public function add_airport($data){

		
		$this->db->insert('airports', $data); 
	}
	/*************************************************/


	//-----------------DELETE DATA--------------------//
	public function delete_airport($id){
		$data = array('deleted' => '1');
		$this->db->where('id', $id);
		$this->db->update('airports', $data); 
	}
	/*************************************************/
	
	//-----------------DELETE DATA--------------------//
	public function user_role($id){
		$query = $this->db->select('role');
		$this->db->where('id' , $id);
		$result = $this->db->get('users');
		return $result->result();
	}
	/*************************************************/



}

?>
