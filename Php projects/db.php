<?php
function createDb(){
    $servername = 'localhost';
    $username = 'root';
    $password = 'PhpAdmin@12';
    $dbName = 'book_store';

    // create connection
    $conn = mysqli_connect($servername,$username,$password,$dbName);

    // check connection
    if(!$conn){
        die("Connection failed".mysqli_connect_error());
    }

    // create new database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbName";

    // execute
    if(mysqli_query($conn,$sql)){
        //echo "Database created";
        // $conn = mysqli_connect($servername,$username,$password,$dbName);

        //laiter
        $sql = "
          CREATE TABLE IF NOT EXISTS books(
              id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
              book_name VARCHAR (25) NOT NULL,
              book_publisher VARCHAR (20),
              book_price FLOAT
          );
        ";
     if(mysqli_query($conn,$sql)){
         //echo "Table created...!!!!";
         return $conn;
     }else{
         echo "Cannot create table";
     }

    }else{
        echo "Erro while creating database".mysqli_error($conn);
    }
}