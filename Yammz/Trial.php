

    <!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		 <link rel="icon" href="images/icons/yammz_logo.png">
		<title>Yammz it</title>
		<link rel = "stylesheet" href = "bootstrap-3.2.0-dist/css/bootstrap.min.css">
 		<script type="text/javascript" src="bootstrap-3.2.0-dist/js/jquery-1.9.0.js"></script>
		<script type="text/javascript" src="bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="bootstrap.vertical-tabs.css">
		<link rel="stylesheet" href="css.css">
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="carousel.css" rel="stylesheet">
		<link rel="shortcut icon" href="assets/ico/favicon.ico">
		<link href="offcanvas.css" rel="stylesheet">

    <style type="text/css">

    @media screen and (min-width: 768px){

      .dropdown:hover .dropdown-menu, .btn-group:hover .dropdown-menu{

            display: block;

        }

        .dropdown-menu{

            margin-top: 0;

        }

        .dropdown-toggle{

            margin-bottom: 2px;

        }

        .navbar .dropdown-toggle, .nav-tabs .dropdown-toggle{

            margin-bottom: 0;

        }

    }

    </style>

    <script type="text/javascript">

    $(document).ready(function(){

        $(".dropdown, .btn-group").hover(function(){

            var dropdownMenu = $(this).children(".dropdown-menu");

            if(dropdownMenu.is(":visible")){

                dropdownMenu.parent().toggleClass("open");

            }

        });

    });     

    </script>

    </head>

    <body>

    <!--Navbar with dropdown menu-->

    <nav id="myNavbar" class="navbar navbar-default" role="navigation">

        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="container">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

                <a class="navbar-brand" href="#">Brand</a>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav">

                    <li><a href="#">Home</a></li>

                    <li><a href="#">Profile</a></li>

                    <li class="dropdown">

                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Messages <b class="caret"></b></a>

                        <ul class="dropdown-menu">

                            <li><a href="#">Inbox</a>
								<ul class="dropdown-menu">
									<li ><a href="#">Wilson</a>
								</ul>
							</li>

                            <li><a href="#">Drafts</a></li>

                            <li><a href="#">Sent Items</a></li>

                            <li class="divider"></li>

                            <li><a href="#">Trash</a></li>

                        </ul>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    </body>

    </html>

As you can see in the above example, we've used the CSS media query for s