<?php

function codepitch_get_user($id = null)
{
	if($id == "")
	{
		$id = null;
	}
	
	$conn = db_connect();
	$sql = "select * from tbluser where userid = $id limit 1";
	
	  if($res = mysqli_query($conn,$sql))
	  {
		 if(mysqli_num_rows($res) > 0 )
		 {
			 $row = mysqli_fetch_assoc($res);
			 if($row)
			 {
				 db_close($conn);
				 return $row;
			 }
			 
		 } 
	  }
	  else
	  {
		  echo "DB Error in codepitch_get_user() :- ".mysqli_error($conn);
	  }
	  
	  return null;
}

function codepitch_get_data($table,$where_array = array(),$op = "&&")
{

	$conn = db_connect();
	$sql = "select * from ".$table." where ";
	
	$i = 1;
	 foreach($where_array as $key => $val)
	 {
		 if($i == count($where_array))
		 {
		   $sql .= trim($key) ."='".trim($val)."'";
	     }
	     else
	     {
			 $sql .= " " .trim($key) ."='".trim($val)."' ".$op;
		 }
		 $i++;
	 }
	 
	 if(count($where_array) == 0 )
	 {
		 $sql .= "1";
	 }
	  
	  if($res = mysqli_query($conn,$sql))
	  {
		 if(mysqli_num_rows($res) > 0 )
		 {
			 $array = array();
			 while($row = mysqli_fetch_assoc($res))
			 {
				 $array[] = $row;
			 }
			 if( $array)
			 {
				 
				 db_close($conn);
				 return  $array;
			 }
			 
		 } 
	  }
	  else
	  {
		  echo "DB Error in codepitch_get_user() :- ".mysqli_error($conn);
	  }
	  
	  return null;
}

function codepitch_set_utf($conn)
{

mysqli_query($conn,'SET character_set_results=utf8');
mysqli_query($conn,'SET names=utf8');
mysqli_query($conn,'SET character_set_client=utf8');
mysqli_query($conn,'SET character_set_connection=utf8');
mysqli_query($conn,'SET character_set_results=utf8');
mysqli_query($conn,'SET collation_connection=utf8_general_ci');

}
function codepitch_get_row($table,$where_array = array(),$op = "&&")
{
    
	$conn = db_connect();
	codepitch_set_utf($conn);
	$sql = "select * from ".$table." where ";
	
	$i = 1;
	 foreach($where_array as $key => $val)
	 {
		 if($i == count($where_array))
		 {
		   $sql .= trim($key) ."='".trim($val)."'";
	     }
	     else
	     {
			 $sql .= " " .trim($key) ."='".trim($val)."' ".$op;
		 }
		 $i++;
	 }
	 
	 if(count($where_array) == 0 )
	 {
		 $sql .= "1";
	 }
	  $sql .= " limit 1";
	  if($res = mysqli_query($conn,$sql))
	  {
		 if(mysqli_num_rows($res) > 0 )
		 {
			 //$array = array();
			 $row = mysqli_fetch_assoc($res);
			 
				
			 
			 if( $row)
			 {
				 
				 db_close($conn);
				 return  $row;
			 }
			 
		 } 
	  }
	  else
	  {
		  echo "DB Error in codepitch_get_user() :- ".mysqli_error($conn);
	  }
	  
	  return null;
}


function codepitch_delete_data($table,$where_array = array(),$op = "&&")
{

	$conn = db_connect();
	$sql = "delete from ".$table." where ";
	
	$i = 1;
	 foreach($where_array as $key => $val)
	 {
		 if($i == count($where_array))
		 {
		   $sql .= trim($key) ."='".trim($val)."'";
	     }
	     else
	     {
			 $sql .= " " .trim($key) ."='".trim($val)."' ".$op;
		 }
		 $i++;
	 }
	 
	 if(count($where_array) == 0 )
	 {
		 $sql .= "1";
	 }
	  
	  if($res = mysqli_query($conn,$sql))
	  {
		 return mysqli_affected_rows($conn);
	  }
	  else
	  {
		  echo "DB Error in codepitch_get_user() :- ".mysqli_error($conn);
	  }
	  
	  return null;
}

