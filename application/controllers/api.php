<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic api interaction methods you could use
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Shahbaz
 */
class Api extends REST_Controller{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
		$this->load->model('Modal_airport');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['airport_get']['limit'] = 500; // 500 requests per hour per airport/key
        $this->methods['airport_post']['limit'] = 100; // 100 requests per hour per airport/key
        $this->methods['airport_delete']['limit'] = 50; // 50 requests per hour per airport/key
    }
	public function index_get()
    {
		   $this->set_response([
                'status' => True,
                'message' => 'Welcome to the Airport API by Shahbaz'
            ], REST_Controller::HTTP_OK); // BAD_REQUEST (400) being the HTTP response code
		
	}
    public function search_get()
    {
        // Find and return a single record for a particular airport.
        $id = @$this->get('id');
        if($id == "")
        {
			
            $this->set_response([
                'status' => FALSE,
                'message' => 'airport id is missing or null'
            ], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
			
		}
        else{// Get the airport from the array, using the id as key for retreival.
        // Usually a model is to be used for this.
		$airport = $this->Modal_airport->search_airport($id);
        if (!empty($airport))
        {
            $this->set_response($airport, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'airport could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
		}
    }
	
	public function all_post()
    { 
        // Find and return a single record for a particular airport.
       
        $this->form_validation->set_rules('user_id', 'user_id', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			 // Set the response and exit
			 $message = [
					'status' => false,
					'message' => strip_tags(validation_errors())
				];
            $this->response( $message, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
		}
		else{
			 $user_id = (int) $this->post('user_id');
		if($this->Modal_airport->user_role($user_id)[0]->role == 1 || $this->Modal_airport->user_role($user_id)[0]->role == 2)
			{	
				$airport = $this->Modal_airport->get_all();
				if (!empty($airport))
				{
					$this->set_response($airport, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
				}
				else
				{
					$this->set_response([
						'status' => FALSE,
						'message' => 'airport could not be found'
					], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
				}
			}
		   else{
					$message = [
					'status' => false,
					'message' => 'you are not authorised'
				];
				 $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
			}
    }

		}
    public function delete_post()
    {
       

      	$this->form_validation->set_rules('user_id', 'user id', 'required');
 	    $this->form_validation->set_rules('id', 'id', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			 // Set the response and exit
			 $message = [
					'status' => false,
					'message' => strip_tags(validation_errors())
				];
            $this->response( $message, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
		}
		else{
			
		$id = (int) $this->post('id');
		$user_id = (int) $this->post('user_id');
			if($this->Modal_airport->user_role($user_id)[0]->role == 1){
				$airport = $this->Modal_airport->delete_airport($id);
					 $message = [
					'id' => $id,
					'message' => 'Deleted the airport'
				];

				$this->set_response($message, REST_Controller::HTTP_OK); // NO_CONTENT (204) being the HTTP response code
			}else{
					$message = [
					'status' => false,
					'message' => 'you are not authorised'
				];
				 $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
			}
			
		}
       
       
    }
		public function add_post()
    {
		
		$this->form_validation->set_rules('airport_code', 'airport_code', 'required');
		$this->form_validation->set_rules('airport_name', 'airport_name', 'required');
		$this->form_validation->set_rules('city', 'city', 'required');
		$this->form_validation->set_rules('airport_code', 'airport_code', 'required');
		$this->form_validation->set_rules('country', 'country', 'required');
		$this->form_validation->set_rules('user_id', 'user id', 'required');
 
		if ($this->form_validation->run() == FALSE)
		{
			 // Set the response and exit
			 $message = [
					'status' => false,
					'message' => strip_tags(validation_errors())
				];
            $this->response( $message, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
		}
		else{
	    $id = $this->post('id');
		$airport_name = $this->post('airport_name');
		$city = $this->post('city');
		$airport_code = $this->post('airport_code');
		$country = $this->post('country');
		$user_id = $this->post('user_id');
        $data = array(
		'airport_name'   => $airport_name,
		'country'   => $country,
		'airport_code' => $airport_code,
		'updated'  => '',
		'city'   => $city,
		'user_id'   => $user_id
		);
			if($this->Modal_airport->user_role($user_id)[0]->role == 1 || $this->Modal_airport->user_role($user_id)[0]->role == 2){
				$airport = $this->Modal_airport->add_airport($data);
					 $message = [
					'id' => $id,
					'message' => 'Added the airport'
				];
				$this->set_response($message, REST_Controller::HTTP_OK); // NO_CONTENT (204) being the HTTP response code
			}else{
					$message = [
					'status' => false,
					'message' => 'you are not authorised'
				];
				 $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
			}
			
		}
       
       
    }
	public function update_post()
    {
		$this->form_validation->set_rules('id', 'id', 'required');
		
		$this->form_validation->set_rules('airport_name', 'airport_name', 'required');
		$this->form_validation->set_rules('city', 'city', 'required');
		$this->form_validation->set_rules('country', 'country', 'required');
		$this->form_validation->set_rules('user_id', 'user id', 'required');
 
		if ($this->form_validation->run() == FALSE)
		{
			 // Set the response and exit
			 $message = [
					'status' => false,
					'message' => strip_tags(validation_errors())
				];
            $this->response( $message, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
		}
		else{
			
	    $id = $this->post('id');
		$airport_name = $this->post('airport_name');
		$city = $this->post('city');
		$country = $this->post('country');
		$user_id = $this->post('user_id');
        $data = array(
		'id' => $id,
		'airport_name'   => $airport_name,
		'country'   => $country,
		'updated'  => date("Y-m-d h:m:s",time()),
		'city'   => $city,
		'user_id'   => $user_id
		);
			if($this->Modal_airport->user_role($user_id)[0]->role == 1){
				$airport = $this->Modal_airport->update_airport($data);
					 $message = [
					'id' => $id,
					'message' => 'Updated the airport'
				];

				$this->set_response($message, REST_Controller::HTTP_OK); // NO_CONTENT (204) being the HTTP response code
			}else{
					$message = [
					'status' => false,
					'message' => 'you are not authorised'
				];
				 $this->response($message, REST_Controller::HTTP_BAD_REQUEST);
			}
			
		}
       
       
    }

}
