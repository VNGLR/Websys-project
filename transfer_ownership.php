<?php


require './config.php';
$host=DB_SERVER; 

$root=DB_USERNAME; 
$root_password=DB_PASSWORD; 

session_start();

    try {
        //is user logged in?
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


            $count = $stmt->rowCount();

            if($count =='0'){
                $all_qs = ["Failure"];//all queries


                $final_arrs["Results"] = $all_qs;
                echo json_encode($final_arrs);//output results
            }
            else{
                
            
              // echo $success;


              //prepare change in database
              $stmt = $dbexec->prepare(" UPDATE books SET location = :location WHERE title =
                :title;
              ") or die(print_r($dbh->errorInfo(), true));
              $stmt->bindParam('location', $new_location, PDO::PARAM_STR);
              $stmt->bindParam('title', $title, PDO::PARAM_STR);

              $stmt->execute();//ececute update in location


              // $row = $stmt->fetchALL();

              $count = $stmt->rowCount();

              if($count =='0'){
                  $all_qs = ["Failure"];//all queries


                  $final_arrs["Results"] = $all_qs;
                  echo json_encode($final_arrs);//output results
              }else{

                $curr_i = 0;

                $all_qs = [];//all queries


                 $final_arrs["Results"] = $all_qs;
                echo json_encode($final_arrs);//output results
              }
            }
          }else{
          	 $final_arrs["Results"] = [];
          	 echo json_encode($final_arrs);//output results
          }


    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }
?>