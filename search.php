<?php
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
     
    mysql_select_db("worlhsqb_worldexpress") or die(mysql_error());
    /* tutorial_search is the name of database we've created */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>World Express Delivery</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap Css -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">        
        <!-- Bootstrap Select Css -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
        <!-- Fonts Css -->
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/elegant.css">
        <!-- OwlCarousel2 Slider Css -->
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">


        <!-- Animate Css -->       
        <link rel="stylesheet" type="text/css" href="css/animate.css">

        <!-- Main Css -->
        <link rel="stylesheet" type="text/css" href="css/theme.css">

        <!--[if lt IE 9]>
        <script src="assets/plugins/iesupport/html5shiv.js"></script>
        <script src="assets/plugins/iesupport/respond.js"></script>
        <![endif]-->
    </head>
    <body id="home">
        <!-- Preloader -->
        <div id="preloader">

            <div class="small1">
                <div class="small ball smallball1"></div>
                <div class="small ball smallball2"></div>
                <div class="small ball smallball3"></div>
                <div class="small ball smallball4"></div>
            </div>


            <div class="small2">
                <div class="small ball smallball5"></div>
                <div class="small ball smallball6"></div>
                <div class="small ball smallball7"></div>
                <div class="small ball smallball8"></div>
            </div>

            <div class="bigcon">
                <div class="big ball"></div>
            </div>

        </div>	
        <!-- /.Preloader -->	


        <!-- Main Wrapper -->        
        <main class="wrapper">

            <!-- Header -->
            <header class="header-main">

                <!-- Header Logo & Navigation -->
                <nav class="menu-bar font2-title1">
                    <div class="theme-container container" style="margin-bottom: 22px !important;">
                        <div class="row">
                            <div class="col-md-2 col-sm-2">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-logo text-warning" href="index.html"> <strong class="mt-4 logon">WE</strong><small class="logon2">xp</small> <small class="logon1">Delivery</small></a>
                            </div>
                            <div class="col-md-10 col-sm-10 fs-12">
                                <div id="navbar" class="collapse navbar-collapse no-pad">
                                    <ul class="navbar-nav theme-menu">
                                        <li class="dropdown active">
                                            <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Home </a>
                                            
                                        </li>
                                        <li> <a href="about-us.html">about</a> </li>
                                        <li> <a href="tracking.html"> tracking </a> </li>
                                        <li> <a href="contact-us.html"> contact </a> </li>
                                        
                                    </ul>                                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- /.Header Logo & Navigation -->

            </header>
            <!-- /.Header -->

  <!-- Content Wrapper -->
  <article> 
    <!-- Breadcrumb -->
    <section class="theme-breadcrumb pad-50">                
        <div class="theme-container container ">  
            <div class="row">
                <div class="col-sm-8 pull-left">
                    <div class="title-wrap">
                        <h2 class="section-title no-margin"> Search Result </h2>
                        <p class="fs-16 no-margin">your parcel is safe with World Express Delivery </p>
                    </div>
                </div>
                <div class="col-sm-4">                        
                    <ol class="breadcrumb-menubar list-inline">
                        <li><a href="index.html" class="gray-clr">Home</a></li>                                   
                        <li class="active">search result</li>
                    </ol>
                </div>  
            </div>
        </div>
    </section>
    <!-- /.Breadcrumb -->

    <!-- Tracking -->
    <section class="pt-50 pb-120 tracking-wrap">    
        <div class="theme-container container ">  
            <div class="row">
                <div class="col-md-10 pad-30 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".30s"> 
                    <div class="prod-info white-clr">
                        <ul>
                        <?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT * FROM parcel
            WHERE (`product_id` LIKE '%".$query."%') OR (`text` LIKE '%".$query."%')") or die(mysql_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
            echo "<p><h3>".$results['title']."</h3>".$results['text']."</p>";
                            echo "<li> <span class="title-2">Product Name:</span> <span class="fs-16">".$results['product_name']."</span> </li>"
                            echo "<li> <span class="title-2">Product id:</span> <span class="fs-16">".$results['product_id']."</span> </li>"
                            echo "<li> <span class="title-2">Order date:</span> <span class="fs-16">".$results['order_date']."</span> </li>"
                            echo "<li> <span class="title-2">Order Status:</span> <span class="fs-16">".$results['order_status']."</span> </li>"
                            echo "<li> <span class="title-2">Destination:</span> <span class="fs-16">".$results['destination']."</span> </li>"
                            echo "<li> <span class="title-2">Order type:</span> <span class="fs-16">".$results['order_type']."</span> </li>"
                            echo "<li> <span class="title-2">Phone Number:</span> <span class="fs-16">".$results['phone_no']."</span> </li>"
                            echo "<li> <span class="title-2">Email:</span> <span class="fs-16">".$results['email']."</span> </li>"

                        }
             
                    }
                    else{ // if there is no matching rows do following
                        echo "No results";
                    }
                     
                }
                else{ // if query length is less than minimum
                    echo "Minimum length is ".$min_length;
                }
            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="progress-wrap">
                <div class="progress-status">
                    <span class="border-left"></span>
                    <span class="border-right"></span>
                    <span class="dot dot-left wow fadeIn" data-wow-offset="50" data-wow-delay=".40s"></span>
                    <span class="themeclr-border wow fadeIn" data-wow-offset="50" data-wow-delay=".50s">  <span class="dot dot-center theme-clr-bg"></span> </span>
                    <span class="dot dot-right wow fadeIn" data-wow-offset="50" data-wow-delay=".60s"></span>
                </div>
                <div class="row progress-content upper-text">
                    <div class="col-md-3 col-xs-8 col-sm-2">
                        <p class="fs-12 no-margin"> FROM </p>
                        <h2 class="title-1 no-margin">London</h2>
                    </div>
                    <div class="col-md-2 col-xs-8 col-sm-3">
                        <p class="fs-12 no-margin"> [ <b class="black-clr">6 DAYS </b> ] </p>                                
                    </div>
                    <div class="col-md-4 col-xs-8 col-sm-4 text-center">
                        <p class="fs-12 no-margin"> currently in </p>
                        <h2 class="title-1 no-margin">singapore</h2>
                    </div>
                    <div class="col-md-1 col-xs-8 col-sm-1 no-pad">
                        <p class="fs-12 no-margin"> [ <b class="black-clr">2 DAYS </b> ] </p>                                
                    </div>
                    <div class="col-md-2 col-xs-8 col-sm-2 text-right">
                        <p class="fs-12 no-margin"> to </p>
                        <h2 class="title-1 no-margin">dhaka</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Tracking -->

