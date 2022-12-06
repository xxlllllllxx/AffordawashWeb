<?php
class DatabaseModel extends CI_Model
{
    public function signup($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function login($data)
    {
        //check tbl_manager
        //check tbl_employee
        $data['is_logged_in'] = true;
        $data['acc_type'] = 'manager';
        return $data;
    }
}
