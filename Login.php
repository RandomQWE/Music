<?php
    $title="login";
    include 'header.php'
    
    
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true){
            header("location:welcome.php");
            exit;
    
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="User_info";    
        $dsn="mysql:host=$servername;dbname=$dbname";
        
        $emailErr= $email= $usr_pass= $usr_pass= "";
        
        
        
        $con=new PDO($dsn,$username,$password);

        function test_input($data)
        {
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
        }

        if ($_SERVER["REQUEST_METHOD"]=="POST"){

            if (empty($_POST["email"]))
                $emailErr="Email is required";
            else
            {
                $email=test_input($_POST["email"]){
                    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
                        {
                            $emailErr="Invalid format";
                        }
                }
            }
            

            if(empty($_POST["usr_pass"]))
        
        
        }




    ?>
<!DOCTYPE html>
<html>
   
    
    
    <head>
        <style>
           fieldset.logon_font{
               
                border-radius: 30px;
                border-style:solid;
                width:800px;
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

           input[type=email]{           
            width: 500px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            margin-left:50px;
            
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="POST">
            <fieldset class="logon_font">
                <div class="a">
                    <label for="username">Username</label>
                    <input name="username" id="username" type="email" placeholder="Enter username or email Address" required >
                </div>
                <div>
                <label for="usr_pass">Password</label>
                <input name="usr_pass" id="usr_pass" type="password" placeholder="Password" required >
                </div>        
                <input type="submit" value="Login">   
                </div> 
        </div>
    
    </body>
<?php include 'footer.php'
?>