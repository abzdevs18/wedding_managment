<?php
/**
 * Pages
 */
class Pages extends Controller
{
	
	function __construct()
	{
		if (file_exists( dirname(__FILE__) . '/../configs/config.php')) {
			$this->userModel = $this->model('user');
			$this->adminModel = $this->model('admins');
			if (!$this->adminModel->isAdminFound()) {
				redirect('admin/sf_admin');
			}
		}else {
			setupRedirect('admin');
			die();
		}
	}

	public function index(){
		$this->view('pages/index');
	}

	public function about(){
		$data = [
			'title' => 'Fuckkkkk'
		];

		$this->view('pages/about', $data);
	}

	public function signup(){
		$data = [
			'title' => 'Signup'
		];

		$this->view('pages/signup', $data);
	}

	public function login(){
		$data = [
			'title' => 'Login'
		];

		$this->view('pages/login', $data);
	}

}