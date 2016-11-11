<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Public_model');
        $this->load->model('Login_model');
	}
 
	public function index()
	{
		$this->load->view('login/index.html');
	}

	public function login()
	{
		$name = $this->input->post('username');
		$password = $this->input->post('password');
		
		if ($name && $password) {
			$sql = "SELECT * FROM `user` 
					WHERE 
					`name`='{$name}' 
					AND 
					`password`='{$password}' LIMIT 1";
			$res = $this->db->query($sql)->row_array();
			if ($res) {
				$this->login_session($res);
				redirect( base_url() );
			}else{
				$this->Public_model->history_back('账号或密码错误');
			}
		}else{
			$this->Public_model->history_back('账号密码不能为空');
		}

	}

	public function login_session($userdata='')
	{
		$_SESSION['login'] = 1; //登陆flag
		$_SESSION['user'] = $userdata;
		// $_SESSION['history_url'] 上次访问记录
	}


}