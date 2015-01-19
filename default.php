<?php
session_start();
if(@$_SESSION['login']==1)
{
    echo '<div class="loggeduser" id="loggeduser">'.$_SESSION['name'].'<br /><a href="logout.php">Logout</a></div>';
}
else
{
    session_destroy();
}
?>
<html>
<head>
<title>Mess Portal</title>
<link rel="stylesheet" type="text/css" href="css/layout.css" />
<script src="js/callersend.js"></script>
</head>
<body>
<?php include 'header.php' ?>

<div class="content">
</div></div>
<?php include 'footer.php' ?>

</body>
</html> 