<?php

/**
 * Admin Account Controller
 */
class Event extends Controller{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance();
    }

	public function addEvent($data){
		try {
			$this->db->beginTransaction();
			$this->db->query("INSERT INTO `event`(`user_id`, `location`, `budget`, `groom`, `bride`, `title`, `forCountDown`, `start`) VALUES (:user_id,:location,:budget,:groom, :bride, :title,:forCount,:start)");
			$this->db->bind(":user_id", $data['sId']);
			$this->db->bind(":bride", $data['bride']);
			$this->db->bind(":groom", $data['groom']);
			$this->db->bind(":location", $data['location']);
			$this->db->bind(":budget", $data['budget']);
			$this->db->bind(":title", $data['title']);
			$this->db->bind(":forCount", $data['forCount']);
			$this->db->bind(":start", $data['start']);
            $this->db->execute();

            $this->db->commit();
			return true;
        } catch (Exception $e) {
			$this->db->rollBack();
			return false;
		}
    }

    public function checkEvent($id){
       $this->db->query("SELECT event.*, user.user_cus_id AS cusId, user.firstname AS fName, profile_photo.image_path AS imgProf, booking.status AS bookingStatus FROM `event` LEFT JOIN user ON user.id = event.user_id LEFT JOIN booking ON booking.event_id = event.id LEFT JOIN profile_photo ON profile_photo.user_id = event.id AND profile_photo.image_status = 1 WHERE event.user_id = :uId");
       $this->db->bind(":uId", $id);
       $row = $this->db->single();
       if($row){
           return $row;
       }else{
           return false;
       }
	}
	
	public function bookStatus($id)
	{
		$this->db->query("SELECT event.*, booking.status AS bookStat FROM event LEFT JOIN booking ON booking.event_id = event.id WHERE (EXISTS(SELECT * FROM booking WHERE booking.event_id = event.id)) AND event.user_id = :bId");
		$this->db->bind(":bId", $id);
		$row = $this->db->single();
		if($row){
			return $row;
		}else{
			return false;
		}
	}

	public function bookEvent($id){		
		$genNum = date("Ymdhis");
		try {
			$this->db->beginTransaction();
			$this->db->query("INSERT INTO `booking` (`event_id`, `status`) VALUES (:eventId, 0)");
			$this->db->bind(':eventId', $id);
			$this->db->execute();

			$lastInsertId = $this->db->lastInsert();
			$this->db->query("UPDATE `booking` SET booking_cus_id = :cusId WHERE id = $lastInsertId");
			$this->db->bind(":cusId", $genNum + $lastInsertId);
            $this->db->execute();
            
			$this->db->commit();

			return true;

		} catch (Exception $e) {
			$this->db->rollBack();
			return false;
		}
		// return json_encode($response);
		// print_r($this->db->query("SELECT * FROM sf_site"));
	}
	
	public function fullBookRequest()
	{
		$this->db->query("SELECT event.*, user.user_cus_id AS cusId, user.firstname AS fName, profile_photo.image_path AS imgProf, booking.status AS bookingStatus FROM `event` LEFT JOIN user ON user.id = event.user_id LEFT JOIN booking ON booking.event_id = event.id LEFT JOIN profile_photo ON profile_photo.user_id = event.id AND profile_photo.image_status = 1 WHERE EXISTS(SELECT * FROM booking WHERE booking.event_id = event.id)");
		$row = $this->db->resultSet();
		if($row){
			return $row;
		}else{
			return false;
		}
	}

	public function bookCheck($id){	
		$this->db->query("SELECT * FROM `booking` WHERE `event_id` = $id");
		$row = $this->db->single();
		if($row){
			return true;
		}else{
			return false;
		}
    }

	public function deleteBookEvent($id){	
		try {
			$this->db->beginTransaction();
			$this->db->query("DELETE FROM `booking` WHERE event_id = $id");
            $this->db->execute();

            $this->db->commit();
            return true;
            
		} catch (Exception $e) {
			$this->db->rollBack();
			return false;
		}
    }
}