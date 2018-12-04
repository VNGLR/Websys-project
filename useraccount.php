

<!doctype html>
<html>
	<head>
		<title>My Account</title>
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display|Roboto|Ubuntu|Oswald" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="account.css"/>
		<link rel="stylesheet" type="text/css" href="splash_screen.css"/>
		<link rel="stylesheet" type="text/css" href="search.css"/>
		<link rel="stylesheet" type="text/css" href="styles.css"/>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel = "stylesheet" href = "https://fonts.googleapis.com/css?family=Fredericka+the+Great">

    	<style>
    		body{
    			background-image: url("bookshelfmodified.jpg");
    		}

    		#currently_borrowed_b{
    			display: flex;
    		}

    		#owned_books_b{
    			display: flex;
    		}

    		.logo{
    			color: black;
    		}
    	</style>
    	<script type="text/javascript" src="useraccount.js">	</script>
    	<script > 
    	
    		//replaces the current borrower and the location when desired
			function change_ownership(id){
				var elem = document.getElementById("title" + id);
				console.log(elem);
				var title = elem.innerHTML;
				console.log("TITLE: " + title);

				var search_inp_str = "search_inputt" + id;
				var search_loc_str = "search_location" + id;
				var new_owner = document.getElementById(search_inp_str).value;
				console.log("New owner: " + new_owner);

				var new_location = document.getElementById(search_loc_str).value;
				console.log("New location: " + new_location);
				// 
				$.ajax({
		            type: "Post",
		            url: "transfer_ownership.php",
		            data: {"title": title, "new_owner": new_owner, "new_location": new_location},
		           	dataType: "json",
		            success: function(responseData, status){ //dynamically add buttons and information for each room to DOM
		            	if(responseData["Results"][0] === "Failure"){
		            		alert("Invalid borrower");

			                var id_str = 'myModal' + id;
			                var modal = document.getElementById(id_str);
			                modal.style.display = "none";
			                location.reload();
		            	}else{
			                alert("Ownership transferred successfully");


			                var id_str = 'myModal' + id;
			                var modal = document.getElementById(id_str);
			                modal.style.display = "none";
			                location.reload();
		            	}

		            }
    			});
			}

    	</script>
	</head>
	<body>
		<a class="btn btn-primary" href="#" role="button" id="booksbtn" onclick = "search_for_books();">Search</a>
		<div class =  "logo"> BOOK WORMS </div>
		<div class = "everything" id = "currently_borrowed_b">
		<h1 class="borrowed">Currently Borrowed</h1>
		<table id = "mybooks">
			<tr>
				<th>Book Title</th>
				<th>ISBN</th>
				<th>Borrowed From</th>
				<th>Owner</th>
			</tr>

<?php
error_reporting(E_ERROR | E_PARSE);


require './config.php';
$host=DB_SERVER; 

$root=DB_USERNAME; 
$root_password=DB_PASSWORD; 

