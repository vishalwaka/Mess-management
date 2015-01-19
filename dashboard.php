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
<div class="vmenu" id="vmenu">
<div class="dinventory">
Inventory<br />
<a onclick="inventoryload('insertinventory')" href="#">Add Inventory</a><br />
<a onclick="inventoryload('viewinventory')" href="#">View Inventory</a>
</div>

<div class="dmember">
Members<br />
<a onclick="memberload('insertmember')" href="#" id="members">Add Members</a><br />
<a onclick="memberload('viewmember')" href="#" id="members">View Members</a>
</div>
<div class="dextra">
Extra Items<br />
<a onclick="extraload('insertextra')" href="#" id="extra">Add Extra</a><br />
<a onclick="extraload('viewextra')" href="#" id="extra">View Extra</a>
</div>
<div class="dextraorder">
Extra Order<br />
<a onclick="extraorderload('insertextraorder')" href="#" id="extraorder">Do Extra Order</a><br />
<a onclick="extraorderload('viewextraorder')" href="#" id="extraorder">View Extra Order</a>
</div>

</div>
<div class="thiscontent" id="thiscontent"></div>
</div></div>
<?php include 'footer.php' ?>

</body>
</html> 