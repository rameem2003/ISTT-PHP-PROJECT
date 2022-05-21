<?php 

    include './include/config.php';

    session_start();

    $user_id = $_SESSION["user_id"];

    if(!isset($user_id)){
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
</head>
<body>
    <?php 
    
        $load_profile = "SELECT * FROM `user_data` WHERE id = '$user_id'";

        $run_query = mysqli_query($conn, $load_profile);

        if(mysqli_num_rows($run_query) > 0){
            $row = mysqli_fetch_assoc($run_query);
        }


        
        ?>
        <h1><?php echo $row["name"] ?></h1>
</body>
</html>