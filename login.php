<?php 

    include "./include/config.php";


    if(isset($_POST['submit'])){
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        $login = "SELECT * FROM `user_data` WHERE email = '$email' AND password = '$pass'";

        $run_query = mysqli_query($conn, $login);

        if(mysqli_num_rows($run_query) > 0){
            $row = mysqli_fetch_assoc($run_query);
            $_SESSION["user_id"] = $row['id'];
            header('location:profile.php');
        }else{
            $msg[] = "Login Failed!!";
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
    
    <section class="login_form_body bg-white rounded p-1">
        <form action="" method="post">
            <h1>Login</h1>

            <?php 
            
                if(isset($msg)){
                    foreach($msg as $msg){
                        echo '<div class="alert alert-danger msg">' . $msg . '</div>';
                    }
                }
            
            ?>


            <div class="row">
                <div class="col-md-12">
                    <label class="mt-3" for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email" required>


                    
                    <label class="mt-3" for="pass">Password: </label>
                    <input class="form-control" type="password" name="pass" id="pass" required>
                </div>
            </div>



            <input class="btn btn-primary mt-3" type="submit" name="submit" value="Login">

            <p>Havenot any account? <a href="./register.php">Register Now.</a></p>
        </form>
    </section>


    <!-- boostrap js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>