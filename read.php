<?php
include 'connect.php';
$json["error"] = false;
  $json["errmsg"] = "";
  $json["data"] = array();
         $sql = "SELECT * FROM `addplace`";
         $result = mysqli_query($conn,$sql);
         $numrows = mysqli_num_rows($result);
         // $res=array();
         // header("Content-Type: JSON");
         // while ($row=mysqli_fetch_assoc($result)) {
         //    $res[]=$row;
         
         // }
         // echo json_encode($res,JSON_PRETTY_PRINT);
         if($numrows > 0){
            //check if there is any data
            $namelist = array();
       
            while($array = mysqli_fetch_assoc($result)){
                array_push($json["data"], $array);
                //push fetched array to $json["data"] 
            }
         }else{
             $json["error"] = true;
             $json["errmsg"] = "No any data to show.";
         }
       
         mysqli_close($conn);
         
         header('Content-Type: application/json');
         // tell browser that its a json data
         echo json_encode($json,JSON_PRETTY_PRINT);
        ?>