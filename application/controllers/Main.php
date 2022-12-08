<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DatabaseModel');
		$this->load->library('session');
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
			header('Location: ' . base_url('main/manager/' . $data['name']));
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

	public function manager($query = '')
	{
		$_SESSION['user_data'] = $this->DatabaseModel->updateData($_SESSION['user_data']);
		$this->load->view('layout/header');
		switch ($query) {
			case 'info':
				$this->load->view('info/insert', $_SESSION['info']);
				$this->load->view('manager_view', $_SESSION['user_data']);
				break;
			case 'addEmployee':
				$this->load->view('manager_view', $_SESSION['user_data']);
				$this->load->view('forms/add_employee');
				break;
			case 'addItem':
				$this->load->view('manager_view', $_SESSION['user_data']);
				$this->load->view('forms/add_item');
				break;
			case 'addService':
				$this->load->view('manager_view', $_SESSION['user_data']);
				$this->load->view('forms/add_service');
				break;
			default:
				$this->load->view('manager_view', $_SESSION['user_data']);
				break;
		}
		$this->load->view('layout/footer');
	}

	public function saveEmployee()
	{
		$data = array(
			'employee_username' => $_POST['employee_username'],
			'employee_password' => $_POST['employee_password'],
			'name' => $_POST['employee_name'],
			'employee_salary' => $_POST['employee_salary']
		);
		if ($this->addData('employee', $data)) {
			$_SESSION['info'] = array('text' => "Employee $data[name] added Successfully");
		} else {
			$_SESSION['info'] = array('text' => "Failed to add Employee $data[name]");
		}
		header('Location: ' . base_url('main/manager/info'));
	}

	public function saveItem()
	{
		$data = array(
			'item_name' => $_POST['item_name'],
			'item_quantity' => $_POST['stock'],
			'item_cost' => $_POST['cost'],
			'item_lowest_price' => $_POST['lowest'],
			'item_selling_price' => $_POST['selling']
		);
		if ($this->addData('item', $data)) {
			$_SESSION['info'] = array('text' => "Item $data[name] added Successfully");
		} else {
			$_SESSION['info'] = array('text' => "Failed to add Item $data[name]");
		}
		header('Location: ' . base_url('main/manager/info'));
	}

	public function saveService()
	{
		$data = array(
			'service_name' => $_POST['service_title'],
			'washing' => isset($_POST['wash']) ? $_POST['wash'] : 'false',
			'drying' => isset($_POST['dry']) ? $_POST['dry'] : 'false',
			'washing_price' => isset($_POST['wash_price']) ? (isset($_POST['wash']) ? $_POST['wash_price'] : '0') : '0',
			'drying_price' => isset($_POST['dry_price']) ? (isset($_POST['dry']) ? $_POST['dry_price'] : '0') : '0'
		);
		if ($this->addData('service', $data)) {
			$_SESSION['info'] = array('text' => "Service $data[service_name] added Successfully");
		} else {
			$_SESSION['info'] = array('text' => "Failed to add Service $data[name]");
		}
		header('Location: ' . base_url('main/manager/info'));
	}
}