function codepitch_get_user_by_email($email = null)
{
	if($email  == "")
	{
		$email  = null;
	}
	
	$conn = db_connect();
	$sql = "select * from zocofy_users where user_email = '$email'  limit 1";
	
	  if($res = mysqli_query($conn,$sql))
	  {
		 if(mysqli_num_rows($res) > 0 )
		 {
			 $row = mysqli_fetch_object($res);
			 if($row)
			 {
				 db_close($conn);
				 return $row;
			 }
			 
		 } 
	  }
	  else
	  {
		  echo "DB Error in codepitch_get_user() :- ".mysqli_error($conn);
	  }
	  
	  return null;
}

function codepitch_insert_user($userdata)
{
	
	
	$sql = "insert into zocofy_users ( ";
	 $i = 1;
	 foreach($userdata as $key => $val)
	 {
		 if($i == count($userdata))
		 {
		   $sql .= $key;
	     }
	     else
	     {
			 $sql .=  $key." ,"; 
		 }
		 $i++;
	 }
	
	$sql .= " )";
	
	$sql .= " values ( ";
	
	$i = 1;
	 foreach($userdata as $key => $val)
	 {
		 if($i == count($userdata))
		 {
		   $sql .= "'".$val."'";
	     }
	     else
	     {
			 $sql .= "'".$val."' ,"; 
		 }
		 $i++;
	 }
	
	$sql .= " )";
	
	
	
	$conn = db_connect();
	if(mysqli_query($conn,$sql))
	{
		$id =  mysqli_insert_id($conn);
		db_close($conn);
		return $id;
	}
	else
	{
		echo "DB Error in ".mysqli_error($conn);
		db_close($conn);
		return false;
	}
}

function codepitch_zocofy_login($userdata)
{
	if(isset($_SESSION['reset_paasword_user_id']))
	{
		unset($_SESSION['reset_paasword_user_id']);
	}
	$conn = db_connect();
	$login_time = date('Y-m-d H:i:s');
	$user_id  = $userdata['id'];
	$sql = "update zocofy_users set user_last_login = '$login_time' where id = $user_id";
	
	if($userdata['user_registration_method'] == 'facebook' || $userdata['user_registration_method'] == 'facebook')
	{
		if(isset($userdata['user_image'])){
		$sql = "update zocofy_users set user_last_login = '$login_time' , user_image = '{$userdata['user_image']}' where id = $user_id";
	    }
	}
	
	if($res = mysqli_query($conn,$sql))
	{
		 if(isset($_POST['remember_me']))
		 {
			 $time = time() + 86400 * 30;
			 setcookie('remember_me', $userdata['user_email'], $time);
			 
		 }
		 else
		 {
			if(isset($_COOKIE['remember_me'])) {
		        $past = time() - 100;
		        setcookie('remember_me',"", $past);
	         } 
		 }
		
		 db_close($conn);
		 $_SESSION['login_user'] = $userdata;
		 $_SESSION['id'] = $userdata['id'];
              $c_user = codepitch_get_user($userdata['id']);
		      $_SESSION['username'] = $c_user['user_sitename'];
		 if(isset($_GET['redirect_to']) && $_GET['redirect_to'] != "")
		 {
			 header("Location:".$_GET['redirect_to']);
	         exit;
		 }
		 
		 
	     header("Location:".SITE_URL.'my-account.php');
	     exit;
	}
	else
	{
		echo 'DB Error:- '.mysqli_error($conn);
		db_close($conn);
	}
}


function codepitch_zocofy_cookie_login($userdata)
{
	if(isset($_SESSION['reset_paasword_user_id']))
	{
		unset($_SESSION['reset_paasword_user_id']);
	}
	$conn = db_connect();
	$login_time = date('Y-m-d H:i:s');
	$user_id  = $userdata['id'];
	$sql = "update zocofy_users set user_last_login = '$login_time' where id = $user_id";
	
	if($res = mysqli_query($conn,$sql))
	{
		 if(isset($_COOKIE['remember_me']))
		 {
			 $time = time() + 86400 * 30;
			 setcookie('remember_me', $userdata['user_email'], $time);
		     $_SESSION['login_user'] = $userdata;
		     
		       $c_user = codepitch_get_user($userdata['id']);
		      $_SESSION['username'] = $c_user['user_sitename'];
		      $_SESSION['id'] = $userdata['id'];
		 }	 
		 
		 db_close($conn);
		 
	    
	}
	else
	{
		echo 'DB Error:- '.mysqli_error($conn);
		db_close($conn);
	}
}


