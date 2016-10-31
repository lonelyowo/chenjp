<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        // $this->load->model('Index_model');
	}

	public function article_pics()
	{
		var_dump($_FILE);
		var_dump($_POST);
		exit();
	}


}