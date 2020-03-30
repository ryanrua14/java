<?php
/*
Function will take user input from the form and add it to the database

Used in file(s) index.php Ln 21
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
    
    //Escape user inputs for security
    $task = mysqli_real_escape_string($conn, $_REQUEST['task']);
    
    //Initiate boolean
    $complete = FALSE;
    
    //Insert data into database table, table structure in db.php file ln 56
    $sql = "INSERT INTO tasks (title, isComplete) VALUES ('$task', '$complete')";
    if($conn->query($sql) === TRUE){
        
    }else{
        echo "Error adding data " . $conn->error;
    }//End ifelse
    header("Location: ../index.php"); //Redirect back to home
    mysqli_close($conn);

?>