function codepitch_zocofy_admin_login($userdata)
{
	if(isset($_SESSION['reset_paasword_user_id']))
	{
		unset($_SESSION['reset_paasword_user_id']);
	}
	
	$conn = db_connect();
	$login_time = date('Y-m-d H:i:s');
	$user_id  = $userdata['id'];
	$sql = "update zocofy_users set user_last_login = '$login_time' where id = $user_id";
	
	if($res = mysqli_query($conn,$sql))
	{
		 
		
		 db_close($conn);
		 $_SESSION['admin_user_login'] = $userdata;
		 $_SESSION['login_user'] = $userdata;
	     header("Location:".ADMIN_URL);
	     exit;
	}
	else
	{
		echo 'DB Error:- '.mysqli_error($conn);
		db_close($conn);
	}
}

function codepitch_footer()
{
	?>
	<script>
	 var AJAX_URL = "<?php echo AJAX_URL; ?>"; 
	</script>
	<script src="<?php echo SITE_URL; ?>js/codepitch-zocofy.js"></script>
	<?php
}

function codepitch_current_user_id()
{
	if(isset($_SESSION['login_user']))
	{
		return $_SESSION['login_user']['id'];
	}
	return false;
}

function codepitch_insert_data($table,$data)
{
	
	
	$sql = "insert into ".$table." ( ";
	 $i = 1;
	 foreach($data as $key => $val)
	 {
		 if($i == count($data))
		 {
		   $sql .= $key;
	     }
	     else
	     {
			 $sql .=  $key." ,"; 
		 }
		 $i++;
	 }
	
	$sql .= " )";
	
	$sql .= " values ( ";
	
	$i = 1;
	 foreach($data as $key => $val)
	 {
		 if($i == count($data))
		 {
		   $sql .= "'".$val."'";
	     }
	     else
	     {
			 $sql .= "'".$val."' ,"; 
		 }
		 $i++;
	 }
	
	$sql .= " )";
	
	
	
	$conn = db_connect();
	codepitch_set_utf($conn);
	if(mysqli_query($conn,$sql))
	{
		$id =  mysqli_insert_id($conn);
		db_close($conn);
		return $id;
	}
	else
	{
		echo "DB Error in ".mysqli_error($conn);
		db_close($conn);
		return false;
	}
}

function codepitch_update_data($table,$data,$where_array,$op = "&&",$comma = ",")
{
	if(count($where_array) == 0)
	{
		return false;
	}
	
	if(count($data) == 0)
	{
		return false;
	}
	
	 $sql = "update  ".$table." set ";
	 $i = 1;
	 foreach($data as $key => $val)
	 {
		 if($i == count($data))
		 {
		   $sql .= trim($key) ."='".trim($val)."'";
	     }
	     else
	     {
			 $sql .= " " .trim($key) ."='".trim($val)."'".$comma;
		 }
		 $i++;
	 }
	 
	 $sql .= " where ";
	 $i = 1;
	 
	 
	 foreach($where_array as $key => $val)
	 {
		 if($i == count($where_array))
		 {
		   $sql .= trim($key) ."='".trim($val)."'";
	     }
	     else
	     {
			 $sql .= " " .trim($key) ."='".trim($val)."' ".$op;
		 }
		 $i++;
	 }
	 
	 
	 
	
	
	
	
	
	
	$conn = db_connect();
	if(mysqli_query($conn,$sql))
	{
		return true;
	}
	else
	{
		echo "DB Error in ".mysqli_error($conn);
		db_close($conn);
		return false;
	}
}

/*

function codepitch_delete_data($table,$where_array,$op = "&&",$comma = ",")
{
	if(count($where_array) == 0)
	{
		return false;
	}
	
	
	
	 $sql = "delete from  ".$table;
	 
	 
	 $sql .= " where ";
	 $i = 1;
	 
	 
	 foreach($where_array as $key => $val)
	 {
		 if($i == count($where_array))
		 {
		   $sql .= trim($key) ."='".trim($val)."'";
	     }
	     else
	     {
			 $sql .= " " .trim($key) ."='".trim($val)."' ".$op;
		 }
		 $i++;
	 }
	 
	 
	 
	
	
	
	
	
	
	$conn = db_connect();
	if(mysqli_query($conn,$sql))
	{
		return true;
	}
	else
	{
		echo "DB Error in ".mysqli_error($conn);
		db_close($conn);
		return false;
	}
}


*/


function codepitch_is_user_logged_in()
{
	if(isset($_SESSION['login_user']))
	{
		return true;
	}
	return false;
}

