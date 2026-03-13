<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save_message($data) {
        return $this->db->insert('contact_messages', $data);
    }

    public function get_all_messages() {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('contact_messages');
        return $query->result();
    }

    public function get_message($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('contact_messages');
        return $query->row();
    }

    public function get_recent_messages($limit = 5) {
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('contact_messages');
        return $query->result();
    }

    public function mark_as_read($id) {
        $this->db->where('id', $id);
        return $this->db->update('contact_messages', array('is_read' => 1));
    }

    public function delete_message($id) {
        $this->db->where('id', $id);
        return $this->db->delete('contact_messages');
    }

    public function count_unread() {
        $this->db->where('is_read', 0);
        return $this->db->count_all_results('contact_messages');
    }
}