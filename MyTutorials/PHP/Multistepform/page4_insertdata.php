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

                <?php
                session_start();
                if (isset($_POST['state'])) {
                    if (!empty($_SESSION['post'])){

                        if (empty($_POST['address1'])
						|| empty($_POST['city'])
						|| empty($_POST['pin'])
						|| empty($_POST['state'])){
                            
							//Setting error for page 3
							$_SESSION['error_page3'] = "Mandatory field(s) are missing, Please fill it again";
                            header("location: page3_form.php"); //redirecting to third page
                        } else {
                            foreach ($_POST as $key => $value) {
                                $_SESSION['post'][$key] = $value;
                            }
							//function to extract array
                            extract($_SESSION['post']);  
							
							//Storing values in database
                            $connection = mysql_connect("localhost", "root", "");
                            $db = mysql_select_db("phpmultipage", $connection);
                            $query = mysql_query("insert into detail (name,email,contact,password,religion,nationality,gender,qualification,experience,address1,address2,city,pin,state) values('$name','$email','$contact','$password','$religion','$nationality','$gender','$qualification','$experience','$address1','$address2','$city','$pin','$state')", $connection);
                            if ($query) {
                                echo '<p><span id="success">Form Submitted successfully..!!</span></p>';
                            } else {
                                echo '<p><span>Form Submission Failed..!!</span></p>';
                            }
							//destroying session
                            unset($_SESSION['post']);
                        }
                    } else {
                        header("location: page1_form.php"); //redirecting to first page
                    }
                } else {
                    header("location: page1_form.php"); //redirecting to first page
                }
                ?>
            </div>

        </div>
    </body>
</html>