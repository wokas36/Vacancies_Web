<?php
function sidebar_content(){
	
	$users_table="users";
	
	$user_id=$_SESSION['user_id'];
	
	$read_user=mysql_query("select first_name, last_name, privilege, profile_img from $users_table where user_id='$user_id'");
	$rows_user=mysql_fetch_array($read_user);
	
	$first_name=$rows_user['first_name'];
	$last_name=$rows_user['last_name'];
	$privilege=$rows_user['privilege'];
	$user_pic=$rows_user['profile_img'];
?>
<section class="user-profile padding_px_10">
    <figure>
        <img src="./uploads/user_images/thumbs_60/<?php echo $user_pic; ?>" alt="Avatar">
        <figcaption>
            <strong><a href="javascript:;"><?php echo $first_name." ".$last_name; ?></a></strong>
            
            <span><?php echo $privilege; ?></span>
			
            <br/>
            <br/>
            <div class="clear"></div>
        </figcaption>
    </figure>
</section> 

<nav class="main-navigation padding_px_5" role="navigation">
    <ul>
        <li><a href="javascript:;"><span class="icon-dashboard"></span>Dashboard</a>
            <ul>
            	<li><a href="./?option=dashboard">Dashboard</a></li>
                <li><a href="./?option=view_my_profile">My Profile</a></li>
            </ul>        
        </li>
        
		<?php 
		if($privilege == 'Administrator') {
			?>
			<li><a href="javascript:;"><span class="icon-group"></span>Users</a>
				<ul>
					<li><a href="./?option=read_investigators">View Employers</a></li>
					<li><a href="./?option=read_employees">View Applicants</a></li>
					<li><a href="./?option=investigator_add_form">Add New Employer</a></li>
					<li><a href="./?option=employee_add_form">Add New Applicant</a></li>
				</ul>        
			</li>

			<?php
		} else if($privilege == 'Employer') {
			?>
			<li><a href="javascript:;"><span class="icon-group"></span>Users</a>
				<ul>
					<li><a href="./?option=read_investigators">View Employers</a></li>
					<li><a href="./?option=read_employees">View Applicants</a></li>
				</ul>        
			</li>

			<?php
		} else if($privilege == 'Applicant') {
			?>
			<li><a href="javascript:;"><span class="icon-group"></span>Users</a>
				<ul>
					<li><a href="./?option=read_employees">View Applicants</a></li>
				</ul>        
			</li>

			<?php
		}
		?>
		
    </ul>
</nav>

<script language="javascript" type="text/javascript">

$(document).ready(function() {
	
	$('#count_pss').load('./functions/read_ajax_functions.php?option=count_new_pending_projects_assigned');
	$('#count_prs').load('./functions/read_ajax_functions.php?option=count_new_current_projects_assigned');
});
</script>
<?php
}
?>