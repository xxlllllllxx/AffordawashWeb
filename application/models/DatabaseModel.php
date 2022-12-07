<?php
class DatabaseModel extends CI_Model
{
    public function signup($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function login($data)
    {
        $manager = $this->db->get_where('tbl_manager', ['manager_username' => $data['username']])->row();
        if ($manager) {
            if ($data['password'] == $manager->manager_password) {
                $data['login'] = 'manager';
                $data['password'] = '********';
                $data['name'] = $manager->name;
                $data['title'] = $manager->title;
            }
        } else {
            $employee = $this->db->get_where('tbl_employee', ['employee_username' => $data['username']])->row();
            if ($employee) {
                if ($data['password'] == $employee->employee_password) {
                    $data['login'] = 'employee';
                    $data['password'] = '********';
                    $data['name'] = $employee->name;
                    $data['title'] = 'employee';
                }
            }
        }
        return $data;
    }

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
            $data[$employee->id] = array(
                'name' => $employee->name,
                'username' => $employee->employee_username,
                'salary' => $employee->employee_salary,
                'customer_served' => 0
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
            $data[$product->id] = array(
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
            $data[$machine->id] = array(
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
            $data[$customer->id] = array(
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
        $str = "$str $arr[1]";
        return $str;
    }

    private function decunstructItemsBought($str)
    {
        $arrs = explode(':', $str);
        $arr2d = null;
        $str = 'NO DATA!';
        for ($i = 0; $i < count($arrs); $i++) {
            $arr2d[$i] = explode(' ', $arrs[$i]);
            $str .= $arr2d[$i][1] . ' : ' . $this->getItemName($arr2d[$i][0]) . ' - ' .  $arr2d[$i][2] . '<br>';
        }
        return $str;
    }
}
