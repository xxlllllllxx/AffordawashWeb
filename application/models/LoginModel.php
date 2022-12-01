<?php
class LoginModel extends CI_Model
{
    public function signup($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function login($table, $data)
    {
        $this->db->select('*');
        $query = $this->db->get($table);
        foreach ($query->result_array() as $key => $value) {
            echo implode(' , ', $value);
            echo '<br>';
        }
    }
}
