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
   <tr class="success"><th>S/N</th>
       <th>Items Name</th>
       <th>Model Name/No.</th>
       <th>Quantity in Store</th>
       <th>Date Added</th>
       <th><button type='button'data-toggle='modal' data-target='#myModal' class='btn btn-info'>Action</button></th>
       
     </tr>
<?php  

$displayAll =("SELECT * FROM items_tbl");
$runDisplayAll = mysqli_query($db,$displayAll);

while ($row=mysqli_fetch_array($runDisplayAll)) {
   $sn = $row['SN'];
   $itemsName =$row['itemName'];
   $modelNo = $row['modelNo'];
   $ItemQuantity =$row['itemsQuantity'];
   $addedOn =$row['dateAdded'];
  $_SESSION['sn'] = $sn;
   
   echo"

     <tr><th>$sn</th>

       <th>$itemsName</th>
       <th>$modelNo</th>";
      if ($ItemQuantity <= 0) { echo "
       <th class=' label-danger'>Out of Stock</th>";} else {echo "
       <th >$ItemQuantity</th> ";}
  echo "
       <th>$addedOn</th>
       <th>
       
       </th>
       
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 700px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Store Items</h4>
      </div>
      <div class="modal-body">
     <!-- Table -->
  <table class="table table-bordered">
    <form action="#" method="post">
    <?php if (isset($_POST['insect'])){
    $action = $_POST['action'];
    $items =$_POST['items'];
    $nums =$_POST['quantity'];
    $vendorName = $_POST['vendor'];
    $date = date("Y-m-d H:i:s");
    
    

   if ($action == 1) {
    $action = "Deposit";
    transactionLog($vendorName,$items,$nums,$action,$date);
    addQuantity($items,$nums);
    
   
    }
     if ($action == 2 ){
      $action = "Withdraw";
      transactionLog($vendorName,$items,$nums,$action,$date);
     rmQuantity($items,$nums);
     
   }
    
    }
 

    ?>
   <tr><th>Select Item Name</th>
       <th>Item-Quantity</th>
       <th>Vendor</th>
       <th>Actions</th>
     </tr>
     <tr>
      <th>
        <select name="items">
          <option value="0">Select Item</option>
            <?php getItemsName();?>
              
      </select></th>
       <th><input type="number" name="quantity" placeholder="Quantity"></th>
        <th><input type="text" name="vendor" placeholder="Vendor Name"></th>
       <th><select name="action">
             <option value="1" name="deposit">Deposit</option>
             <option value="2" name="withdraw">Withdraw</option>
       </select></th>
     </tr>
     <tr>
     </tr>
     
  </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="insect">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
           
<script src="js/demo.js"></script>
<script src="Content/js/jquery.min.js"></script>
<script src="Content/js/bootstrap.js"></script>
   
</body>
</html>
