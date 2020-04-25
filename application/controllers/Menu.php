<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // Load Library Pagination
        $this->load->library('pagination');
        // Load Model
        $this->load->model('Menu_model', 'menu_m');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        // Config Pagination
        $config['base_url'] = 'http://localhost/revisi_project/menu/index';
        $config['total_rows'] = $this->menu_m->countAllMenu();
        $config['per_page'] = 5;
        $config['num_links'] = 2;

        // Styling Pagination
        $config['full_tag_open'] = '<nav><ul class="pagination pagination-sm justify-content-end">';
        $config['full_tag_close'] = '</nav></ul>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'next';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        // Initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['Menu'] = $this->menu_m->getAllMenu($config['per_page'], $data['start']);
        //End Pagination

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', 'New menu added!');
            redirect('menu');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('editmenu', 'Edit menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error_message', 'Edit Failed!');
            redirect('menu');
        } else {
            $this->menu_m->editDataMenu();
            $this->session->set_flashdata('message', 'Edit Success!');
            redirect('menu');
        }
    }

    public function delete($id)
    {
        $this->menu_m->deleteDataMenu($id);
        $this->session->set_flashdata('message', 'Delete Success!');
        redirect('menu');
    }

    public function submenu()
    {
        $data['title'] = 'SubMenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['active'] = $this->db->get('user_active')->result_array();

        // Config Pagination
        $config['base_url'] = 'http://localhost/revisi_project/menu/submenu/';
        $config['total_rows'] = $this->menu_m->countAllSubMenu();
        $config['per_page'] = 5;
        $config['num_links'] = 2;

        // Styling Pagination
        $config['full_tag_open'] = '<nav><ul class="pagination pagination-sm justify-content-end">';
        $config['full_tag_close'] = '</nav></ul>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'next';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        // Initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['subMenu'] = $this->menu_m->getAllSubMenu($config['per_page'], $data['start']);
        //End Pagination

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', 'New menu added!');
            redirect('menu/submenu');
        }
    }

    public function editsubmenu()
    {
        $this->form_validation->set_rules('edittitle', 'Title', 'required');
        $this->form_validation->set_rules('editmenu_id', 'Menu', 'required');
        $this->form_validation->set_rules('editurl', 'URL', 'required');
        $this->form_validation->set_rules('editicon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/footer');
            $this->session->set_flashdata('error_message', 'Edit Failed!');
            redirect('menu/submenu');
        } else {
            $this->menu_m->editDataSubMenu();
            $this->session->set_flashdata('message', 'Edit Success!');
            redirect('menu/submenu');
        }
    }

    public function delete_submenu($id)
    {
        $this->menu_m->deleteDataSubmenu($id);
        $this->session->set_flashdata('message', 'Delete Success!');
        redirect('menu/submenu');
    }
}
