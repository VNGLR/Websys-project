<!doctype html>
<html>
	<head>
		<title>My Account</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="resources/account.css"/>
    	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    	<link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
    	<script type="text/javascript" src="useraccount.js">	</script>
	</head>
	<body>
		<a class="btn btn-primary" href="#" role="button" id="booksbtn" onclick = "search_for_books();">Search</a>
		<div class="logo"> BOOK SHARE </div>
		<div class="everything">
		<h1 class="borrowed">Currently Borrowed</h1>
		<table id = "mybooks">
			<tr>
				<th>Book Title</th>
				<th>ISBN</th>
				<th>Borrowed From</th>
				<th>Owner</th>
			</tr>

			<?php


				require './config.php';
				$host=DB_SERVER; 

				$root=DB_USERNAME; 
				$root_password=DB_PASSWORD; 

				session_start();


				$results = [];
				$i = 0;
				$db="lab8websys"; 

				    try {

				        if(isset($_SESSION['username'] ) ){


				          
				          $dbh = new PDO("mysql:host=$host", $root, $root_password);

				          $query_string = '%'.$query_string.'%';
				          $dbexec = new PDO('mysql:host=localhost;dbname=session_example', $root, $root_password);

				          
				          
			              $stmt = $dbexec->prepare(" SELECT * FROM books WHERE current =
			              :uname;") or die(print_r($dbh->errorInfo(), true));
			              $stmt->bindParam('uname', $_SESSION['username'], PDO::PARAM_STR);
			              $stmt->execute();
			              $row = $stmt->fetchALL();


			              // echo "FETCHED";
			              // echo $row;
				            $curr_i = 0;

				            $all_qs = [];

					          foreach ($row as $tuple) {
					          	  // echo "FETCHED";
					             //   echo("Found one..");



					              $curr_row_arr = [];
					            
					              
					              $curr_row_arr[0] = $tuple[1];
					              $curr_row_arr[1] = $tuple[2];
					              $curr_row_arr[2] = $tuple[6];
					              $curr_row_arr[3] = $tuple[3];
					              $all_qs[$curr_i] = $curr_row_arr;  

				              	  $curr_i++;
					          }
				                


				             
				              
				              
				            

				              for($x = 0; $x < count($all_qs); ++$x){

				              	echo "<tr>";

				              	for($y = 0; $y < count($all_qs[$x]); ++$y){
				              		$total_line = "<th>";
				              		
				              		$total_line= $total_line.$all_qs[$x][$y];
				              		$total_line = $total_line."</th>";
				              		echo $total_line;
				              	}
				              	echo "</tr>";
				              }

				           }else{
				          	 
				          }



				          



				    } catch (PDOException $e) {
				        die("DB ERROR: ". $e->getMessage());
				    }
			?>
		</table>
</div>
<div class="everything">
		<h1 class="owned">Your Owned Books</h1>
		<table>
			<tr>
				<th>Book Title</th>
				<th>ISBN</th>
				<th>Current Borrower</th>
			</tr>

			<?php


				require './config.php';
				$host=DB_SERVER; 

				$root=DB_USERNAME; 
				$root_password=DB_PASSWORD; 

				session_start();


				$results = [];
				$i = 0;
				$db="lab8websys"; 

				    try {

				        if(isset($_SESSION['username'] ) ){


				          
				          $dbh = new PDO("mysql:host=$host", $root, $root_password);

				          $query_string = '%'.$query_string.'%';
				          $dbexec = new PDO('mysql:host=localhost;dbname=session_example', $root, $root_password);

				          
				          
			              $stmt = $dbexec->prepare(" SELECT * FROM books WHERE owner =
			              :owner;") or die(print_r($dbh->errorInfo(), true));
			              $stmt->bindParam('owner', $_SESSION['username'], PDO::PARAM_STR);
			              $stmt->execute();
			              $row = $stmt->fetchALL();


			              // echo "FETCHED";
			              // echo $row;
				            $curr_i = 0;

				            $all_qs = [];

					          foreach ($row as $tuple) {
					          	  // echo "FETCHED";
					             //   echo("Found one..");



					              $curr_row_arr = [];
					            
					              
					              $curr_row_arr[0] = $tuple[1];
					              $curr_row_arr[1] = $tuple[2];
					             
					              $curr_row_arr[2] = $tuple[4];
					              $all_qs[$curr_i] = $curr_row_arr;  

				              	  $curr_i++;
					          }
				                


				             
				              
				              
				            

				              for($x = 0; $x < count($all_qs); ++$x){

				              	echo "<tr>";

				              	// echo $all_qs[$x];

				              	for($y = 0; $y < count($all_qs[$x]); ++$y){
				              		$total_line = "<th>";
				              		
				              		$total_line= $total_line.$all_qs[$x][$y];
				              		$total_line = $total_line."</th>";
				              		echo $total_line;
				              	}
				              	echo "</tr>";
				              }

				          // //    $final_arrs["Results"] = $all_qs;
				          // // echo json_encode($final_arrs);
				           }else{
				          	 
				          }

				    } catch (PDOException $e) {
				        die("DB ERROR: ". $e->getMessage());
				    }
			?>

		</table>
	</div>
		<div class="share_book">
				<h3>Share your book </h3>
						<form action="additem.php" method="post">
							<p>Title</p>
							<input  type="text" name="value1"/> 
							<p>ISBN</p>
							<input  type="text" name="value2"/> 
							<p>Author</p>
							<input  type="text" name="value3"/> 
							<p>Genre</p>
							<input  type="text" name="value4"/> 
							<p>Location</p>
							<input  type="text" name="value5"/> 
							<br>
							<br>
							<input class="btn2"  type="submit" />

						</form>
						<br>
		</div>
	</body>	
</html>