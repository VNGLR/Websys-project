<?php


require './config.php';
$host=DB_SERVER; 

$root=DB_USERNAME; 
$root_password=DB_PASSWORD; 



$results = [];
$i = 0;
    try {

        if(isset($_POST['param_type'] ) && isset($_POST['query_string'])){
          //create PD)
          $param_type = $_POST['param_type'];
          $query_string = $_POST['query_string'];
          $dbh = new PDO("mysql:host=$host", $root, $root_password);

          $query_string = '%'.$query_string.'%';
          $dbexec = new PDO('mysql:host=localhost;dbname=session_example', $root, $root_password);

          //if searching for title
          if($param_type == "title"){
            $all_qs = [];
            $curr_i = 0;

          //insert tuples into courses
            //prepare search
            $stmt = $dbexec->prepare(" SELECT * FROM books WHERE title LIKE 
              :title ;
            ") or die(print_r($dbh->errorInfo(), true));
            $stmt->bindParam('title', $query_string, PDO::PARAM_STR);
            $stmt->execute(); //execute search
            $row = $stmt->fetchALL();

            $curr_i = 0;


            //for each result build output 
            foreach ($row as $tuple) {
              $curr_row_arr = [];//will temporary hold search results
            
              
              $curr_row_arr[0] = $tuple[1];//title
              $curr_row_arr[1] = $tuple[2];//isbn
              $curr_row_arr[2] = $tuple[4];//borrowed from
              $curr_row_arr[3] = $tuple[7];//owner
                
              $all_qs[$curr_i] = $curr_row_arr;  //move from termporary array to output array

              $curr_i++;
              
              
            }


             $final_arrs["Results"] = $all_qs;
          echo json_encode($final_arrs);//output search
          }

          else if($param_type == "isbn"){//search for isbn
            //build and make query
           $stmt = $dbexec->prepare(" SELECT * FROM books WHERE isbn LIKE
              :isbn;
            ") or die(print_r($dbh->errorInfo(), true));
            $stmt->bindParam('isbn', $query_string, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetchALL();
            $curr_i = 0;

            $all_qs = [];

            foreach ($row as $tuple) {
              $curr_row_arr = [];//will temporary hold search results
            
              
              $curr_row_arr[0] = $tuple[1];//title
              $curr_row_arr[1] = $tuple[2];//isbn
              $curr_row_arr[2] = $tuple[4];//borrowed from
              $curr_row_arr[3] = $tuple[7];//owner
                
              $all_qs[$curr_i] = $curr_row_arr;  //move from termporary array to output array

              $curr_i++;
               
            }

             $final_arrs["Results"] = $all_qs;
          echo json_encode($final_arrs);//output search
          }

          else if($param_type == "author"){//search by author
            //build and make query
             $stmt = $dbexec->prepare(" SELECT * FROM books WHERE author LIKE
              :author;
            ") or die(print_r($dbh->errorInfo(), true));
            $stmt->bindParam('author', $query_string, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetchALL();

            $curr_i = 0;

            $all_qs = [];//final output

            foreach ($row as $tuple) {
              $curr_row_arr = [];//temporary output
              
              $curr_row_arr[0] = $tuple[1];//title
              $curr_row_arr[1] = $tuple[2];//isbn
              $curr_row_arr[2] = $tuple[4];//borrowed from
              $curr_row_arr[3] = $tuple[7];//owner
                


              $all_qs[$curr_i] = $curr_row_arr; //build final results array

              $curr_i++;
            }

             $final_arrs["Results"] = $all_qs;
          echo json_encode($final_arrs);//output final results
          }
          else if($param_type == "genre"){//genre search
              $stmt = $dbexec->prepare(" SELECT * FROM books WHERE genre LIKE
              :genre;
            ") or die(print_r($dbh->errorInfo(), true));
            $stmt->bindParam('genre', $query_string, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetchALL();

            $curr_i = 0;

            $all_qs = [];//final output

            foreach ($row as $tuple) {

              $curr_row_arr = [];//used to build final output
            
              $curr_row_arr[0] = $tuple[1];//title
              $curr_row_arr[1] = $tuple[2];//isbn
              $curr_row_arr[2] = $tuple[4];//borrowed from
              $curr_row_arr[3] = $tuple[7];//owner
                


              $all_qs[$curr_i] = $curr_row_arr;  

              $curr_i++;
               
            }

             $final_arrs["Results"] = $all_qs;
          echo json_encode($final_arrs);//output results
          }
       
      }


    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }
?>