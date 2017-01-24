 <?php 
              session_start();
              include("include/db.php");
              if(!isset($_SESSION['email'])) 
             {header("location:index.php?err=" . urlencode("You are not authorized")); }       
?>

 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>HOME</title>
    <link href="Content/css/bootstrap.css" rel="stylesheet" />
    <link href="Content/css/pdsa-sidebar.css" rel="stylesheet" />
    <link href="Content/css/pdsa-summary-blocks.css" rel="stylesheet" />
    <link href="css/demo.css" rel="stylesheet" />
    <link href="css/animate.min.css" rel="stylesheet" />
    <style>
       
    </style>
</head>
<body>
<div class="container">
    <div class="row">
         <header class="">
       
        <?php include ("include/header.php") ?>            
    
        </header>

    </div>
  <nav id="SideNavParrent"class="pdsa-sn-wrapper">
      <ul>
          <li class="pdsa-sn-brand ">
              <a href="dash.php"
                 class="visible-lg visible-md visible-sm "> <i class="glyphicon glyphicon-briefcase"></i> Dashboard
                  <i class="glyphicon glyphicon-home visible-xs"></i>
              </a>
            
          </li>
          <li>
              <a href="#"
                 data-toggle="collapse"
                 data-target="#store">
                 <span class="visible-lg visible-md visible-sm">Manage Items<b class="caret"></b></span>
                  <i class="glyphicon glyphicon-shopping-cart visible-xs"></i>
              </a>
              <div class="visible-lg visible-md visible-sm">
                  <ul id="store" class="collapse" data-parent="#SideNavParrent">
                      <li><a href="home.php">  <i class="glyphicon glyphicon-ok"></i> Add News Item</a></li>
                      <li><a href="report.php"> <i class="glyphicon glyphicon-print"></i>Track Items</a></li>
                  </ul>
              </div>
          </li>
          
  </nav>

</div>
    <div class="container body-content">
      <div class="row">
         
      </div>
       
       <div class="row">
            <div class="col-xs-12 col-sm-4">
               
            </div>
          
             
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                            <div class="pdsa-summary-block pdsa-summary-block-info">
                                <div class="summary-background">
                                    <i class="glyphicon glyphicon-tasks"></i>
                                </div>
                                <div class="summary-body">
                                    <div class="summary-line-1">Register</div>
                                    <div class="summary-line-1">New Items</div>
                                </div>
                                <div class="summary-footer">
                                    <a href="home.php">Click Here <i class="glyphicon glyphicon-tasks"></i></a>

                                </div>
                            </div>

                        </div>  
                          <div class="col-xs-12 col-sm-4">
                <div class="pdsa-summary-block pdsa-summary-block-success">
                    <div class="summary-background">
                        <i class="glyphicon glyphicon-print"></i>
                    </div>
                    <div class="summary-body">
                        <div class="summary-line-1">Track</div>
                        <div class="summary-line-1">Items Record</div>
                        
                    </div>
                    <div class="summary-footer">
                        <a href="report.php">Click Here<i class="glyphicon glyphicon-print"></i></a>

                    </div>
                </div>

            </div>  
             
          </div>
           <div id="bg">
  <img src="img/for_the_bold_ribbon1.png">
   </div>
        
             
            </div>
    <script src="js/demo.js"></script>
<script src="Content/js/jquery.min.js"></script>
<script src="Content/js/bootstrap.js"></script>
   
</body>
</html>
