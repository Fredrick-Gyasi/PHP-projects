<?php
require_once "functions/user_Authen_Control.php";  
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM users_table WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: users_otp.php');
        }
    }
}else{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
</head>
<body>
	<nav class="navbar">
    	<a class="nav_logo" href="#">Logo</a>
    	<a class="signout" href="functions/logout_user.php">Logout</a>
    </nav>
    <h1>
    	Welcome <?php echo $fetch_info['fullname'] ?>
    </h1>
</body>
</html>