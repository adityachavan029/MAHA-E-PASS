<?php

session_start();

date_default_timezone_set('Asia/kolkata');

class class_functions
{
	private $con;
	
	function __construct()
	{
		$this->con = new mysqli("localhost","root","","mahaepass");
	}
	
	function create_user_account($var_first_name, $var_last_name, $var_email, $var_password)
	{
		
		
		if($stmt = $this->con->prepare("INSERT INTO `users`(`firstname`, `lastname`, `emailid`, `password`) VALUES (?,?,?,?)"))
		{
			$stmt->bind_param("ssss", $var_first_name, $var_last_name, $var_email, $var_password);
			
			if($stmt->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	
		function get_user_password($var_email)
	{
		if($stmt = $this->con->prepare("SELECT `password` FROM `users` WHERE `emailid`=?"))
		{
			$stmt->bind_param("s",$var_email);
			
			$stmt->bind_result($res_password);
			
			if($stmt->execute())
			{
				if($stmt->fetch())
				{
					return $res_password;
				}
				else
				{
					return false;
				}
			}
			
		}
		
	}

    // for reset password

    function get_user_email($var_email)
	{
		if($stmt = $this->con->prepare("SELECT `emailid` FROM `users` WHERE `id`=?"))
		{
			$stmt->bind_param("i",$var_id);
			
			$stmt->bind_result($res_email);
			
			if($stmt->execute())
			{
				if($stmt->fetch())
				{
					return $res_id;
				}
				else
				{
					return false;
				}
			}
			
		}
		
	}


    function update_user_account($var_password, $var_id)
    {
        if($stmt = $this->con->prepare("UPDATE `users` SET `password`=? WHERE `id`=?"))
        {
            $stmt->bind_param("si", $var_password, $var_id);
            
            if($stmt->execute())
            {
                return true;
            }
            else
            {
                // Echo or log the error message
                echo "Error: " . $stmt->error;
                return false;
            }
        }
        else
        {
            // Echo or log the error message
            echo "Error: " . $this->con->error;
            return false;
        }
    }
    
	// function get_all_users_data()
	// {
	// 	if($stmt = $this->con->prepare("SELECT `id`, `full_name`, `email_id`, `mobile_no`, `dob`, `password`, `profile_photo`, `gender`, `date`, `time` FROM `cine_users`"))
	// 	{
	// 		$stmt->bind_result($res_id,$res_full_name,$res_email_id,$res_mobile_number,$res_dob,$res_password,$res_profile_photo,$res_gender,$res_date,$res_time);
			
	// 		if($stmt->execute())
	// 		{
	// 			$data = array();
	// 			$counter = 0;
				
	// 			while($stmt->fetch())
	// 			{
	// 				$data[$counter]['id'] = $res_id;
	// 				$data[$counter]['full_name'] = $res_full_name;
	// 				$data[$counter]['email_id']	=	$res_email_id;
	// 				$data[$counter]['mobile_no']	=	$res_mobile_number;
	// 				$data[$counter]['dob']	=	$res_dob;
				
	// 				$data[$counter]['password']	=	$res_password;
	// 				$data[$counter]['profile_photo']	=	$res_profile_photo;
	// 				$data[$counter]['gender']	=	$res_gender;
	
	// 				$data[$counter]['date']	=	$res_date;
	// 				$data[$counter]['time']	=	$res_time;
					
	// 				$counter++;
	// 			}
				
	// 			if(!empty($data))
	// 			{
	// 				return $data;
	// 			}
	// 			else{
	// 				return false;
	// 			}
				
	// 		}
			
	// 	}
	// }
	
	// function get_users_data_from_id($edit_id)
	// {
	// 	if($stmt = $this->con->prepare("SELECT `id`, `full_name`, `email_id`, `mobile_no`, `dob`, `password`, `profile_photo`, `gender`, `date`, `time` FROM `cine_users` WHERE `id`=?"))
	// 	{
	// 		$stmt->bind_param("i",$edit_id);
			
	// 		$stmt->bind_result($res_id,$res_full_name,$res_email_id,$res_mobile_number,$res_dob,$res_password,$res_profile_photo,$res_gender,$res_date,$res_time);
			
	// 		if($stmt->execute())
	// 		{
	// 			$data = array();
								
	// 			if($stmt->fetch())
	// 			{
	// 				$data['id'] = $res_id;
	// 				$data['full_name'] = $res_full_name;
	// 				$data['email_id']	=	$res_email_id;
	// 				$data['mobile_no']	=	$res_mobile_number;
	// 				$data['dob']	=	$res_dob;
		
	// 				$data['password']	=	$res_password;
	// 				$data['profile_photo']	=	$res_profile_photo;
	// 				$data['gender']	=	$res_gender;
				
	// 				$data['date']	=	$res_date;
	// 				$data['time']	=	$res_time;
	// 			}
				
	// 			if(!empty($data))
	// 			{
	// 				return $data;
	// 			}
	// 			else{
	// 				return false;
	// 			}
				
	// 		}
			
	// 	}
	// }
	
	
	// function delete_user_data($del_id)
	// {
	// 	if($stmt = $this->con->prepare("Delete from `cine_users` where `id`=?"))
	// 	{
	// 		$stmt->bind_param("i",$del_id);
			
	// 		if($stmt->execute())
	// 		{
	// 			return true;
	// 		}
	// 		else
	// 		{
	// 			return false;
	// 		}
	// 	}
	// }
	
	
	
}//end of function
?>