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

        if ($_POST['reply']){

            //get post_id from reply-form.php
            $post_id=$_GET['post_id'];

            $email = $_POST['email'];        
            $contents = $_POST['contents'];  

            $InsertData = $connection -> exec ("INSERT INTO Reply (Email,Contents,Date_Time,Post_ID) VALUES 
            ('$email','$contents',NOW(),'$post_id')");

            echo "Reply Post successfully.";
        }

        header( "refresh:1; forum.php" );
    }
    catch(PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>