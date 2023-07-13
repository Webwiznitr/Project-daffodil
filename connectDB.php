<?php
    //run this to create table in database

    //Connect DB Server
    $servername = "localhost";
    $username = "root";
    $password = "";

    try{        
        $connection = new PDO("mysql:host=$servername", $username, $password);
        
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully <br/>";

        //Create DB
        $CreateDb = "CREATE DATABASE ForumDB";
        $connection->exec($CreateDb);
        echo "Database created successfully<br>";
        
        $dbname = "ForumDB";
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        //Create Table 1
        $CreateTbl = "CREATE TABLE Posts (
            Post_ID INT(5) NOT NULL AUTO_INCREMENT,
            Email VARCHAR(50) NOT NULL, 
            Title VARCHAR(75) NOT NULL, 
            Contents VARCHAR(10000) NOT NULL, 
            Date_Time DATETIME NOT NULL,
            PRIMARY KEY (Post_ID)
            )";
        
        $connection->exec($CreateTbl);
        echo "Table Posts created successfully<br>";
        
        //Create Table 2
        $CreateTbl = "CREATE TABLE Reply (
            Email VARCHAR(50) NOT NULL,
            Contents VARCHAR(10000) NOT NULL, 
            Date_Time DATETIME NOT NULL,
            Post_ID INT(5) NOT NULL AUTO_INCREMENT,
            FOREIGN KEY (Post_ID) REFERENCES Posts(Post_ID)
            )";
        
        $connection->exec($CreateTbl);
        echo "Table Reply created successfully<br>";

        //Insert Data into Table 1 (EXAMPLE)
        $InsertData = $connection -> exec ("INSERT INTO Posts (Post_ID,Email,Title,Contents,Date_Time) VALUES 
        (1, 'welson007@gmail.com', 'X-RAY Diffraction ', 'Anyone can have more explanation about X-RAY Diffraction for me?', '2021-07-25 13:07:44'),
        (2, 'danny123@yahoo.com', 'Biology Question', 'Which famous scientist introduced the idea of natural selection?\r\n', '2021-07-25 13:16:47'),
        (3, 'shasya0912@hotmail.com', 'Math Question', 'How to do this question? \r\nSimplify:(4x2 - 2x) - (-5x2 - 8x).', '2021-07-25 13:21:52')");

        //Insert Data into Table 2 (EXAMPLE)
        $InsertData = $connection -> exec ("INSERT INTO Reply (Email,Contents,Date_Time,Post_ID) VALUES 
        ('jennie1108@hotmail.com', 'Charles Darwin. He argued that natural selection explained how a wide variety of life forms developed over time from a single common ancestor.\r\n', '2021-07-25 13:18:20', 2),
        ('kennylaw@yahoo.com', 'XRD is a technique used to find out the nature of the materials as crystalline or amorphous. It will define the quantification of cementitious materials. The XRD analysis is done with an X-ray source of Cu KÎ± radiation (Î» = 1.5406 Ã…). It will analyze and identify the unknown crystalline compounds by Brag Brentano method. The different parameters such as scan step size, collection time, range, X-ray tube voltage and current should be fixed based on the specimens requirement analysis. The standard database (JCPDS database) for XRD pattern is used for phase identification for a large variety of crystalline phases in the concrete specimens.', '2021-07-25 13:19:42', 1),
        ('alice1001@gmail.com', 'X-ray diffraction, a phenomenon in which the atoms of a crystal, by virtue of their uniform spacing, cause an interference pattern of the waves present in an incident beam of X rays. The atomic planes of the crystal act on the X rays in exactly the same manner as does a uniformly ruled grating on a beam of light.', '2021-07-25 13:20:09', 1)");

        echo "Data inserted successfully<br>";
    } 
    catch(PDOException $e) 
    {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
?>