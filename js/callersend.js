function sendcallerid()
{
	var xmlhttp;
	var name;
	var number;
	document.getElementById("callme").innerHTML = "Processing...";
	name = document.getElementById("callername").value;
	number = document.getElementById("callernumber").value;
	var url = "savecaller.php?name=" + name + "&number=" + number;
	if (window.XMLHttpRequest)
	{ // code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else
	{ // code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("callme").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function clearbutton()
{
	var name = document.getElementById("callme").innerHTML = "Send Info"
}

function login()
{
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    
    document.getElementById("login").innerHTML = "Logging...";
    var xmlhttp;
    var url = "login.php?username="+username+"&password="+password;
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("content").innerHTML = "";
            document.getElementById("content").innerHTML = xmlhttp.responseText;
            document.getElementById("login").innerHTML = "Login";
            
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}
function inventoryload(ident)
{
    
    var xmlhttp;
    
    var coder = ident;
    document.getElementById("thiscontent").innerHTML = "Loading...Please Wait";
    var url = "dashboardcontent.php?"+coder+"=1";
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("thiscontent").innerHTML = "";
            document.getElementById("thiscontent").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();

}
function addinventory()
{
    var xmlhttp;
    document.getElementById("addinventory").innerHTML = "Adding..";
    var name = document.getElementById("name").value;
    var price = document.getElementById("price").value;
    var quantity = document.getElementById("quantity").value;
    var dateofpurchase = document.getElementById("dateofpurchase").value;
    var type = document.getElementById("typeofitem").value;
    var month = dateofpurchase.split("-");
    month[1] = parseInt(month[1]);
    var monthstr = "";
    switch(month[1])
    {
        case 1:monthstr="jan";break;
        case 2:monthstr="feb";break;
        case 3:monthstr="mar";break;
        case 4:monthstr="apr";break;
        case 5:monthstr="may";break;
        case 6:monthstr="jun";break;
        case 7:monthstr="jul";break;
        case 8:monthstr="aug";break;
        case 9:monthstr="sep";break;
        case 10:monthstr="oct";break;
        case 11:monthstr="nov";break;
        case 12:monthstr="dec";break;
    }
    var url = "dashboardcontent.php?addinventory=1&name="+name+"&price="+price+"&quantity="+quantity+"&dateofpurchase="+dateofpurchase+"&type="+type+"&month="+monthstr;
    //document.write(url);
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("thiscontent").innerHTML = "";
            document.getElementById("thiscontent").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();

}
function memberload(ident)
{
    var xmlhttp;
    
    var coder = ident;
    document.getElementById("thiscontent").innerHTML = "Loading...Please Wait";
    var url = "dashboardcontent.php?"+coder+"=1";
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("thiscontent").innerHTML = "";
            document.getElementById("thiscontent").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();

}
function addmember()
{
    var xmlhttp;
    
    document.getElementById("addmember").innerHTML = "Adding..";
    
    var name = document.getElementById("name").value;
    var fathersname = document.getElementById("fathersname").value;
    var contact = document.getElementById("contact").value;
    var messjoined = document.getElementById("messjoined").value;
    var feepaid = document.getElementById("feepaid").value;
    var roomno = document.getElementById('roomno').value;
    var messid = document.getElementById('messid').value;
    
    var url = "dashboardcontent.php?addmember=1&name="+name+"&fathersname="+fathersname+"&contact="+contact+
    "&messjoined="+messjoined+"&feepaid="+feepaid+"&roomno="+roomno+"&messid="+messid;
    //document.write(url);
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("thiscontent").innerHTML = "";
            document.getElementById("thiscontent").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();

}
function extraload(ident)
{
    var xmlhttp;
    
    var coder = ident;
    document.getElementById("thiscontent").innerHTML = "Loading...Please Wait";
    var url = "dashboardcontent.php?"+coder+"=1";
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("thiscontent").innerHTML = "";
            document.getElementById("thiscontent").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();

}
function addextra()
{
    var xmlhttp;
    document.getElementById("addextra").innerHTML = "Adding..";
    var nameofitem = document.getElementById("nameofitem").value;
    var itemid = document.getElementById("itemid").value;
    var price = document.getElementById("price").value;
    
    var url = "dashboardcontent.php?addextra=1&nameofitem="+nameofitem+"&itemid="+itemid+"&price="+price;
        //document.write(url);
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("thiscontent").innerHTML = "";
            document.getElementById("thiscontent").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();

}

function extraorderload(ident)
{
    var xmlhttp;
    
    var coder = ident;
    document.getElementById("thiscontent").innerHTML = "Loading...Please Wait";
    var url = "dashboardcontent.php?"+coder+"=1";
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("thiscontent").innerHTML = "";
            document.getElementById("thiscontent").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();

}

function fetchnames()
{
     var xmlhttp;
    
    var coder = document.getElementById("roomno").value;
    document.getElementById("nameofstudent").innerHTML = "<option>Loading</option>";
    var url = "dashboardcontent.php?namefetch=1&roomno="+coder;
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("nameofstudent").innerHTML = "";
            document.getElementById("nameofstudent").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();

}

function loaddate()
{
    var date = new Date();
    var month = date.getMonth()+1;
    var todaydate = date.getDate()+"/"+month+"/"+date.getFullYear();

    document.getElementById('date').value = todaydate;
}

function addextraorder()
{
    var xmlhttp;
    document.getElementById("addextraorder").innerHTML = "Adding..";
    var roomno = document.getElementById("roomno").value;
    var nameofstudent = document.getElementById("nameofstudent").value;
    var date = document.getElementById("date").value;
    var itemid = document.getElementById("itemid").value;
    var datesplit = date.split("/");
    var month = parseInt(datesplit[1]);
    var monthstr="";
    switch(month)
    {
        case 1:monthstr="jan";break;
        case 2:monthstr="feb";break;
        case 3:monthstr="mar";break;
        case 4:monthstr="apr";break;
        case 5:monthstr="may";break;
        case 6:monthstr="jun";break;
        case 7:monthstr="jul";break;
        case 8:monthstr="aug";break;
        case 9:monthstr="sep";break;
        case 10:monthstr="oct";break;
        case 11:monthstr="nov";break;
        case 12:monthstr="dec";break;
    }
        //document.write(month);
    var url = "dashboardcontent.php?addextraorder=1&roomno="+roomno+"&nameofstudent="+nameofstudent+"&date="+date+"&itemid="+itemid+"&month="+monthstr;
        //document.write(url);
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("thiscontent").innerHTML = "";
            document.getElementById("thiscontent").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();

}
function fetchdata(idofelement)
{
    
    var xmlhttp;
    
    if(idofelement=="inventory")
    {
        var month = document.getElementById('month').value;
        var url = "dashboardcontent.php?fetch="+idofelement+"&month="+month;
    }
    else if(idofelement='sextra')
    {
        var month = document.getElementById('month').value;
        var url = "dashboardcontent.php?fetch="+idofelement+"&month="+month;
    }
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            
            document.getElementById('thiscontent').innerHTML = xmlhttp.responseText;
            document.getElementById('month').value = month;
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}

function changeinventorydata(idofelement)
{
    var element = document.getElementById(idofelement);
    var broker = idofelement.split("1a1b5grt");
    localStorage.idofupdateelement = idofelement;
    localStorage.cname = broker[0];
    localStorage.tableupd = "inventory";
    localStorage.checkd = "transactionid";
    localStorage.checkvalue = broker[1];
    if(broker[0]=="name"||broker[0]=="price"||broker[0]=="quantity")
    {
        localStorage.initialvalue = element.innerHTML;
        element.innerHTML = '<input type="text" id="input" onblur="writeinventorydata(this)" />';
        var inputelement = document.getElementById("input");
        inputelement.value = localStorage.initialvalue;
    }
    else if(broker[0]=="dateofpurchase")
    {
        localStorage.initialvalue = element.innerHTML;
        element.innerHTML = '<input type="date" id="input" onblur="writeinventorydata(this)" />';
        var inputelement = document.getElementById("input");
        inputelement.value = localStorage.initialvalue;
    }
    else if(broker[0]=="type")
    {
        
        var initialvalue = element.innerHTML;
        localStorage.initialvalue = initialvalue;
        element.innerHTML = '<select onblur="writeinventorydata(this)" id="input"><option value="Eatable Goods">Eatable Goods</option><option value="Stock of Previous Month">Stock of Previous Month</option><option value="Balance Stock">Balance Stock</option><option value="Worker Salary">Worker Salary</option><option value="Fuel Charges">Fuel Charges</option><option value="Miscellaneous">Miscellaneous</option></select>';
        var inputelement = document.getElementById("input");
        inputelement.value = initialvalue;
        
    }
    
    inputelement.focus();
}

function writeinventorydata(cid)
{
    var idofupdateelement = localStorage.idofupdateelement;
    
    
    var xmlhttp;
    
    var cname = localStorage.cname;
    var value = cid.value;
    var tableupd = localStorage.tableupd;
    var checkd = localStorage.checkd;
    var checkvalue = localStorage.checkvalue;
    var url = "dashboardcontent.php?updatetable=1&cname="+cname+"&value="+value+"&tableupd="+tableupd+"&checkd="+checkd+"&checkvalue="+checkvalue;
    document.getElementById(idofupdateelement).innerHTML = value;
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var responsetext = xmlhttp.responseText;
            var responsebreak = responsetext.split("1kjdkm54sJNA4sjs");
            if(responsebreak[0]=="success")
            {
                document.getElementById(idofupdateelement).innerHTML = responsebreak[1];
                if(cname=='price'||cname=='quantity')
                {
                    var split_idofelement = idofupdateelement.split("1a1b5grt");
                    if(split_idofelement[0]=="price")
                    {
                    var newprice = parseFloat(document.getElementById('price1a1b5grt'+checkvalue).innerHTML);
                    var quantity = document.getElementById("quantity1a1b5grt"+checkvalue).innerHTML; 
                    var previousamount = parseFloat(document.getElementById("amount1a1b5grt"+checkvalue).innerHTML);
                    var newamount = newprice*quantity;
                    document.getElementById("amount1a1b5grt"+checkvalue).innerHTML = newamount;
                    var totalamount_split = document.getElementById("totalamount").innerHTML.split("Rs.");
                    var totalamount = parseFloat(totalamount_split[1]);
                    var totalamount = totalamount + newamount - previousamount;
                    document.getElementById("totalamount").innerHTML = totalamount_split[0]+"Rs."+totalamount;
                    }
                    else if(split_idofelement[0]=="quantity")
                    {
                    var newquantity = parseFloat(document.getElementById('quantity1a1b5grt'+checkvalue).innerHTML);
                    var price = document.getElementById("price1a1b5grt"+checkvalue).innerHTML; 
                    var previousamount = parseFloat(document.getElementById("amount1a1b5grt"+checkvalue).innerHTML);
                    var newamount = newquantity*price;
                    document.getElementById("amount1a1b5grt"+checkvalue).innerHTML = newamount;
                    var totalamount_split = document.getElementById("totalamount").innerHTML.split("Rs.");
                    var totalamount = parseFloat(totalamount_split[1]);
                    var totalamount = totalamount + newamount - previousamount;
                    document.getElementById("totalamount").innerHTML = totalamount_split[0]+"Rs."+totalamount;
                    }
                }
            }
            else
            {
                document.getElementById(idofupdateelement).innerHTML = localStorage.initialvalue;
                alert("Error:We are unable to process your request");
                
            }
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}


function changememberdata(idofelement)
{
    var element = document.getElementById(idofelement);
    var broker = idofelement.split("1a1b5grt");
    localStorage.idofupdateelement = idofelement;
    localStorage.cname = broker[0];
    localStorage.tableupd = "students";
    localStorage.checkd = "sid";
    localStorage.checkvalue = broker[1];
    if(broker[0]!='messjoined')
    {
        localStorage.initialvalue = element.innerHTML;
        element.innerHTML = '<input type="text" id="input" onblur="writememberdata(this)" />';
        var inputelement = document.getElementById("input");
        inputelement.value = localStorage.initialvalue;
    }
    
    else if(broker[0]=="messjoined")
    {
        
        var initialvalue = element.innerHTML;
        localStorage.initialvalue = initialvalue;
        element.innerHTML = '<select onblur="writememberdata(this)"  id="input"><option value="Yes">Yes</option><option value="No">No</option></select>';
        var inputelement = document.getElementById("input");
        inputelement.value = initialvalue;
        
    }
    
    inputelement.focus();
}

function writememberdata(cid)
{
    var idofupdateelement = localStorage.idofupdateelement;
    if(cid=="donothing"){document.getElementById(idofupdateelement).innerHTML = localStorage.initialvalue;}
    else{
    var xmlhttp;
    
    var cname = localStorage.cname;
    var value = cid.value;
    var tableupd = localStorage.tableupd;
    var checkd = localStorage.checkd;
    var checkvalue = localStorage.checkvalue;
    var url = "dashboardcontent.php?updatetable=1&cname="+cname+"&value="+value+"&tableupd="+tableupd+"&checkd="+checkd+"&checkvalue="+checkvalue;
    document.getElementById(idofupdateelement).innerHTML = value;
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var responsetext = xmlhttp.responseText;
            var responsebreak = responsetext.split("1kjdkm54sJNA4sjs");
            if(responsebreak[0]=="success")
            {
                document.getElementById(idofupdateelement).innerHTML = responsebreak[1];
                
            }
            else
            {
                document.getElementById(idofupdateelement).innerHTML = localStorage.initialvalue;
                alert("Error:We are unable to process your request");
                
            }
            }
            
        }
    
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}
}

function changeextradata(idofelement)
{

    var element = document.getElementById(idofelement);
    var broker = idofelement.split("1a1b5grt");
    localStorage.idofupdateelement = idofelement;
    localStorage.cname = broker[0];
    localStorage.tableupd = "extraitems";
    localStorage.checkd = "autoid";
    localStorage.checkvalue = broker[1];
    //Here we are creating an input field.
        localStorage.initialvalue = element.innerHTML;
        element.innerHTML = '<input type="text" id="input" onblur="writeextradata(this)" />';
        var inputelement = document.getElementById("input");
        inputelement.value = localStorage.initialvalue;
    
    
    
    inputelement.focus();
}

function writeextradata(cid)
{
    var idofupdateelement = localStorage.idofupdateelement;
    if(cid=="donothing"){document.getElementById(idofupdateelement).innerHTML = localStorage.initialvalue;}
    else{
    var xmlhttp;
    
    var cname = localStorage.cname;
    var value = cid.value;
    var tableupd = localStorage.tableupd;
    var checkd = localStorage.checkd;
    var checkvalue = localStorage.checkvalue;
    var url = "dashboardcontent.php?updatetable=1&cname="+cname+"&value="+value+"&tableupd="+tableupd+"&checkd="+checkd+"&checkvalue="+checkvalue;
    document.getElementById(idofupdateelement).innerHTML = value;
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var responsetext = xmlhttp.responseText;
            var responsebreak = responsetext.split("1kjdkm54sJNA4sjs");
            if(responsebreak[0]=="success")
            {
                document.getElementById(idofupdateelement).innerHTML = responsebreak[1];
                
            }
            else
            {
                document.getElementById(idofupdateelement).innerHTML = localStorage.initialvalue;
                alert("Error:We are unable to process your request");
                
            }
            }
            
        }
    
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}
}

