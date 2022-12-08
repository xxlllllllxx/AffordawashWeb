<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DatabaseModel');
		$this->load->library('session');
		$this->employeeId = 0;
	}

	// MODELS
	private function addData($table, $rawData)
	{
		$data = $rawData;
		switch ($table) {
			case 'employee':
				return $this->DatabaseModel->addEmployee($data);
			case 'item':
				return $this->DatabaseModel->addItem($data);
			case 'service':
				return $this->DatabaseModel->addService($data);
			case 'customer':
				return ($_SESSION['user_data']['login'] == 'employee' && $this->DatabaseModel->addCustomer($data));
			default:
				return false;
		}
	}

	//trials
	// public function addItem()
	// {
	// 	$data = array(
	// 		'item_name' => 'Surfd',
	// 		'item_quantity' => '50',
	// 		'item_cost' => '6',
	// 		'item_lowest_price' => '8',
	// 		'item_selling_price' => '8',

	// 	);
	// 	if ($this->DatabaseModel->addItem($data)) {
	// 		echo 'item added';
	// 	} else {
	// 		echo 'item not added';
	// 	}
	// }

	// public function addService()
	// {
	// 	$data = array(
	// 		'service_name' => 'Superwash',
	// 		'washing' => '1',
	// 		'drying' => '0',
	// 		'washing_price' => '80',
	// 		'drying_price' => '80',
	// 	);
	// 	if ($this->DatabaseModel->addService($data)) {
	// 		echo 'Service added';
	// 	} else {
	// 		echo 'Service not added';
	// 	}
	// }

	// public function saveCustomerTransaction()
	// {
	// 	if ($this->employeeId != 0) {
	// 		$data = array(
	// 			'customer_alias' => 'Diero',
	// 			'employee_id' => $_SESSION['employee_id'],
	// 			'machine_id_list' => '1 200',
	// 			'item_id_list' => '1 3 30:2 5 60',
	// 			'transaction_payment' => '159',
	// 			'transaction_datetime' => date('m/d/Y h:i:s a', time())
	// 		);
	// 		if ($this->DatabaseModel->addCustomer($data)) {
	// 			echo 'transaction saved';
	// 		} else {
	// 			echo 'transaction failed';
	// 		}
	// 	} else {
	// 		echo 'No employee Logged in';
	// 	}
	// }

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
			echo "$list $value[employee] $value[machine_used] $value[items_bought] $value[total_payment] $value[date]<br>";
		}
	}


	//MIXED VIEWS AND MODELS
	public function login()
	{
		$data = array(
			'username' => $_POST['username'],
			'password' => $_POST['password']
		);
		$data['login'] = '';

		$data = $this->DatabaseModel->login($data);
		if ($data['login'] == 'manager') {
			$_SESSION['user_data'] = $data;
			$this->manager('main');
		} else if ($data['login'] == 'employee') {
			$_SESSION['user_data'] = $data;
			$this->employee('main');
		} else {
			$this->index();
		}
	}

	//VIEWS
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('login');
		$this->load->view('layout/footer');
	}

	public function employee($query)
	{
		$_SESSION['user_data'] = $this->DatabaseModel->updateData($_SESSION['user_data']);
		$this->load->view('layout/header');
		switch ($query) {
			case 'main':
				break;
			case 'error':
				break;
			default:
				break;
		}
		$this->load->view('employee_view', $_SESSION['user_data']);
		$this->load->view('layout/footer');
	}

	public function manager($query)
	{
		$_SESSION['user_data'] = $this->DatabaseModel->updateData($_SESSION['user_data']);
		$data = array();
		$this->load->view('layout/header');
		$this->load->view('manager_view', $_SESSION['user_data']);
		switch ($query) {
			case 'main':
				break;
			case 'error':
				break;
			case 'addEmployee':
				$this->load->view('forms/addEmployee');
				break;
			case 'saveEmployee':
				$data = array(
					'employee_username' => $_POST['employee_username'],
					'employee_password' => $_POST['employee_password'],
					'name' => $_POST['employee_name'],
					'employee_salary' => $_POST['employee_salary']
				);
				if ($this->addData('employee', $data)) {
					$info = array('text' => 'Employee Added');
					$this->load->view('info/insert', $info);
				} else {
					$this->load->view('warning/employee_not_added');
				}
				break;
			case 'addItem':
				break;
			default:
				break;
		}
		$this->load->view('layout/footer');
	}
}
