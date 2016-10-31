<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Index_model');
	}

	public function index()
	{
        $data['data'] = $this->Index_model->get_account();
        // var_dump($data['data']);exit();
		$this->load->view('pwd.html',$data);
	}

	public function test()
	{
	}

	// 接口定义页面
	public function define_api()
	{
		$this->load->view('define_api.html');
	}

	// 文章管理
	public function article()
	{
		$this->load->view('article.html');
	}

	public function add_article()
	{
		$this->load->view('article_edit.html');
	}

}
