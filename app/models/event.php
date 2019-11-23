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
			$this->db->query("INSERT INTO `event`(`user_id`, `location`, `budget`, `title`, `forCountDown`, `start`) VALUES (:user_id,:location,:budget,:title,:forCount,:start)");
			$this->db->bind(":user_id", $data['sId']);
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
       $this->db->query("SELECT * FROM `event` WHERE `user_id` = :uId");
       $this->db->bind(":uId", $id);
       $row = $this->db->single();
       if($row){
           return $row;
       }else{
           return false;
       }
    }
}