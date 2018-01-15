<?php session_start();  
if(isset($_SESSION["admin"]))
        header("Location:admin_page.php");
if(isset($_SESSION["flag"]))
        header("Location:admin.php");
        ?>
<!DOCTYPE html>
<html lang="en"> 

    <head>
        <title>
            Pharmacy
        </title>
        <meta content="width=device-width, initial-scale=1" name="viewport">
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
            <meta content="Medi Plus Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
    SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" name="keywords"/>
            <script type="application/x-javascript">
                addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
            </script>
            <!-- Custom Theme files -->
            <link href="assets/css/bootstrap.css" media="all" rel="stylesheet" type="text/css">
                <link href="assets/css/style.css" media="all" rel="stylesheet" type="text/css">
                    <link href="assets/css/component.css" rel="stylesheet" type="text/css"/>
                    <link href="assets/css/font-awesome.css" rel="stylesheet">
                        <!-- font-awesome icons -->
                        <!-- //Custom Theme files -->
                        <!-- js -->
                        <script src="assets/js/jquery-1.11.1.min.js">
                        </script>
                        <script src="assets/js/modernizr.custom.js">
                        </script>
                        <!-- //js -->
                        <!-- web fonts -->
                        <link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
                            <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
                                <!-- //web fonts -->
                            </link>
                        </link>
                    </link>
                </link>
            </link>
        </meta>
    </head>
    
    <body class="cbp-spmenu-push">
        <!-- banner -->
        <div class="banner">
            <!-- header -->
            <div class="w3ls-header">
                <div class="container">
                    <div class="agile-logo">
                        <h1 style="font-size: 48px;">
                            <a href="index.php">
                                <br>
                                Med . . . .<br>
                                At The Door
                            </a>
                        </h1>

                    </div>
                        
                         <!-- <h3 style="margin-left: 900px;">
                       <a type="submit"onclick="document.getElementById('id01').style.display='block'"
                       name="search" style="cursor: pointer;"> login </a> 
                        <a href="user_logout.php" style="font-size:20px;"> LOG OUT </a>
                       </h3> -->


                    <div class="top-nav">
                        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
                            <h3>
                                Menu
                            </h3>
                            <a class="active" href="index.php">
                                Home
                            </a>
                            <a href="about.php">
                                About us
                            </a>
                            <a href="pharmacy_name.php">
                                Pharmacy List
                            </a>
                           <!--  <a class="menu-icon" href="#">
                                Login
                                <i class="fa fa-sort-down">
                                </i>
                            </a>
                             <ul class="nav1">
                                <li>
                                    <a href="icons.php">
                                        Web Icons
                                    </a>
                                </li>
                                <li>
                                    <a href="codes.php">
                                        Short Codes
                                    </a>
                                     <a href="login_page.php">
                                        ADMIN
                                    </a>
                                </li>
                            </ul> -->
                            <?php   
                            if(!isset($_SESSION['name'])){ ?>
                                <a href="login_page.php">
                                Login
                                </a>
                                  <a href="register.php">
                                  Signup
                            </a>
                            <?php }
                            else {?>
                            <a href="user_logout.php">
                                Logout
                            </a>
                            <?php } ?>

                          
                            <a href="contact.php">
                                Contact Us
                            </a>

                        </nav>

                        <div class="main buttonset">
                            <!-- Class "cbp-spmenu-open" gets applied to menu and "cbp-spmenu-push-toleft" or "cbp-spmenu-push-toright" to the body -->
                            <button id="showRightPush">
                                <img alt="" src="assets/images/menu-icon.png"/>
                            </button>
                            <!-- <span class="menu"></span> -->
                        </div>
                        <!-- script-for-drop down -->
                        <script>
                            $( "a.menu-icon" ).click(function() {
                            $( "ul.nav1" ).slideToggle( 300, function() {
                                // Animation complete.
                            });
                        });
                        </script>
                        <!-- //script-for-dropdown -->
                        <!-- Classie - class helper functions by @desandro https://github.com/desandro/classie -->
                        <script src="assets/js/classie.js">
                        </script>
                        <script>
                            var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
                        showRightPush = document.getElementById( 'showRightPush' ),
                        body = document.body;

                        showRightPush.onclick = function() {
                            classie.toggle( this, 'active' );
                            classie.toggle( body, 'cbp-spmenu-push-toleft' );
                            classie.toggle( menuRight, 'cbp-spmenu-open' );
                            disableOther( 'showRightPush' );
                        };

                        function disableOther( button ) {
                            if( button !== 'showRightPush' ) {
                                classie.toggle( showRightPush, 'disabled' );
                            }
                        }
                        </script>
                        <!-- /script-for-menu -->
                    </div>
                </div>
            </div>
            <!-- //header -->
        </div>
    </body>
</html>
