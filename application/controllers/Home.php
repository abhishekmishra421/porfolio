<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Settings_model');
        $this->load->model('Hero_model');
        $this->load->model('About_model');
        $this->load->model('Skill_model');
        $this->load->model('Service_model');
        $this->load->model('Portfolio_model');
        $this->load->model('Testimonial_model');
        $this->load->model('Blog_model');
        $this->load->model('Contact_model');

        // Get site settings
        $this->data['settings'] = $this->Settings_model->get_settings();
    }

    public function index()
    {
        $this->data['title'] = 'Home - ' . $this->data['settings']->site_title;
        $this->data['hero'] = $this->Hero_model->get_active_hero();
        $this->data['about'] = $this->About_model->get_about();
        $this->data['skills'] = $this->Skill_model->get_all_skills();
        $this->data['services'] = $this->Service_model->get_all_services();
        $this->data['featured_portfolio'] = $this->Portfolio_model->get_featured_portfolio(6);
        $this->data['testimonials'] = $this->Testimonial_model->get_all_testimonials();
        $this->data['latest_blog'] = $this->Blog_model->get_latest_posts(3);

        $this->load->view('frontend/templates/header', $this->data);
        $this->load->view('frontend/home', $this->data);
        $this->load->view('frontend/templates/footer', $this->data);
    }

    public function about()
    {
        $this->data['title'] = 'About - ' . $this->data['settings']->site_title;
        $this->data['about'] = $this->About_model->get_about();
        $this->data['skills'] = $this->Skill_model->get_all_skills();

        $this->load->view('frontend/templates/header', $this->data);
        $this->load->view('frontend/about', $this->data);
        $this->load->view('frontend/templates/footer', $this->data);
    }

    public function portfolio()
    {
        $this->data['title'] = 'Portfolio - ' . $this->data['settings']->site_title;
        $this->data['categories'] = $this->Portfolio_model->get_categories_with_count();
        $this->data['portfolio_items'] = $this->Portfolio_model->get_all_portfolio();

        $this->load->view('frontend/templates/header', $this->data);
        $this->load->view('frontend/portfolio', $this->data);
        $this->load->view('frontend/templates/footer', $this->data);
    }

    public function portfolio_detail($slug)
    {
        $this->data['portfolio'] = $this->Portfolio_model->get_portfolio_by_slug($slug);

        if (empty($this->data['portfolio'])) {
            show_404();
        }

        $this->data['title'] = $this->data['portfolio']->title . ' - ' . $this->data['settings']->site_title;
        $this->data['related_portfolio'] = $this->Portfolio_model->get_related_portfolio($this->data['portfolio']->category_id, $this->data['portfolio']->id, 4);

        $this->load->view('frontend/templates/header', $this->data);
        $this->load->view('frontend/portfolio_detail', $this->data);
        $this->load->view('frontend/templates/footer', $this->data);
    }

    public function blog()
    {
        $this->data['title'] = 'Blog - ' . $this->data['settings']->site_title;
        $this->data['posts'] = $this->Blog_model->get_all_posts();

        $this->load->view('frontend/templates/header', $this->data);
        $this->load->view('frontend/blog', $this->data);
        $this->load->view('frontend/templates/footer', $this->data);
    }

    public function blog_detail($slug)
    {
        $this->data['post'] = $this->Blog_model->get_post_by_slug($slug);

        if (empty($this->data['post'])) {
            show_404();
        }

        // Update view count
        $this->Blog_model->update_views($this->data['post']->id);

        $this->data['title'] = $this->data['post']->title . ' - ' . $this->data['settings']->site_title;
        $this->data['recent_posts'] = $this->Blog_model->get_recent_posts(5, $this->data['post']->id);

        $this->load->view('frontend/templates/header', $this->data);
        $this->load->view('frontend/blog_detail', $this->data);
        $this->load->view('frontend/templates/footer', $this->data);
    }

    public function contact()
    {
        $this->data['title'] = 'Contact - ' . $this->data['settings']->site_title;

        $this->load->view('frontend/templates/header', $this->data);
        $this->load->view('frontend/contact', $this->data);
        $this->load->view('frontend/templates/footer', $this->data);
    }

    public function send_message()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('contact');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message')
            );

            if ($this->Contact_model->save_message($data)) {
                $this->session->set_flashdata('success', 'Your message has been sent successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to send message. Please try again.');
            }

            redirect('contact');
        }
    }
}