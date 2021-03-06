<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Public_model');
        $this->load->model('Index_model');
        $this->Public_model->check_login();
	}

	public function index()
	{
		$data['sidebar_active']['Index/index'] = 'active';
		$this->load->view('chenjp.html',$data);
	}

	public function dline()
	{
		$data['sidebar_active']['Index/dline'] = 'active';
        $data['data'] = $this->Index_model->get_account();
		$this->load->view('pwd.html',$data);
	}

	// 用户管理
	public function user()
	{
		$data['sidebar_active']['Index/user'] = 'active';
		$data['data'] = $this->Index_model->user();
		$this->load->view('user/user.html',$data);
	}

	public function user_add()
	{
		$data['sidebar_active']['Index/user'] = 'active';
		$this->load->view('user/add.html',$data);
	}

	public function user_add_bll()
	{
		if ( $_POST['username']&&$_POST['password']&&$_POST['identity'] ) {
			$data = array(
			    'name' => $_POST['username'],
			    'password' => $_POST['password'],
			    'identity' => $_POST['identity'],
			    'time' => time(),
			);
			$this->db->insert('user', $data);
			redirect('Index/user');
		}else{
			$this->Public_model->history_back('数据不能为空');
		}
	}

	// 权限管理
	public function user_permission($userid)
	{
		$data['sidebar_active']['Index/user'] = 'active';
		$data['userid'] = $userid;
		$data['data'] = $this->Index_model->menu();
		$data['menu_permission'] = $this->Index_model->menu_permission_by_userid($userid);
		// var_dump($data['menu_permission']);exit();
		$this->load->view('user/permission.html',$data);
	}

	public function user_permission_bll()
	{
		$menu_id_list = array();
		if ( isset($_POST['menu_id_list']) ) {
			foreach ($_POST['menu_id_list'] as $v) {
				$menu_id_list[$v] = array();
			}
		}
		$menu_id_list = json_encode($menu_id_list);
		$userid = $_POST['userid'];

		$sql = "SELECT * FROM menu_permission WHERE user_id={$userid} LIMIT 1";
        $row = $this->db->query($sql)->row_array();
        if ($row) {
        	// update
        	$sql = "UPDATE 
        			`menu_permission` 
        			SET 
        			`json`='{$menu_id_list}' 
        			WHERE 
        			`user_id`={$userid}";
        	$this->db->query($sql);
        }else{
        	// insert
        	$sql = "INSERT INTO 
        			`menu_permission`
        			(`user_id`, `json`) 
        			VALUES 
        			({$userid},'{$menu_id_list}')";
        	$this->db->query($sql);
        }

		redirect( site_url('Index/user_permission/'.$userid) );
	}


	public function home($value='')
	{
		# code...
	}

	public function setting($value='')
	{
		# code...
	}

	public function help($value='')
	{
		# code...
	}

	

	// 接口管理页面
	public function api()
	{
		$data['sidebar_active']['Index/api'] = 'active';
		$data['data'] = $this->Index_model->get_api();
		$this->load->view('api/api.html', $data);
	}

	public function api_add()
	{
		$data['sidebar_active']['Index/api'] = 'active';
		$this->load->view('api/add.html', $data);
	}

	public function api_detail($id='')
	{
		$data['data'] = $this->Index_model->get_api_detail($id);
		$this->load->view('api/detail.html', $data);
	}

	// 获取api数据
	public function api_json($id='')
	{
		$res = $this->Index_model->get_api_detail($id);
		echo $res['json'];
	}
	public function api_php($id='')
	{
		$res = $this->Index_model->get_api_detail($id);
		var_dump( json_decode($res['json'], true) );
	}

	public function api_json_download($id='')
	{
		$res = $this->Index_model->get_api_detail($id);
		$filename = 'api_'.$id.'.json';
		header('Content-type: application/json');
		header("Content-Disposition: attachment; filename='$filename'");
		echo $res['json'];
	}

	
	public function api_edit($id='')
	{
		$data['sidebar_active']['Index/api'] = 'active';
		$data['data'] = $this->Index_model->get_api_detail($id);
		$data['json'] = json_decode($data['data']['json'], true);
		// var_dump($data['json']);exit();
		$this->load->view('api/edit.html', $data);
	}
	
	public function api_del($id='')
	{
		$this->db->delete('api', array('id' => $id));
		redirect( site_url('Index/api') );
	}


	public function api_bll()
	{
		$data = json_decode($_POST['data'],true);
		if (!$data) {
			$json = array(
				'status'=>0,
				'msg'=>'添加失败，请检查格式是否正确！',
				'data'=>array(),
				);
			echo json_encode($json);
			exit();
		}

		$jsondata = array(
			'status'=>(int)$_POST['status'],
			'msg'=>$_POST['msg'],
			'data'=>$data,
			);

		$data = array(
			'title'=>$_POST['title'],
			'description'=>$_POST['description'],
			'json'=>json_encode($jsondata, JSON_UNESCAPED_UNICODE),
			'time'=>time(),
			);
		$this->db->insert('api', $data);

		$json = array(
			'status'=>1,
			'msg'=>'添加成功',
			'data'=>array(),
			);
		echo json_encode($json);
	}

	public function api_edit_bll()
	{
		$data = json_decode($_POST['data'],true);
		if (!$data) {
			$json = array(
				'status'=>0,
				'msg'=>'编辑失败，请检查格式是否正确！',
				'data'=>array(),
				);
			echo json_encode($json);
			exit();
		}

		$jsondata = array(
			'status'=>(int)$_POST['status'],
			'msg'=>$_POST['msg'],
			'data'=>$data,
			);

		$data = array(
			'title'=>$_POST['title'],
			'description'=>$_POST['description'],
			'json'=>json_encode($jsondata, JSON_UNESCAPED_UNICODE),
			'time'=>time(),
			);
		$this->db->where('id', $_POST['id']);
		$this->db->update('api', $data);

		$json = array(
			'status'=>1,
			'msg'=>'编辑成功',
			'data'=>array(),
			);
		echo json_encode($json);
	}

	// 文章管理
	public function article()
	{
		$data['sidebar_active']['Index/article'] = 'active';
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
