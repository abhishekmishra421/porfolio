<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_posts() {
        $this->db->where('is_active', 1);
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('blog');
        return $query->result();
    }

    public function get_all_posts_admin() {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('blog');
        return $query->result();
    }

    public function get_latest_posts($limit = 3) {
        $this->db->where('is_active', 1);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('blog');
        return $query->result();
    }

    public function get_recent_posts($limit = 5, $exclude_id = null) {
        $this->db->where('is_active', 1);
        if($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('blog');
        return $query->result();
    }

    public function get_post($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('blog');
        return $query->row();
    }

    public function get_post_by_slug($slug) {
        $this->db->where('slug', $slug);
        $this->db->where('is_active', 1);
        $query = $this->db->get('blog');
        return $query->row();
    }

    public function add_post($data) {
        return $this->db->insert('blog', $data);
    }

    public function update_post($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('blog', $data);
    }

    public function delete_post($id) {
        $this->db->where('id', $id);
        return $this->db->delete('blog');
    }

    public function update_views($id) {
        $this->db->set('views', 'views+1', FALSE);
        $this->db->where('id', $id);
        return $this->db->update('blog');
    }

    public function count_all() {
        return $this->db->count_all('blog');
    }
}