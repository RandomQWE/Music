<?php
    session_start();
    $title="login";
    include 'header.php';
    
    
    
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
            header("location:header.php");
            exit;
    }
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="User_info";    
    $dsn="mysql:host=$servername;dbname=$dbname";
        
    $emailErr= $email= $usr_pass= $usr_passErr= "";
        
        
    $con=new PDO($dsn,$username,$password);

    function test_input($data)
        {
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }

    if ($_SERVER["REQUEST_METHOD"]=="POST"){

        if (empty($_POST["email"]))
            $emailErr="Email is required";
        else
        {
            $email=test_input($_POST["email"]);
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
                {
                    $emailErr="Invalid format";
                }
         
        }
        
        
        if(empty($_POST["usr_pass"])){
            $usr_passErr="Password is required";
        }
        else{   
            $usr_pass=test_input($_POST["usr_pass"]);
        }
                   
        
        if(empty($usr_passErr) && empty($emailErr))
        {
            $sql="SELECT id ,usr_password,email FROM user_details WHERE email= :email ";

            if($stmt=$con->prepare($sql))
                {
                    $stmt->bindParam(":email",$param_email,PDO::PARAM_STR);

                    $param_email=trim($_POST["email"]);

                    if($stmt->execute())
                        {
                            if($stmt->rowCount()== 1)
                                {
                                        if($row=$stmt->fetch()){
                                            $id=$row["id"];
                                            $email=$row["email"];
                                            $hashed_password=$row["usr_password"];

                                            if(password_verify($usr_password,$hashed_password))
                                                {
                                                    session_start();
                                                    $_SESSION["id"]=$id;
                                                    $_SESSION["email"]=$email;
                                                    $_SESSION["logedin"]=true;

                                                    header("location: welcome.php");
                                                
                                                }
                                    
                                            else{
                                            $usr_passErr="Password is incorect";
                                            }
                                        }
                                }
                            else{
                                $emailErr="No email Address registered";
                            }    
                        }

                }
            unset($stmt);

        }

        unset($con);
    }


?>
<!DOCTYPE html>
<html>
   
    
    
    <head>
        <style>
           fieldset.logon_font{
               
                border-radius: 30px;
                border-style:solid;
                width:1000px;
            }
            .b{
            background-image:url(./images/music.jpg);
            height:100%;
            
            
            
            background-size:cover;
            }   
            body{
                font-family: Arial, Helvetica, sans-serif;

            }
            * {
            box-sizing: border-box;
            }

           input[type=text]{           
            width: 500px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            margin-left:80px;
            
            }
            
            
            label {
            padding: 12px 12px 12px 0;
            display: inline-block;
            }
            
            
            input[type=submit]:hover {
            background-color: #45a049;
            }
            
            
            input[type=submit] {
            margin-left:300px;
            margin-top:20px;
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            
            }
            
            input[type=password]{
            width: 500px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            margin-left:50px;

            
            }

        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
        <div class="b">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <fieldset class="logon_font">
                <div class="a">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="text" placeholder="Enter email Address" required >
                    <span class="error">*<?php echo $emailErr;?></span>
                </div>
                <div>
                <label for="usr_pass">Password</label>
                <input name="usr_pass" id="usr_pass" type="password" placeholder="Password" required >
                <span class="error">*<?php echo $usr_passErr ;?></span>
                </div>        
                <input type="submit" value="Login">   
                </div>
                <div>
                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p> 
                </div>
        </div>
    
    </body>

</html>

<?php include 'footer.php';
?>