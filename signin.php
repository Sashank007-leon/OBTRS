<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="invalid.css">
	<title></title>
</head>
<body>

<?php 
	session_start();
	include "conn.php";
	$_SESSION['tt'] = $_POST['email'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$result = mysqli_query($conn,"SELECT COUNT(1) FROM user_login WHERE email = '$email' and Password = '$password'");
	$row = mysqli_fetch_row($result);
	if($row[0] > 0){
		$userRole = mysqli_query($conn,"SELECT email FROM user_login WHERE email = '$email' and Password = '$password'");
	    $row = mysqli_fetch_row($userRole);
	    if($row[0] == 'admin@admin.com'){
             //redirect to admin ho me page
	    	header("location: admin/admin-homepage.php");
	    }else {
	    	header("location: client/client-homepage.php");
	    }
	}
	else {
		echo '<script>
				alert("Invalid User Credential");	
				window.location.href="login.php";
			  </script>';
	}
?>
</body>
</html>