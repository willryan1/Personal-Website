<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This page will put my coding experience on display">
    <meta name="keywords" content="HTML, Python, Fun, code, Web, College">
    <meta name="author" content="Will Ryan">
	<title>Contact Me!</title>
	<link rel="stylesheet" type="text/css" href="css/style3.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
</head>

<body>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = filter_input(INPUT_POST,'username');
		$email = filter_input(INPUT_POST,'email');
		$state = filter_input(INPUT_POST,'state_val');
		$comment = filter_input(INPUT_POST,'comment');
			
		if(!empty($username) && !empty($email) && !empty($state) && !empty($comment)) {
			$host = "localhost";
			$dbUsername = "mysqladmin";
			$dbPassword = "4n0m4ly";
			$dbname = "p_web_storage";
			
			$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
			
			$response_message = "";
				
			if (mysqli_connect_error()) {
				die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
				
			} else {
				$results = mysqli_query($conn, "select * from contact_request where email='".$email."'");
				$row = mysqli_num_rows($results);
				if ($row > 0){
					$response_message = 'That email has already been used, submission failed.';
				} else {
					$sql = "INSERT INTO contact_request (name, email, state, comment) VALUES ('$username','$email','$state','$comment')";
					if ($conn->query($sql)) {
						$response_message = 'Your submission has been recieved!';
					} else {
						$response_message = "Error: ". $sql ."<br>". $conn->error;
					}
					$conn->close();
				}
			}
		} else {
			$response_message = 'There was a missing field, submission failed.';
		}
	}

?>

	<div id="nav_contact">
		<div id="nav2">
			
			<div id="nav_wrapper">
				<h1>Will Ryan</h1>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="https://github.com/willryan1">Projects</a></li>
					<li><a href="documents/resume.pdf">Resume</a></li>
					<li><a href="#" class="active">Contact</a></li>
				</ul>
			
			</div><!--nav_wrapper-->
		
		
		</div><!--nav2-->
	</div><!--nav_contact-->
	<div id="mainform">
	<div id="form">
	<div id="tops">
	<h2>Have a Question?</h2><br>
	<h3>Get in Touch!</h3>
	</div>
	<form action="connect.php" method="post">
		<div class="star">*</div> Name: <br>
		<input type="text" placeholder="Name" id="name" name="username">
		<br>
		<div class="star">*</div> Email: <br>
		<input type="text" placeholder="Email" id="name" name="email">
		<br>
		<div class="star">*</div> State: <br>
		<select class="list_drop" name="state_val">
			<option value="none1">--Select an Option--</option>
			<option value="al">Alabama</option>
			<option value="ak">Alaska</option>
			<option value="az">Arizona</option>
			<option value="ar">Arkansas</option>
			<option value="ca">California</option>
			<option value="co">Colorado</option>
			<option value="ct">Connecticut</option>
			<option value="de">Delaware</option>
			<option value="fl">Florida</option>
			<option value="ga">Georgia</option>
			<option value="hi">Hawaii</option>
			<option value="id">Idaho</option>
			<option value="il">Illinois</option>
			<option value="in">Indiana</option>
			<option value="ia">Iowa</option>
			<option value="ks">Kansas</option>
			<option value="ky">Kentucky</option>
			<option value="la">Louisiana</option>
			<option value="me">Maine</option>
			<option value="md">Maryland</option>
			<option value="ma">Massachusetts</option>
			<option value="mi">Michigan</option>
			<option value="mn">Minnesota</option>
			<option value="ms">Mississippi</option>
			<option value="mo">Missouri</option>
			<option value="mt">Montana</option>
			<option value="ne">Nebraska</option>
			<option value="nv">Nevada</option>
			<option value="nh">New Hampshire</option>
			<option value="nj">New Jersey</option>
			<option value="nm">New Mexico</option>
			<option value="ny">New York</option>
			<option value="nc">North Carolina</option>
			<option value="nd">North Dakota</option>
			<option value="oh">Ohio</option>
			<option value="ok">Oklahoma</option>
			<option value="or">Oregon</option>
			<option value="pa">Pennsylvania</option>
			<option value="ri">Rhode Island</option>
			<option value="sc">South Carolina</option>
			<option value="sd">South Dakota</option>
			<option value="tn">Tennessee</option>
			<option value="tx">Texas</option>
			<option value="ut">Utah</option>
			<option value="vt">Vermont</option>
			<option value="va">Virginia</option>
			<option value="wa">Washington</option>
			<option value="wv">West Virginia</option>
			<option value="wi">Wisconsin</option>
			<option value="wy">Wyoming</option>
			<option value="dc">District of Columbia</option>
		</select>
		<br>
		<div class="star">*</div> Comment: <br>
		<textarea placeholder="Comment" name="comment" id="comment"></textarea>
		<br>
		<input type="submit" value="Submit" id="sub" name="submit"><br>
		<div class="star">*</div> all fields are required
		<span id="response"><p><?php echo $response_message;?></p></span>
	</form>
	</div>
	<div id="extra">
		<br>
		<h5>Get in touch! I would love to hear your feedback!</h5>
		<p>
		For business related connections, find me on LinkedIn, or if you want to look at some of my projects I'll have them on GitHub.<br>
		<a href="https://www.linkedin.com/in/will-ryan-/">LinkedIn</a><br>
		<a href="https://github.com/willryan1">Github</a><br>
		<!--If you are interested in connecting send me an <a href="mailto:wryan222@gmail.com?subject=Web Design"target="_blank">Email</a>-->
		</p>
	</div>
	</div>
	<div id="footer">
		<h2>&copy; All Rights Reserved</h2>
		<div id="footersym">
			<ul>
				<li><a href="https://www.linkedin.com/in/will-ryan-/"><i class="fab fa-linkedin-in" id="linkedin_icon"></i></a></li>
				<li><a href="https://github.com/willryan1"><i class="fab fa-github" id="github_icon"></i></a></li>
				<li><a href="https://stackoverflow.com/users/12370343/will-ryan"><i class="fab fa-stack-overflow" id="stack_icon"></i></a></li>
			</ul>
		</div>
	</div>
	
<script>
	/* When the user clicks on the button, 
	toggle between hiding and showing the dropdown content */
	function myFunction() {
		document.getElementById("myDropdown").classList.toggle("show");
	}

	// Close the dropdown if the user clicks outside of it
	window.onclick = function(event) {
		if (!event.target.matches('.dropbtn')) {

	    	var dropdowns = document.getElementsByClassName("dropdown-content");
	    	var i;
	    	for (i = 0; i < dropdowns.length; i++) {
	      		var openDropdown = dropdowns[i];
	      		if (openDropdown.classList.contains('show')) {
	        openDropdown.classList.remove('show');
	      		}
	    	}
	  	}
	}
</script>

</body>

</html>