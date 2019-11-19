<?php

define("ROOT", "/wedding_cms");
/**
 * Admin Account Controller
 */
class Admin extends Controller
{
	function __construct()
	{

		if (file_exists( dirname(__FILE__) . '/../configs/config.php')) {
			$this->Chem = $this->model('Chem');
			$this->adminModel = $this->model('admins');
			// $this->userModel = $this->model('user');
			if (!isLoggedIn()) {
				if (!$this->adminModel->isAdminFound() || $this->adminModel->connError()) {
					$this->setup();
					die();
				}else{
					$this->login();
					die();
				}
			}
		}else {
			$this->setup();
			die();
		}	
	}

	public function index(){
		$data = [
			"one" => $this->breadcrump('/')
		];
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "home";

		$this->view('admin/index',$data);
	}

	public function calendar(){
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "calendar";

		$this->view('admin/calendar');
	}

	public function flower(){
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "flower";

		$this->view('admin/flower');
	}

	public function food(){
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "food";

		$this->view('admin/food');
	}

	public function attire(){

		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "attire";

		$this->view('admin/attire');
	}

	public function photographer(){
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "photographer";

		$this->view('admin/photographer');
	}

	public function event(){
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "event";

		$this->view('client/event');
	}

	public function login(){
		if (isLoggedIn() && $_SESSION['is_admin'] == 1) {
			$this->view('admin/index');
		}else if(isLoggedIn() && $_SESSION['is_client'] == 1){
			// redirect("dashboard/index");			
			$this->view('admin/index');
		}else{
			$this->view('admin/login');
		}
	}

	public function setup(){
		$this->view('admin/setup/ch_admin');
	}

	public function profile(){
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "profile";

		$this->view('admin/update-prof');
	}

	public function posted(){
		$data = [
			"one" => $this->breadcrump()
		];
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "request";

		$this->view('admin/request',$data);
	}

	public function messenger(){
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "messages";

		$this->view('admin/messages');
	}
	public function vendor(){
		
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				"status" => "",
				"fee" => trim($_POST['fee']),
				"serviceType" => trim($_POST['serviceType']),
				"name" => trim($_POST['name'])
			];
			$photo = array();
			if (isset($_FILES['files']) && !empty($_FILES['files'])) {
				$no_files = count($_FILES["files"]['name']);
				for ($i = 0; $i < $no_files; $i++) {
					array_push($photo,$_FILES["files"]["name"][$i]);
					if ($_FILES["files"]["error"][$i] > 0) {
						echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
					} else {
						if (file_exists($_SERVER['DOCUMENT_ROOT'] . ROOT ."/public/img/test/" . $_FILES["files"]["name"][$i])) {
							echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
						} else {
							move_uploaded_file($_FILES["files"]["tmp_name"][$i], $_SERVER['DOCUMENT_ROOT'] . ROOT ."/public/img/test/" . $_FILES["files"]["name"][$i]);
							echo 'File successfully uploaded : uploads/' . $_FILES["files"]["name"][$i] . ' ';
							
						}
					}
				}
				echo $this->adminModel->vendor($data,$photo);
				// print_r($photo[1]);
				// echo count($photo);
			} else {
				echo 'Please choose at least one file';
			}
		}
	}

	public function privacy(){
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "privacy";

		$this->view('admin/privacy');
	}

	public function logout(){
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);

		$this->view('admin/index');
	}

	public function add_student(){
		$this->view('admin/add_student');
	}

	public function add_user_ad(){
		$this->view('admin/add_user_ad');
	}

	public function form(){
		$brand = $this->Chem->getBrand();
		// $label = $this->Chem->getLabel();
		$category = $this->Chem->getCategory();

		$data = [
			"brand" => $brand,
			// "label" => $label,
			"category" => $category
		];

		$this->view('admin/under_development', $data);
	}

	public function add(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				/*check this first form*/
				"status" => "",
				"category" => trim($_POST['category']),
				"label" => trim($_POST['label']),
				"chemName" => trim($_POST['chemName']),
				"chemWt" => trim($_POST['chemWt']),
				"chemAssay" => trim($_POST['chemAssay']),
				"chemQuantity" => trim($_POST['chemQuantity']),
				"chemExpiration" => trim($_POST['chemExpiration']),
				"chemBrand" => trim($_POST['chemBrand']),
				"chemFormula" => trim($_POST['chemFormula']),
				"note" => trim($_POST['note'])
			];

			$res = $this->Chem->addChemical($data);

			// if ($res) {
			// 	echo $res;
			// }else {
			// 	echo $res;
			// }
			// echo json_encode($data)

			echo $res;
		}else {
			echo "not";
		}
	}

	function breadcrump($delimiter = '/', $home = 'Home'){
		// This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
		$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

		// This will build our "base URL" ... Also accounts for HTTPS :)
		$base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

		// Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
		$breadcrumbs = Array("<a href=\"$base\">$home</a>");

		// Find out the index for the last value in our path array
		$last = end(array_keys($path));

		// Build the rest of the breadcrumbs
		foreach ($path AS $x => $crumb) {
			// Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
			$title = ucwords($crumb);
	
			// If we are not on the last index, then display an <a> tag
			if ($x != $last)
				$breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
			// Otherwise, just display the title (minus)
			else
				$breadcrumbs[] = $title;
		}

		// Build our temporary array (pieces of bread) into one big string :)
		return implode($separator, $breadcrumbs);
	}
}