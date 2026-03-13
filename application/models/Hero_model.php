<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hero_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_hero() {
        $query = $this->db->get('hero_section');
        return $query->result();
    }

    public function get_hero($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('hero_section');
        return $query->row();
    }

    public function get_active_hero() {
        $this->db->where('is_active', 1);
        $this->db->limit(1);
        $query = $this->db->get('hero_section');
        return $query->row();
    }

    public function update_hero($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('hero_section', $data);
    }
}