<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DatabaseModel');
		session_start();
	}

	// REQUEST TO MODEL (SECURED)
	private function addData($table, $rawData)
	{
		$data = $rawData;
		switch ($table) {
			case 'employee':
				return $this->DatabaseModel->addEmployee($data);
			case 'item':
				return $this->DatabaseModel->addItem($data);
			case 'service':
				if ($data['washing'] == 'true' || $data['drying'] == 'true') {
					return $this->DatabaseModel->addService($data);
				} else {
					return false;
				}
			case 'customer':
				return ($_SESSION['user_data']['login'] == 'employee' && $this->DatabaseModel->addCustomer($data));
			default:
				return false;
		}
	}

	private function updateData($query, $rawData)
	{
		$data = $rawData;
		switch ($query) {
			case 'employee':
				return $this->DatabaseModel->updateEmployee($data);
			case 'item':
				return $this->DatabaseModel->updateItem($data);
			case 'service':
				$x = 0;
				if ($data['has_wash'] == 'true') {
					$data['washing'] = 'true';
					$x += 1;
				} else {
					$data['washing'] = 'false';
					$data['wash_price'] = '0';
				}
				if ($data['has_dry'] == 'true') {
					$data['drying'] = 'true';
					$x += 1;
				} else {
					$data['drying'] = 'false';
					$data['dry_price'] = '0';
				}
				if ($x > 0) {
					return $this->DatabaseModel->updateService($data);
				} else {
					return false;
				}
			case 'customer':
				return ($_SESSION['user_data']['login'] == 'employee' && $this->DatabaseModel->updateCustomer($data));
			case 'profile':
				if ($this->DatabaseModel->updateProfile($data)) {
					$_SESSION['user_data']['name'] = $data['name'];
					if ($_SESSION['user_data']['login'] == 'manager') {
						$_SESSION['user_data']['title'] = $data['title'];
					}
					return true;
				} else {
					return false;
				}
			case 'changepass':
				return $this->DatabaseModel->updatePassword($data);
			default:
				return false;
		}
	}

	private function deleteData($table, $id)
	{
		switch ($table) {
			case 'employee':
				return $this->DatabaseModel->delete('tbl_employee', $id);
			case 'item':
				return $this->DatabaseModel->delete('tbl_item', $id);
			case 'service':
				return $this->DatabaseModel->delete('tbl_machine', $id);
			default:
				return false;
		}
	}

	private function getEmployees()
	{
		return $this->DatabaseModel->getEmployeeList();
	}

	private function getItems()
	{
		return  $this->DatabaseModel->getItemsList();
	}

	private function getServices()
	{
		return $this->DatabaseModel->getServicesList();
	}

	private function getCustomerList()
	{
		return $this->DatabaseModel->getCustomerList();
	}

	//REQUEST FROM VIEWS
	public function updateEmployee()
	{
		$data = array(
			'id' => $_POST['id'],
			'salary' => $_POST['salary']
		);
		if ($this->updateData('employee', $data)) {
			$_SESSION['info'] = array('text' => "Employee updated Successfully");
		} else {
			$_SESSION['info'] = array('text' => "Failed to update Employee");
		}
		header('Location: ' . base_url('main/manager/info'));
	}

	public function updateItem()
	{
		$data = array(
			'id' => $_POST['id'],
			'quantity' => $_POST['quantity'],
			'cost' => $_POST['cost'],
			'lowest_price' => $_POST['lprice'],
			'selling_price' => $_POST['sprice']
		);
		if ($this->updateData('item', $data)) {
			$_SESSION['info'] = array('text' => "Item updated Successfully");
		} else {
			$_SESSION['info'] = array('text' => "Failed to update Item");
		}
		header('Location: ' . base_url('main/manager/info'));
	}

	public function updateService()
	{
		$data = array(
			'id' => $_POST['id'],
			'has_wash' => $_POST['has_wash'],
			'has_dry' => $_POST['has_dry'],
			'wash_price' => $_POST['wash_price'],
			'dry_price' => $_POST['dry_price'],
		);
		if ($this->updateData('service', $data)) {
			$_SESSION['info'] = array('text' => "Service updated Successfully");
		} else {
			$_SESSION['info'] = array('text' => "Failed to update Service");
		}
		header('Location: ' . base_url('main/manager/info'));
	}

	public function viewCustomerTransact()
	{
		if ($_SESSION['user_data']['login'] == 'manager') {
			header('location: ' . base_url('main/manager/viewCustomerList'));
		} else if ($_SESSION['user_data']['login'] == 'employee') {
		} else {
			session_destroy();
			header('Location: ' . base_url());
		}
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
	public function profile($query = '')
	{
		if ($_SESSION['user_data']['login'] == 'manager') {
			if ($query == 'save') {
				$data = array(
					'login' => 'manager',
					'id' => $_SESSION['user_data']['id'],
					'name' => $_POST['name'],
					'username' => $_POST['username'],
					'title' => $_POST['title'],
				);
				if ($this->updateData('profile', $data)) {
					$_SESSION['info'] = array('text' => 'Profile Updated Successfully');
				} else {
					$_SESSION['info'] = array('text' => 'Failed to update Profile');
				}
				header('Location: ' . base_url('main/manager/info'));
			} else if ($query == 'back') {
				header('Location: ' . base_url('main/manager'));
			} else {
				$this->load->view('layout/header');
				$this->load->view('manager_view', $_SESSION['user_data']);
				$this->load->view('forms/profile', $_SESSION['user_data']);
				$this->load->view('layout/footer');
			}
		} else if ($_SESSION['user_data']['login'] == 'employee') {
			if ($query == 'save') {
				$data = array(
					'login' => 'employee',
					'id' => $_SESSION['user_data']['id'],
					'name' => $_POST['name'],
					'username' => $_POST['username']
				);
				if ($this->updateData('profile', $data)) {
					$_SESSION['info'] = array('text' => 'Profile Updated Successfully');
				} else {
					$_SESSION['info'] = array('text' => 'Failed to update Profile');
				}
				header('Location: ' . base_url('main/employee/info'));
			} else if ($query == 'back') {
				header('Location: ' . base_url('main/employee'));
			} else {
				$this->load->view('layout/header');
				$this->load->view('employee_view', $_SESSION['user_data']);
				$this->load->view('forms/profile', $_SESSION['user_data']);
				$this->load->view('layout/footer');
			}
		} else {
			session_destroy();
			header('Location: ' . base_url());
		}
	}

	public function delete($list, $id)
	{
		if ($this->deleteData($list, $id)) {
			$_SESSION['info'] = array('text' => 'Delete Success');
		} else {
			$_SESSION['info'] = array('text' => 'Delete Failed');
		}
		header('Location: ' . base_url('main/manager/info'));
	}

	public function changePass($query = '')
	{
		if ($_SESSION['user_data']['login'] == 'manager') {
			if ($query == 'save') {
				if ($_POST['confirmpass'] == $_POST['newpass']) {
					$data = array(
						'login' => 'manager',
						'id' => $_SESSION['user_data']['id'],
						'old_pass' => $_POST['oldpass'],
						'new_password' => $_POST['newpass']
					);
					if ($this->updateData('changepass', $data)) {
						$_SESSION['info'] = array('text' => 'Password Updated Successfully');
					} else {
						$_SESSION['info'] = array('text' => 'Failed to update Password');
					}
				} else {
					$_SESSION['info'] = array('text' => 'New password not matched');
				}
				header('Location: ' . base_url('main/manager/info'));
			} else {
				$this->load->view('layout/header');
				$this->load->view('manager_view', $_SESSION['user_data']);
				$this->load->view('forms/change_pass');
				$this->load->view('layout/footer');
			}
		} else if ($_SESSION['user_data']['login'] == 'employee') {
			if ($query == 'save') {
				if ($_POST['confirmpass'] == $_POST['newpass']) {
					$data = array(
						'login' => 'employee',
						'id' => $_SESSION['user_data']['id'],
						'old_pass' => $_POST['oldpass'],
						'new_password' => $_POST['newpass']
					);
					if ($this->updateData('changepass', $data)) {
						$_SESSION['info'] = array('text' => 'Password Updated Successfully');
					} else {
						$_SESSION['info'] = array('text' => 'Failed to update Password');
					}
				} else {
					$_SESSION['info'] = array('text' => 'New password not matched');
				}
				header('Location: ' . base_url('main/employee/info'));
			} else if ($query == 'back') {
				header('Location: ' . base_url('main/employee'));
			} else {
				$this->load->view('layout/header');
				$this->load->view('employee_view', $_SESSION['user_data']);
				$this->load->view('forms/change_pass');
				$this->load->view('layout/footer');
			}
		} else {
			session_destroy();
			header('Location: ' . base_url());
		}
	}


	// LOGIN CONTROL (MANAGER or EMPLOYEE)
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
			header('Location: ' . base_url());
		}
	}

	public function logout()
	{
		session_destroy();
		header('Location: ' . base_url());
	}



	//VIEWS
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('login');
		$this->load->view('layout/footer');
	}

	public function manager($query = '')
	{
		if (isset($_SESSION['user_data']) && $_SESSION['user_data']['login'] == 'manager') {
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
				case 'viewEmployees':
					$this->load->view('manager_view', $_SESSION['user_data']);
					$this->load->view('list/list_employees', $this->getEmployees());
					break;
				case 'viewItems':
					$this->load->view('manager_view', $_SESSION['user_data']);
					$this->load->view('list/list_items', $this->getItems());
					break;
				case 'viewServices':
					$this->load->view('manager_view', $_SESSION['user_data']);
					$this->load->view('list/list_services', $this->getServices());
					break;
				case 'viewCustomerList':
					$this->load->view('manager_view', $_SESSION['user_data']);
					$this->load->view('list/list_customers', $this->getCustomerList());
					break;
				default:
					$this->load->view('manager_view', $_SESSION['user_data']);
					break;
			}
			$this->load->view('layout/footer');
		} else {
			session_destroy();
			header('Location: ' . base_url());
		}
	}

	public function employee($query = '')
	{
		if (isset($_SESSION['user_data']) && $_SESSION['user_data']['login'] == 'employee') {
			$_SESSION['user_data'] = $this->DatabaseModel->updateData($_SESSION['user_data']);
			$this->load->view('layout/header');
			switch ($query) {
				case 'info':
					$this->load->view('info/insert', $_SESSION['info']);
					$this->load->view('employee_view', $_SESSION['user_data']);
					break;
				default:
					$this->load->view('employee_view', $_SESSION['user_data']);
					break;
			}
			$this->load->view('layout/footer');
		} else {
			session_destroy();
			header('Location: ' . base_url());
		}
	}

	public function about()
	{
		$this->load->view('layout/header');
		$this->load->view('about');
		$this->load->view('layout/footer');
	}
}
