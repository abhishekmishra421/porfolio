<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_categories()
    {
        $this->db->where('is_active', 1);
        $this->db->order_by('sort_order', 'ASC');
        $query = $this->db->get('categories');
        return $query->result();
    }

    public function get_all_categories_admin()
    {
        $this->db->order_by('sort_order', 'ASC');
        $query = $this->db->get('categories');
        return $query->result();
    }

    public function get_category($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('categories');
        return $query->row();
    }

    public function get_category_by_slug($slug)
    {
        $this->db->where('slug', $slug);
        $query = $this->db->get('categories');
        return $query->row();
    }

    public function add_category($data)
    {
        return $this->db->insert('categories', $data);
    }

    public function update_category($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('categories', $data);
    }

    public function delete_category($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('categories');
    }

    public function count_all()
    {
        return $this->db->count_all('categories');
    }
}
