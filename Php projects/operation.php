<?php
require_once("db.php");
require_once("function.php");

$con = createDb();

// create a button click
if(isset($_POST['create'])){
    echo "create button click";
    //laiter
    //createData()
}

if(isset($_POST['update'])){
    updateData();
}

//this means post finds the name of the button
if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
    deleteAllatOnce();
}

//i will get read of this block once i uncomment the while loop
// if(isset($_POST['read'])){
//     getData();
// }


function createData(){
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    //insert this values in the db if values exist in this variables
    if($bookname && $bookpublisher && $bookprice){
        $sql = "INSERT INTO books(book_name,book_publisher,book_price) VALUES ('$bookname','$bookpublisher','$bookprice')";

        if(mysqli_query($GLOBALS['con'],$sql)){
            echo "Record inserted successfully";
            // change
            TextNode("success","Recorded successful");
        }else{
            echo "Error";
        }
    }
    // if not specified any values in the textboxes
    else{
        echo "provide data in the text box";
        //change
        TextNode("error", "Provide Data in the text box");

    }
}

function textboxValue($value){
    // security issues especiallly the trim will help in sql injection
    $textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST['$value']));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}

// messages to respond if error occurs
function TextNode($classname,$msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

//get data from the database
function getData(){
    $sql = "SELECT * FROM books";

    $result  = mysqli_query($GLOBALS['con'], $sql);
    if(mysqli_num_rows($result)>0){
        // while($row = mysqli_fetch_assoc($result)){
        //     echo "Id:".$row['id']."Book Name:".$row['book_name']
        // }

        // change to this and comment the while sta
        return $result;
    }
}

//update the database
function updateData(){
    $bookid = textboxValue("book_id");
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice  = textboxValue("book_price");

    if($bookname && $bookpublisher && $bookprice ){
         $sql = "
          UPDATE books SET book_name = '$bookname',book_publisher = '$bookpublisher', book_price = '$bookprice' WHERE id = '$bookid';
         ";

         if(mysqli_query($GLOBALS['con'],$sql)){
             TextNode("success","Data successfully updated");
         }else{
             TextNode("error", "Unable to update data");
         }
    }else{
       TextNode("error", "Select Data using the icon");
    }

}


//Delete record function
function deleteRecord(){
    //textbox always returns a string so lets convert into integer
    $bookid = (int)textboxValue("book_id");

    $sql = "DELETE FROM books WHERE id = $bookid";

    if(mysqli_query($GLOBALS['con'],$sql)){
        TextNode("success", "Deleted successfully");
    }else{
        TextNode("error", "unable to delete the records");
    }
}

//function to create a delete more record at once
 function deleteAll(){
     $result  = getData();
     $i = 0;
     //if we have values in this record
     if($result){
         while($row = mysqli_fetch_assoc($result)){
            //  echo $row['id'];
            $i++;
            if($i>3){
                buttonElement("btn-deleteall","btn btn-danger", "<i class='fas fa-trash'></i>Delete All","deleteall","");
                return;
            }
         }
     }

 }

 //actual functions to delete the records
 function deleteAllatOnce(){
     $sql = "DROP TABLE books";
     if(mysqli_query($GLOBALS['con'],$sql)){
         TextNode("success", "All records deleted successfully");
         CreateDb();

     }else{
         TextNode("error", "Cannot delete all records");
     }
 }

 //to display id values
 function setId(){
     $getid = getData();
     $id = 0;
     if($getid){
         while($row = mysqli_fetch_assoc($getid)){
            $id =  $row['id'];

         }
     }
     return($id+1);
 }

