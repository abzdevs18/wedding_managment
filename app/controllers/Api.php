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
		$this->adminModel = $this->model('admins');
		$this->eventModel = $this->model('event');
		$this->userModel = $this->model('user');
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

	

	public function signin(){
		$emptyObject = (object) array();

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$pas = SECURE_SALT . trim($_POST['uPassword']);
			$data = [
				//user user type later to add certain data if a user is employeer
				"status" => "",
				"uNameEmail" => trim($_POST['uNameEmail']),
				"uPassword" => trim($_POST['uPassword']),
				"uNameEmail_err" => "",
				"uPassword_err" => ""
			];

			// email validation
			if (empty($data['uNameEmail'])) {
				$data['uNameEmail_err'] = 'Please enter your email';
			}else {
				//First check if email is use to sign in
				if (filter_var($data['uNameEmail'], FILTER_VALIDATE_EMAIL)) {
					if ($this->userModel->findUserEmail($data['uNameEmail']) == false) {
						// $data['status'] = 0;
						$data['uNameEmail_err'] = "Email/username doesn't exist!";
					}
				}else {
					if (!$this->userModel->findUserName($data['uNameEmail'])) {
						$data['uNameEmail_err'] = "Email/username doesn't exist!";
					}
				}			
			}
			// Password validation
			if (empty($data['uPassword'])) {
				$data['uPassword_err'] = 'Please enter your Password';
			}

			if (empty($data['uNameEmail_err']) && empty($data['uPassword_err'])) {
				$data['uPassword'] = $pas;

				$loggedIn = $this->userModel->login($data['uNameEmail'], $data['uPassword']);
				if ($loggedIn) {
					$data['status'] = 1;
					$this->createUserSession($loggedIn);
					// var_dump($loggedIn);
					$arr = [
						"data" => $data,
						"row" => $loggedIn
					];
					// $arr = array('status' => 1);
					echo json_encode($arr);
				}else{
					$data['status'] = 2;

					$arr = [
						"data" => $data,
						"row" => $emptyObject
					];
					
					echo json_encode($arr);
				}

			} else {
				$data['status'] = 0;
				$arr = [
					"data" => $data,
					"row" => $emptyObject
				];
				echo json_encode($arr);
			}

		} else {
			$data = [
				"status" => "",
				"userName_err" => "",
				"password_err" => "",
				"cpassword_err" => ""
			];
			$this->view("users/signin", $data);
		}
	}
	
	public function clientEventDetails(){

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$userExistEvent = $this->eventModel->checkEvent(trim($_POST['eventId']));
			$bookStatus = $this->eventModel->bookStatus(trim($_POST['eventId']));
			$bookedPhotogVendor = $this->adminModel->bookedPhotogVendor(trim($_POST['eventId']));
			$bookedAttireVendor = $this->adminModel->bookedAttireVendor(trim($_POST['eventId']));
			$bookedFoodVendor = $this->adminModel->bookedFoodVendor(trim($_POST['eventId']));
			$bookedFlowerVendor = $this->adminModel->bookedFlowerVendor(trim($_POST['eventId']));

			$data = [
				"eventData" => $userExistEvent,
				"bookedPhotogVendor" => $bookedPhotogVendor,
				"bookedAttireVendor" => $bookedAttireVendor,
				"bookedFoodVendor" => $bookedFoodVendor,
				"bookedFlowerVendor" => $bookedFlowerVendor,
				"bookStatus" => $bookStatus
			];

			$this->view("client/template/checkEventDetails", $data);
		}
	}

	public function event(){
		// $id = 13;
		$id = trim($_POST['userId']);
		$userExistEvent = $this->eventModel->checkEvent($id);
		$bookStatus = $this->eventModel->bookStatus($id);
		$bookedPhotogVendor = $this->adminModel->bookedPhotogVendor($id);
		$bookedAttireVendor = $this->adminModel->bookedAttireVendor($id);
		$bookedFoodVendor = $this->adminModel->bookedFoodVendor($id);
		$bookedFlowerVendor = $this->adminModel->bookedFlowerVendor($id);

		$data = [
			"eventData" => $userExistEvent,
			"bookedPhotogVendor" => $bookedPhotogVendor,
			"bookedAttireVendor" => $bookedAttireVendor,
			"bookedFoodVendor" => $bookedFoodVendor,
			"bookedFlowerVendor" => $bookedFlowerVendor,
			"bookStatus" => $bookStatus
		];

		echo json_encode($data);
	}

	public function photog(){
		// $id = 13;
		$id = trim($_POST['userId']);
		$bookedPhotogVendor = $this->adminModel->bookedPhotogVendor($id);

		echo json_encode($bookedPhotogVendor);
	}

	public function attire(){
		// $id = 13;
		$id = trim($_POST['userId']);
		$bookedAttireVendor = $this->adminModel->bookedAttireVendor($id);

		echo json_encode($bookedAttireVendor);
	}

	public function food(){
		// $id = 13;
		$id = trim($_POST['userId']);
		$bookedFoodVendor = $this->adminModel->bookedFoodVendor($id);

		echo json_encode($bookedFoodVendor);
	}

	public function flower(){
		// $id = 13;
		$id = trim($_POST['userId']);
		$bookedFlowerVendor = $this->adminModel->bookedFlowerVendor($id);

		echo json_encode($bookedFlowerVendor);
	}

	public function addEvent(){

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$title = trim($_POST['bride']) . ' & ' . trim($_POST['groom']);
			$data = [
				"location" => trim($_POST['location']),
				"budget" => trim($_POST['budget']),
				"title" => $title,
				"bride" => trim($_POST['bride']),
				"groom" => trim($_POST['groom']),
				"start" => trim($_POST['date']),
				"forCount" => trim($_POST['forCount']),
				"sId" => trim($_POST['uId'])
			];
			$event = $this->eventModel->addEventApp($data);
			if($event){
				
			$data = [
				"status" => ""
			];
				if($this->bookEvent($event)){
					$data['status'] = 1;
				}else{
					$data['status'] = 0;
				}
			}else{
				return false;
			}
		}
	}

	public function bookEvent($eventId){

		// if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				"status" => "",
				"eventId" => $eventId
			];
			if($this->eventModel->bookCheck($eventId)){
				$data['status'] = 2;
				echo json_encode($data);
			}else if($this->eventModel->bookEvent($eventId)){
				$data['status'] = 1;
				echo json_encode($data);
			}else{
				$data['status'] = 0;
				echo json_encode($data);
			}
		// }
		
	}
}