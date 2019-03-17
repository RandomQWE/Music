<?php 
    $title="Contact Us";
    include 'header.php';
    $name="";
    $nameErr="";
?>
<!DOCTYPE html>
<html>
    <head>
    </head>


    <body>
        <form action="customer_help.php" method="POST">
            <fieldset>
                <legend>Contact us</legend>
                    <div>
                        <label for="contact_name">Name</label>
                        <input name="contact_name" id="contact_name" type="text" value="<?php echo $name;?>">
                        <span class="error"> <?php echo $nameErr;?>
                        
                    </div>
            </fieldset>
        </form>
    </body>
