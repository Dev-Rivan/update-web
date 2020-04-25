<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    // Pagination Menu
    public function getAllMenu($limit, $start)
    {
        return  $this->db->get('user_menu', $limit, $start)->result_array();
    }

    public function countAllMenu()
    {
        return  $this->db->get('user_menu')->num_rows();
    }   // End Pagination Menu

    //delete menu
    public function deleteDataMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    public function editDataMenu()
    {
        $data = array(
            'menu' => $this->input->post('editmenu')
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }

    // Pagination SubMenu
    public function getAllSubMenu($limit, $start)
    {
        return  $this->db->get('user_sub_menu', $limit, $start)->result_array();
    }

    public function countAllSubMenu()
    {
        return  $this->db->get('user_sub_menu')->num_rows();
    }   // End Pagination SubMenu

    //delete submenu
    public function deleteDataSubmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }

    public function editDataSubMenu()
    {
        $data = array(
            'title' => $this->input->post('edittitle'),
            'menu_id' => $this->input->post('editmenu_id'),
            'url' => $this->input->post('editurl'),
            'icon' => $this->input->post('editicon'),
            'is_active' => $this->input->post('editis_active'),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
    }
}
