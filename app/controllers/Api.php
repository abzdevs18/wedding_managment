<?php
/**
 * Pages
 */
class Api extends Controller
{
	private $salt = SECURE_SALT;
	
	function __construct()
	{

		$this->mobile = $this->model('Mobile');
		// $this->userModel = $this->model('UserModel');	

		$this->adminModel = $this->model('admins');
	}
	public function index(){
		echo "J";
	}

	public function messages(){

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$messages = $this->mobile->getMessagesForCurrentUser(trim($_POST['userId']));

			echo json_encode($messages);
		}
    }

	public function getCurrentUserMessages(){

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$latest = $this->adminModel->getLatestMessages(trim($_POST['reciever']),trim($_POST['sender']));

			echo json_encode($latest);
		}
    }

	public function getAcount()
	{
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$userAccount = $this->adminModel->getUsersId(trim($_POST['userId']));

			echo json_encode($userAccount);
		}
	}

	public function setMessage()
	{
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		

			//timezone is set to manila
			date_default_timezone_set('Asia/Manila');
  			// echo date("h:i a");
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			// $time = date("D, M d, g:i A");
			$date = date("M. d, Y");
			$time = date("h:i a");

			$data = [
				"status" => "",
				"sender" => trim($_POST['sender']),
				"receiver" => trim($_POST['receiver']),
				"message" => trim($_POST['message']),
				"sendDate" => $date,
				"sendTime" => $time
			];
			if($this->adminModel->sendMessage($data)){
				$data["status"] = 1;
				echo json_encode($data);
			}
		}
	}
}