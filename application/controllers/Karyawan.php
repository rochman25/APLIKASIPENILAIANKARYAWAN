<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Karyawan
 *
 * @author zaenur
 */
class Karyawan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('form_validation');
    }

    function tambah_karyawan() {
        $this->load->view('master/dashboard');
    }

    function edit($id) {
        $data['karyawan'] = $this->DataModel->get_dataWhere('karyawan', 'nik', $id)->row();
        $this->load->view('master/dashboard', $data);
    }

    function addKaryawan() {
        $this->form_validation->set_rules('nik', 'Field Nik', 'required');
        $this->form_validation->set_rules('nama', 'Field Nama', 'required');
        $this->form_validation->set_rules('bagian', 'Field Bagian', 'required');
        $this->form_validation->set_rules('username', 'Field username', 'required');
        $this->form_validation->set_rules('password', 'Field Password', 'required');

        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $bagian = $this->input->post('bagian');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('master/dashboard');
        } else {
            $data = array(
                'nik' => $nik,
                'nama' => $nama,
                'bagian' => $bagian,
                'username' => $username,
                'password' => $password
            );
            $query = $this->DataModel->insert('karyawan', $data);
            if ($query == FALSE) {
                echo "Tambah data gagal";
            } else {
                redirect('admin/index');
            }
        }
    }

    function edit_karyawan($id) {
        $this->form_validation->set_rules('nik', 'Field Nik', 'required');
        $this->form_validation->set_rules('nama', 'Field Nama', 'required');
        $this->form_validation->set_rules('bagian', 'Field Bagian', 'required');
        $this->form_validation->set_rules('username', 'Field username', 'required');
        $this->form_validation->set_rules('password', 'Field Password', 'required');

        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $bagian = $this->input->post('bagian');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('master/dashboard');
        } else {
            $data = array(
                'nama' => $nama,
                'bagian' => $bagian,
                'username' => $username,
                'password' => $password
            );
            $query = $this->DataModel->update('karyawan', 'nik', $id, $data);
            if ($query == FALSE) {
                echo "Edit data gagal";
            } else {
                redirect('admin/index');
            }
        }
    }

    function hapus($id) {
        $hapus = $this->DataModel->delete('karyawan', 'nik', $id);
        if ($hapus == FALSE) {
            echo "error hehe";
        } else {
            redirect('admin/index');
        }
    }

    function importExcel() {
        $this->load->library('PHPExcel');
        $this->load->library('upload');
        $fn = time() . $_FILES['file']['name'];
        $config = array(
            'upload_path' => 'assets/uploads/karyawan',
            'file_name' => $fn,
            'allowed_types' => "xls|xlsx",
            'max_size' => 10000
        );
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {
            echo "error hehe";
            echo $this->upload->display_errors();
        } else {
            $media = $this->upload->data();
            $inputFn = 'assets/uploads/karyawan/' . $media['file_name'];
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFn);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFn);
            } catch (Exception $e) {
                $data['inputerror'][] = 'file';
                $data['error_string'][] = 'Error loading file ' . pathinfo($inputfn, PATHINFO_BASENAME) . '": ' . $e->getMessage();
                $data['status'] = FALSE;
                var_dump($data);
            }
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++) {
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                $query = $this->DataModel->get_dataWhere('karyawan', 'nik', $rowData[0][0])->result();
                if (count($query) > 0) {
                    $data = array(
                        "nama" => $rowData[0][1],
                        "bagian" => $rowData[0][2],
                        "username" => $rowData[0][3],
                        "password" => $rowData[0][4]
                    );
                    $this->DataModel->update('karyawan', 'nik', $rowData[0][0], $data);
                } else {
                    if ($rowData[0][0] == "") {
                        $rowData[0][0] = 1;
                    }
                    $data = array(
                        "nik" => $rowData[0][0],
                        "nama" => $rowData[0][1],
                        "bagian" => $rowData[0][2],
                        "username" => $rowData[0][3],
                        "password" => $rowData[0][4]
                    );
                    $this->DataModel->insert('karyawan', $data);
                }
//                delete_files($media['file_path']);
            }
            redirect(base_url('admin/index'));
        }
    }

    function downloadExcel() {
        $this->load->library('PHPExcel');
        $excel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(17);
    }

}
