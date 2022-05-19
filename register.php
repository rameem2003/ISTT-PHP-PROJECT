<?php 

    include "./include/config.php";


    if(isset($_POST['submit'])){
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $dob = $_POST["dob"];
        $email = $_POST["email"];
        $uname = $_POST["uname"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];

        $insert = "INSERT INTO  `user_data` (first_name, last_name, dob, email, uname, password) VALUES('$fname', '$lname', '$dob', '$email', '$uname', '$pass')";

        if($pass != $cpass){
            $msg[] = "Password not matching!";
        }else{
            $msg[] = "Register Success";
            mysqli_query($conn, $insert);
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- local css -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body class="bg-info">
    
    <section class="form_body bg-white rounded p-1">
        <form action="" method="post">
            <h1>Register</h1>

            <?php 
            
                if(isset($msg)){
                    foreach($msg as $msg){
                        echo '<div class="alert alert-danger msg">' . $msg . '</div>';
                    }
                }
            
            ?>


            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label class="mt-3" for="fname">First name:</label>
                    <input class="form-control" type="text" name="fname" id="lname">

                    <label class="mt-3" for="dob">Date of birth:</label>
                    <input class="form-control" type="date" name="dob" id="dob">
                </div>

                <div class="col-md-6 col-sm-12">
                    <label class="mt-3" for="lname">Last name:</label>
                    <input class="form-control" type="text" name="lname" id="lname">

                    <label class="mt-3" for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>
            </div>

            <label class="mt-3" for="uname">Create username: </label>
            <input class="form-control" type="text" name="uname" id="uname">

            <label class="mt-3" for="pass">Create password: </label>
            <input class="form-control" type="password" name="pass" id="pass">

            <label class="mt-3" for="cpass">Confirm password: </label>
            <input class="form-control" type="password" name="cpass" id="cpass">


            <input class="btn btn-primary mt-3" type="submit" name="submit" value="Register">
        </form>
    </section>


    <!-- boostrap js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>