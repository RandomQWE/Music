<?php
    $title="login";
    include 'header.php'
    ?>
<!DOCTYPE html>
<html>
   
    
    
    <head>
        <style>
           fieldset.logon_font{
               
               border-radius: 30px;
               border-style:solid;
            }
            .b{
            background-image:url(./images/music.jpg);
            height: 100%; 
            background-size:cover;
        }
            body{
                font-family: Arial, Helvetica, sans-serif;

            }
        
        
        
        
        
        
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
        <div class="b">
            <form action="logon_save.php" method="POST">
            <fieldset class="logon_font">
                <div>
                    <label for="username">Username</label>
                    <input name="username" id="username" type="email/text" placeholder="Enter username or email Address" required >
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