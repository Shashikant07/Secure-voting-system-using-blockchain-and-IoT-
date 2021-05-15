<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' type='text/css' href="css/bootstrap.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css"/>
</head>
<header>
<div class="header">
	<div class="logo">
		<a href="index.php">Biometric Voting System</a>
	</div>
</div>
<?php  
  if (isset($_GET['error'])) {
		if ($_GET['error'] == "wrongpasswordup") {
			echo '	<script type="text/javascript">
					 	setTimeout(function () {
			                $(".up_info1").fadeIn(200);
			                $(".up_info1").text("The password is wrong!!");
			                $("#admin-account").modal("show");
		              	}, 500);
		              	setTimeout(function () {
		                	$(".up_info1").fadeOut(1000);
		              	}, 3000);
					</script>';
		}
	} 
	if (isset($_GET['success'])) {
		if ($_GET['success'] == "updated") {
			echo '	<script type="text/javascript">
			 			setTimeout(function () {
			                $(".up_info2").fadeIn(200);
			                $(".up_info2").text("Your Account has been updated");
              			}, 500);
              			setTimeout(function () {
                			$(".up_info2").fadeOut(1000);
              			}, 3000);
					</script>';
		}
	}
	if (isset($_GET['login'])) {
	    if ($_GET['login'] == "success") {
	      echo '<script type="text/javascript">
	              
	              setTimeout(function () {
	                $(".up_info2").fadeIn(200);
	                $(".up_info2").text("You successfully logged in");
	              }, 500);

	              setTimeout(function () {
	                $(".up_info2").fadeOut(1000);
	              }, 4000);
	            </script> ';
	    }
	}
	if (isset($_GET['pwd'])) {
	    if ($_GET['pwd'] == "pwdUpd") {
	      echo '<script type="text/javascript">
	              
	              setTimeout(function () {
	                $(".up_info2").fadeIn(200);
	                $(".up_info2").text("The password has been updated");
	              }, 500);

	              setTimeout(function () {
	                $(".up_info2").fadeOut(1000);
	              }, 4000);
	            </script> ';
	    }
	}
?>
<div class="topnav" id="myTopnav">
    <?php  
    	if (isset($_SESSION['user'])) {
			if ($_SESSION['user'] == 'admin') {
				echo '
						<a href="index.php">Users</a>
						<a href="ManageUsers.php">Manage Users</a>
						<a href="UsersLog.php">Voting</a>
						<a href="devices.php">Devices</a>
						<a href="#" data-toggle="modal" data-target="#admin-account">'.$_SESSION['name'].'</a>
						<a href="http://localhost:3000/viewcount.html">View the vote count</a>
						<a href="logout.php">Log Out</a>';
			} elseif ($_SESSION['user'] == 'user'){
				echo '
						<a href="#" data-toggle="modal" data-target="#admin-account">'.$_SESSION['name'].'</a>
						<a href="UsersLog.php">Voting</a>
						<a href="logout.php">Log Out</a>';
			}
		}
    	else{
    		echo '<a href="login.php">Log In</a>';
    	}
    ?>
    <a href="javascript:void(0);" class="icon" onclick="navFunction()">
	  <i class="fa fa-bars"></i></a>
</div>
<div class="up_info1 alert-danger"></div>
<div class="up_info2 alert-success"></div>
</header>
<script>
	function navFunction() {
	  var x = document.getElementById("myTopnav");
	  if (x.className === "topnav") {
	    x.className += " responsive";
	  } else {
	    x.className = "topnav";
	  }
	}
</script>
<?php  
	if (isset($_SESSION['user'])) {
?>
	<!-- Account Update -->
	<div class="modal fade" id="admin-account" tabindex="-1" role="dialog" aria-labelledby="Admin Update" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h3 class="modal-title" id="exampleModalLongTitle">Update Your Account Info:</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="ac_update.php" method="POST" enctype="multipart/form-data">
			<div class="modal-body">
				<label for="User-mail"><b>Admin Name:</b></label>
				<input type="hidden" name="user" value="<?php echo $_SESSION['user']; ?>">
				<input type="text" name="up_name" placeholder="Enter your Name..." value="<?php echo $_SESSION['name']; ?>" required/><br>
				<label for="User-mail"><b>Admin E-mail:</b></label>
				<input type="email" name="up_email" placeholder="Enter your E-mail..." value="<?php echo $_SESSION['email']; ?>" required/><br>
				<label for="User-psw"><b>Password</b></label>
				<input type="password" name="up_pwd" placeholder="Enter your Password..." required/><br>
			</div>
			<div class="modal-footer">
				<button type="submit" name="update" class="btn btn-success">Save changes</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</form>
		</div>
	</div>
	</div>
	<!-- //Account Update -->
<?php  
	}
?>
	

	
