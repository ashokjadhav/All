<?php
//Session starts here
session_start();
?><!DOCTYPE HTML>
<html>
    <head>
        <title>PHP Multi Page Form</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>

        <div class="container">
            <div class="main">
                <h2>PHP Multi Page Form</h2><hr/>
                <span id="error">
			
                    <?php
                    if (!empty($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                </span>
                <form action="page2_form.php" method="post">


                    <label>Full Name :<span>*</span></label><br />
                    <input name="name" type="text" placeholder="Ex-James Anderson" required>
                    <br />

                    <label>Email :<span>*</span></label><br />
                    <input name="email" type="email" placeholder="Ex-anderson@gmail.com" required>
                    <br />

                    <label>Contact :<span>*</span></label><br />
                    <input name="contact" type="text" placeholder="10-digit number" required>
                    <br />

                    <label>Password :<span>*</span></label><br />
                    <input name="password" type="Password"  placeholder="*****" />

                    <br />
                    <label>Re-enter Password :<span>*</span></label><br />
                    <input name="confirm" type="password" placeholder="*****" >
                    <br />

                    <input  type="reset" value="Reset" />
                    <input  type="submit" value="Next" />

                </form>
            </div>

        </div>
    </body>
</html>