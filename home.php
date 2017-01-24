 <?php 
  session_start();
              include("include/config.php");
              include("include/db.php");

if (isset($_POST['submit'])) {
      $itemName = $_POST['itemName'];
      $itemModel = $_POST['modelNo'];
      $itemQuantity = $_POST['quantity'];
      $addedBy = $_POST['addedBy'];
      $dateAdded = date("Y-m-d H:i:s");
      $regItems="insert into items_tbl (itemName,modelNo,itemsQuantity,dateAdded,addedBy) values('$itemName','$itemModel','$itemQuantity','$dateAdded','$addedBy')";
      $runRegItems = mysqli_query($db,$regItems);
      if ($runRegItems) {
          header("location:home.php?msg=". urlencode("Your New item had been Added To the Store"));
          exit();
        } 
             else {

          header("location:home.php.php?msg=". urlencode("There is an error"));
          exit();
        }

      }
 if(!isset($_SESSION['email'])) 
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
      <?php if (isset($_GET['msg'])) { ?> 
                     <div class="alert alert-success"><i class="glyphicon glyphicon-ok"></i> <?php echo $_GET['msg'];?></div>
                     <?php } ?>
    <legend  id="msg">Welcome to Umaru Ali Shinkafi Polytechnic Sokoto, <strong>CST Store System</strong>
  </legend> 
    <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading" Style="text-align:center;">Umaru Ali Shinkafi Polytechnic Sokoto, Store System</div>

  <!-- Table -->
  <table class="table table-bordered">
    <form action="#" method="post">
   <tr><th>S/N</th>
       <th>Items-Name</th>
       <th>Model-No.</th>
       <th>Item-Quantity</th>
       <th>Category</th>
     </tr>
     <tr><th></th>

       <th><input type="text" name="itemName" placeholder="Name" required></th>
       <th><input type="text" name="modelNo"  placeholder="Model No." required></th>
       <th><input type="number" name="quantity" placeholder="Quantity" required></th>

       <th><select name="addedBy" required>
        <option>Furniture</option>
        <option>Electronics</option>
        <option>Computers</option>
        <option>Drives</option>
        <option>Routers</option>
       </select> </th>
     </tr>
     <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th><input type="submit" value="Register New Items"name="submit"></th>
        
     </tr>
     </form>
  </table>

</div>
<fieldset>
  <div id="bg">
  <img src="img/for_the_bold_ribbon1.png">
</div>
     
  </div>
           
    <script src="js/demo.js"></script>
<script src="Content/js/jquery.min.js"></script>
<script src="Content/js/bootstrap.js"></script>
   
</body>
</html>
