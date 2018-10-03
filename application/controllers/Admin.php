<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author zaenu
 */
class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('DataModel');
    }

    function index() {
        $id = $this->session->userdata('id');
        if (empty($id)) {
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        } else {
            $data['karyawan'] = $this->DataModel->get_data('karyawan')->result_array();
            $this->load->view('master/dashboard', $data);
        }
    }

    

    function ranking() {
        $this->load->view('master/dashboard');
    }

    function login() {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->form_validation->run() == FALSE) {
            redirect('admin/index');
        } else {
            $data = array(
                'username' => $username,
                'password' => $password
            );

            $result = $this->DataModel->Login("admin", $data)->row();

            if ($result != null) {
                $id = $result->id;
                $username = $result->username;
                $level = $result->level;
                $data_session = array(
                    'id' => $id,
                    'username' => $username,
                    'level' => $level,
                    'status' => "login"
                );
                //var_dump($data_session);
                $this->session->set_userdata($data_session);
                redirect(base_url('admin/index'));
            } else {
                //echo "username atau password salah";
                //set flash data
                redirect(base_url('admin/index'));
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect(base_url('admin/index'));
    }

}
