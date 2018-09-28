<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataModel
 *
 * @author zaenu
 */
class DataModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_data($table) {
        $query = $this->db->get($table);
        return $query;
    }

    public function get_dataWhere($table, $col, $kondisi) {
        $this->db->where($col, $kondisi);
        $query = $this->db->get($table);
        return $query;
    }

    public function get_dataWhereNot($table, $col, $kondisi) {
        $this->db->where_not_in($col, $kondisi);
        $query = $this->db->get($table);
        return $query;
    }

    function get_join($col, $table1, $table2, $where) {
        $query = $this->db->select($col);
        $query = $this->db->from($table1);
        $query = $this->db->join($table2, $where, 'inner');
        $query = $this->db->get();
        return $query;
    }

    function get_distinct($col, $table) {
        $query = $this->db->distinct();
        $query = $this->db->select($col);
        $query = $this->db->get($table);
        return $query;
    }
    
    function insert($table,$data){
        $query = $this->db->insert($table,$data);
        return $query;
    }
    
    function insertMultiple($table,$data){
        $query = $this->db->insert_batch($table,$data);
        return $query;
    }

    function Login($table, $where) {
        return $this->db->get_where($table, $where);
    }

    public function post_data($table, $data) {
        $query = $this->db->insert($table, $data);
        return $query ? TRUE : FALSE;
    }

}
