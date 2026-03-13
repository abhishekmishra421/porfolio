<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_portfolio() {
        $this->db->select('portfolio.*, categories.name as category_name, categories.slug as category_slug');
        $this->db->from('portfolio');
        $this->db->join('categories', 'categories.id = portfolio.category_id', 'left');
        $this->db->where('portfolio.is_active', 1);
        $this->db->order_by('portfolio.sort_order', 'ASC');
        $this->db->order_by('portfolio.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_portfolio_admin() {
        $this->db->select('portfolio.*, categories.name as category_name');
        $this->db->from('portfolio');
        $this->db->join('categories', 'categories.id = portfolio.category_id', 'left');
        $this->db->order_by('portfolio.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_featured_portfolio($limit = 6) {
        $this->db->select('portfolio.*, categories.name as category_name, categories.slug as category_slug');
        $this->db->from('portfolio');
        $this->db->join('categories', 'categories.id = portfolio.category_id', 'left');
        $this->db->where('portfolio.is_featured', 1);
        $this->db->where('portfolio.is_active', 1);
        $this->db->order_by('portfolio.sort_order', 'ASC');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_portfolio($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('portfolio');
        return $query->row();
    }

    public function get_portfolio_by_slug($slug) {
        $this->db->select('portfolio.*, categories.name as category_name, categories.slug as category_slug');
        $this->db->from('portfolio');
        $this->db->join('categories', 'categories.id = portfolio.category_id', 'left');
        $this->db->where('portfolio.slug', $slug);
        $this->db->where('portfolio.is_active', 1);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_categories_with_count() {
        $this->db->select('categories.*, COUNT(portfolio.id) as portfolio_count');
        $this->db->from('categories');
        $this->db->join('portfolio', 'portfolio.category_id = categories.id AND portfolio.is_active = 1', 'left');
        $this->db->where('categories.is_active', 1);
        $this->db->group_by('categories.id');
        $this->db->order_by('categories.sort_order', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_related_portfolio($category_id, $current_id, $limit = 4) {
        $this->db->select('portfolio.*, categories.name as category_name, categories.slug as category_slug');
        $this->db->from('portfolio');
        $this->db->join('categories', 'categories.id = portfolio.category_id', 'left');
        $this->db->where('portfolio.category_id', $category_id);
        $this->db->where('portfolio.id !=', $current_id);
        $this->db->where('portfolio.is_active', 1);
        $this->db->order_by('RAND()');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result();
    }

    public function add_portfolio($data) {
        return $this->db->insert('portfolio', $data);
    }

    public function update_portfolio($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('portfolio', $data);
    }

    public function delete_portfolio($id) {
        $this->db->where('id', $id);
        return $this->db->delete('portfolio');
    }

    public function count_all() {
        return $this->db->count_all('portfolio');
    }
}