 <?php 
  session_start();
              include("include/db.php");// this is our database connection details 
              include("include/functions.php");
      
 if(!isset($_SESSION['email']))  // check if user email is registred to our database
  {header("location:index.php?err=" . urlencode("You Need To Login")); } 
            
        
?>

 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>UASPS STORE SYSTEM</title>
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
    <fieldset>
     
    <legend  id="msg">Welcome to Umaru Ali Shinkafi Polytechnic Sokoto, <strong>CST Store System</strong>
  </legend> 
    <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading" Style="text-align:center;">Umaru Ali Shinkafi Polytechnic Sokoto, Store System</div>

<!-- Table -->
  <table class="table table-bordered">
    <form action="#" method="post">
   <tr class="success"><th>T/ID</th>
       <th>Vendor Name</th>
       <th>Item Name/No.</th>
       <th>Quantity in Store</th>
       <th>Item Added/Removed</th>
       <th>Items Left</th>
       <th>T type</th>
       <th>Date Added</th>
       
     </tr>
<?php  

$displayAll =("SELECT * FROM transactions");
$runDisplayAll = mysqli_query($db,$displayAll);

while ($row=mysqli_fetch_array($runDisplayAll)) {
   $sn = $row['TransactionsId'];
   $vendorName =$row['vendorName'];
   $itemName = $row['itemName'];
   $ItemQuantity =$row['oldQuantity'];
   $inputedItems =$row['NoItemsReceved'];
   $leftInStore =$row['newQuantity'];
   $Ttype = $row['tType'];
   $addedOn =$row['tdate'];
  $_SESSION['sn'] = $sn;
   
   echo"
     <tr><th>$sn</th>
       <th>$vendorName</th>
       <th>$itemName</th>
       <th>$ItemQuantity</th>
       <th>$inputedItems</th>
       <th >$leftInStore</th> 
       <th>$Ttype</th>
       <th>$addedOn</th>
     </tr>
     ";

   }
  
   ?>

     </form>
     
  </table>

</div>
<fieldset>
   <div id="bg" style="width:200px;">
  <img src="img/for_the_bold.png">
   
</div>
     
  </div>

  </div>
</div>
           
<script src="js/demo.js"></script>
<script src="Content/js/jquery.min.js"></script>
<script src="Content/js/bootstrap.js"></script>
   
</body>
</html>
