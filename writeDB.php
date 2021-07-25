<?php
    //define the database connection variables
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ForumDB";

    try{
        //create a connection object
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
        
        //set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $_SERVER["REQUEST_METHOD"];

        if ($_POST['add']){

            $email = $_POST['email']; 
            $title = $_POST['title'];        
            $contents = $_POST['contents'];  
            
            $InsertData = $connection -> exec ("INSERT INTO Posts (Email,Title,Contents,Date_Time) VALUES 
            ('$email','$title','$contents',NOW())");
        
            echo "Add Post successfully.";
        }

        header( "refresh:1; forum.php" );
    }
    catch(PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>