function codepitch_campaign_url($id,$status)
{
	$url = "";
	switch($status)
	{
		case 'draft':
		$url .= SITE_URL.'edit-campaign.php?edit='.$id;
		break;
		
		case 'publish':
		case 'pending':
		$url .= SITE_URL.'view-single-campaign.php?view='.$id;
		break;
		
	}
	return $url;
}

function codepitch_get_image($id)
{
	$data = codepitch_get_data("zocofy_attachment",array('id'=>$id));
	
	if(empty($data))
	{
		return false;
	}
	else
	{
		return UPLOAD_DIR_URL.$data[0]['attcahment_name'];
	}
}



function codepitch_get_user_ac_type()
{
	if(!codepitch_is_user_logged_in())
	{
		return null;
	}
	$id = codepitch_current_user_id();
	$user = codepitch_get_user($id);
	if(!empty($user))
	{
	 return $user['usertype'];
    }
    
    return null;
}

function codepitch_only_allowed_to($usertype)
{
	
	if(!codepitch_is_user_logged_in())
	{
		header("location".SITE_URL."login.php?redirect_to=".$_SERVER['REQUEST_URI']);
	}
     	
    
	if(codepitch_get_user_ac_type() != trim($usertype))
	{
		header("location:".SITE_URL);
		exit;
	}
}

function dirname_r($path, $count=1){
    if ($count > 1){
       return dirname(dirname_r($path, --$count));
    }else{
       return dirname($path);
    }
}


function codepitch_generate_hash($user_id)
{
	return $hash = md5(time() . $user_id . SITE_HASH);
}

function codepitch_user_image($id)
{
	$user = codepitch_get_user($id);
	
	if($user['user_registration_method'] == 'facebook' || $user['user_registration_method'] == 'instagram')
	{
		if($user['user_image'] != null)
	     {
		   return $user['user_image'];
	    }
		
	}
	
	if($user['user_image'] != null)
	{
		return UPLOAD_DIR_URL.$user['user_image'];
	}
	
	return SITE_URL.'images/profile-placeholder.png';
}
function  codepitch_change_email($id,$new_email)
{
	$user = codepitch_get_user($id);
	
	if($user['paypal_email'] == $new_email)
	{
		return true;
	}
	else
	{
		
		$data = codepitch_get_data('zocofy_users',array('user_email'=>$new_email));
		
		if(!empty($data))
		{
			return $error = array('error'=> true , 'message'=>'Email address can\'t change, already in used.');
		}
		else
		{
			return codepitch_update_data('zocofy_users',array('user_email'=>$new_email), array('id' => $id));
		}
	}
	
	
}

function  codepitch_change_paypalemail($id,$new_email)
{
	$user = codepitch_get_user($id);
	
	if($user['paypal_email'] == $new_email)
	{
		return true;
	}
	else
	{
		
		$data = codepitch_get_data('zocofy_users',array('paypal_email'=>$new_email));
		
		if(!empty($data))
		{
			return $error = array('error'=> true , 'message'=>'Paypal Email address can\'t change, already in used.');
		}
		else
		{
			return codepitch_update_data('zocofy_users',array('paypal_email'=>$new_email), array('id' => $id));
		}
	}
	
	
}

function codepitch_post_url($id)
{
	return SITE_URL.'post.php?id='.$id;
}

function codepitch_generate_site_username($email)
{
	$site_name = $email;
	$pos = strpos($site_name,"@");
	$str_pos = $pos;
	
	$unique_sitename = substr($site_name,0,$str_pos);
	
	$result = codepitch_get_data("zocofy_users",array("user_sitename"=>$unique_sitename));	
	
	if(!$result)
	{
		return $unique_sitename;
	}
	
	
	while(1)
	{
		$new_sitename = $unique_sitename.'_'.mt_rand(1,10000);
		
		$result = codepitch_get_data("zocofy_users",array("user_sitename"=>$new_sitename));	
	
	      if(!$result)
	      {
		       return $new_sitename;
	      }
		
		
	}
	
	
	
}


