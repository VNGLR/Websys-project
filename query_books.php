<?php


require './config.php';
$host=$config["DB_HOST"]; 

$root=$config["DB_USERNAME"]; 
$root_password=$config["DB_PASSWORD"]; 

$results = [];
$i = 0;
$db="lab8websys"; 

    try {

        if(isset($_POST['param_type'] ) && isset($_POST['query_string'])){
          $param_type = $_POST['param_type'];
          $query_string = $_POST['query_string'];
          $dbh = new PDO("mysql:host=$host", $root, $root_password);

          $query_string = '%'.$query_string.'%';
          $dbexec = new PDO('mysql:host=localhost;dbname=session_example', $root, $root_password);

          if($param_type == "title"){
            // print("Hello");
            $all_qs = [];
            $curr_i = 0;

               




            // print($query_string);
          //insert tuples into courses
            $stmt = $dbexec->prepare(" SELECT * FROM books WHERE title LIKE 
              :title ;
            ") or die(print_r($dbh->errorInfo(), true));
            $stmt->bindParam('title', $query_string, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetchALL();

            $curr_i = 0;

           

            foreach ($row as $tuple) {
              // print("Found one..");



              $curr_row_arr = [];
            
              
              $curr_row_arr[0] = $tuple[1];
              $curr_row_arr[1] = $tuple[2];
              $curr_row_arr[2] = $tuple[4];
              $curr_row_arr[3] = $tuple[7];
                


              $all_qs[$curr_i] = $curr_row_arr;  

              $curr_i++;
              
              
            }



             $final_arrs["Results"] = $all_qs;
          echo json_encode($final_arrs);
          }

          else if($param_type == "isbn"){

           $stmt = $dbexec->prepare(" SELECT * FROM books WHERE isbn LIKE
              :isbn;
            ") or die(print_r($dbh->errorInfo(), true));
            $stmt->bindParam('isbn', $query_string, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetchALL();
            $curr_i = 0;

            $all_qs = [];

            foreach ($row as $tuple) {
              // print("Found one..");



              $curr_row_arr = [];
            
              
              $curr_row_arr[0] = $tuple[1];
              $curr_row_arr[1] = $tuple[2];
              $curr_row_arr[2] = $tuple[4];
              $curr_row_arr[3] = $tuple[7];
                


              $all_qs[$curr_i] = $curr_row_arr;  

              $curr_i++;
              
              
            }




             $final_arrs["Results"] = $all_qs;
          echo json_encode($final_arrs);
          }

          else if($param_type == "author"){
             $stmt = $dbexec->prepare(" SELECT * FROM books WHERE author LIKE
              :author;
            ") or die(print_r($dbh->errorInfo(), true));
            $stmt->bindParam('author', $query_string, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetchALL();

            $curr_i = 0;

            $all_qs = [];

            foreach ($row as $tuple) {
              // print("Found one..");



              $curr_row_arr = [];
            
              
              $curr_row_arr[0] = $tuple[1];
              $curr_row_arr[1] = $tuple[2];
              $curr_row_arr[2] = $tuple[4];
              $curr_row_arr[3] = $tuple[7];
                


              $all_qs[$curr_i] = $curr_row_arr;  

              $curr_i++;
              
              
            }





             $final_arrs["Results"] = $all_qs;
          echo json_encode($final_arrs);
          }
          else if($param_type == "genre"){
              $stmt = $dbexec->prepare(" SELECT * FROM books WHERE genre LIKE
              :genre;
            ") or die(print_r($dbh->errorInfo(), true));
            $stmt->bindParam('genre', $query_string, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetchALL();

            $curr_i = 0;

            $all_qs = [];

            foreach ($row as $tuple) {
              // print("Found one..");



              $curr_row_arr = [];
            
              
              $curr_row_arr[0] = $tuple[1];
              $curr_row_arr[1] = $tuple[2];
              $curr_row_arr[2] = $tuple[4];
              $curr_row_arr[3] = $tuple[7];
                


              $all_qs[$curr_i] = $curr_row_arr;  

              $curr_i++;
              
              
            }



             $final_arrs["Results"] = $all_qs;
          echo json_encode($final_arrs);
          }



          

         //  //insert tuples into grades.
         //  $row = $dbexec->query("INSERT INTO `grades` (`id`, `crn`, `rin`, `grade`) VALUES
         //        (1, 10432, 302033000, 94),
         //        (2, 10432, 637378889, 93),
         //        (3, 10432, 661399222, 97),
         //        (4, 34333, 661399222, 89),
         //        (5, 34333, 302033000, 93),
         //        (6, 34333, 637378889, 84),
         //        (7, 44440, 612333223, 91),
         //        (8, 44440, 637378889, 88),
         //        (9, 44440, 302033000, 95),
         //        (10, 87329, 612333223, 92);") or die(print_r($dbh->errorInfo(), true));
       
         

         // //insert tuples into students
         //  $row = $dbexec->query("INSERT INTO `students` (`rin`, `rcsID`, `f_name`, `l_name`, `alias`, `phone`, `street`, `city`, `state`, `zip`) VALUES
         //  (302033000, 'podwe3', 'Manohar', 'RTL', 'R', 574321938, 'Pleasant Drive', 'Mahwah', 'NJ', '34223'),
         //  (612333223, 'ddjsn', 'John', 'Smith', 'J', 33333333, 'Troy Street', 'Troy', 'NY', '12180'),
         //  (637378889, 'ddw22', 'John', 'Glenn', 'JXSDO', 3922300, 'Wolfer Road', 'Albany', 'NY', '12183'),
         //  (661399222, 'cmawe5', 'Ben', 'Shapiro', 'M', 483070232, 'Wacker Dr', 'Chicago', 'IL', '60604');") or die(print_r($dbh->errorInfo(), true));
       
      }


    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }
?>