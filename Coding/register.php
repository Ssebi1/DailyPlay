<!DOCTYPE html>
<html>

<!--Head -->

<head>

    <!--Webpage Title -->
    <title>DailyPlay</title>

    <!--Style File & Fonts -->
    <?php include "includes/db.php"; ?>
    <?php include "includes/functions.php"; ?>
    <link rel="stylesheet" type="text/css" href="registerStyle.css">
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
            <!-- <?php alert("this is a test"); ?> -->
            <?php
                if(isset($_POST['register']))
                {
                    $firstname = escape($_POST['firstname']);
                    $lastname = escape($_POST['lastname']);
                    $email = escape($_POST['email']);
                    $username = escape($_POST['username']);
                    $password = escape($_POST['password']);

                    //Duplicate User
                    $query = "SELECT * FROM users WHERE username = '$username'";
                    $send_query = mysqli_query($connection,$query);
                    $num_of_users = mysqli_num_rows($send_query);

                    //Duplicate Email
                    $query = "SELECT * FROM users WHERE user_email = '$email'";
                    $send_query = mysqli_query($connection,$query);
                    $num_of_emails = mysqli_num_rows($send_query);
                    
                    if(empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password))
                    {
                        alert("Fiels cannot be empty");
                    }
                    else if($num_of_users > 0 || $num_of_emails > 0)
                    {
                        if($num_of_users > 0)
                            alert("Username is already used");
                        if($num_of_emails > 0)
                            alert("Email is already used");
                    }
                    else if(strlen($password) < 7 || strlen($username) < 4)
                    {
                        if(strlen($password) < 7)
                            alert("Password needs to be longer");
                        if(strlen($username) < 4)
                            alert("Username needs to be longer");

                    }
                    else
                    {
                        $password = password_hash($password,PASSWORD_BCRYPT,array('cost' => 10));
                        $query = "INSERT INTO users(username,user_firstname,user_lastname,user_email,user_password) ";
                        $query .="VALUES('{$username}','{$firstname}','{$lastname}','{$email}','{$password}')";
                        $send_query = mysqli_query($connection,$query);
                        
                        $_SESSION['user_id']=mysqli_insert_id($connection);
                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['lastname'] = $lastname;
                        $_SESSION['username'] = $username;
                        $_SESSION['email'] = $email;

                        header("Location: index.php");
                    }

                    

                }
            ?>
            <form style="text-align:center;" action="" method="post">
                <h2>Create Account</h2>
                <div class="input-group">
                    <label for="firstname">Firstname</label><br>
                    <input type="text" autocomplete="on" name="firstname" value="<?php if(isset($firstname)) echo $firstname; ?>">
                </div>

                <div class="input-group">
                    <label for="lastname">Lastname</label><br>
                    <input type="text" autocomplete="on" name="lastname" value="<?php if(isset($firstname)) echo $lastname; ?>">
                </div>

                <div class="input-group">
                    <label for="email">Email adress</label><br>
                    <input type="email" autocomplete="on" name="email" value="<?php if(isset($firstname)) echo $email; ?>">
                </div>

                <div class="input-group">
                    <label for="username">Username</label><br>
                    <input type="text" autocomplete="on" name="username" value="<?php if(isset($firstname)) echo $username; ?>">
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label><br>
                    <input type="password" autocomplete="on" name="password">
                </div>
                
                <div class="input-group">
                    <button type="submit" name="register">Register</button>
                </div>

            </form>
         </div>

    </div>

</body>

</html>