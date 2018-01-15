<div class="hmw3layouts">
    <div class="container">

<script>
    var fn, ln, pas, cpas, ema, phn, add = false;

    function check_fn(e){
        if (e.value.length > 0) {
            fn = true;
            fn_msg.innerHTML = "Firstname is OK";
        } else {
            fn = false;
            fn_msg.innerHTML = "Firstname must be filled out";
        }
    }

    function check_ln(e) {
        if (e.value.length > 0) {
            ln = true;
            ln_msg.innerHTML = "Lastname is OK";
        } else {
            ln = false;
            ln_msg.innerHTML = "Lastname must be filled out";
        }
    }
	function check_address(e) {
        if (e.value.length > 0) {
            add = true;
            address_msg.innerHTML = "Address is OK";
        } else {
            add = false;
            address_msg.innerHTML = "Address must be filled out";
        }
    }

    function check_phone(e) {
        var numbers = /^[0-9]+$/;
        if (e.value.match(numbers)) {
            phn = true;
            phn_msg.innerHTML = "Phone is OK";
        } else {
            phn = false;
            phn_msg.innerHTML = "Please Input Numeric Characters Only";
        }
    }

    function check_pass(e) {
        if (e.value.length > 4) {
            pas = true;
            ps_msg.innerHTML = "Password is ok";
        } else {
            pas = false;
            ps_msg.innerHTML = "Password is not ok";
        }
    }

    function check_conpass(e) {
        if (e.value == document.myfm.password.value) {
            cpas = true;
            cnps_msg.innerHTML = "Matched";
        } else {
            cpas = false;
            cnps_msg.innerHTML = "Not matched";
        }
    }

    function check_email(e) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(e.value)) {
            ema = true;
            eml_msg.innerHTML = "Email is OK!";
        } else {
            ema = false;
            eml_msg.innerHTML = "Invalid Email Address";
        }
    }

    function check_submit(elm) {
        if(document.myfm.firstName.value == '' || document.myfm.lastName.value == '' || 
		document.myfm.address.value == ''){
            alert("Please fill all value");
        }
        else{
            if ( fn == true && ln == true && add == true && phn == true && pas == true && cpas == true) {
                if (elm.getAttribute("type") == "button") {
                    document.myfm.submit();
                } else {
                    alert("Error occurs!");
                }
            }
        }
    }

 
 xmlhttp = new XMLHttpRequest();

        function showUname() {
            str = document.getElementById("unm").value;

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    uname_msg.innerHTML = xmlhttp.responseText;
                }
            };
            var url = "json.php?uname=" + str;
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
</script>


<style>
  .button {
  border-radius: 4px;
  background-color: #5f2160;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 13px;
  width: 199px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}


.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}


input[type=button] {
    background-color: white;
    color: #5f2160;
    padding: 8px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	font-size: 25px;
}

input[type=button]:hover {
    background-color: #d2a7f2;
}


input[type=password], textarea {
    width: 60%;
    padding: 11px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 5px;
    margin-bottom: 8px;
    resize: vertical;
}



.topnav {
  overflow: hidden;
  background-color: #858778;
}

.topnav a {
   float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 12px 11px;
  text-decoration: none;
  font-size: 16px;
  width : 165px;
}

.topnav a:hover {
  background-color: #a7b7a8;
  color: black;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}


/*  ///////////////////////      box column   ///////////////////////////////// */ 

* {
    box-sizing: border-box;
}

.col-container {
    display: table;
    width: 100%;
	font-weight: bold;
	padding:auto;
}
.col {
    display: table-cell;
    padding: 15px;
	font-weight: bold;
	width: 60%;
}
@media only screen and (max-width: 600px) {
    .col { 
        display: block;
         width: 100%;
    }
}
.img{
  height: 300px;
  weight : 300px;
}

/* /////////////////////////////  contact form //////////////////////////// */

input[type=text]{
    width: 60%;
    padding: 11px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 5px;
    margin-bottom: 8px;
    resize: vertical;
}
select{
    width: 19.5%;
    padding: 11px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 5px;
    margin-bottom: 8px;
    resize: vertical;
}

input[type=button] {
    background-color: #d6d8c7;
    color: black;
    padding: 7px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=button]:hover {
    background-color: #a7b7a8;
}

.container {
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>	
	
    <h3  style="font-size:27px;color:black;margin-left: 220px;">ACCOUNT CREATE </h3>

    <div class="container">
        <form action="register_server.php" method="post" name="myfm" align="left">
            First Name : <br/>
            <input type="text" name="firstName" placeholder="First Name...." onkeyup="check_fn(this)">
            <a id="fn_msg"> </a> 
			<br/> Last Name : <br/>
            <input type="text" name="lastName" placeholder="Last Name...." onkeyup="check_ln(this)">
			 <a id="ln_msg"> </a> 
            </br> Address : <br/>
            <input type="text" name="address" placeholder="Adress...." onkeyup="check_address(this)">
            <a id="address_msg"> </a>
			</br> Phone : <br/>
            <input type="text" name="phone" placeholder="Phone...." onkeyup="check_phone(this)">
            <a id="phn_msg"> </a>
      </br> Gender : <br/>
            <input type="radio" name="gender" value="male"> male 
            <input type="radio" name="gender" value="female"> female
            <!-- <a id="phn_msg"> </a> -->
			<br/> Email : <br/>
            <input type="text" name="email" placeholder="Email...." onkeyup="check_email(this)">
            <a id="eml_msg"> </a>
            <br/> Password : <br/>
            <input type="password" name="password" value="" onkeyup="check_pass(this)">
            <a id="ps_msg"> </a><br/> Confirm password : <br/>
            <input type="password" name="confirmPassword" value="" onkeyup="check_conpass(this)">
            <a id="cnps_msg"> </a><br/>
            <br>
            <input type="button" value="Submit" onclick="check_submit(this)" name="btn"> <br/>
        </form>
    </div>


  </div>
</div> 