//session_start();


    try {

        if(isset($_SESSION['username'] ) ){


          //connect to server
          $dbh = new PDO("mysql:host=$host", $root, $root_password);

          $query_string = '%'.$query_string.'%';
          $dbexec = new PDO('mysql:host=localhost;dbname=session_example', $root, $root_password);

          
          //build query
          $stmt = $dbexec->prepare(" SELECT * FROM books WHERE current =
          :uname;") or die(print_r($dbh->errorInfo(), true));
          $stmt->bindParam('uname', $_SESSION['username'], PDO::PARAM_STR);
          $stmt->execute();
          $row = $stmt->fetchALL();


            $curr_i = 0;

            $all_qs = [];

            //construct output in an array then output
	          foreach ($row as $tuple) {


	              $curr_row_arr = [];
	            
	              
	              $curr_row_arr[0] = $tuple[1];
	              $curr_row_arr[1] = $tuple[2];
	              $curr_row_arr[2] = $tuple[6];
	              $curr_row_arr[3] = $tuple[3];
	              $all_qs[$curr_i] = $curr_row_arr;  

              	  $curr_i++;
	          }
                
            
	          //build tree 
              for($x = 0; $x < count($all_qs); ++$x){

              	echo "<tr>";

              	for($y = 0; $y < count($all_qs[$x]); ++$y){
              		$total_line = "<th>";
              		
              		//build html page
              		if($y == 0){
              			$total_line= $total_line."<p id = title".$x.">".$all_qs[$x][$y]."</p><a class='btn btn-primary' href='#' role='button' id='booksbtnanother' onclick = 'transfer_ownership(";

              			$total_line = $total_line.$x.");'> Transfer Ownership </a>";
              			$total_line = $total_line."<div id='myModal";
              			$total_line = $total_line.$x."'";
              			$total_line = $total_line." class='modal'>";

									
						$total_line = $total_line."<div class='modal-content'>";
						$total_line = $total_line."<span class='close'>&times;</span>";
						$total_line = $total_line."<p>Lend out book to: </p>";
						$total_line = $total_line."<input type='text' class = 'round search_inp' placeholder='New Borrower' name='search' id='search_inputt";
						$total_line = $total_line.$x."'>";
						$total_line = $total_line."<input type='text' class = 'round search_loc' placeholder='New Location' name='search' id = ";
						$total_line = $total_line."'search_location";
						$total_line = $total_line.$x."'><br/>";
						$total_line = $total_line."<a class='btn btn-primary' href='#' role='button' id='booksbtnchange' onclick =  ";
						$total_line = $total_line."'change_ownership("; 

					    $total_line= $total_line.$x.");'> Transfer Ownership </a>";
						$total_line = $total_line."</div></div>";
              		}else{
              			$total_line= $total_line.$all_qs[$x][$y];
              		}
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
		<div class = "everything" id = "owned_books_b">
		<h1 class="owned">Your Owned Books</h1>
		<table>
			<tr>
				<th>Book Title</th>
				<th>ISBN</th>
				<th>Current Borrower</th>
			</tr>

			<?php
			error_reporting(E_ERROR | E_PARSE);


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
				          
				          //build query 
			              $stmt = $dbexec->prepare(" SELECT * FROM books WHERE owner =
			              :owner;") or die(print_r($dbh->errorInfo(), true));
			              $stmt->bindParam('owner', $_SESSION['username'], PDO::PARAM_STR);
			              $stmt->execute();
			              $row = $stmt->fetchALL();


				            $curr_i = 0;

				            $all_qs = [];
				            //build output and prepare it

					          foreach ($row as $tuple) {
					              $curr_row_arr = [];
					            
					              $curr_row_arr[0] = $tuple[1];
					              $curr_row_arr[1] = $tuple[2];
					             
					              $curr_row_arr[2] = $tuple[4];
					              $all_qs[$curr_i] = $curr_row_arr;  

				              	  $curr_i++;
					          }
				            
					          //build html page
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

		<div class="share_book">
				<h3 class = "input_add_item">Share your book </h3>
					<form action="additem.php" method="post" id = "addmaterial">
						<p class = "input_add_item">Title</p>
						<input type="text" class = "round" placeholder="Title" name="value1" id = "search_input1">
						<p class = "input_add_item">ISBN</p>
						<input type="text" class = "round" placeholder="ISBN" name="value2" id = "search_input2">
						<p class = "input_add_item">Author</p>
						<input type="text" class = "round" placeholder="Author" name="value3" id = "search_input3">
						<p class = "input_add_item">Genre</p>
						<input type="text" class = "round" placeholder="Genre" name="value4" id = "search_input4">
						<p class = "input_add_item">Location</p>
						<input type="text" class = "round" placeholder="Location" name="value5" id = "search_input5">
						<br>
						<br>
						<input class="btn2"  type="submit" />

					</form>
				<br>
		</div>
	</body>	
</html>