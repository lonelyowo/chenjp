<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

    // 富文本pics
	public function article_pics()
	{
      	$config['upload_path']      = FCPATH.'uploads/index/article';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['file_name']    = time();

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('picture')){
        	echo '';
        }else{
            $data = $this->upload->data();
            $imgsrc = base_url('uploads/index/article/'.$data['file_name']);
           	echo $imgsrc;
        }
	}

    // 文章内容
    public function article()
    {
        $title = $_POST['title'];
        $article = $_POST['article'];

        $data = array(
            'title' => $title,
            'content' => $article,
            'time' => time(),
        );
        $this->db->insert('article', $data);
        if ($this->db->affected_rows() == 1) {
            $json = array(
            'status'=>1,
            'msg'=>'文章上传成功',
            );
        }else{
            $json = array(
            'status'=>0,
            'msg'=>'文章上传失败',
            );
        }        
        echo json_encode($json);
    }


}