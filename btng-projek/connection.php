<?php
// db = database ----- $ = varibael diikuti nama variabel
    $db_host= "localhost:3306"; //nomor port dari xampp
    $db_username= "root";
    $db_password= "";
    $db_name= "fachri-todolist";

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name); 

    if ($conn -> connect_error){
        die("Connection failed" . $conn -> connect_error);
    }