function codepitch_upload_attachment($name)
{
	if(count($_FILES) > 0 )
	    {	 
		  if($_FILES[$name]['error'] == 0)
		   {
			
			$target_dir = UPLOAD_DIR;
			
			if(!file_exists($target_dir))
			{
				if(!mkdir(UPLOAD_DIR))
				{
					$err[$name] = "unable to create uploads directory";
				}
			}
			$tmp_file_name = md5(mt_rand().basename($_FILES[$name]['name']));
			$target_file = $target_dir.basename($_FILES[$name]['name']);
			
			$file_type = pathinfo($target_file,PATHINFO_EXTENSION);
			$tmp_file_name = $tmp_file_name.".".$file_type;
			$target_file = $target_dir.$tmp_file_name;
			if(!isset($err[$name]))
			{
				
				$allowed_file_types = array("jpg","png");
				
				if(!in_array($file_type,$allowed_file_types))
				{
					$err[$name] = "Only jpg and png images allowed";
				}
				
				
			}
			
			if(!isset($err[$name]))
			{
				if($path = move_uploaded_file($_FILES[$name]['tmp_name'],$target_file))
				{   $image_type = "default";
					if(isset($_POST['image_type']))
					{
						$image_type = $_POST['image_type'];
					}
					$image_data = array('attcahment_name' => $tmp_file_name ,'attachment_type' => $image_type,'upload_time'=> date('Y-m-d H:i:s'));
					if($attach_id = codepitch_insert_data('zocofy_attachment',$image_data))
					{
					 return array('success'=>'ok','attcahment_id'=> $attach_id,'path'=>$target_file,'url'=>UPLOAD_DIR_URL.$tmp_file_name,'message'=>'image upload successfully');
					
				   }
				   else
				   {
					   $err = array();
		               $err['error'] = 'true';
		               $err['message'] = 'image can not be upload';
		               
		               return $err;
				   }
					
				}
				else
				{
					$err[$name] = "Image could not be upload";
					
				}
			}
			
			
		}
		else
		{
			$err[$name] = "Image have error";
		}
		$err = array();
		$err['error'] = 'true';
		$err['message'] = $err[$name];
		
		 return $err;
	  }
}



