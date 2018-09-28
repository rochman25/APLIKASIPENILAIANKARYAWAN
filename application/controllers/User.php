<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author zaenu
 */
class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('DataModel');
    }

    function index() {
        $id = $this->session->userdata('nik');
        if (empty($id)) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            $data['periode'] = $this->DataModel->get_data('periode')->result_array();
            $data['karyawan'] = $this->DataModel->get_dataWhereNot('karyawan', 'nik', $this->session->userdata('nik'))->result_array();
            $this->load->view('master/dashboard', $data);
        }
    }
    function periode(){
        $periode = $this->input->get('periode');
        $data['karyawan'] = $this->DataModel->get_dataWhereNot('karyawan','nik', $this->session->userdata('nik'))->result_array();
    }
    

    function nilai($nik) {
        $data['karyawan'] = $this->DataModel->get_dataWhere('karyawan', 'nik', $nik)->row();
        $data['penilaian'] = $this->DataModel->get_join('indikator.id,indikator.idKriteria,kriteria.nama,indikator.indikator', 'kriteria', 'indikator', 'kriteria.id = indikator.idKriteria')->result_array();
        $this->load->view('master/dashboard', $data);
    }

    function penilaian($nik) {
        $nilai = $this->input->post('nilai[]');
        $data = $this->DataModel->get_data('indikator')->result_array();
        $result = array();
        foreach ($nilai as $i => $val) {
            $result[] = array(
                'nik' => $nik,
                'nik_penilai' => $this->session->userdata('nik'),
                'idPeriode' => '1',
                'nilai' => $_POST['nilai'][$i],
                'keterangan' => $_POST['indikator'][$i]
            );
        }
        $query = $this->DataModel->insertMultiple('nilai', $result);
        if ($query == FALSE) {
            echo "Data Gagal Dimasukkan";
        } else {
            //echo "dadi cuyyyy";
            redirect(base_url('user/index'));
        }
    }

    function login() {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->form_validation->run() == FALSE) {
            redirect('user/index');
        } else {
            $data = array(
                'username' => $username,
                'password' => $password
            );

            $result = $this->DataModel->Login("karyawan", $data)->row();

            if ($result != null) {
                $id = $result->nik;
                $username = $result->username;
                $level = "user";
                $data_session = array(
                    'nik' => $id,
                    'username' => $username,
                    'level' => $level,
                    'status' => "login"
                );
                //var_dump($data_session);
                $this->session->set_userdata($data_session);
                redirect(base_url('user/index'));
            } else {
                echo "username atau password salah";
                redirect(base_url('user/index'));
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect(base_url('user/index'));
    }

}
