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
		$data['sidebar_active']['index'] = 'active';
        $data['data'] = $this->Index_model->get_account();
		$this->load->view('pwd.html',$data);
	}

	// 接口定义页面
	public function api()
	{
		$data['sidebar_active']['api'] = 'active';
		$this->load->view('api.html', $data);
	}

	// 文章管理
	public function article()
	{
		$data['sidebar_active']['article'] = 'active';
		$data['data'] = $this->Index_model->get_article();
		$this->load->view('article.html', $data);
	}

	public function add_article()
	{
		$this->load->view('add_article.html');
	}

	public function article_del($id)
	{
		$this->db->delete('article', array('id' => $id));
		redirect( site_url('Index/article') );
	}

	public function article_detail($id)
	{
		$data['data'] = $this->Index_model->get_detail_article($id);
		$this->load->view('article_detail.html', $data);
	}

	// 文章修改
	public function article_edit($id)
	{
		$data['data'] = $this->Index_model->get_detail_article($id);
		$this->load->view('article_edit.html', $data);
	}


}
