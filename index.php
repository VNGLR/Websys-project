<!doctype html>
<html>
	<head>
		<title>Book Worms</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="resources/splash_screen.css"/>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    	<link rel = "stylesheet" href = "https://fonts.googleapis.com/css?family=Fredericka+the+Great">
    	 <script type="text/javascript" src="home_screen.js"></script>

    	 <style>

    	 	body{
    	 		background-image: url("bookshelfmodified.jpg");
    	 	}
    	 	.splash_title{
    	 		color: black;
    	 		padding-top: 50px;
				padding-bottom: 50px;
				text-align: center;
				width: 100%;
				height:200px;
				font-size: 10em;
				color: black;
				font-family: 'Fredericka the Great', cursive;
    	 	}
    	 </style>
	</head>
	<body>
	<div id = "splash_primary">
		<!-- if below button is clicked, run js that will redirect to user_account.php-->
		<div class = "inner" id = "mybooks"> <a class="btn btn-primary" href="#" role="button" id="booksbtn" onclick = "redirect_my_books();">My Books</a> </div>

		<?php
			session_start();
			//if not logged in, top right button will be login/signup
			if(!isset($_SESSION['username'])){
				$total_line = "<div class = 'inner' id = 'signup'><a class='btn btn-primary' href='#' role='button' id='signup' onclick = ";
				$total_line = $total_line."'redirect_login();'>";

				$total_line = $total_line."Sign Up or Log In</a> </div>";
				echo $total_line;
			}else{ //else logout button avaliable
				
				echo "<div class = 'inner' id = 'signup'><a class='btn btn-primary' href='#' role='button' id='signup' onclick = 'redirect_logout();'>Logout</a> </div>";
				
			}


		?>
	</div>	

	<br/>
	<br/>

	<div id = "splash_secondary">
		<div class = "innersecond" id = "title"> <p class = "splash_title"> Book Worms </p> </div>
	</div>

	<br/>

	<br/>
	
	
	<!-- The form 
	four radial buttons to select search mode and text box to take in what is being searched-->

	<form class="example" method = "post">
	  <input type="text" class = "round" placeholder="Search Library" name="search" id = "search_input">
	  <button type="submit" onclick = "retrieve_params(); return false;""><i class="fa fa-search"></i></button>
	  <br/>
		<br/>
		<br/>
		<div class="everything">
		<form id = "search_topic">
	  		<label class="container">Book Title
			  <input type="radio" checked="checked" name="radio" value = "title">
			  <span class="checkmark"></span>
			</label>
			<label class="container">ISBN
			  <input type="radio" name="radio" value = "isbn">
			  <span class="checkmark"></span>
			</label>
			<label class="container">Author
			  <input type="radio" name="radio" value = "author">
			  <span class="checkmark"></span>
			</label>
			<label class="container">Genre
			  <input type="radio" name="radio" value = "genre">
			  <span class="checkmark"></span>
			</label>
		</form>
		</div>
	  	
	</form> 


<!-- 
	<form class="submission" action="action_page.php">
  		<input type="text" name="search" class="round" placeholder="Search Library" id = "search_toolbar"/>
  		<button type="submit"><i class="fa fa-search"></i></button>
	</form>
			 
			 -->

			<!-- <div class = "search_wrapper">
			    <div class="search">

			      <input type="text" name="search" class="round" placeholder="Search Library" id = "search_toolbar"/>
			     
			    </div>

			    <div class = "search">
			    	<button type="submit"><i class="fa fa-search"></i></button>
			    </div>
			</div> -->
			
		
	
	</body>
</html>
