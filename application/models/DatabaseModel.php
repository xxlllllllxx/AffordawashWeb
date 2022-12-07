<?php
class DatabaseModel extends CI_Model
{
    public function signup($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function login($data)
    {
        $this->db->query();
        return $data;
    }

    public function addEmployee($data)
    {
        $this->db->db_debug = false;
        $res = $this->db->insert('tbl_employee', $data);
        if (!$res) {
            return false;
        } else {
            return true;
        }
    }

    public function addItem($data)
    {
        $this->db->db_debug = false;
        $res = $this->db->insert('tbl_item', $data);
        if (!$res) {
            return false;
        } else {
            return true;
        }
    }

    public function addService($data)
    {
        $this->db->db_debug = false;
        $res = $this->db->insert('tbl_machine', $data);
        if (!$res) {
            return false;
        } else {
            return true;
        }
    }

    public function addCustomer($data)
    {
        $this->db->db_debug = false;
        $res = $this->db->insert('tbl_customer_transact', $data);
        if (!$res) {
            return false;
        } else {
            return true;
        }
    }

    public function getEmployeeList()
    {
        $this->db->db_debug = false;
        $res = $this->db->get('tbl_employee');
        $data = null;
        foreach ($res->result() as $employee) {
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
        $res = $this->db->get('tbl_item');
        $data = null;
        foreach ($res->result() as $product) {
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
        $res = $this->db->get('tbl_machine');
        $data = null;
        foreach ($res->result() as $machine) {
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
}
