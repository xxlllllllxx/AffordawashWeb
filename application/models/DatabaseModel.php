<?php
class DatabaseModel extends CI_Model
{
    public function login($data)
    {
        $manager = $this->db->get_where('tbl_manager', ['manager_username' => $data['username']])->row();
        if ($manager) {
            if ($data['password'] == $manager->manager_password) {
                $data['id'] = $manager->id;
                $data['login'] = 'manager';
                $data['password'] = '********';
                $data['name'] = $manager->name;
                $data['title'] = $manager->title;
                $data = $this->updateData($data);
            }
        } else {
            $employee = $this->db->get_where('tbl_employee', ['employee_username' => $data['username']])->row();
            if ($employee) {
                if ($data['password'] == $employee->employee_password) {
                    $data['id'] = $employee->id;
                    $data['login'] = 'employee';
                    $data['password'] = '********';
                    $data['name'] = $employee->name;
                    $data['title'] = 'Employee';
                    $data['salary'] = $employee->employee_salary;
                }
            }
        }
        return $data;
    }

    public function updateData($data)
    {
        $data['employee_count'] = $this->getTblCount('tbl_employee');
        $data['item_count'] = $this->getTblCount('tbl_item');
        $data['service_count'] = $this->getTblCount('tbl_machine');
        return $data;
    }

    // CRUD  
    public function addEmployee($data)
    {
        $this->db->db_debug = false;
        $query = $this->db->insert('tbl_employee', $data);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function addItem($data)
    {
        $this->db->db_debug = false;
        $query = $this->db->insert('tbl_item', $data);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function addService($data)
    {
        $this->db->db_debug = false;
        $query = $this->db->insert('tbl_machine', $data);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function addCustomer($data)
    {
        $this->db->db_debug = false;
        $query = $this->db->insert('tbl_customer_transact', $data);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    public function getEmployeeList()
    {
        $this->db->db_debug = false;
        $query = $this->db->get('tbl_employee');
        $data = null;
        foreach ($query->result() as $employee) {
            $data['list'][$employee->id] = array(
                'id' => $employee->id,
                'name' => $employee->name,
                'username' => $employee->employee_username,
                'salary' => $employee->employee_salary,
                'customer_served' => $this->getEmployeeServedCount($employee->id)
            );
        }
        return $data;
    }

    public function getItemsList()
    {
        $this->db->db_debug = false;
        $query = $this->db->get('tbl_item');
        $data = null;
        foreach ($query->result() as $product) {
            $data['list'][$product->id] = array(
                'id' => $product->id,
                'name' => $product->item_name,
                'quantity' => $product->item_quantity,
                'cost' => $product->item_cost,
                'lowest_price' => $product->item_lowest_price,
                'selling_price' => $product->item_selling_price
            );
        }
        return $data;
    }

    public function getServicesList()
    {
        $this->db->db_debug = false;
        $query = $this->db->get('tbl_machine');
        $data = null;
        foreach ($query->result() as $machine) {
            $data['list'][$machine->id] = array(
                'id' => $machine->id,
                'name' => $machine->service_name,
                'has_wash' => $machine->washing,
                'has_dry' => $machine->drying,
                'wash_price' => ($machine->washing) ? $machine->washing_price : 0,
                'dry_price' => ($machine->drying) ? $machine->drying_price : 0
            );
        }
        return $data;
    }
    public function getCustomerList()
    {
        $this->db->db_debug = false;
        $query = $this->db->get('tbl_customer_transact');
        $data = null;
        foreach ($query->result() as $customer) {
            $data['list'][$customer->id] = array(
                'id' => $customer->id,
                'name' => $customer->customer_alias,
                'employee' => $this->getEmployeeName($customer->employee_id),
                'machine_used' => $this->deconstructMachineUsed($customer->machine_id_list),
                'items_bought' => $this->decunstructItemsBought($customer->item_id_list),
                'total_payment' => $customer->transaction_payment,
                'date' => $customer->transaction_datetime
            );
        }
        return $data;
    }

    public function updateEmployee($data)
    {
        $this->db->db_debug = false;
        $this->db->set('employee_salary', $data['salary']);
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_employee');
        return $this->db->affected_rows();
    }
    public function updateItem($data)
    {
        $this->db->db_debug = false;
        $this->db->set('item_quantity', $data['quantity']);
        $this->db->set('item_cost', $data['cost']);
        $this->db->set('item_lowest_price', $data['lowest_price']);
        $this->db->set('item_selling_price', $data['selling_price']);
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_item');
        return $this->db->affected_rows();
    }

    public function updateService($data)
    {
        $this->db->db_debug = false;
        $this->db->set('washing', $data['washing']);
        $this->db->set('drying', $data['drying']);
        $this->db->set('washing_price', $data['wash_price']);
        $this->db->set('drying_price', $data['dry_price']);
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_machine');
        return $this->db->affected_rows();
    }

    public function updateProfile($data)
    {
        if ($data['login'] == 'manager') {
            $this->db->set('name', $data['name']);
            $this->db->set('manager_username', $data['username']);
            $this->db->set('title', $data['title']);
            $this->db->where('id', $data['id']);
            $this->db->update('tbl_manager');
            return $this->db->affected_rows();
        } else if ($data['login'] == 'employee') {
            $this->db->set('name', $data['name']);
            $this->db->set('employee_username', $data['username']);
            $this->db->where('id', $data['id']);
            $this->db->update('tbl_employee');
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function updatePassword($data)
    {
        if ($data['login'] == 'manager') {
            $this->db->set('manager_password', $data['new_password']);
            $this->db->where(array('id' => $data['id'], 'manager_password' => $data['old_pass']));
            $this->db->update('tbl_manager');
            return $this->db->affected_rows();
        } else if ($data['login'] == 'employee') {
            $this->db->set('employee_password', $data['new_password']);
            $this->db->where(array('id' => $data['id'], 'employee_password' => $data['old_pass']));
            $this->db->update('tbl_employee');
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function delete($table, $id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($table);
    }
    // INTERNAL

    private function getEmployeeName($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_employee');
        foreach ($query->result() as $employee) {
            return $employee->name;
        }
        return 'NO DATA!';
    }

    private function getItemName($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_item');
        foreach ($query->result() as $item) {
            return $item->item_name;
        }
        return 'NO DATA!';
    }

    private function deconstructMachineUsed($str)
    {
        $arr = explode(' ', $str);
        $this->db->where('id', $arr[0]);
        $query = $this->db->get('tbl_machine');
        $str = 'NO DATA!';
        foreach ($query->result() as $machine) {
            $str = $machine->service_name;
        }
        $str = "$str - $arr[1]";
        return $str;
    }

    private function decunstructItemsBought($str)
    {
        $arrs = explode(':', $str);
        $arr2d = null;
        $str = '';
        for ($i = 0; $i < count($arrs); $i++) {
            $arr2d[$i] = explode(' ', $arrs[$i]);
            $str .= $arr2d[$i][1] . ' : ' . $this->getItemName($arr2d[$i][0]) . ' - ' .  $arr2d[$i][2] . '<br>';
        }
        return $str;
    }

    private function getTblCount($tbl)
    {
        $this->db->db_debug = false;
        $query = $this->db->get($tbl);
        if ($query) {
            return count($query->result());
        } else {
            return 0;
        }
    }

    private function getEmployeeServedCount($id)
    {
        $this->db->db_debug = false;
        $this->db->where('employee_id', $id);
        $query = $this->db->get('tbl_customer_transact');
        if ($query) {
            return count($query->result());
        } else {
            return 0;
        }
    }
}
