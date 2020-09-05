<!DOCTYPE html>
<html>

<!--Head -->

<head>

    <!--Webpage Title -->
    <title>DailyPlay</title>

    <!--Style File & Fonts -->
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
    <?php include "includes/db.php"; ?>
    <?php include "includes/functions.php"; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <!--Viewport for mobile view -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<?php session_start(); ?>
<?php ob_start(); ?>

<?php
    if(isset($_SESSION['user_id']))
        header("Location:index.php");
?>

<!--Body -->

<body>

    <?php include "includes/navigation.php"; ?>
    <!--Page Content Except Top Bar -->
    <div id="page-container">
        <div class="login-container">
            <?php
                if(isset($_POST['login']))
                {
                    $username = escape($_POST['username']);
                    $password = escape($_POST['email']);

                    $query = "SELECT * FROM users WHERE username = '$username'";
                    $send_query = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_array($send_query))
                    {
                        $db_id = $row['user_id'];
                        $db_password = $row['user_password'];
                        $db_firstname = $row['user_firstname'];
                        $db_lastname = $row['user_lastname'];
                        $db_username = $row['username'];
                        $db_email = $row['user_email'];
                    }
                    

                    if(empty($username) || empty($password))
                    {
                        alert("Fields should not be empty");
                    }
                    else if(empty($db_id))
                    {
                        alert("Username not found");
                    }
                    else if(!password_verify($password,$db_password))
                    {
                        alert("Username or password is incorrect");
                    }
                    else if(password_verify($password,$db_password))
                    {
                        $_SESSION['user_id'] = $db_id;
                        $_SESSION['firstname'] = $db_firstname;
                        $_SESSION['lastname'] = $db_lastname;
                        $_SESSION['username'] = $db_username;
                        $_SESSION['email'] = $db_email;

                        header("Location: index.php");
                    }
                }
            ?>
            <form style="text-align:center;" action="" method="post">

                <div class="input-group">
                    <label for="username">Username</label><br>
                    <input type="text" autocomplete="on" name="username">
                </div>

                <div class="input-group">
                    <label for="email">Password</label><br>
                    <input type="password" name="email">
                </div>
                
                <div class="input-group">
                    <button type="submit" name="login">Login</button>
                </div>
            </form>
            <p style="text-align:center;" class="register-text">Not having an account? Click <a href="register.php">here</a> to register.</p>
        </div>

    </div>

</body>

</html>