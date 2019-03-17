<?php


    $servername="localhost";
    $dbname="User_info";
    $username="root";
    $password="";


    $dsn="mysql:host=$servername;dbname=$dbname";

    $f_name=$_POST["first_name"];
    $l_name=$_POST["last_name"];
    $usr_email=$_POST["usr_email"];
    $mobile_no=$_POST["mobile_no"];
    $date=date("Y-m-d");
    $usr_pass=password_hash($_POST["usr_pass"],PASSWORD_DEFAULT);
    echo $mobile_no;
    
    
    
    $conn=new PDO( $dsn, $username, $password );

    try{
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO user_details (first_name,last_name,email,mobile_no,reg_date,usr_password)VALUES('$f_name','$l_name','$usr_email','$mobile_no','$date','$usr_pass')";
        $conn->exec($sql);
    }

    catch(PDOException $e){
        echo"<br/>Insertion failed<br/>".$e->getMessage();

    }

    $conn=null;

    ?>