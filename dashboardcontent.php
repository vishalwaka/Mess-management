<?php

session_start();
if(@$_SESSION['login']==1){
    
function mysqlselect($db,$tb,$wh,$whvl)
{
        $con = @mysql_connect("localhost", "root", "tiger") or die("There is some problem<br />We will get back to you soon");
        if (!@mysql_select_db($db, $con)) 
        {
            die("There is some problem<br />We will get back to you soon");
            $result = "failed";
        }
        if($wh!=""){
        $query = "SELECT * FROM `".$tb."` WHERE `".$wh."`='".$whvl."'";
        
        }
        else
        {
            $query = "SELECT * FROM `".$tb."`";
        }
        $result = @mysql_query($query, $con);
        if(!$result){$result = "failed";}
        return $result;
}


function mysqlinsert($db,$tb,$cn,$vl)
{
    $noofcolumns = count($cn);
    $noofvalue = count($vl);
    if($noofcolumns!=$noofvalue)
    {
        die("Error:Please check if values are given properly");
    }
    for($i=0;$i<$noofcolumns;$i++)
    {
        if($i==0){$columnpart="(".$cn[$i];$valuepart="('".$vl[$i]."'";}
        else{$columnpart = $columnpart.", ".$cn[$i];$valuepart = $valuepart.", '".$vl[$i]."'";}
        if($i==($noofcolumns-1)){$columnpart = $columnpart.")";$valuepart = $valuepart.")";}
    }
        $con = @mysql_connect("localhost", "root", "tiger") or die("There is some problem<br />We will get back to you soon");
        if (!@mysql_select_db($db, $con)) 
        {
            die("There is some problem<br />We will get back to you soon");
        }
        $query = "INSERT INTO `".$tb."` ".$columnpart." VALUES ".$valuepart;
        $result = @mysql_query($query, $con);
        if(!$result){echo "Error:Please check if values are given properly";}
        else{return "success";}
}

function mysqlupdate($db,$tb,$cn,$vl,$wh,$whvl)
{
    $con = @mysql_connect("localhost", "root", "tiger") or die("There is some problem<br />We will get back to you soon");
        if (!@mysql_select_db($db, $con)) 
        {
            die("There is some problem<br />We will get back to you soon");
        }
        $query = "UPDATE `".$tb."` SET `".$cn."`='".$vl."' WHERE `".$wh."`='".$whvl."'";
        $result = @mysql_query($query, $con);
        if(!$result){return "Error:Please check if values are given properly";}
        else
        {
            $result = mysqlselect($db,$tb,$wh,$whvl);
            if($result!="failed"){
            while($row=mysql_fetch_array($result))
            {
                $changedvalue = $row[$cn];
            }
            
            return "success1kjdkm54sJNA4sjs".$changedvalue;
            }
            else
            {
                return "failed1kjdkm54sJNA4sjs";
            }
        }
}



if(@$_GET['insertinventory']==1)
{
    echo '<h4><u>Add Inventory Form</u></h4>';
    echo '<table>';
    echo '
    <tr><td>Name:</td><td><input type="text" id="name"/></td></tr>
    <tr><td>Price(1 unit):</td><td><input type="text" id="price"/></td></tr>
    <tr><td>Quantity:</td><td><input type="text" id="quantity"/></td></tr>
    <tr><td>Date of Purchase:</td><td><input type="date" id="dateofpurchase"/><br /></td></tr>
    <tr><td>Type of inventory:</td><td><select id="typeofitem">
    <option value="E1">Eatable Goods</option>
    <option value="E2">Stock of Previous Month</option>
    <option value="E3">Balance Stock</option>
    <option value="E4">Worker Salary</option>
    <option value="E5">Fuel Charges</option>
    <option value="E6">Miscellaneous</option>
    </select></td></tr>'.
    '</table>';
    echo '<button onclick="addinventory()" id="addinventory">Add</button>';
}
if(@$_GET['viewinventory']==1)
{
    echo '<div id="viewer">Choose a month: <select id="month" onchange="fetchdata('."'inventory'".')">
    <option value="none">--Please Choose a month--</option>
    <option value="jan">January</option>
    <option value="feb">February</option>
    <option value="mar">March</option>
    <option value="apr">April</option>
    <option value="may">May</option>
    <option value="jun">June</option>
    <option value="jul">July</option>
    <option value="aug">August</option>
    <option value="sep">September</option>
    <option value="oct">October</option>
    <option value="nov">November</option>
    <option value="dec">December</option></select></div>';
}

if(@$_GET['addinventory']==1)
{
    $con = mysql_connect("localhost","root","tiger")or die("There is an error<br />We will get back to you soon.");
    if(!mysql_select_db("eblockmess",$con)){die("There is an error<br />We will get back to you soon.");}
    $name = @$_GET['name'];
    $price = @$_GET['price'];
    $quantity = @$_GET['quantity'];
    $dateofpurchase = @$_GET['dateofpurchase'];
    $type = @$_GET['type'];
    $month = @$_GET['month'];
    $query = "INSERT INTO inventory (name, price, quantity, dateofpurchase, type, month) VALUES ('".$name."','".$price."','".$quantity."','".$dateofpurchase."','".$type."','".$month."')";
   
    $result = mysql_query($query,$con);
    if(!$result){die("There is an error<br />We will get back to you soon.");}
    else{
    echo '<p class="message">'.$quantity.' units of '.$name.' at Rs. '.$price.' is added to list.</p1>';    
    echo '<h4><u>Add Inventory Form</u></h4>';
    echo '<table>';
    echo '
    <tr><td>Name:</td><td><input type="text" id="name"/></td></tr>
    <tr><td>Price(1 unit):</td><td><input type="text" id="price"/></td></tr>
    <tr><td>Quantity:</td><td><input type="text" id="quantity"/></td></tr>
    <tr><td>Date of Purchase:</td><td><input type="date" id="dateofpurchase"/><br /></td></tr>
    <tr><td>Type of inventory:</td><td><select id="typeofitem">
    <option value="E1">Eatable Goods</option>
    <option value="E2">Stock of Previous month</option>
    <option value="E3">Balance Stock</option>
    <option value="E4">Worker Salary</option>
    <option value="E5">Fuel Charges</option>
    <option value="E6">Miscellaneous</option>
    </select></td></tr>'.
    '</table>';
    echo '<button onclick="addinventory()" id="addinventory">Add</button>';}
}
if(@$_GET['insertmember']==1)
{
    echo '<h4><u>Add Member Form</u></h4>';
    echo '<table>';
    echo '
    <tr><td>Name:</td><td><input type="text" id="name"/></td></tr>
    <tr><td>Father'."'".'s Name:</td><td><input type="text" id="fathersname"/></td></tr>
    <tr><td>Contact No:</td><td><input type="text" id="contact"/></td></tr>
    <tr><td>Mess Joined:</td><td><select id="messjoined"><option value="Yes">Yes</option><option value="No">No</option></select><br /></td></tr>
    <tr><td>Fee Paid:</td><td><input type="number" id="feepaid" /></td></tr>
    <tr><td>Room No:</td><td><input type="number" id="roomno"/></td></tr>
    <tr><td>MessID:</td><td><input type="number" id="messid"/></td></tr>'.
    '</table>';
    echo '<button onclick="addmember()" id="addmember">Add</button>';
}
if(@$_GET['addmember']==1)
{
    $con = mysql_connect("localhost","root","tiger")or die("There is an error<br />We will get back to you soon.");
    if(!mysql_select_db("eblockmess",$con)){die("There is an error<br />We will get back to you soon.");}
    $name = @$_GET['name'];
    $fathersname = @$_GET['fathersname'];
    $contact = @$_GET['contact'];
    $messjoined = @$_GET['messjoined'];
    $feepaid = @$_GET['feepaid'];
    $roomno = @$_GET['roomno'];
    $messid = @$_GET['messid'];
    $query = "INSERT INTO students (name, fathersname, contact, messjoined, feepaid, roomno, messid) VALUES ('".$name."','".$fathersname."','".$contact."','".$messjoined."','".$feepaid."','".$roomno."','".$messid."')";
   
    $result = mysql_query($query,$con);
    if(!$result){die("There is an error<br />We will get back to you soon.");}
    else{
        echo '<p class="message">'.$name.' was added as a member.</p>';
        echo '<h4><u>Add Member Form</u></h4>';
    echo '<table>';
    echo '
    <tr><td>Name:</td><td><input type="text" id="name"/></td></tr>
    <tr><td>Father'."'".'s Name:</td><td><input type="text" id="fathersname"/></td></tr>
    <tr><td>Contact No:</td><td><input type="text" id="contact"/></td></tr>
    <tr><td>Mess Joined:</td><td><select id="messjoined"><option value="yes">Yes</option><option value="no">No</option></select><br /></td></tr>
    <tr><td>Fee Paid:</td><td><input type="number" id="feepaid" /></td></tr>
    <tr><td>Room No:</td><td><input type="number" id="roomno"/></td></tr>
    <tr><td>MessID:</td><td><input type="number" id="messid"/></td></tr>'.
    '</table>';
    echo '<button onclick="addmember()" id="addmember">Add</button>';
    }
}

if(@$_GET['viewmember'])
{
    $con = mysql_connect("localhost","root","tiger")or die("There is an error<br />We will get back to you soon.");
    if(!mysql_select_db("eblockmess",$con)){die("There is an error<br />We will get back to you soon.");}
    $query = "SELECT * FROM `students`";
    $result = mysql_query($query,$con);
    $once=1;
    if(!$result){die("There is an error<br />We will get back to you soon.");}
    while($row = mysql_fetch_array($result))
    {
        $sid = $row['sid'];
    $name = $row['name'];
    $fathersname = $row['fathersname'];
    $contact = $row['contact'];
    $messjoined = $row['messjoined'];
    $feepaid = $row['feepaid'];
    $roomno = $row['roomno'];
    $messid = $row['messid'];
    if($once==1)
    {
        echo '<table border="1" id="fetchmember"><th>Name</th><th>fathersame</th><th>Contact</th><th>Mess Joined</th><th>Fee Paid</th><th>Room No</th><th>MessId</th>';
        $once++;
    }
         echo '<tr id="'.$sid.'">
        <td id="name1a1b5grt'.$sid.'" ondblclick="changememberdata('."'name1a1b5grt".$sid."'".')">'.$name.'</td>
        <td id="fathersname1a1b5grt'.$sid.'" ondblclick="changememberdata('."'fathersname1a1b5grt".$sid."'".')">'.$fathersname.'</td>
        <td id="contact1a1b5grt'.$sid.'" ondblclick="changememberdata('."'contact1a1b5grt".$sid."'".')">'.$contact.'</td>
        <td id="messjoined1a1b5grt'.$sid.'" ondblclick="changememberdata('."'messjoined1a1b5grt".$sid."'".')">'.$messjoined.'</td>
        <td id="feepaid1a1b5grt'.$sid.'" ondblclick="changememberdata('."'feepaid1a1b5grt".$sid."'".')">'.$feepaid.'</td>
        <td id="roomno1a1b5grt'.$sid.'" ondblclick="changememberdata('."'roomno1a1b5grt".$sid."'".')">'.$roomno.'</td>
        <td id="messid1a1b5grt'.$sid.'" ondblclick="changememberdata('."'messid1a1b5grt".$sid."'".')">'.$messid.'</td></tr>';
    
    }
    echo '</table>';   
}

if(@$_GET['insertextra']==1)
{
    echo '<h4><u>Add Extra Item Form</u></h4>';
    echo '<table>';
    echo '
    <tr><td>Name of Item:</td><td><input type="text" id="nameofitem"/></td></tr>
    <tr><td>Item Id:</td><td><input type="text" id="itemid"/></td></tr>
    <tr><td>Price:</td><td><input type="text" id="price"/></td></tr>'.
    '</table>';
    echo '<button onclick="addextra()" id="addextra">Add</button>';
}

if(@$_GET['addextra']==1)
{
    $con = mysql_connect("localhost","root","tiger")or die("There is an error<br />We will get back to you soon.");
    if(!mysql_select_db("eblockmess",$con)){die("There is an error<br />We will get back to you soon.");}
    $nameofitem = @$_GET['nameofitem'];
    $itemid = @$_GET['itemid'];
    $price = @$_GET['price'];
    
    $query = "INSERT INTO extraitems (nameofitem, itemid, price) VALUES ('".$nameofitem."','".$itemid."','".$price."')";
   
    $result = mysql_query($query,$con);
    if(!$result){die("There is an error<br />We will get back to you soon.");}
    else{
    echo '<p class="message">'.$nameofitem.' is added with item id: '.$itemid.' and price Rs.'.$price.'</p>';
    echo '<h4><u>Add Extra Item Form</u></h4>';
    echo '<table>';
    echo '
    <tr><td>Name of Item:</td><td><input type="text" id="nameofitem"/></td></tr>
    <tr><td>Item Id:</td><td><input type="text" id="itemid"/></td></tr>
    <tr><td>Price:</td><td><input type="text" id="price"/></td></tr>'.
    '</table>';
    echo '<button onclick="addextra()" id="addextra">Add</button>';}
}

if(@$_GET['viewextra'])
{
    $con = mysql_connect("localhost","root","tiger")or die("There is an error<br />We will get back to you soon.");
    if(!mysql_select_db("eblockmess",$con)){die("There is an error<br />We will get back to you soon.");}
    $query = "SELECT * FROM `extraitems`";
    $result = mysql_query($query,$con);
    $once=1;
    if(!$result){die("There is an error<br />We will get back to you soon.");}
    while($row = mysql_fetch_array($result))
    {
    $itemid = $row['itemid'];
    $nameofitem = $row['nameofitem'];
    $price = $row['price'];
    $autoid = $row['autoid'];
    if($once==1)
    {
        echo '<table border="1" id="viewextra"><th>ItemId</th><th>Name of Item</th><th>price</th>';
        $once++;
    }
         echo '<tr id="'.$autoid.'">
        <td id="itemid1a1b5grt'.$autoid.'" ondblclick="changeextradata('."'itemid1a1b5grt".$autoid."'".')">'.$itemid.'</td>
        <td id="nameofitem1a1b5grt'.$autoid.'" ondblclick="changeextradata('."'nameofitem1a1b5grt".$autoid."'".')">'.$nameofitem.'</td>
        <td id="price1a1b5grt'.$autoid.'" ondblclick="changeextradata('."'price1a1b5grt".$autoid."'".')">'.$price.'</td></tr>';    
    }
    echo '</table>';   
}

if(@$_GET['insertextraorder']==1)
{
    $con = mysql_connect("localhost","root","tiger")or die("There is an error<br />We will get back to you soon.");
    if(!mysql_select_db("eblockmess",$con)){die("There is an error<br />We will get back to you soon.");}
    $query="SELECT * FROM extraitems";
    $result = mysql_query($query,$con);
    $items="";
    if(!$result){die("There is an error<br />We will get back to you soon.");}
    while($row=mysql_fetch_array($result))
    {
        $items = $items.'<option value="'.$row['itemid'].'">'.$row['nameofitem'].'</option>';
    }
    
    echo '<h4><u>Do extra order form</u></h4>';
    echo '<table>';
    echo '
    <tr><td>Room No:</td><td><input type="text" id="roomno" onblur="fetchnames()"/></td></tr>
    <tr><td>Name of student:</td><td><select id="nameofstudent" onblur="loaddate()"></select></td></tr>
    <tr><td>Date:</td><td><input type="text" id="date" /></td></tr>
    <tr><td>Order:</td><td><select id="itemid">'.$items.'</select></td></tr>'.
    '</table>';
    echo '<button onclick="addextraorder()" id="addextraorder">Add</button>';
}

if(@$_GET['addextraorder']==1)
{
    $con = mysql_connect("localhost","root","tiger")or die("There is an error<br />We will get back to you soon.");
    if(!mysql_select_db("eblockmess",$con)){die("There is an error<br />We will get back to you soon.");}
    $roomno = @$_GET['roomno'];
    $nameofstudent = @$_GET['nameofstudent'];
    $date = @$_GET['date'];
    $itemid = @$_GET['itemid'];
    $month = @$_GET['month'];
    $query1 = "SELECT `price` FROM `extraitems` WHERE `itemid`=".$itemid;
    $result1 = mysql_query($query1,$con);
    if(!$result1){die("There is an error<br />We will get back to you soon.");}
    while($row=mysql_fetch_array($result1))
    {
        $price = $row['price'];
    }
    
    $query = "INSERT INTO sextra (roomno, nameofstudent, date, month, extraid, price) VALUES ('".$roomno."','".$nameofstudent."','".$date."','".$month."','".$itemid."','".$price."')";
   
    $result = mysql_query($query,$con);
    if(!$result){die("There is an error<br />We will get back to you soon.");}
    else
    {
        $con = mysql_connect("localhost","root","tiger")or die("There is an error<br />We will get back to you soon.");
    if(!mysql_select_db("eblockmess",$con)){die("There is an error<br />We will get back to you soon.");}
    $query="SELECT * FROM extraitems";
    $result = mysql_query($query,$con);
    $items="";
    if(!$result){die("There is an error<br />We will get back to you soon.");}
    while($row=mysql_fetch_array($result))
    {
        $items = $items.'<option value="'.$row['itemid'].'">'.$row['nameofitem'].'</option>';
    }
    echo '<p class="message">Extra order of ItemId:'.$itemid.' for<br />Room No:'.$roomno.'<br />Name:'.$nameofstudent.'<br />has been added successfully.</p>';
    echo '<h4><u>Do extra order form</u></h4>';
    echo '<table>';
    echo '
    <tr><td>Room No:</td><td><input type="text" id="roomno" onblur="fetchnames()"/></td></tr>
    <tr><td>Name of student:</td><td><select id="nameofstudent" onblur="loaddate()"></select></td></tr>
    <tr><td>Date:</td><td><input type="text" id="date" /></td></tr>
    <tr><td>Order:</td><td><select id="itemid">'.$items.'</select></td></tr>'.
    '</table>';
    echo '<button onclick="addextraorder()" id="addextraorder">Add</button>';

    }
}

if(@$_GET['viewextraorder'])
{
   echo '<div id="viewer">Choose a month: <select id="month" onchange="fetchdata('."'sextra'".')">
    <option value="none">--Please Choose a month--</option>
    <option value="jan">January</option>
    <option value="feb">February</option>
    <option value="mar">March</option>
    <option value="apr">April</option>
    <option value="may">May</option>
    <option value="jun">June</option>
    <option value="jul">July</option>
    <option value="aug">August</option>
    <option value="sep">September</option>
    <option value="oct">October</option>
    <option value="nov">November</option>
    <option value="dec">December</option></select></div>';
}

if(@$_GET['namefetch']==1)
{
    $roomno = @$_GET['roomno'];
    $con = mysql_connect("localhost","root","tiger")or die("There is an error<br />We will get back to you soon.");
    if(!mysql_select_db("eblockmess",$con)){die("There is an error<br />We will get back to you soon.");}
    $query = "SELECT `name` FROM `students` WHERE roomno=".$roomno."";

    $result = mysql_query($query,$con);
    
    if(!$result){die("There is an error<br />We will get back to you soon.");}
    while($row=mysql_fetch_array($result))
    {
        
        echo '<option value="'.$row['name'].'">';
        echo $row['name'];
        echo '</option>';
    }
    
}

if(@$_GET['fetch']=="inventory")
{
    $month = @$_GET['month'];
    $con = mysql_connect("localhost","root","tiger")or die("1There is an error<br />We will get back to you soon.");
    if(!mysql_select_db("eblockmess",$con)){die("2There is an error<br />We will get back to you soon.");}
    $query = "SELECT * FROM `inventory` WHERE `month`='".$month."' ORDER BY `dateofpurchase` ASC";
    $result = mysql_query($query,$con);
    $once = 1;
    $totalamount = 0;
    if(!$result){die("3There is an error<br />We will get back to you soon.");}
    while($row=mysql_fetch_array($result))
    {
        $transactionid = $row['transactionid'];
        $name = $row['name'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $dateofpurchase = $row['dateofpurchase'];
        $type = $row['type'];
        $typename = "";
        switch($type)
        {
            case 'E1':$typename = "Eatable Goods";break;
            case 'E2':$typename = "Stock of Previous Month";break;
            case 'E3':$typename = "Balance Stock";break;
            case 'E4':$typename = "Worker Salary";break;
            case 'E5':$typename = "Fuel Charge";break;
            case 'E6':$typename = "Miscellaneous";break;
        }
        
        if($once==1)
        {
             echo '<div id="viewer">Choose a month: <select id="month" onchange="fetchdata('."'inventory'".')">
    <option value="none">--Please Choose a month--</option>
    <option value="jan">January</option>
    <option value="feb">February</option>
    <option value="mar">March</option>
    <option value="apr">April</option>
    <option value="may">May</option>
    <option value="jun">June</option>
    <option value="jul">July</option>
    <option value="aug">August</option>
    <option value="sep">September</option>
    <option value="oct">October</option>
    <option value="nov">November</option>
    <option value="dec">December</option></select></div><br />';
    
        echo '<table border="1" id="fetchinventory"><th>Name</th><th>Date of Purchase</th><th>Type</th><th>Price</th><th>Quantity</th><th>Amount</th>';
        $once++;
        }
        echo '<tr id="'.$transactionid.'">
        <td id="name1a1b5grt'.$transactionid.'" ondblclick="changeinventorydata('."'name1a1b5grt".$transactionid."'".')">'.$name.'</td>
        <td id="dateofpurchase1a1b5grt'.$transactionid.'" ondblclick="changeinventorydata('."'dateofpurchase1a1b5grt".$transactionid."'".')">'.$dateofpurchase.'</td>
        <td id="type1a1b5grt'.$transactionid.'" ondblclick="changeinventorydata('."'type1a1b5grt".$transactionid."'".')">'.$typename.'</td>
        <td id="price1a1b5grt'.$transactionid.'" ondblclick="changeinventorydata('."'price1a1b5grt".$transactionid."'".')">'.$price.'</td>
        <td id="quantity1a1b5grt'.$transactionid.'" ondblclick="changeinventorydata('."'quantity1a1b5grt".$transactionid."'".')">'.$quantity.'</td>
        <td id="amount1a1b5grt'.$transactionid.'">'.$price*$quantity.'</td></tr>';
        $totalamount = $totalamount + $price*$quantity;
        
        
    }
    echo '</table>';
    echo '<b id="totalamount">Total Amount Spended: Rs.'.$totalamount.'</b>';
}
if(@$_GET['fetch']=='sextra')
{
    //loading extra items with id array
    $db = "eblockmess";
    $tb = "extraitems";
    
    $result1 = mysqlselect($db,$tb,"","");
    $array_itemname;
    while($row1 = mysql_fetch_array($result1))
    {
        $itemid = $row1['itemid'];
        $array_itemname[$itemid] = $row1['nameofitem'];
    }
    $month = @$_GET['month'];
    $db = "eblockmess";
    $tb = "sextra";
    $result = mysqlselect($db,$tb,"month",$month);
    $once = 1;
    if($result!="failed"){
    while($row=mysql_fetch_array($result))
    {
        $autoid = $row['autoid'];
        $roomno = $row['roomno'];
        $nameofstudent = $row['nameofstudent'];
        $price = $row['price'];
        $date = $row['date'];
        $extraid = $row['extraid'];
        if($once==1)
        {
            echo '<div id="viewer">Choose a month: <select id="month" onchange="fetchdata('."'sextra'".')">
    <option value="none">--Please Choose a month--</option>
    <option value="jan">January</option>
    <option value="feb">February</option>
    <option value="mar">March</option>
    <option value="apr">April</option>
    <option value="may">May</option>
    <option value="jun">June</option>
    <option value="jul">July</option>
    <option value="aug">August</option>
    <option value="sep">September</option>
    <option value="oct">October</option>
    <option value="nov">November</option>
    <option value="dec">December</option></select></div><br />';
    
        echo '<table border="1" id="fetchextraorder"><th>Room No</th><th>Name of Student</th><th>Date</th><th>ExtraItem</th><th>Price</th>';
        $once++;
        }
        echo '<tr id="'.$autoid.'">
        <td id="roomno1a1b5grt'.$autoid.'" >'.$roomno.'</td>
        <td id="nameofstudent1a1b5grt'.$autoid.'" >'.$nameofstudent.'</td>
        <td id="date1a1b5grt'.$autoid.'" ondblclick="changesextradata('."'date1a1b5grt".$autoid."'".')">'.$date.'</td>
        <td id="extraid1a1b5grt'.$autoid."1a1b5grt".$extraid.'" ondblclick="changesextradata('."'extraid1a1b5grt".$autoid."1a1b5grt".$extraid."'".')">'.$array_itemname[$extraid].'</td>
        <td id="price1a1b5grt'.$autoid.'" >'.$price.'</td></tr>';
        
    }
    echo '</table>';
    }
    else
    {
        echo "failed";
    }
}
if(@$_GET['updatetable']==1)
{
    $cname=@$_GET['cname'];
    $value=@$_GET['value'];
    $tableupd=@$_GET['tableupd'];
    $checkd=@$_GET['checkd'];
    $checkvalue=@$_GET['checkvalue'];
    if($cname=='type')
    {
        switch($value)
        {
            case 'Eatable Goods':$value = "E1";break;
            case 'Stock of Previous Month':$value = "E2";break;
            case 'Balance Stock':$value = "E3";break;
            case 'Worker Salary':$value = "E4";break;
            case 'Fuel Charges':$value = "E5";break;
            case 'Miscellaneous':$value = "E6";break;
        }
    }

    $con = mysql_connect("localhost","root","tiger")or die("1There is an error<br />We will get back to you soon.");
    if(!mysql_select_db("eblockmess",$con)){die("2There is an error<br />We will get back to you soon.");}
    $query = "UPDATE `".$tableupd."` SET `".$cname."`='".$value."' WHERE `".$checkd."`='".$checkvalue."'";
    $result = mysql_query($query,$con);
    if(!$result){echo "failed1kjdkm54sJNA4sjs";}
    else
    {
        echo "success1kjdkm54sJNA4sjs";
        $query1 = "SELECT `".$cname."` FROM `".$tableupd."` WHERE `".$checkd."`='".$checkvalue."'";
        $result1 = mysql_query($query1,$con);
        while($row = mysql_fetch_array($result1))
        {
            $newchangevalue=$row[$cname];
            if($cname=='type')
            {
                switch($newchangevalue)
        {
            case 'E1':$newchangevalue = "Eatable Goods";break;
            case 'E2':$newchangevalue = "Stock of Previous Month";break;
            case 'E3':$newchangevalue = "Balance Stock";break;
            case 'E4':$newchangevalue = "Worker Salary";break;
            case 'E5':$newchangevalue = "Fuel Charges";break;
            case 'E6':$newchangevalue = "Miscellaneous";break;
        }
                
            }
        echo $newchangevalue;
        }
    }
}
if(@$_GET['updatetable']==2)
{
    $db = "eblockmess";
    $cn=@$_GET['cname'];
    $vl=@$_GET['value'];
    $tb=@$_GET['tableupd'];
    $wh=@$_GET['checkd'];
    $whvl=@$_GET['checkvalue'];
    $returnvalue = mysqlupdate($db,$tb,$cn,$vl,$wh,$whvl);
    if($cn="extraid")
    {
        $tb = "extraitems";
        $result = mysqlselect($db,$tb,"itemid",$vl);
        while($row = mysql_fetch_array($result))
        {
            echo "success1kjdkm54sJNA4sjs".$row['nameofitem']."1kjdkm54sJNA4sjs".$row['price'];
        }
    }
}

if(@$_GET['createselector']=='extraid')
{
    $db = "eblockmess";
    $tb ="extraitems";
    $result = mysqlselect($db,$tb,"","");
    $once  = 1;
    while($row=mysql_fetch_array($result))
    {
        if($once==1)
        {
            echo '<select id="input" onblur="writesextradata(this)" >';
            $once++;
        }
        
        echo "<option value='".$row['itemid']."'>".$row['nameofitem']."</option>";
    }
    echo '</select>';
}
}
else
{
    header("Location:default.php");
}
?>