<?php
/*
Function searches to see if database already exists and creates the database if the database does not exist

Function used in file(s): index.php Ln 9
*/

function createDatabase(){
    //Declare functions for database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    //Create connection
    $conn = new mysqli($servername, $username, $password);
    //Check connection
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }//End if
    
    //Check if database exists, if not create new database, else use exsiting database
    $sql = "CREATE DATABASE IF NOT EXISTS todolist";
    //Create database
    if($conn->query($sql) === TRUE){
        echo "<h2>Welcome to myTasks</h2>";
        createTable();
    }else{
        echo "Error creating database " . $conn->error;
    }//End if-else
    mysqli_close($conn);
}//End function


/*
Function searches for database table and creates database table if the database table does not exist

Function used in file(s): index.php
*/

function createTable(){
    //Declare functions for database connection
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
    
    /*Check if database table already exists. If not create table to add tasks else pull data from database where "isComplete" is false.
    */
    $sql = "CREATE TABLE IF NOT EXISTS tasks(id INT(25) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    isComplete BOOLEAN NOT NULL
    )";
    
    //Create table
    if($conn->query($sql) === TRUE){
        
    }else{
        echo "Error creating table " . $conn->error;
    }//End if-else
    mysqli_close($conn);
}//End function

/*
Function gets data from database table and displays it on the webpage

Function used in file(s): index.php
*/

function callData(){
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
    
    //Select all data from database
    $sql = "SELECT * from tasks";
    $result = $conn->query($sql);
    //Format tasks and echo to screen
        //Fetch tasks and places them in list
        if($result->num_rows > 0){
            while($tasks = $result->fetch_assoc()){
                echo "<div class='list-group'>" . "\n";
                echo "<class='list-group-item list-group-item-action flex-column align-items-start active'>" . "\n";
                echo "<div class='d-flex w-100 justify-content-between'>";
                echo "<h5 class='mb-1'>". ucfirst($tasks['title']). "</h5>" . "\n";
                echo "<small>".($tasks['date'])."</small>";
                echo "</div></div>";
            }//End while
        }else{
            echo "No Tasks To Do";
        }//End if    
    //Close connection
    mysqli_close($conn);
}

?>