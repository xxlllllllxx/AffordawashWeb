<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
	}

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('login');
		$this->load->view('layout/footer');
	}

	public function signup()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$data = array('manager_username' => $username, 'manager_password' => $password);
		$this->LoginModel->signup('tbl_manager', $data);
	}

	public function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$data = array('manager_username' => $username, 'manager_password' => $password);
		$this->LoginModel->login('tbl_manager', $data);
	}
}