</article>
<!-- /.Content Wrapper -->

                
                <div class="footer-bottom mt-5">
                    <div class="theme-container container">               
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <p> © Copyright 2019 World Express Delivery, All rights reserved </p>                            
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- /.Footer -->


        </main>
        <!-- / Main Wrapper -->

        <!-- Top -->
        <div class="to-top theme-clr-bg transition"> <i class="fa fa-angle-up"></i> </div>

        <!-- Popup: Login -->
        <div class="modal fade login-popup" id="login-popup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">                
                <a class="close close-btn" data-dismiss="modal" aria-label="Close"> x </a>

                <div class="modal-content">   
                    <div class="login-wrap text-center">                        
                        <h2 class="title-3"> sign in </h2>
                        <p> Sign in to <strong> GO </strong> for getting all details </p>                        

                        <div class="login-form clrbg-before">
                            <form class="login">
                                <div class="form-group"><input type="text" placeholder="Email address" class="form-control"></div>
                                <div class="form-group"><input type="password" placeholder="Password" class="form-control"></div>
                                <div class="form-group">
                                    <button class="btn-1 " type="submit"> Sign in now </button>
                                </div>
                            </form>
                            <a href="#" class="gray-clr"> Forgot Passoword? </a>                            
                        </div>                        
                    </div>
                    <div class="create-accnt">
                        <a href="#" class="white-clr"> Don’t have an account? </a>  
                        <h2 class="title-2"> <a href="#" class="green-clr under-line">Create a free account</a> </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Popup: Login --> 

        <!-- Search Popup -->
        <div class="search-popup">
            <div>
                <div class="popup-box-inner">
                    <form>
                        <input class="search-query" type="text" placeholder="Search and hit enter" />
                    </form>
                </div>
            </div>
            <a href="javascript:void(0)" class="close-search"><i class="fa fa-close"></i></a>
        </div>
        <!-- / Search Popup -->

        <!-- Main Jquery JS -->
        <script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>        
        <!-- Bootstrap JS -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>    
        <!-- Bootstrap Select JS -->
        <script src="js/bootstrap-select.min.js" type="text/javascript"></script>    
        <!-- OwlCarousel2 Slider JS -->
        <script src="js/owl.carousel.min.js" type="text/javascript"></script>   
        <!-- Sticky Header -->
        <script src="js/jquery.sticky.js"></script>
        <!-- Wow JS -->
        <script src="js/wow.min.js" type="text/javascript"></script>
        <!-- Data binder -->
        <script src="js/data.binder.js" type="text/javascript"></script>

        <!-- Slider JS -->        


        <!-- Theme JS -->
        <script src="js/theme.js" type="text/javascript"></script>

    </body>
</html>
