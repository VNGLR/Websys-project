<?php 
session_start();
?>

<!doctype html>
<html>
	<head>
		<title>Search Results</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="search.css"/>
    	<style>
			body{
				background-color:  #e5e8e8;
				background-image: url("bookshelfmodified.jpg");
			}

			#every_search_result{
				display: flex;
			}
    	</style>
    	<link rel = "stylesheet" href = "https://fonts.googleapis.com/css?family=Fredericka+the+Great">
    	<!-- <link href="" rel="stylesheet”> -->
    	<script type="text/javascript" src="search.js"></script>
	</head>
	<body>


		<a class="btn btn-primary" href="#" role="button" id="booksbtn" onclick = "redirect_my_books();">My Books</a>

		<?php
			//session_start();//display login/signup or logout depending on wether the user is logged in now or not
			if(!isset($_SESSION['username'])){
				echo "<a class='btn btn-primary' href='#'' role='button' id='signup'  onclick = 'redirect_logout();' >Sign Up or Log In</a>";
			}else{
				echo "<a class='btn btn-primary' href='#'' role='button' id='signup'  onclick = 'redirect_login();'>Log Out</a>";
				
			}

		?>
		<div class = "logo"> BOOK WORMS</div>
		<div class = "everything" id = "every_search_result">
		<h1>Search Results</h1>

		<?php 
			//top row of table 
		  echo "<table> 
		     	<tr>
				<th>Book Title</th>
				<th>ISBN</th>
				<th>Contact Information</th>
				<th>Last Exchanged At:</th>
			   </tr>
			";



          // $arr = $_GET["Results"];
		  $curr_inner_tuple = 0;
		  $total_line = "";
		  foreach ($_GET as $key => $value) { //build the search results
		  	

		  	if($curr_inner_tuple == 0){
		  		echo "<tr>";//begin row
		  	}



		  	if($curr_inner_tuple == 2){
		  		$total_line = $total_line."<th>".$value."(@rpi.edu)</th>";
		  	}else{
		  		$total_line = $total_line."<th>".$value."</th>";

		  	}
		  		
		  		// echo "<th>";

		  		// echo $value;


		  		
		  	++$curr_inner_tuple;


		  
		  	if($curr_inner_tuple == 4){//row built
		  		echo $total_line;
		  		$total_line = "";
		  		echo "</tr>";
		  		$curr_inner_tuple = 0;
		  	}

		  	
		  }

		  echo "</table>";//finish outputting					

	  ?>
	  </div>
		
	</body>
</html>
