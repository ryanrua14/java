<?php
/*
Script will delete object from database table when delete button is pressed

Used in file(s) db.php Ln 102
*/
    //Declare variables
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "todolist";

    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
    //Check connection
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }//End if

    //Delete button function]
    if(!empty($_POST['id'])){
        $id = $_POST['id'];
    }if(empty($id)){
        echo "Id is empty";
    }//End if

    $sql = "DELETE FROM tasks WHERE id ='$id'";
    if($conn->query($sql) === TRUE){
        
    }else{
        echo "Error deleting data " . $conn-error;
    }//End if-else
    header("Location: ../index.php");
    //Close connection
    mysqli_close($conn);
    die;
?>