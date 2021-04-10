<?php

//ChatUser.php

class ChatUser
{
	private $pat_id;
	private $pat_name;
	private $pat_email_id;
	private $pat_pwd;
	private $pat_status;
	private $pat_ph_no;
	private $pat_gender;
	private $pat_username;
	private $pat_age;

	public function __construct()
	{
		require_once('Database_connection.php');

		$database_object = new Database_connection;

		$this->connect = $database_object->connect();
	}

	function setPatId($pat_id)
	{
		$this->pat_id = $pat_id;
	}

	function getPatId()
	{
		return $this->pat_id;
	}

	function setPatName($pat_name)
	{
		$this->pat_name = $pat_name;
	}

	function getPatName()
	{
		return $this->pat_name;
	}

	function setPatEmailId($pat_email_id)
	{
		$this->pat_email_id = $pat_email_id;
	}

	function getPatEmailId()
	{
		return $this->pat_email_id;
	}

	function setPatPwd($pat_pwd)
	{
		$this->pat_pwd = $pat_pwd;
	}

	function getPatPwd()
	{
		return $this->pat_pwd;
	}

	function setPatStatus($pat_status)
	{
		$this->pat_status = $pat_status;
	}

	function getPatStatus()
	{
		return $this->pat_status;
	}

	function setPatUsername($pat_username)
	{
		$this->pat_username = $pat_username;
	}

	function getPatUsername()
	{
		return $this->pat_username;
	}

	function setPatGender($pat_gender)
	{
		$this->pat_gender = $pat_gender;
	}

	function getPatGender()
	{
		return $this->pat_gender;
	}

	function setPatAge($pat_age)
	{
		$this->pat_age = $pat_age;
	}

	function getPatAge()
	{
		return $this->pat_age;
	}

	function setPatPhNo($pat_ph_no)
	{
		$this->pat_ph_no = $pat_ph_no;
	}

	function getPatPhNo()
	{
		return $this->pat_ph_no;
	}

	function save_data()
	{
		$query = "
		INSERT INTO patients (pat_name, pat_email_id, pat_pwd, user_profile, pat_status, user_created_on, user_verification_code) 
		VALUES (:pat_name, :pat_email_id, :pat_pwd, :user_profile, :pat_status, :user_created_on, :user_verification_code)
		";
		$statement = $this->connect->prepare($query);

		$statement->bindParam(':pat_name', $this->pat_name);

		$statement->bindParam(':pat_email_id', $this->pat_email_id);

		$statement->bindParam(':pat_pwd', $this->pat_pwd);

		$statement->bindParam(':user_profile', $this->user_profile);

		$statement->bindParam(':pat_status', $this->pat_status);

		$statement->bindParam(':user_created_on', $this->user_created_on);

		$statement->bindParam(':user_verification_code', $this->user_verification_code);

		if($statement->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function enable_user_account()
	{
		$query = "
		UPDATE patients 
		SET pat_status = :pat_status 
		WHERE user_verification_code = :user_verification_code
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':pat_status', $this->pat_status);

		$statement->bindParam(':user_verification_code', $this->user_verification_code);

		if($statement->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function update_user_login_data()
	{
		$query = "
		UPDATE patients 
		SET user_login_status = :user_login_status 
		WHERE pat_id = :pat_id
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_login_status', $this->user_login_status);

		$statement->bindParam(':pat_id', $this->pat_id);

		if($statement->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function get_user_data_by_id()
	{
		$query = "
		SELECT * FROM patients 
		WHERE pat_id = :pat_id";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':pat_id', $this->pat_id);

		try
		{
			if($statement->execute())
			{
				$user_data = $statement->fetch(PDO::FETCH_ASSOC);
			}
			else
			{
				$user_data = array();
			}
		}
		catch (Exception $error)
		{
			echo $error->getMessage();
		}
		return $user_data;
	}

	function update_data()
	{
		$query = "
		UPDATE patients 
		SET pat_name = :pat_name, 
		pat_email_id = :pat_email_id, 
		pat_pwd = :pat_pwd, 
		user_profile = :user_profile  
		WHERE pat_id = :pat_id
		";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':pat_name', $this->pat_name);

		$statement->bindParam(':pat_email_id', $this->pat_email_id);

		$statement->bindParam(':pat_pwd', $this->pat_pwd);

		$statement->bindParam(':user_profile', $this->user_profile);

		$statement->bindParam(':pat_id', $this->pat_id);

		if($statement->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function get_user_all_data()
	{
		$query = "
		SELECT * FROM patients 
		";

		$statement = $this->connect->prepare($query);

		$statement->execute();

		$data = $statement->fetchAll(PDO::FETCH_ASSOC);

		return $data;
	}

}



?>
