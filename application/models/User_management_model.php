<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_management_model extends CI_Model
{
    //
    public function getAllUserT($limit, $start)
    {
        return  $this->db->get('user', $limit, $start)->result_array();
    }

    public function countAllUserT()
    {
        return  $this->db->get('user')->num_rows();
    }
    //

    public function deleteDatauser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function editDataUser()
    {
        $editemail = htmlspecialchars($this->input->post('editemail', true));
        if (!empty($this->input->post('editpassword'))) {
            $data['password'] = password_hash($this->input->post('editpassword'), PASSWORD_DEFAULT);
        }
        $data = array(
            'name' => htmlspecialchars($this->input->post('editname', true)),
            'email' => htmlspecialchars($editemail),
            'role_id' => $this->input->post('editrole'),
            'is_active' => $this->input->post('editis_active')
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }
}
