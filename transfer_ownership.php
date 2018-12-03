<?php


require './config.php';
$host=DB_SERVER; 

$root=DB_USERNAME; 
$root_password=DB_PASSWORD; 

session_start();


// $results = [];
// $i = 0;
// $db="lab8websys"; 

    try {
        // $final_arrs = {};
        if(isset($_SESSION["username"] ) && isset($_POST["new_owner"]) ){


          $title = $_POST["title"];
          $new_owner = $_POST["new_owner"];
          $new_location = $_POST["new_location"];
          
          $dbh = new PDO("mysql:host=$host", $root, $root_password);

          $query_string = '%'.$query_string.'%';
          $dbexec = new PDO('mysql:host=localhost;dbname=session_example', $root, $root_password);

            
          
            $stmt = $dbexec->prepare(" UPDATE books SET current = :curr WHERE title =
              :title;
            ") or die(print_r($dbh->errorInfo(), true));
            $stmt->bindParam('curr', $new_owner, PDO::PARAM_STR);
            $stmt->bindParam('title', $title, PDO::PARAM_STR);


            $success = $stmt->execute();
            echo $success;



            $stmt = $dbexec->prepare(" UPDATE books SET location = :location WHERE title =
              :title;
            ") or die(print_r($dbh->errorInfo(), true));
            $stmt->bindParam('location', $new_location, PDO::PARAM_STR);
            $stmt->bindParam('title', $title, PDO::PARAM_STR);


            $stmt->execute();




            $row = $stmt->fetchALL();

            $curr_i = 0;

            $all_qs = [];

           


             $final_arrs["Results"] = $all_qs;
            echo json_encode($final_arrs);
          }else{
          	 $final_arrs["Results"] = [];
          	 echo json_encode($final_arrs);
          }



          

       
       
      


    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }
?>