<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Frontend Routes
$route['about'] = 'home/about';
$route['portfolio'] = 'home/portfolio';
$route['portfolio/(:any)'] = 'home/portfolio_detail/$1';
$route['blog'] = 'home/blog';
$route['blog/(:any)'] = 'home/blog_detail/$1';
$route['contact'] = 'home/contact';
$route['send-message'] = 'home/send_message';

// Admin Routes
$route['admin'] = 'admin/dashboard'; // Change default admin route to dashboard
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/login'] = 'admin/login';
$route['admin/logout'] = 'admin/logout';
$route['admin/settings'] = 'admin/settings';

// Admin CRUD Routes
$route['admin/hero'] = 'admin/hero';
$route['admin/hero_edit/(:num)'] = 'admin/hero_edit/$1';

$route['admin/about'] = 'admin/about';
$route['admin/about_edit'] = 'admin/about_edit';

$route['admin/skills'] = 'admin/skills';
$route['admin/skill_add'] = 'admin/skill_add';
$route['admin/skill_edit/(:num)'] = 'admin/skill_edit/$1';
$route['admin/skill_delete/(:num)'] = 'admin/skill_delete/$1';

$route['admin/services'] = 'admin/services';
$route['admin/service_add'] = 'admin/service_add';
$route['admin/service_edit/(:num)'] = 'admin/service_edit/$1';
$route['admin/service_delete/(:num)'] = 'admin/service_delete/$1';

$route['admin/categories'] = 'admin/categories';
$route['admin/category_add'] = 'admin/category_add';
$route['admin/category_edit/(:num)'] = 'admin/category_edit/$1';
$route['admin/category_delete/(:num)'] = 'admin/category_delete/$1';

$route['admin/portfolio'] = 'admin/portfolio';
$route['admin/portfolio_add'] = 'admin/portfolio_add';
$route['admin/portfolio_edit/(:num)'] = 'admin/portfolio_edit/$1';
$route['admin/portfolio_delete/(:num)'] = 'admin/portfolio_delete/$1';

$route['admin/testimonials'] = 'admin/testimonials';
$route['admin/testimonial_add'] = 'admin/testimonial_add';
$route['admin/testimonial_edit/(:num)'] = 'admin/testimonial_edit/$1';
$route['admin/testimonial_delete/(:num)'] = 'admin/testimonial_delete/$1';

$route['admin/blog'] = 'admin/blog';
$route['admin/blog_add'] = 'admin/blog_add';
$route['admin/blog_edit/(:num)'] = 'admin/blog_edit/$1';
$route['admin/blog_delete/(:num)'] = 'admin/blog_delete/$1';

$route['admin/messages'] = 'admin/messages';
$route['admin/message_view/(:num)'] = 'admin/message_view/$1';
$route['admin/message_delete/(:num)'] = 'admin/message_delete/$1';