function cp_get_contents($url)
{
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

function get_child_user($dist_id)
{
	$sql = "select * from admin where ParentId = ".$dist_id;
	$conn = db_connect();
	
	 $temp = array();
	  if($res = mysqli_query($conn,$sql))
	  {

		 if(mysqli_num_rows($res) > 0 )
		 {
			 while($row = mysqli_fetch_assoc($res))
			 {
			 	
                   $temp[] = $row['id']; 
				
				
			 }

			
			 
		 } 
	  }

	  return $temp; 
}

function total_dist_pancard($dist_id){

	$conn = db_connect();
	  $temp = get_child_user($dist_id);
	  $temp[] = $dist_id;
      $between = implode(",",$temp); 
	   $sql = "select count(id) from pancard where AdminId IN (".$between.")";
	  $count = 0;
    
	if($res = mysqli_query($conn,$sql))
	  {
          
		 if(mysqli_num_rows($res) > 0 )
		 {
		 	
			 $count = mysqli_fetch_array($res);
			 $count = $count[0];
			 
                   
				
				
			 

			
			 
		 } 
	  }
	  else
	  {
	  	echo mysqli_error($conn);
	  }

	  return $count;
}

function approved_dist_pancard($dist_id){

	$conn = db_connect();
	  $temp = get_child_user($dist_id);
	  $temp[] = $dist_id;
      $between = implode(",",$temp); 
	   $sql = "select count(id) from pancard where status = 1 && AdminId IN (".$between.")";
	  $count = 0;
    
	if($res = mysqli_query($conn,$sql))
	  {
          
		 if(mysqli_num_rows($res) > 0 )
		 {
		 	
			 $count = mysqli_fetch_array($res);
			 $count = $count[0];
			 
                   
				
				
			 

			
			 
		 } 
	  }
	  else
	  {
	  	echo mysqli_error($conn);
	  }

	  return $count;
}


function pending_dist_pancard($dist_id){

	$conn = db_connect();
	  $temp = get_child_user($dist_id);
	  $temp[] = $dist_id;
      $between = implode(",",$temp); 
	   $sql = "select count(id) from pancard where status = 0 && AdminId IN (".$between.")";
	  $count = 0;
    
	if($res = mysqli_query($conn,$sql))
	  {
          
		 if(mysqli_num_rows($res) > 0 )
		 {
		 	
			 $count = mysqli_fetch_array($res);
			 $count = $count[0];
			 
                   
				
				
			 

			
			 
		 } 
	  }
	  else
	  {
	  	echo mysqli_error($conn);
	  }

	  return $count;
}

function verifiy_dist_pancard($dist_id){

	$conn = db_connect();
	  $temp = get_child_user($dist_id);
	  $temp[] = $dist_id;
      $between = implode(",",$temp); 
	   $sql = "select count(id) from pancard where status = 4 && AdminId IN (".$between.")";
	  $count = 0;
    
	if($res = mysqli_query($conn,$sql))
	  {
          
		 if(mysqli_num_rows($res) > 0 )
		 {
		 	
			 $count = mysqli_fetch_array($res);
			 $count = $count[0];
			 
                   
				
				
			 

			
			 
		 } 
	  }
	  else
	  {
	  	echo mysqli_error($conn);
	  }

	  return $count;
}


function reject_dist_pancard($dist_id){

	$conn = db_connect();
	  $temp = get_child_user($dist_id);
	  $temp[] = $dist_id;
      $between = implode(",",$temp); 
	   $sql = "select count(id) from pancard where status = 2 && AdminId IN (".$between.")";
	  $count = 0;
    
	if($res = mysqli_query($conn,$sql))
	  {
          
		 if(mysqli_num_rows($res) > 0 )
		 {
		 	
			 $count = mysqli_fetch_array($res);
			 $count = $count[0];
			 
                   
				
				
			 

			
			 
		 } 
	  }
	  else
	  {
	  	echo mysqli_error($conn);
	  }

	  return $count;
}

function total_wallet_amount(){

	$conn = db_connect();
	  $temp = get_child_user($dist_id);
	  $temp[] = $dist_id;
      $between = implode(",",$temp); 
	   $sql = "select sum(Amount) from admin where status = 1";
	  $count = 0;
    
	if($res = mysqli_query($conn,$sql))
	  {
          
		 if(mysqli_num_rows($res) > 0 )
		 {
		 	
			 $count = mysqli_fetch_array($res);
			 $count = $count[0];
			 
                   
				
				
			 

			
			 
		 } 
	  }
	  else
	  {
	  	echo mysqli_error($conn);
	  }

	  return $count;
}


function total_pancard_spent_amount(){

	$conn = db_connect();
	  $temp = get_child_user($dist_id);
	  $temp[] = $dist_id;
      $between = implode(",",$temp); 
	   $sql = "select sum(price) from pancard where status = 1";
	  $count = 0;
    
	if($res = mysqli_query($conn,$sql))
	  {
          
		 if(mysqli_num_rows($res) > 0 )
		 {
		 	
			 $count = mysqli_fetch_array($res);
			 $count = $count[0];
			 
                   
				
				
			 

			
			 
		 } 
	  }
	  else
	  {
	  	//echo mysqli_error($conn);
	  }

	  return $count;
}

function total_pancard_profit(){

	$conn = db_connect();
	  $temp = get_child_user($dist_id);
	  $temp[] = $dist_id;
      $between = implode(",",$temp); 
	   $sql = "select count(id) from pancard where status = 1";
	  $count = 0;
    
	if($res = mysqli_query($conn,$sql))
	  {
          
		 if(mysqli_num_rows($res) > 0 )
		 {
		 	
			 $count = mysqli_fetch_array($res);
			 $count = $count[0];
			 
                   
				
				
			 

			
			 
		 } 
	  }
	  else
	  {
	  	echo mysqli_error($conn);
	  }

	  return $count*13;
}

function numberToCurrency($number)
{
    if(setlocale(LC_MONETARY, 'en_IN'))
      return money_format('%.0n', $number);
    else {
      $explrestunits = "" ;
      $number = explode('.', $number);
      $num = $number[0];
      if(strlen($num)>3){
          $lastthree = substr($num, strlen($num)-3, strlen($num));
          $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
          $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
          $expunit = str_split($restunits, 2);
          for($i=0; $i<sizeof($expunit); $i++){
              // creates each of the 2's group and adds a comma to the end
              if($i==0)
              {
                  $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
              }else{
                  $explrestunits .= $expunit[$i].",";
              }
          }
          $thecash = $explrestunits.$lastthree;
      } else {
          $thecash = $num;
      }
      if(!empty($number[1])) {
      	if(strlen($number[1]) == 1) {
      		return '₹ ' .$thecash . '.' . $number[1] . '0';
      	} else if(strlen($number[1]) == 2){
      		return '₹ ' .$thecash . '.' . $number[1];
      	} else {
            return 'cannot handle decimal values more than two digits...';
        }
      } else {
      	return '₹ ' .$thecash.'.00';
      }
    }
}

function codepitch_fetch_all($res)
{
	$temp = array();
	while($row = mysqli_fetch_assoc($res))
	{
       $temp[] = $row;
	}
	return $temp;
}