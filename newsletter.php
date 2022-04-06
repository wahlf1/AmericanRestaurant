<?php
    ini_set('display_error', 1);
    ini_set('display_startup_error', 1);
    error_reporting(E_ALL);

    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<!-- Main CSS -->
	<link href="css/main.css" rel="stylesheet">

	<title>The American Restaurant | Newsletter</title>
  </head>
  <body onload="greeting()">
	<div class="header">
  	<?php include 'includes/header.php';?>
	</div>

   

	<div class="container">
		
  	<?php
    	if (isset($_GET['msg']) && $_GET['msg'] == 'thankyou') {
      	if (isset($_GET['last_entry']) && !empty($_GET['last_entry'])) {

        	include 'includes/dbconnect.php';
			$entry_id = $_GET['last_entry'];
			$query = "SELECT *
					  FROM entries
					  WHERE id = '$entry_id'";

			$result = mysqli_query($conn,$query);
			while($row = mysqli_fetch_assoc($result)){
				$fname = $row['fName'];
				$email = $row['email'];
			}

			echo "<p>Thank you for your subscription, $fname!</p>";
			echo "<p>You will be receiving emails to: $email</p>";
			echo "<p><a href = 'newsletter.php'>Enter another subscription!</a></p>";
      	}
    	} else {

  	?>

    	<h1>The American Restaurant Newsletter</h1>
    	<p id="demo_greeting"></p>
    	<p>Welcome to our Newsletter. Please enter your information and you will automatically be entered
    	to receive the latest news from our restaurant.</p>

    	<form name="NewsletterForm" action="process_newsletter.php" method="POST">
            <div class="form-group">
                <label for="Name">First Name</label>
                <input type="text" class="form-control" name="fname" placeholder="Enter your first name"></input>
            </div>
			<div class="form-group">
                <label for="Last">Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Enter your last name"></input>
            </div>
			<div class="form-group">
                <label for="Email">Email Address</label>
                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" name="email" placeholder="Enter your email" aria-describedby="emailHelp"></input>
            </div>
			<div class="form-group">
        	<input type="hidden" name="session_id" value="<?php echo $_COOKIE['PHPSESSID']; ?>">
        	<button type="reset" value="Clear Form" class="btn btn-primary">Clear Form</button>
        	<button type="submit" value="Submit" name="Submit" class="btn btn-primary">Submit</button>
      	</div>
        </form>

  	<?php    
  	}
  	?>


	</div><!-- ./container -->








	<div class="footer">
  	<?php include 'includes/footer.php';?>
	</div>

	<!-- My Javascript -->
	<script src="js/scripts.js"></script>

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
	-->
    
  </body>
</html>


