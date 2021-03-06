<?php include 'lib/Session.php';
  Session::init();
  include 'lib/Database.php';
  include 'helpers/Format.php';
   
   spl_autoload_register(function($class){
    include_once "classes/".$class.".php";
   });
 
   $db = new Database();
   $fm = new Format();
   $pd = new Product();
   $cat = new Category();
   $ct = new Cart();
   $cmr = new Customer();


?>

<!--<?php
  //header("Cache-Control: no-cache, must-revalidate");
  //header("Pragma: no-cache"); 
  //header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  //header("Cache-Control: max-age=2592000");
?>-->

<!DOCTYPE HTML>
<head>
<title>Shopping Cart Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script type="text/javascript" src="loader.js"></script> 


<style>
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(loader.gif) center no-repeat #fff;
}

</style>

</head>
<body>
	<div class="se-pre-con"></div>
  <div class="wrap">
		<div class="header_top">
			<?php
			  	if(Session::get("cmrName")==""){
			  	}
			  	else
			  	{
			  		?>
			  		<center><h4 style="color:purple;">Welcome&nbsp;&nbsp;<?php echo Session::get("cmrName"); ?> </h4></center>
			  	
			  	<?php
			  	}
			  	?>
			<div class="logo">
				<a href="index.php"><img src="images/logoo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <!--<div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>-->
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
                               <?php
                               $getData = $ct->checkCartTable();
                               if($getData){
                               	$sum = Session::get("sum");
                                $qty = Session::get("qty");
                                echo "₹".$sum." | Qty: ".$qty;
                               }else {
                               	echo "(Empty)";
                               }

                               ?>
								
							</span>
							</a>
						</div>

			      </div>

<?php
if(isset($_GET['cid'])){
$delData = $ct->delCustomerCart();	
Session::destroy();
}
?>

		   <div class="login" title="click here to Sign In">
  <?php 
         $login = Session::get("cuslogin");
          if ($login == false){ ?>
	     <a href="login.php">Login</a>
   <?php } else { ?>
   	     <a  href="?cid=<?php Session::get('cmrId')?>" >Logout</a>
  <?php   } ?>

		   

		   </div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  <li><a href="topbrands.php">Top Brands</a></li>
	  <?php 
	    $chkCart = $ct->checkCartTable();
	    if($chkCart){ ?>
	    	<li><a href="cart.php">Cart</a></li>
	    	<li><a href="payment.php">Payment</a></li>
	    <?php }
	    ?>

	    <?php 
	     $cmrId = Session::get("cmrId");
	    $chkOrder = $ct->checkOrder($cmrId);
	    if($chkOrder){ ?>
	    <li><a href="orderdetails.php">Order</a></li>
	    <?php }
	    ?>
	  
	  <?php 
	  $login = Session::get("cuslogin");
	  if ($login == true) { ?>
	  <li><a href="profile.php">Profile</a> </li>
	<?php } ?>
	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>