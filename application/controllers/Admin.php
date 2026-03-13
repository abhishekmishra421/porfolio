<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Settings_model');
        $this->load->model('Hero_model');
        $this->load->model('About_model');
        $this->load->model('Skill_model');
        $this->load->model('Service_model');
        $this->load->model('Category_model');
        $this->load->model('Portfolio_model');
        $this->load->model('Testimonial_model');
        $this->load->model('Blog_model');
        $this->load->model('Contact_model');
    }

    public function login()
    {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $admin = $this->Admin_model->login($username, $password);

            if ($admin) {
                $session_data = array(
                    'admin_id' => $admin->id,
                    'admin_username' => $admin->username,
                    'admin_email' => $admin->email,
                    'admin_profile_image' => $admin->profile_image,
                    'admin_logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('admin/login');
            }
        }

        $this->load->view('admin/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    public function dashboard()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->data['title'] = 'Dashboard';
        $this->data['total_portfolio'] = $this->Portfolio_model->count_all();
        $this->data['total_blog'] = $this->Blog_model->count_all();
        $this->data['total_messages'] = $this->Contact_model->count_unread();
        $this->data['total_skills'] = $this->Skill_model->count_all();
        $this->data['recent_messages'] = $this->Contact_model->get_recent_messages(5);

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/dashboard', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function settings()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('site_title', 'Site Title', 'required');
        $this->form_validation->set_rules('site_email', 'Site Email', 'required|valid_email');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'site_title' => $this->input->post('site_title'),
                'site_description' => $this->input->post('site_description'),
                'site_keywords' => $this->input->post('site_keywords'),
                'site_email' => $this->input->post('site_email'),
                'site_phone' => $this->input->post('site_phone'),
                'site_address' => $this->input->post('site_address'),
                'facebook_url' => $this->input->post('facebook_url'),
                'twitter_url' => $this->input->post('twitter_url'),
                'linkedin_url' => $this->input->post('linkedin_url'),
                'instagram_url' => $this->input->post('instagram_url'),
                'github_url' => $this->input->post('github_url'),
                'copyright_text' => $this->input->post('copyright_text')
            );

            // Handle logo upload
            if (!empty($_FILES['site_logo']['name'])) {
                $config['upload_path'] = './uploads/settings/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('site_logo')) {
                    $upload_data = $this->upload->data();
                    $data['site_logo'] = $upload_data['file_name'];
                }
            }

            // Handle favicon upload
            if (!empty($_FILES['site_favicon']['name'])) {
                $config['upload_path'] = './uploads/settings/';
                $config['allowed_types'] = 'ico|png';
                $config['max_size'] = 512;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('site_favicon')) {
                    $upload_data = $this->upload->data();
                    $data['site_favicon'] = $upload_data['file_name'];
                }
            }

            if ($this->Settings_model->update_settings($data)) {
                $this->session->set_flashdata('success', 'Settings updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update settings.');
            }

            redirect('admin/settings');
        }

        $this->data['title'] = 'Site Settings';
        $this->data['settings'] = $this->Settings_model->get_settings();

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/settings', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    // Hero Section Management
    public function hero()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->data['title'] = 'Hero Section';
        $this->data['hero'] = $this->Hero_model->get_all_hero();

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/hero/index', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function hero_edit($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'title' => $this->input->post('title'),
                'subtitle' => $this->input->post('subtitle'),
                'description' => $this->input->post('description'),
                'button_text' => $this->input->post('button_text'),
                'button_link' => $this->input->post('button_link'),
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            // Handle background image upload
            if (!empty($_FILES['background_image']['name'])) {
                $config['upload_path'] = './uploads/hero/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 5120;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('background_image')) {
                    $upload_data = $this->upload->data();
                    $data['background_image'] = $upload_data['file_name'];
                }
            }

            // Handle profile image upload
            if (!empty($_FILES['profile_image']['name'])) {
                $config['upload_path'] = './uploads/hero/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('profile_image')) {
                    $upload_data = $this->upload->data();
                    $data['profile_image'] = $upload_data['file_name'];
                }
            }

            if ($this->Hero_model->update_hero($id, $data)) {
                $this->session->set_flashdata('success', 'Hero section updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update hero section.');
            }

            redirect('admin/hero');
        }

        $this->data['title'] = 'Edit Hero Section';
        $this->data['hero'] = $this->Hero_model->get_hero($id);

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/hero/edit', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function about()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->data['title'] = 'About Section';
        $this->data['about'] = $this->About_model->get_about();

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'location' => $this->input->post('location'),
                'degree' => $this->input->post('degree'),
                'freelance' => $this->input->post('freelance'),
                'dob' => $this->input->post('dob'),
                'years_experience' => $this->input->post('years_experience'),
                'projects_completed' => $this->input->post('projects_completed'),
                'happy_clients' => $this->input->post('happy_clients'),
                'bio' => $this->input->post('bio'),
                'description' => $this->input->post('description')
            );

            // Dynamic Image Upload logic for about
            if (!empty($_FILES['profile_image']['name'])) {
                $config['upload_path'] = './uploads/about/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
                $config['max_size'] = 5120;
                $config['encrypt_name'] = TRUE;

                if (!is_dir('./uploads/about')) {
                    mkdir('./uploads/about', 0777, TRUE);
                }

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('profile_image')) {
                    $upload_data = $this->upload->data();
                    $data['profile_image'] = $upload_data['file_name'];
                    
                    if ($this->data['about'] && !empty($this->data['about']->profile_image)) {
                        $old_file = './uploads/about/' . $this->data['about']->profile_image;
                        if (file_exists($old_file)) unlink($old_file);
                    }
                } else {
                    $this->session->set_flashdata('error', 'Image error: '.$this->upload->display_errors());
                }
            }

            // Dynamic Resume Upload logic
            if (!empty($_FILES['resume_file']['name'])) {
                $configCV['upload_path'] = './uploads/about/';
                $configCV['allowed_types'] = 'pdf|doc|docx';
                $configCV['max_size'] = 10240; // 10MB
                $configCV['encrypt_name'] = TRUE;

                $this->load->library('upload', $configCV);
                $this->upload->initialize($configCV);

                if ($this->upload->do_upload('resume_file')) {
                    $upload_dataCV = $this->upload->data();
                    $data['resume_file'] = $upload_dataCV['file_name'];
                    
                    if ($this->data['about'] && !empty($this->data['about']->resume_file)) {
                        $old_cv = './uploads/about/' . $this->data['about']->resume_file;
                        if (file_exists($old_cv)) unlink($old_cv);
                    }
                } else {
                    $this->session->set_flashdata('error', 'CV error: '.$this->upload->display_errors());
                }
            }

            if ($this->data['about']) {
                $this->About_model->update_about($this->data['about']->id, $data);
                $this->session->set_flashdata('success', 'About section updated successfully!');
            } else {
                $this->About_model->save_about($data);
                $this->session->set_flashdata('success', 'About section created successfully!');
            }

            redirect('admin/about');
        }

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        
        if($this->data['about']) {
            $this->load->view('admin/about/edit', $this->data);
        } else {
            $this->load->view('admin/about/add', $this->data);
        }

        $this->load->view('admin/templates/footer', $this->data);
    }

    // Skills Management
    public function skills()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->data['title'] = 'Skills';
        $this->data['skills'] = $this->Skill_model->get_all_skills();

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/skills/index', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function skill_add()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('name', 'Skill Name', 'required');
        $this->form_validation->set_rules('percentage', 'Percentage', 'required|numeric|greater_than[0]|less_than[101]');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $this->input->post('name'),
                'percentage' => $this->input->post('percentage'),
                'category' => $this->input->post('category'),
                'icon' => $this->input->post('icon'),
                'sort_order' => $this->input->post('sort_order'),
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            if ($this->Skill_model->add_skill($data)) {
                $this->session->set_flashdata('success', 'Skill added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to add skill.');
            }

            redirect('admin/skills');
        }

        $this->data['title'] = 'Add Skill';

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/skills/add', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function skill_edit($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('name', 'Skill Name', 'required');
        $this->form_validation->set_rules('percentage', 'Percentage', 'required|numeric|greater_than[0]|less_than[101]');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $this->input->post('name'),
                'percentage' => $this->input->post('percentage'),
                'category' => $this->input->post('category'),
                'icon' => $this->input->post('icon'),
                'sort_order' => $this->input->post('sort_order'),
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            if ($this->Skill_model->update_skill($id, $data)) {
                $this->session->set_flashdata('success', 'Skill updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update skill.');
            }

            redirect('admin/skills');
        }

        $this->data['title'] = 'Edit Skill';
        $this->data['skill'] = $this->Skill_model->get_skill($id);

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/skills/edit', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function skill_delete($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        if ($this->Skill_model->delete_skill($id)) {
            $this->session->set_flashdata('success', 'Skill deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete skill.');
        }

        redirect('admin/skills');
    }

    // Portfolio Management
    public function portfolio()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->data['title'] = 'Portfolio Items';
        $this->data['portfolio'] = $this->Portfolio_model->get_all_portfolio_admin();

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/portfolio/index', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function portfolio_add()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');

        if ($this->form_validation->run() == TRUE) {
            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'description' => $this->input->post('description'),
                'category_id' => $this->input->post('category_id'),
                'client' => $this->input->post('client'),
                'project_date' => $this->input->post('project_date'),
                'project_url' => $this->input->post('project_url'),
                'technologies' => $this->input->post('technologies'),
                'sort_order' => $this->input->post('sort_order'),
                'is_featured' => $this->input->post('is_featured') ? 1 : 0,
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            // Handle featured image upload
            if (!empty($_FILES['featured_image']['name'])) {
                $config['upload_path'] = './uploads/portfolio/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 5120;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('featured_image')) {
                    $upload_data = $this->upload->data();
                    $data['featured_image'] = $upload_data['file_name'];
                }
            }

            // Handle gallery images
            $gallery_images = array();
            if (!empty($_FILES['gallery_images']['name'][0])) {
                $filesCount = count($_FILES['gallery_images']['name']);

                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['file']['name'] = $_FILES['gallery_images']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['gallery_images']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['gallery_images']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['gallery_images']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['gallery_images']['size'][$i];

                    $config['upload_path'] = './uploads/portfolio/gallery/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 5120;
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('file')) {
                        $upload_data = $this->upload->data();
                        $gallery_images[] = $upload_data['file_name'];
                    }
                }

                if (!empty($gallery_images)) {
                    $data['gallery_images'] = json_encode($gallery_images);
                }
            }

            if ($this->Portfolio_model->add_portfolio($data)) {
                $this->session->set_flashdata('success', 'Portfolio item added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to add portfolio item.');
            }

            redirect('admin/portfolio');
        }

        $this->data['title'] = 'Add Portfolio Item';
        $this->data['categories'] = $this->Category_model->get_all_categories();

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/portfolio/add', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function portfolio_edit($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');

        if ($this->form_validation->run() == TRUE) {
            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'description' => $this->input->post('description'),
                'category_id' => $this->input->post('category_id'),
                'client' => $this->input->post('client'),
                'project_date' => $this->input->post('project_date'),
                'project_url' => $this->input->post('project_url'),
                'technologies' => $this->input->post('technologies'),
                'sort_order' => $this->input->post('sort_order'),
                'is_featured' => $this->input->post('is_featured') ? 1 : 0,
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            // Handle featured image upload
            if (!empty($_FILES['featured_image']['name'])) {
                $config['upload_path'] = './uploads/portfolio/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 5120;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('featured_image')) {
                    $upload_data = $this->upload->data();
                    $data['featured_image'] = $upload_data['file_name'];

                    // Delete old image
                    $old_image = $this->Portfolio_model->get_portfolio($id)->featured_image;
                    if ($old_image && file_exists('./uploads/portfolio/' . $old_image)) {
                        unlink('./uploads/portfolio/' . $old_image);
                    }
                }
            }

            // Handle gallery images
            if (!empty($_FILES['gallery_images']['name'][0])) {
                $gallery_images = array();
                $filesCount = count($_FILES['gallery_images']['name']);

                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['file']['name'] = $_FILES['gallery_images']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['gallery_images']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['gallery_images']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['gallery_images']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['gallery_images']['size'][$i];

                    $config['upload_path'] = './uploads/portfolio/gallery/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 5120;
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('file')) {
                        $upload_data = $this->upload->data();
                        $gallery_images[] = $upload_data['file_name'];
                    }
                }

                if (!empty($gallery_images)) {
                    // Get existing gallery images
                    $portfolio = $this->Portfolio_model->get_portfolio($id);
                    $existing_images = json_decode($portfolio->gallery_images, true);

                    if (is_array($existing_images)) {
                        $gallery_images = array_merge($existing_images, $gallery_images);
                    }

                    $data['gallery_images'] = json_encode($gallery_images);
                }
            }

            if ($this->Portfolio_model->update_portfolio($id, $data)) {
                $this->session->set_flashdata('success', 'Portfolio item updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update portfolio item.');
            }

            redirect('admin/portfolio');
        }

        $this->data['title'] = 'Edit Portfolio Item';
        $this->data['portfolio'] = $this->Portfolio_model->get_portfolio($id);
        $this->data['categories'] = $this->Category_model->get_all_categories();

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/portfolio/edit', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function portfolio_delete($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        // Get portfolio to delete images
        $portfolio = $this->Portfolio_model->get_portfolio($id);

        if ($portfolio) {
            // Delete featured image
            if ($portfolio->featured_image && file_exists('./uploads/portfolio/' . $portfolio->featured_image)) {
                unlink('./uploads/portfolio/' . $portfolio->featured_image);
            }

            // Delete gallery images
            $gallery_images = json_decode($portfolio->gallery_images, true);
            if (is_array($gallery_images)) {
                foreach ($gallery_images as $image) {
                    if (file_exists('./uploads/portfolio/gallery/' . $image)) {
                        unlink('./uploads/portfolio/gallery/' . $image);
                    }
                }
            }
        }

        if ($this->Portfolio_model->delete_portfolio($id)) {
            $this->session->set_flashdata('success', 'Portfolio item deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete portfolio item.');
        }

        redirect('admin/portfolio');
    }

    // Blog Management
    public function blog()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->data['title'] = 'Blog Posts';
        $this->data['posts'] = $this->Blog_model->get_all_posts_admin();

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/blog/index', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function blog_add()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == TRUE) {
            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'content' => $this->input->post('content'),
                'excerpt' => $this->input->post('excerpt'),
                'author' => $this->input->post('author'),
                'is_featured' => $this->input->post('is_featured') ? 1 : 0,
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            // Handle featured image upload
            if (!empty($_FILES['featured_image']['name'])) {
                $config['upload_path'] = './uploads/blog/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 5120;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('featured_image')) {
                    $upload_data = $this->upload->data();
                    $data['featured_image'] = $upload_data['file_name'];
                }
            }

            if ($this->Blog_model->add_post($data)) {
                $this->session->set_flashdata('success', 'Blog post added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to add blog post.');
            }

            redirect('admin/blog');
        }

        $this->data['title'] = 'Add Blog Post';

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/blog/add', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function blog_edit($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == TRUE) {
            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'content' => $this->input->post('content'),
                'excerpt' => $this->input->post('excerpt'),
                'author' => $this->input->post('author'),
                'is_featured' => $this->input->post('is_featured') ? 1 : 0,
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            // Handle featured image upload
            if (!empty($_FILES['featured_image']['name'])) {
                $config['upload_path'] = './uploads/blog/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 5120;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('featured_image')) {
                    $upload_data = $this->upload->data();
                    $data['featured_image'] = $upload_data['file_name'];

                    // Delete old image
                    $old_image = $this->Blog_model->get_post($id)->featured_image;
                    if ($old_image && file_exists('./uploads/blog/' . $old_image)) {
                        unlink('./uploads/blog/' . $old_image);
                    }
                }
            }

            if ($this->Blog_model->update_post($id, $data)) {
                $this->session->set_flashdata('success', 'Blog post updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update blog post.');
            }

            redirect('admin/blog');
        }

        $this->data['title'] = 'Edit Blog Post';
        $this->data['post'] = $this->Blog_model->get_post($id);

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/blog/edit', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function blog_delete($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        // Get post to delete image
        $post = $this->Blog_model->get_post($id);

        if ($post && $post->featured_image && file_exists('./uploads/blog/' . $post->featured_image)) {
            unlink('./uploads/blog/' . $post->featured_image);
        }

        if ($this->Blog_model->delete_post($id)) {
            $this->session->set_flashdata('success', 'Blog post deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete blog post.');
        }

        redirect('admin/blog');
    }

    // Messages Management
    public function messages()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->data['title'] = 'Contact Messages';
        $this->data['messages'] = $this->Contact_model->get_all_messages();

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/messages/index', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function message_view($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        // Mark as read
        $this->Contact_model->mark_as_read($id);

        $this->data['title'] = 'View Message';
        $this->data['message'] = $this->Contact_model->get_message($id);

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/messages/view', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function message_delete($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        if ($this->Contact_model->delete_message($id)) {
            $this->session->set_flashdata('success', 'Message deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete message.');
        }
        redirect('admin/messages');
    }

    public function about_edit()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'title' => $this->input->post('title'),
                'subtitle' => $this->input->post('subtitle'),
                'description' => $this->input->post('description'),
                'experience_years' => $this->input->post('experience_years'),
                'completed_projects' => $this->input->post('completed_projects'),
                'happy_clients' => $this->input->post('happy_clients'),
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            // Handle image upload
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path'] = './uploads/about/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 5120;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $upload_data = $this->upload->data();
                    $data['image'] = $upload_data['file_name'];
                }
            }

            if ($this->About_model->update_about(1, $data)) {
                $this->session->set_flashdata('success', 'About section updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update about section.');
            }

            redirect('admin/about');
        }

        $this->data['title'] = 'Edit About Section';
        $this->data['about'] = $this->About_model->get_about();

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/about/edit', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    // Services Management
    public function services()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->data['title'] = 'Services';
        $this->data['services'] = $this->Service_model->get_all_services();

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/services/index', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function service_add()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'icon' => $this->input->post('icon'),
                'sort_order' => $this->input->post('sort_order'),
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            if ($this->Service_model->add_service($data)) {
                $this->session->set_flashdata('success', 'Service added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to add service.');
            }

            redirect('admin/services');
        }

        $this->data['title'] = 'Add Service';

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/services/add', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function service_edit($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'icon' => $this->input->post('icon'),
                'sort_order' => $this->input->post('sort_order'),
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            if ($this->Service_model->update_service($id, $data)) {
                $this->session->set_flashdata('success', 'Service updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update service.');
            }

            redirect('admin/services');
        }

        $this->data['title'] = 'Edit Service';
        $this->data['service'] = $this->Service_model->get_service($id);

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/services/edit', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function service_delete($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        if ($this->Service_model->delete_service($id)) {
            $this->session->set_flashdata('success', 'Service deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete service.');
        }

        redirect('admin/services');
    }

    // Categories Management
    public function categories()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->data['title'] = 'Categories';
        $this->data['categories'] = $this->Category_model->get_all_categories();

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/categories/index', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function category_add()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == TRUE) {
            $slug = url_title($this->input->post('name'), 'dash', TRUE);

            $data = array(
                'name' => $this->input->post('name'),
                'slug' => $slug,
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            if ($this->Category_model->add_category($data)) {
                $this->session->set_flashdata('success', 'Category added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to add category.');
            }

            redirect('admin/categories');
        }

        $this->data['title'] = 'Add Category';

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/categories/add', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function category_edit($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == TRUE) {
            $slug = url_title($this->input->post('name'), 'dash', TRUE);

            $data = array(
                'name' => $this->input->post('name'),
                'slug' => $slug,
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            if ($this->Category_model->update_category($id, $data)) {
                $this->session->set_flashdata('success', 'Category updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update category.');
            }

            redirect('admin/categories');
        }

        $this->data['title'] = 'Edit Category';
        $this->data['category'] = $this->Category_model->get_category($id);

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/categories/edit', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function category_delete($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        if ($this->Category_model->delete_category($id)) {
            $this->session->set_flashdata('success', 'Category deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete category.');
        }

        redirect('admin/categories');
    }

    // Testimonials Management
    public function testimonials()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->data['title'] = 'Testimonials';
        $this->data['testimonials'] = $this->Testimonial_model->get_all_testimonials();

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/testimonials/index', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function testimonial_add()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('client_name', 'Client Name', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'client_name' => $this->input->post('client_name'),
                'client_company' => $this->input->post('company'),
                'client_position' => $this->input->post('position'),
                'testimonial_text' => $this->input->post('content'),
                'rating' => $this->input->post('rating'),
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            // Handle image upload
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path'] = './uploads/testimonials/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $upload_data = $this->upload->data();
                    $data['client_image'] = $upload_data['file_name'];
                }
            }

            if ($this->Testimonial_model->add_testimonial($data)) {
                $this->session->set_flashdata('success', 'Testimonial added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to add testimonial.');
            }

            redirect('admin/testimonials');
        }

        $this->data['title'] = 'Add Testimonial';

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/testimonials/add', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function testimonial_edit($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules('client_name', 'Client Name', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'client_name' => $this->input->post('client_name'),
                'client_company' => $this->input->post('company'),
                'client_position' => $this->input->post('position'),
                'testimonial_text' => $this->input->post('content'),
                'rating' => $this->input->post('rating'),
                'is_active' => $this->input->post('is_active') ? 1 : 0
            );

            // Handle image upload
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path'] = './uploads/testimonials/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $upload_data = $this->upload->data();
                    $data['client_image'] = $upload_data['file_name'];
                    
                    // delete old
                    $old = $this->Testimonial_model->get_testimonial($id)->client_image;
                    if ($old && file_exists('./uploads/testimonials/'.$old)) {
                         unlink('./uploads/testimonials/'.$old);
                    }
                }
            }

            if ($this->Testimonial_model->update_testimonial($id, $data)) {
                $this->session->set_flashdata('success', 'Testimonial updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update testimonial.');
            }

            redirect('admin/testimonials');
        }

        $this->data['title'] = 'Edit Testimonial';
        $this->data['testimonial'] = $this->Testimonial_model->get_testimonial($id);

        $this->load->view('admin/templates/header', $this->data);
        $this->load->view('admin/templates/sidebar', $this->data);
        $this->load->view('admin/testimonials/edit', $this->data);
        $this->load->view('admin/templates/footer', $this->data);
    }

    public function testimonial_delete($id)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        
        $old = $this->Testimonial_model->get_testimonial($id)->image;
        if ($old && file_exists('./uploads/testimonials/'.$old)) {
             unlink('./uploads/testimonials/'.$old);
        }

        if ($this->Testimonial_model->delete_testimonial($id)) {
            $this->session->set_flashdata('success', 'Testimonial deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete testimonial.');
        }

        redirect('admin/testimonials');
    }

}
