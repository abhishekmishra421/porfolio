<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_about() {
        $query = $this->db->limit(1)->get('about');
        return $query->row();
    }

    public function update_about($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('about', $data);
    }

    public function save_about($data) {
        return $this->db->insert('about', $data);
    }
}
