<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DatabaseModel');
	}

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('login');
		$this->load->view('layout/footer');
	}

	public function loginControl(){
	// 	$username = $_POST['username'];
	// 	$password = $_POST['password'];
		$data = null;
		//$data = array('username' => $username, 'password' => $password);
		$data = $this->DatabaseModel->login($data);
		$this->load->view('layout/header');
		if($data['is_logged_in']){
			$this->load->view('layout/header');
			if($data['acc_type'] == 'manager'){
				$this->load->view('manager_view');
			} else {
				$this->load->view('employee_view');
			}
			$this->load->view('layout/footer');
		} else {
			header('Location: '. base_url());
		}
	}
}
