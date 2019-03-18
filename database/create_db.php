<?php
    $servername="localhost";  
    $username="root";
    $password="";
    
    
    try{
    
    $sql_db="CREATE DATABASE User_info";
    $conn=new PDO("mysql:host=$servername",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $conn->exec($sql_db);
    echo"Database created sucesfully";
    }
    
    catch(PDOException $e){
        echo"Database creation failed<br/>".$e->getmessage();
    }
    
    
    $conn=null;
    
    
    
    
    
    
    $dbname="User_info";
    $dsn="mysql:host=$servername;dbname=$dbname";
    
    
    try{    
            $conn=new PDO($dsn,$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql_query="CREATE TABLE user_details(
                                                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                    first_name VARCHAR(30) NOT NULL,
                                                    last_name VARCHAR(30) NOT NULL,
                                                    email VARCHAR(50) UNIQUE,
                                                    reg_Date DATE,
                                                    mobile_no VARCHAR(10),
                                                    usr_password  VARCHAR(128) 

                                                 )";
            $conn->exec($sql_query);
            echo"<br/>Table create sucessfully";                                     


        }        
    catch( PDOException $e)            
        {
            echo"Connection failed<br/>".$e->getMessage();
        }    
        
        $conn=null;
    ?>














?>
