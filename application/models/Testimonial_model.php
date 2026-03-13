<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_testimonials()
    {
        $this->db->where('is_active', 1);
        $this->db->order_by('sort_order', 'ASC');
        $query = $this->db->get('testimonials');
        return $query->result();
    }

    public function get_all_testimonials_admin()
    {
        $this->db->order_by('sort_order', 'ASC');
        $query = $this->db->get('testimonials');
        return $query->result();
    }

    public function get_testimonial($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('testimonials');
        return $query->row();
    }

    public function add_testimonial($data)
    {
        return $this->db->insert('testimonials', $data);
    }

    public function update_testimonial($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('testimonials', $data);
    }

    public function delete_testimonial($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('testimonials');
    }

    public function count_all()
    {
        return $this->db->count_all('testimonials');
    }
}
