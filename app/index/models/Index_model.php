<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Chenjp
 * Date: 2016/9/20
 * Time: 8:38
 */
class Index_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_account(){
        $sql = "SELECT * FROM account";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function user(){
        $sql = "SELECT * FROM user ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function menu_permission()
    {
        $sql = "SELECT * FROM menu_permission ORDER BY id DESC";
        return $this->db->query($sql)->result_array();
    }


    public function get_api(){
        $sql = "SELECT * FROM api ORDER BY id DESC";
        return $this->db->query($sql)->result_array();
    }

    public function get_api_detail($id){
        $sql = "SELECT * FROM api WHERE id={$id} LIMIT 1";
        return $this->db->query($sql)->row_array();
    }

    public function get_article(){
        $sql = "SELECT * FROM article ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_detail_article($id){
        $sql = "SELECT * FROM article WHERE id={$id} LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }


}