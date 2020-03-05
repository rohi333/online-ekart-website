<?php 
include 'inc/header.php'; 

$login = Session::get("cuslogin");
if ($login == true){
	header("Location:order.php");
}


 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
$custLogin = $cmr->customerLogin($_POST);
}
?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
    	 	<?php 
             if(isset($custLogin)){
             	echo $custLogin;
             }

    		?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
                	<input name="email" placeholder="Email"  type="text" title="Enter your Email id">
                    <input name="pass" placeholder="password"  type="password" title="Enter your Password">
                      <div class="buttons"><div><button class="grey" name="login" title="click here to Sign In">Sign In</button></div></div>
                    </div>
                    </form>

<?php
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){
$customerReg = $cmr->customerRegistration($_POST);
}
?>


    	<div class="register_account">
    		<?php 
             if(isset($customerReg)){
             	echo $customerReg;
             }

    		?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name" title="Enter your good Name" value="<?php echo $_POST['name'] ?? '' ?>"/>

							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City" title="Enter your City" value="<?php echo $_POST['city'] ?? '' ?>"/>
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip-Code" title="Enter your zipcode" value="<?php echo $_POST['zip'] ?? '' ?>"/>
							</div>
							<div>
								<input type="text" name="email" placeholder="Email" title="Enter your Email id" value="<?php echo $_POST['email'] ?? '' ?>"/>
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address" title="Enter your Address" value="<?php echo $_POST['address'] ?? '' ?>"/>
						</div>
		                <div>
							<input type="text" name="country" placeholder="Country" title="Enter your Country" value="<?php echo $_POST['country'] ?? '' ?>"/>
						</div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Phone" title="Enter your Phone number" value="<?php echo $_POST['phone'] ?? '' ?>"/>
					</div>
		          
				  
				  <div> 
					<input type="password" name="pass" placeholder="Password" title="Enter your Password" value="<?php echo $_POST['name'] ?? '' ?>"/>
					</div>
				
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register" title="click here to create your account">Create Account</button></div></div>
		   
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>