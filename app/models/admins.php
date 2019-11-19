<?php

define("ROOT", "/wedding_cms");
/**
 * 
 */
class Admins
{
	private $db;
	private $error;
	
	function __construct()
	{
		
		$this->db = Database::getInstance();
		$this->error = Database::conError();

	}

	public function connError(){
		return $this->error;
	}

	public function isAdminFound(){
		$this->db->query("SELECT * FROM user WHERE is_admin = 1");
		$row = $this->db->single();

		if ($this->db->rowCount() > 0) {
			return true;
		}

		return false;
		// echo $this->db;
	}

	public function vendor($data, $photo = []){
		try {
			$this->db->beginTransaction();
			$this->db->query("INSERT INTO `vendor`(`vendor_name`) VALUES (:name)");
			$this->db->bind(":name", $data['name']);
			$this->db->execute();
			
			$id = $this->db->lastInsert();
			$this->db->query("INSERT INTO service ( `vendor_id`, `name`, `service_type`, `price` ) VALUES ( :vendorId, :vName, :serviceT, :sPrice )");
			$this->db->bind(":vendorId", $id);
			$this->db->bind(":vName", $data['name']);
			$this->db->bind(":serviceT", $data['serviceType']);
			$this->db->bind(":sPrice", $data['fee']);
			$this->db->execute();
			if($photo){
				for($i = 0; $i < count($photo); $i++){
					$this->db->query("INSERT INTO `service_photo`(`vendor_id`, `image_path`) VALUES ($id, :img)");
					$this->db->bind(":img", $photo[$i]);
					$this->db->execute();
				}
			}

			$this->db->commit();
			return true;

		} catch (Exception $e) {
			$this->db->rollBack();
			return false;
		}

	}
}