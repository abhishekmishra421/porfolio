<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_settings() {
        $query = $this->db->get('settings');
        return $query->row();
    }

    public function update_settings($data) {
        return $this->db->update('settings', $data);
    }
}