<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions


/**

 * @package         CodeIgniter
 * @category        Controller
 * @author          Shahbaz
 */
class Welcome extends CI_Controller{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
		$this->load->helper(array('form', 'url'));

    }
	public function index()
    {
		$this->load->view('welcome');
	}
   

}
