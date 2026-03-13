<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('is_active', 1);
        $query = $this->db->get('admins');
        return $query->row();
    }

    public function get_admin($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('admins');
        return $query->row();
    }

    public function update_admin($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('admins', $data);
    }

    public function update_password($id, $password)
    {
        $this->db->where('id', $id);
        return $this->db->update('admins', array('password' => $password));
    }
}
