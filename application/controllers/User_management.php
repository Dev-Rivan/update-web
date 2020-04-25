<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_management extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_management_model', 'User_m');
    }

    public function index()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->where('id !=', 1);
        $data['ur'] = $this->db->get('user_role')->result_array();

        $data['ua'] = $this->db->get('user_active')->result_array();

        // Load Library Pagination
        $this->load->library('pagination');

        // Config Pagination
        $config['base_url'] = 'http://localhost/revisi_project/user_management/index/';
        $config['total_rows'] = $this->User_m->countAllUserT();
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
        $this->db->where('id !=', 1);
        $data['User_T'] = $this->User_m->getAllUserT($config['per_page'], $data['start']);

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('role', 'role', 'required');
        $this->form_validation->set_rules('is_active', 'active', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[confpassword]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('confpassword', 'Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user_management/index', $data);
            $this->load->view('templates/footer');
        } else {
            $email = htmlspecialchars($this->input->post('email', true));
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role'),
                'is_active' => $this->input->post('is_active'),
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', 'New user added!');
            redirect('user_management');
        }
    }

    public function delete_user($id)
    {
        $this->User_m->deleteDatauser($id);
        $this->session->set_flashdata('message', 'Delete Success!');
        redirect('user_management');
    }

    public function edit()
    {
        $this->form_validation->set_rules('editname', 'Name', 'required|trim');
        $this->form_validation->set_rules('editemail', 'Email', 'required|trim|valid_email', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('editrole', 'role', 'required');
        $this->form_validation->set_rules('editis_active', 'active', 'required');
        $this->form_validation->set_rules('editpassword', 'Password', 'trim|min_length[4]|matches[editconfpassword]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('editconfpassword', 'Password', 'trim|matches[editpassword]');


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error_message', 'Edit Failed!');
            redirect('user_management');
        } else {
            $this->User_m->editDataUser();
            $this->session->set_flashdata('message', 'Update Success!');
            redirect('user_management');
        }
    }
}
