<?php

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


}