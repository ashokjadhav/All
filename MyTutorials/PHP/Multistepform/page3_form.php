<?php
session_start();
//checking second page values for empty,If it finds any blank field then redirected to second page
if (isset($_POST['gender'])){
    if (empty($_POST['gender'])
	|| empty($_POST['nationality'])
	|| empty($_POST['religion'])
	|| empty($_POST['qualification'])
	|| empty($_POST['experience'])){
		
		//setting error message
        $_SESSION['error_page2'] = "Mandatory field(s) are missing, Please fill it again";
        header("location: page2_form.php");//redirecting to second page
    
	} else {
		//fetching all values posted from second page and storing it in variable
        foreach ($_POST as $key => $value) {
            $_SESSION['post'][$key] = $value;
        }
    }
} else {
    if (empty($_SESSION['error_page3'])) {
        header("location: page1_form.php");//redirecting to first page
    }
}
?>
<!DOCTYPE HTML>
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
                    if (!empty($_SESSION['error_page3'])) {
                        echo $_SESSION['error_page3'];
                        unset($_SESSION['error_page3']);
                    }
                    ?>
                </span>
                <form action="page4_insertdata.php" method="post">

                    <b>Complete Address :</b><br/>

                    <label>Address Line1 :<span>*</span></label><br />
                    <input name="address1" id="address1" type="text" size="30" required>
                    <br />

                    <label>Address Line2 :</label><br />
                    <input name="address2" id="address2" type="text" size="50">
                    <br />

                    <label>City :<span>*</span></label><br />
                    <input name="city" id="city" type="text" size="25" required>
                    <br/>

                    <label>Pin Code :<span>*</span></label><br />
                    <input name="pin" id="pin" type="text" size="10" required>
                    <br/>

                    <label>State :<span>*</span></label><br />
                    <input name="state" id="state" type="text" size="30" required>
                    <br/>

                    <input  type="reset" value="Reset" />
                    <input name="submit" type="submit" value="Submit" />

                </form>
            </div>
           
        </div>
    </body>
</html>