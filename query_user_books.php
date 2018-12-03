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
        //if user logged in
        if(isset($_SESSION['username'] ) ){
          
          $dbh = new PDO("mysql:host=$host", $root, $root_password);

          $query_string = '%'.$query_string.'%';
          //build PDO
          $dbexec = new PDO('mysql:host=localhost;dbname=session_example', $root, $root_password);
              //prepare search
              $stmt = $dbexec->prepare(" SELECT * FROM books WHERE current =
              :uname;
            ") or die(print_r($dbh->errorInfo(), true));
            $stmt->bindParam('uname', $SESSION['username'], PDO::PARAM_STR);
            $stmt->execute(); //execture search
            $row = $stmt->fetchALL();

            $curr_i = 0;

            $all_qs = [];//final results will be stored here

            foreach ($row as $tuple) {

              $curr_row_arr = [];//temporarily used to output results
            
              
              $curr_row_arr[0] = $tuple[1];//title
              $curr_row_arr[1] = $tuple[2];//isbn
              $curr_row_arr[2] = $tuple[4];//borrowed from
              $curr_row_arr[3] = $tuple[7];//owner
                


              $all_qs[$curr_i] = $curr_row_arr;  //build final results

              $curr_i++;


             $final_arrs["Results"] = $all_qs;
          echo json_encode($final_arrs);//output results 
          }else{
          	 $final_arrs["Results"] = [];
          	 echo json_encode($final_arrs);//output results
          }
       
      }


    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }
?>