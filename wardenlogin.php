<?php
session_start();
if(@$_SESSION['login']==1)
{
    header("Location:dashboard.php");
}
else
{
    session_destroy();
}
?>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="css/layout.css" />
<script src="js/callersend.js"></script>
</head>
<body>
<?php include 'header.php';  ?>
<div class="content" id="content">
<div class="loginbox">
<?php
if(!@$_GET['attempt'])
{
    echo '<form action="login.php" method="POST">';
}
else
{
     $attempt = @$_GET['attempt'];
     echo '<p style="color:red;">You have '.$attempt.' wrong attempts</p>';
     echo '<form action="login.php?attempt='.$attempt.'" method="POST">';
}
?>
Username:<input type="text" id="username" name="username" /><br />
Password:<input type="password" id="password" name="password" /><br /><br />
<button type="submit" onclick="checkform()">Login</button>
</form>
</div>
</div>
</div>
<?php include 'footer.php';  ?>

</body>
</html>