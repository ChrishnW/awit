<?php
	//Start session
	session_start();
	//Connect to mysql server
	include('include/connect.php');

	$error='';
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$con->next_result();
		$result = mysqli_query($con,"SELECT * FROM accounts WHERE username='$username' AND status=1");
		if(mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$access = $row['access'];
			$emp_id = $row['id'];
			$username = $row['username'];
			$hash_password = $row['password'];

			// if (!password_verify($password, $hash_password)){
			// 	$error="Invalid Password!";
			if ($password != $hash_password){
			}
			else{	
				//Login Successful
				session_regenerate_id();
				$_SESSION['SESS_MEMBER_ID'] = $emp_id;
				$_SESSION['SESS_MEMBER_USERNAME'] = $username;
				$_SESSION['SESS_MEMBER_ACCESS'] = $access;
				$_SESSION['SESS_MEMBER_PASS'] = $hash_password;
				session_write_close();
				header('location: home.php');
				exit();
			}
		}
		else {
			//Login failed
			$error="There's an error accessing your account. Contact system admin now!";
		}
	}
?>