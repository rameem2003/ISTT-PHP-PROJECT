<?php 

    include './include/config.php';

    session_start();

    $user_id = $_SESSION["user_id"];

    if(!isset($user_id)){
        header("location:login.php");
    }

    if(isset($_GET['logout'])){
        unset($user_id);
        session_destroy();
        header("location:login.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- local css -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body class="bg-primary">
    <?php 
    
        $load_profile = "SELECT * FROM `user_data` WHERE id = '$user_id'";

        $run_query = mysqli_query($conn, $load_profile);

        if(mysqli_num_rows($run_query) > 0){
            $row = mysqli_fetch_assoc($run_query);
        }


        
        ?>
        
        <div class="col-md-6 col-sm-12 profile bg-white rounded">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <p class="mt-2">First name: <?php echo $row["first_name"]  ?> </p>
                    <p class="mt-2">Date of Birth: <?php echo $row["dob"]  ?> </p>
                </div>
                <div class="col-md-6 col-sm-12">
                    <p class="mt-2">Last name: <?php echo $row["last_name"]  ?> </p>
                    <p class="mt-2">Email: <?php echo $row["email"]  ?> </p>
                </div>
            </div>

            <a class="btn btn-danger d-block mb-3" href="profile.php?logout=<?php echo $user_id ?>">Logout</a>
            <a class="btn btn-warning d-block mb-3" href="#">Edit</a>
        </div>
</body>
</html>