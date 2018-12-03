<?php ?>

<!doctype html>
<html>
	<head>
		<title>Search Results</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="resources/search.css"/>
    	<link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
    	<script type="text/javascript" src="search.js"></script>
	</head>
	<body>


		<a class="btn btn-primary" href="#" role="button" id="booksbtn" onclick = "redirect_my_books();">My Books</a>
		<!-- <a class="btn btn-primary" href="#" role="button" id="signup">Sign Up or Log In</a> -->
		
		<?php
			session_start();
			if(!isset($_SESSION['username'])){
				echo "<a class='btn btn-primary' href='#'' role='button' id='signup'  onclick = 'redirect_logout();' >Sign Up or Log In</a>";
			}else{
				// echo $_SESSION['username'];
				echo "<a class='btn btn-primary' href='#'' role='button' id='signup'  onclick = 'redirect_login();'>Log Out</a>";
				
			}


		?>



		<div class="logo"> BOOK SHARE </div>
		<div class="everything"> 

		<h1>Search Results</h1>

		<?php 

		  echo "<table>
		     	<tr>
				<th>Book Title</th>
				<th>ISBN</th>
				<th>Who Has It</th>
				<th>Location</th>
			   </tr>
			";



          // $arr = $_GET["Results"];
		  $curr_inner_tuple = 0;
		  $total_line = "";
		  foreach ($_GET as $key => $value) { 
		  	

		  	if($curr_inner_tuple == 0){
		  		echo "<tr>";
		  	}
		  	

		  		$total_line = $total_line."<th>".$value."</th>";
		  		
		  		// echo "<th>";

		  		// echo $value;

		  		// echo "</th>";
		  		
		  	++$curr_inner_tuple;
		  
		  	if($curr_inner_tuple == 4){
		  		echo $total_line;
		  		$total_line = "";
		  		echo "</tr>";
		  		$curr_inner_tuple = 0;
		  	}

		  	
		  }




		  echo "</table>";



					

	  ?>
		</div>
	</body>
</html>
