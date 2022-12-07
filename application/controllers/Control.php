<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Control extends CI_Controller
{
	private $employeeId;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DatabaseModel');
		$this->employeeId = 1;
	}

	public function index()
	{
		header('Location ' . base_url());
	}

	public function loginControl()
	{
		$data = array('username' => 'lewis', 'password' => '1234');
		$data = $this->DatabaseModel->login($data);
		$this->load->view('layout/header');
		if ($data['is_logged_in']) {
			if ($data['login'] == 'manager') {
				echo 'logged in as manager';
			} else {
				echo 'logged in as employee';
				$this->employeeId = $data['id'];
			}
		} else {
			echo 'Login failed';
		}
	}
	public function addEmployee()
	{
		$data = array('name' => 'lewisa', 'employee_username' => '@lewis', 'employee_password' => '1234', 'employee_salary' => '300');
		if ($this->DatabaseModel->addEmployee($data)) {
			echo 'employee added';
		} else {
			echo 'failed to add employee';
		}
	}

	public function addItem()
	{
		$data = array(
			'item_name' => 'Surfd',
			'item_quantity' => '50',
			'item_cost' => '6',
			'item_lowest_price' => '8',
			'item_selling_price' => '8',

		);
		if ($this->DatabaseModel->addItem($data)) {
			echo 'item added';
		} else {
			echo 'item not added';
		}
	}

	public function addService()
	{
		$data = array(
			'service_name' => 'Superwash',
			'washing' => '1',
			'drying' => '0',
			'washing_price' => '80',
			'drying_price' => '80',
		);
		if ($this->DatabaseModel->addService($data)) {
			echo 'Service added';
		} else {
			echo 'Service not added';
		}
	}

	public function saveCustomerTransaction()
	{
		if ($this->employeeId != 0) {
			$data = array(
				'customer_alias' => 'Diero',
				'employee_id' => $this->employeeId,
				'machine_id_list' => '1 200',
				'item_id_list' => '1 3 30:2 5 60',
				'transaction_payment' => '159',
				'transaction_datetime' => date('m/d/Y h:i:s a', time())
			);
			if ($this->DatabaseModel->addCustomer($data)) {
				echo 'transaction saved';
			} else {
				echo 'transaction failed';
			}
		} else {
			echo 'No employee Logged in';
		}
	}

	public function viewEmployees()
	{
		$data = $this->DatabaseModel->getEmployeeList();
		foreach ($data as $list => $value) {
			echo "$list $value[name] $value[username] $value[customer_served] <br>";
		}
	}

	public function viewItems()
	{
		$data = $this->DatabaseModel->getItemsList();
		foreach ($data as $list => $value) {
			echo "$list $value[name] $value[quantity] $value[cost] $value[lowest_price] $value[selling_price] <br>";
		}
	}

	public function viewServices()
	{
		$data = $this->DatabaseModel->getServicesList();
		foreach ($data as $list => $value) {
			echo "$list $value[name] $value[has_wash] $value[has_dry] $value[wash_price] $value[dry_price] <br>";
		}
	}

	public function viewCustomerTransact()
	{
		$data = $this->DatabaseModel->getCustomerList();
		foreach ($data as $list => $value) {
			echo '';
		}
	}
}
