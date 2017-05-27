<?php
error_reporting(0);
function profile_update(){
	
	$users_table="users";
	
	$user_id=$_SESSION['user_id'];
	
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$password=$_POST['password'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$change_profile_image=$_POST['change_profile_image'];
	$change_password=$_POST['change_password'];
	$current_user_pic=$_POST['user_pic'];
	
	$time=time();
	$file_name=$_FILES["file"]["name"];
	$extension = end(explode(".", $file_name));
	$user_pic=mysql_real_escape_string($time.".".$extension);
	
	if($extension == "jpg" || $extension == "jpeg" || $extension == "JPG" || $extension == "JPEG" || $extension == "gif" || $extension == "GIF" || $extension == "png" || $extension == "PNG"){
		$user_pic=$user_pic;
		$file_verification="passed";
	}
	else{
		$user_pic="";
		$file_verification="failed";
	}
	
	$update_record=mysql_query("update $users_table set first_name='$first_name', last_name='$last_name', address='$address', phone_no='$phone', email='$email' where user_id='$user_id'");
	
	if($update_record){
		
		if(!empty($change_password)){
			$update_password=mysql_query("update $users_table set password='$password' where user_id='$user_id'");
		}
		
		if(!( empty($file_name) && empty($change_profile_image) )){
			
			if($file_verification == "passed"){
				
				$add_file=move_uploaded_file($_FILES["file"]["tmp_name"],"../uploads/user_images/".$user_pic);
				
				if($add_file){
					
					if(!empty($current_user_pic)){
						
						//remove old user avatar
						if(file_exists("../uploads/user_images/".$current_user_pic)){
							
							unlink("../uploads/user_images/".$current_user_pic);
						}
						if(file_exists("../uploads/user_images/thumbs_20/".$current_user_pic)){
							
							unlink("../uploads/user_images/thumbs_20/".$current_user_pic);
						}
						if(file_exists("../uploads/user_images/thumbs_60/".$current_user_pic)){
							
							unlink("../uploads/user_images/thumbs_60/".$current_user_pic);
						}
					}
					
					$update_record=mysql_query("update $users_table set profile_img='$user_pic' where user_id='$user_id'");
						
					$pathToImages="../uploads/user_images/";
					$pathToThumbs="../uploads/user_images/thumbs_20/";
					$thumbHeight=20;
							
					createThumbs($pathToImages,$pathToThumbs,$thumbHeight,$user_pic);
									
					$pathToThumbs="../uploads/user_images/thumbs_60/";
					$thumbHeight=60;
					createThumbs($pathToImages,$pathToThumbs,$thumbHeight,$user_pic);
									
					$pathToThumbs="../uploads/user_images/";
					$thumbHeight=200;
					createThumbs($pathToImages,$pathToThumbs,$thumbHeight,$user_pic);
				}
			}
		}
				
		$_SESSION['notify']="Successfully saved the details.";
		$_SESSION['status']="success";
	}
	else{
		$_SESSION['notify']="Details saving was failed.";
		$_SESSION['status']="failed";
	}
	
	$ref=$_SERVER['HTTP_REFERER'];
	
	echo '
	<script language="javascript" type="text/javascript">
		window.location="'.$ref.'"
	</script>
	';
error_reporting(1);
}
?>