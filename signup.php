<?php
    $title="Signup";
    include 'header.php'
?>


<html>
    <head>
        <style>
            
            <link rel="stylesheet" href="css/style.css" type="text/css">
         
        </style>
    </head>


    <body>

        <form action="./database/insert_db.php" method="POST">
            <fieldset>
                <legend>Registration</legend>
                    
                    <div>
                        <input name="first_name" id="first_name" type="text" placeholder="Enter First Name"required autofocus>
                    </div>      
                    <div>
                        <input name="last_name" id="last_name" type="text" placeholder="Enter Last Name" required autofocus>
                    </div>
                    <div>
                        <input name="usr_email" id="usr_email" type="email"placeholder="Enter Email Address" require autofocus>
                    </div>
                    <div>
                        <input name="usr_pass" id="usr_pass" type="password" placeholder="Enter password" required autofocus>
                    </div>    
                    <div>
                        <input name="mobile_no" id="mobile_no" type="number" placeholder="Enter Mobile Number" require autofocus>
                    </div>
                    <div>
                        <input type="submit" value="Signup">
                    </div>

            </fieldset>               
        </form> 
    
    
    </body>
</html>    


<?php 
    include 'footer.php'
?>