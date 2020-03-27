<html>
<head>
    <title>MyTasks</title>
    <!--
    Todo list that saves tasks that a user needs to do
    Author: Ryan Rua
    -->
    <?php include("php/db.php"); 
        createDatabase();
    ?>
    
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!--Stylesheets-->
    <link rel="stylesheet" href="./stylesheets/styles.css" type="text/css">
    
    </head>
    <body>
        <div class="container">
            <form action="./php/send.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="task" placeholder="Enter Task">
                </div>
                <input type="submit" value="submit" class="btn btn-primary">
            </form>
            <?php callData() ?>
        </div>
    </body>
</html>