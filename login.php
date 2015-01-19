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
$username = @$_POST['username'];
$password = @$_POST['password'];
$attempt = @$_GET['attempt'];
$attempt = $attempt + 1;
$con = @mysql_connect("localhost","root","tiger")or die("There is some problem<br />We will get back to you soon");
if(!$con){echo "unable to connect";}
if(!@mysql_select_db("eblockmess",$con)){die("There is some problem<br />We will get back to you soon");}
$query = "SELECT * FROM userinfo WHERE username='".$username."'";
$result = @mysql_query($query,$con);
if(!$result)
{
    die("There is some problem<br />We will get back to you soon");;
}
else
{
    $row = mysql_fetch_array($result);
    
        if(count($row)=="1"){header("Location:wardenlogin.php?attempt=".$attempt);}
        
        else if($username==$row['username'] && $password==$row['password'])
        {
            session_start();
            $_SESSION['login']="1";
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            header("Location:dashboard.php");
        }
        
        else
        {
            header("Location:wardenlogin.php?attempt=".$attempt);
        }
    
}


?>