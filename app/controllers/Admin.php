<?php

define("ROOT", "");
/**
 * Admin Account Controller
 */
class Admin extends Controller
{
	function __construct()
	{

		if (file_exists( dirname(__FILE__) . '/../configs/config.php')) {
			$this->Chem = $this->model('chem');
			$this->adminModel = $this->model('admins');
			$this->eventModel = $this->model('event');
			$this->userModel = $this->model('user');
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
		if($_SESSION['is_client']){
			redirect('admin/event');
		}
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
		$flower = $this->adminModel->getFlowers();
		$data = [
			"flower" => $flower
		];
		
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "flower";

		$this->view('admin/flower',$data);
	}

	public function food(){
		$food = $this->adminModel->getFoods();
		$data = [
			"food" => $food
		];
		
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "food";

		$this->view('admin/food', $data);
	}

	public function attire(){
		$attire = $this->adminModel->getAttire();
		$data = [
			"attire" => $attire
		];
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "attire";

		$this->view('admin/attire', $data);
	}

	public function photographer(){

		$photog = $this->adminModel->getPhotog();
		$data = [
			"photog" => $photog
		];
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "photographer";

		$this->view('admin/photographer', $data);
	}

	public function confirmBookingVendor(){

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			if($this->adminModel->confirmBookVendor(trim($_POST['eventId']))){
				return true;
			}else{
				return false;
			}
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
		$userExistEvent = $this->eventModel->checkEvent($_SESSION['uId']);
		$bookStatus = $this->eventModel->bookStatus($_SESSION['uId']);
		$bookedPhotogVendor = $this->adminModel->bookedPhotogVendor($_SESSION['uId']);
		$bookedAttireVendor = $this->adminModel->bookedAttireVendor($_SESSION['uId']);
		$bookedFoodVendor = $this->adminModel->bookedFoodVendor($_SESSION['uId']);
		$bookedFlowerVendor = $this->adminModel->bookedFlowerVendor($_SESSION['uId']);
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "event";

		$data = [
			"eventData" => $userExistEvent,
			"bookedPhotogVendor" => $bookedPhotogVendor,
			"bookedAttireVendor" => $bookedAttireVendor,
			"bookedFoodVendor" => $bookedFoodVendor,
			"bookedFlowerVendor" => $bookedFlowerVendor,
			"bookStatus" => $bookStatus
		];

		$this->view('client/event',$data);
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
				"sId" => $_SESSION['uId']
			];
			$event = $this->eventModel->addEvent($data);
			if($event){
				return true;
			}else{
				return false;
			}
		}
		
	}

	public function bookEvent(){

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				"status" => "",
				"eventId" => trim($_POST['eventId'])
			];
			if($this->eventModel->bookCheck($data['eventId'])){
				$data['status'] = 2;
				echo json_encode($data);
			}else if($this->eventModel->bookEvent($data['eventId'])){
				$data['status'] = 1;
				echo json_encode($data);
			}else{
				$data['status'] = 0;
				echo json_encode($data);
			}
		}
		
	}

	public function confirmBookEvent(){

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				"bookingId" => trim($_POST['bookingId'])
			];
			if($this->eventModel->confirmBookEvent($data['bookingId'])){
				return true;
			}else{
				return false;
			}
		}
		
	}

	public function deleteBookEvent(){

		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				"eventId" => trim($_POST['eventId'])
			];
			if($this->eventModel->deleteBookEvent($data['eventId'])){
				return true;
			}else{
				return false;
			}
		}
		
	}

	public function login(){
		if (isLoggedIn() && $_SESSION['is_admin'] == 1) {
			$this->view('admin/index');
		}else if(isLoggedIn() && $_SESSION['is_client'] == 1){
			// redirect("dashboard/index");			
			unset($_SESSION['menu_active']);
			$_SESSION['menu_active'] = "event";
			$this->view('client/event');
		}else{
			$this->view('pages/login');
			//below login for the Supper Admin during the first execution
			// $this->view('admin/login');
		}
	}

	public function setup(){
		$this->view('admin/setup/ch_admin');
	}

	public function profile(){
		$userInfo = $this->userModel->userData($_SESSION['uId']);
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "profile";
		$data = [
			"userData" => $userInfo
		];

		$this->view('admin/update-prof', $data);
	}

	public function posted(){
		$book = $this->eventModel->fullBookRequest();
		$data = [
			"bookings" => $book,
			"all" => $book[0]->numberRow,
			"pending" => $book[0]->pending,
			"confirm" => $book[0]->confirm,
			"cancelled" => $book[0]->cancelled,
			"deleted" => $book[0]->deleted,
		];
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "request";

		$this->view('admin/request',$data);
	}

	public function getLatestMessages($receiverId, $senderId){
		$this->db->query("SELECT messages.user_receiver_id AS userId, user.firstname AS firstN, user.lastname AS lastN, messages.user_receiver_id AS receiverId, messages.user_sender_id AS senderId, messages.msg_content as msgContent, messages.msg_date AS msgDate, user_profile.img_path AS sendIconImage FROM messages LEFT JOIN user ON user.id = messages.user_sender_id LEFT JOIN user_profile ON user_profile.user_id = messages.user_sender_id AND user_profile.profile_status = 1 WHERE (messages.user_receiver_id = :userReceiverId AND messages.user_sender_id = :userSenderId) OR (messages.user_receiver_id = :userSenderId AND messages.user_sender_id = :userReceiverId) ORDER BY messages.timestamp DESC");
		$this->db->bind(":userReceiverId", $receiverId);
		$this->db->bind(":userSenderId", $senderId);
		$row = $this->db->resultSet();
	   if ($row) {
		   return $row;
	   } else {
		   return false;
	   }
	}
    
	public function getUsersId($id) {
		$this->db->query("SELECT user.id AS user_id, user.*,user_email.*,user_location.*,user_phone.*, user_profile.img_path AS img_path FROM user LEFT JOIN user_profile ON user_profile.user_id = user.id AND user_profile.profile_status = 1 LEFT JOIN user_email ON user_email.user_id = user.id LEFT JOIN user_location ON user_location.user_id = user.id LEFT JOIN user_phone ON user_phone.user_id = user.id WHERE NOT EXISTS (SELECT * FROM pending_application WHERE pending_application.user_id = user.id) AND user.id = $id");
        $row = $this->db->resultSet();
		return $row;
	}

	/*Inser Message*/
	public function sendMessage($data){
		$this->db->query("INSERT INTO `messages`(`user_receiver_id`, `user_sender_id`, `msg_content`,`msg_date`) VALUES (:receiver,:sender,:message, :sendDate)");
		$this->db->bind(":receiver", $data['receiver']);
		$this->db->bind(":sender", $data['sender']);
		$this->db->bind(":message", $data['message']);
		$this->db->bind(":sendDate", $data['sendDate']);

		if ($this->db->execute()) {
			return true;
		}else{
			return false;
		}
	}

	public function messenger(){
		$listMsgUser = $this->adminModel->getUserMsg($_SESSION['uId']);
		$iL = $this->adminModel->getLatestSender($_SESSION['uId']);
		if($iL){
			$head = $this->adminModel->latestMsgUser($iL[0]->rId);
			$latest = $this->adminModel->getLatestMessages($_SESSION['uId'],$iL[0]->rId);
			$data = [
				"users" => $listMsgUser,
				"latestM" => $latest,
				"header" => $head,
				"usr" => $iL[0]->rId
			];
		}else{
			$data = [

			];
		}
	
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "messages";

		$this->view('admin/messages', $data);
	}
	public function realtimeMsg()
	{
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				"uid" => trim($_POST['uid']),
				"sid" => trim($_POST['sid'])
			];
			$latest = $this->adminModel->getLatestMessages($data['sid'],$data['uid']);
			$data = [
				"latestM" => $latest
			];
			$this->view("admin/templates/msgNodes", $data);
		}
		
	}

	public function getMsgClick(){
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			 $id = trim($_POST['clientId']);

			//  $iL = $this->adminModel->getLatestSender();
			 $head = $this->adminModel->latestMsgUser($id);
			 $latest = $this->adminModel->getLatestMessages($_SESSION['uId'],$id);
			 $data = [
				 "users" => $listMsgUser,
				 "latestM" => $latest,
				 "header" => $head
			 ];
			 $this->view("admin/templates/cusMessages", $data);
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
				"sender" => trim($_POST['sessionId']),
				"receiver" => trim($_POST['clientId']),
				"message" => trim($_POST['msgContent']),
				"sendDate" => $date,
				"sendTime" => $time
			];
			if($this->adminModel->sendMessage($data)){
				$data["status"] = 1;
				echo json_encode($data);
			}
		}
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
								$data['status'] = 0;
						} else {
							move_uploaded_file($_FILES["files"]["tmp_name"][$i], $_SERVER['DOCUMENT_ROOT'] . ROOT ."/public/img/test/" . $_FILES["files"]["name"][$i]);
							$data['status'] = 2;
						}
					}
				}
				if($data['status'] == 2){
					// If the upload to the server is successful STATUS 2, only then we execute a insert query to the database
					if($this->adminModel->vendor($data,$photo)){
						$data['status'] = 1;
					}
				}
			} else {
				if($this->adminModel->vendor($data,$photo)){
					$data['status'] = 1;
				}
			}
			echo json_encode($data);
		}
	}

	public function getSamples()
	{
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$id = trim($_POST['uid']);

			$data = [
				"samples" => ""
			];

			$images = $this->adminModel->getSamples($id);
			// if($images){
				$data['samples'] = $images;
				$this->view("admin/templates/sampleSlider", $data);
			// }else{
			// 	echo 'dd';
			// }

		}
	}
	public function getSorted()
	{
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$service = trim($_POST['serviceId']);
			$sort = trim($_POST['sortVal']);

			$data = [
				"data" => ""
			];

			if($sort == 1){
				$rows = $this->adminModel->orderByTime($service);
				$data['data'] = $rows;
			}else if($sort == 2){
				$rows = $this->adminModel->orderByPrice($service);
				$data['data'] = $rows;
			}
			// if($images){
				$this->view("admin/templates/sortTime", $data);
			// }else{
			// 	echo 'dd';
			// }

		}
	}
	public function hireVendor()
	{
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				"status" => "",
				"vendorId" => trim($_POST['vendorId']),
				"userId" => $_SESSION['uId']
			];

			if($this->adminModel->checkBookedVendor($data)){
				$data['status'] = 2;
			}elseif($this->eventModel->bookVendor($data)){
					$data['status'] = 1;
					// echo json_encode($data);
			}else{
				$data['status'] = 0;
				// echo json_encode($data);
			}
			echo json_encode($data);
		}
	}
	public function deleteVendor()
	{
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				"status" => "",
				"vendorId" => trim($_POST['vendorId']),
				"userId" => $_SESSION['uId']
			];

			if($this->adminModel->deleteBookedVendor($data)){
				return true;
			}else{
				return false;
			}
		}
	}
	// Booking filters start here
	public function getAll()
	{
		$book = $this->eventModel->fullBookRequest();
		$data = [
			"bookings" => $book
		];
		$this->view("client/template/filterTemplate", $data);

	}
	public function getConfirmed()
	{
		$book = $this->eventModel->confirmBookRequest();
		$data = [
			"bookings" => $book
		];
		$this->view("client/template/filterTemplate", $data);

	}

	public function getPending()
	{
		$book = $this->eventModel->pendingBookRequest();
		$data = [
			"bookings" => $book
		];
		$this->view("client/template/filterTemplate", $data);

	}

	public function getCancelled()
	{
		$book = $this->eventModel->cancelledBookRequest();
		$data = [
			"bookings" => $book
		];
		$this->view("client/template/filterTemplate", $data);

	}

	public function getDeleted()
	{
		$book = $this->eventModel->deletedBookRequest();
		$data = [
			"bookings" => $book
		];
		$this->view("client/template/filterTemplate", $data);

	}
	// End of booking filters is here.
	public function privacy(){
		
		// no other solution this is for the Left sidebar navigation
		// the active state is dependent to this SESSION we are setting.
		unset($_SESSION['menu_active']);
		$_SESSION['menu_active'] = "privacy";

		$this->view('admin/privacy');
	}

	public function loadEvent()
	{
		$row = $this->adminModel->getEvents();
		echo json_encode($row);
	}
	public function inserEvent()
	{
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


			$data = [
				"title" => trim($_POST['title']),
				"start" => trim($_POST['start']),
				"end" => trim($_POST['end'])
			];

			if($this->adminModel->insertEvent($data)){
				return true;
			}else{
				return false;
			}
		}			
	}
	public function updateTimeEvent()
	{
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


			$data = [
				"id" => trim($_POST['id']),
				"start" => trim($_POST['start']),
				"end" => trim($_POST['end'])
			];

			if($this->adminModel->updateEventTime($data)){
				return true;
			}else{
				return false;
			}
		}			
	}
	 public function deleteEvent()
	 {
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


			$data = [
				"id" => trim($_POST['id'])
			];

			if($this->adminModel->deleteEvent($data)){
				return true;
			}else{
				return false;
			}
		}
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