function changesextradata(idofelement)
{
    var element = document.getElementById(idofelement);
    var broker = idofelement.split("1a1b5grt");
    localStorage.idofupdateelement = idofelement;
    localStorage.cname = broker[0];
    localStorage.tableupd = "sextra";
    localStorage.checkd = "autoid";
    localStorage.checkvalue = broker[1];
    //Here we are creating an input field.
    if(broker[0]=="extraid")
    {
        localStorage.initialvalue = broker[2];
        var xmlhttp;
        var url = "dashboardcontent.php?createselector="+broker[0];
        if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
        else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
        xmlhttp.onreadystatechange = function()
       {
        
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            
            document.getElementById(idofelement).innerHTML = xmlhttp.responseText;    
            var inputelement = document.getElementById("input");
        inputelement.value = localStorage.initialvalue;
        inputelement.focus();
        }
        
        }
        xmlhttp.open("GET",url,true);
        xmlhttp.send();
        
    }
    else
    {
        
    
        localStorage.initialvalue = element.innerHTML;
        element.innerHTML = '<input type="text" id="input" onblur="writesextradata(this)" />';
        var inputelement = document.getElementById("input");
        inputelement.value = localStorage.initialvalue;
        inputelement.focus();
    }
    
    
}

function writesextradata(cid)
{
    var idofupdateelement = localStorage.idofupdateelement;
    if(cid=="donothing"){document.getElementById(idofupdateelement).innerHTML = localStorage.initialvalue;}
    else{
    var xmlhttp;
    
    var cname = localStorage.cname;
    var value = cid.value;
    var tableupd = localStorage.tableupd;
    var checkd = localStorage.checkd;
    var checkvalue = localStorage.checkvalue;
    var url = "dashboardcontent.php?updatetable=2&cname="+cname+"&value="+value+"&tableupd="+tableupd+"&checkd="+checkd+"&checkvalue="+checkvalue;
    document.getElementById(idofupdateelement).innerHTML = value;
    if(window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}
    else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var responsetext = xmlhttp.responseText;
            var responsebreak = responsetext.split("1kjdkm54sJNA4sjs");
            if(responsebreak[0]=="success")
            {
                document.getElementById(idofupdateelement).innerHTML = responsebreak[1];
                document.getElementById("price1a1b5grt"+checkvalue).innerHTML = responsebreak[2];
                
            }
            else
            {
                document.getElementById(idofupdateelement).innerHTML = localStorage.initialvalue;
                alert("Error:We are unable to process your request");
                
            }
            }
            
        }
    
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}
}