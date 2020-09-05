<!DOCTYPE html>
<html>

<!--Head -->

<head>

    <!--Webpage Title -->
    <title>DailyPlay</title>

    <!--Style File & Fonts -->
    <?php include "includes/db.php"; ?>
    <?php include "includes/functions.php"; ?>
    <link rel="stylesheet" type="text/css" href="profileStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <!--Viewport for mobile view -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<?php session_start(); ?>
<?php ob_start(); ?>

<!--Body -->

<?php
if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}
?>

<body>

    <?php include "includes/navigation.php"; ?>

    <!--Page Content Except Top Bar -->
    <div id="page-container">
        <div class="profile-container">
            <div class="profile-content content-left">
                <?php
                if (isset($_POST['edit'])) {
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if (empty($firstname) || empty($lastname) || empty($username)) {
                        echo "<br>";
                        alert("Fields cannot be empty");
                    } else if (strlen($username) < 4) {
                        echo "<br>";
                        alert("Username needs to be longer");
                    } else if (!empty($password) && strlen($password) < 7) {
                        echo "<br>";
                        alert("Password needs to be longer");
                    } else {
                        $user_id = $_SESSION['user_id'];

                        $query = "UPDATE users SET ";
                        $query .= "user_firstname = '$firstname', ";
                        $query .= "user_lastname = '$lastname', ";
                        $query .= "username = '$username' ";
                        if (!empty($password)) {
                            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
                            $query .= ", user_password = '$password' ";
                        }
                        $query .= "WHERE user_id = $user_id ";
                        $send_query = mysqli_query($connection, $query);

                        if (!$send_query)
                            die(mysqli_error($connection));

                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['lastname'] = $lastname;
                        $_SESSION['username'] = $username;

                        header("Location:profile.php");
                    }
                }
                ?>
                <h1 style="text-align:center;">Edit Profile</h1>
                <form action="" class="profile_edit" method="post">
                    <div class="input-group">
                        <label for="firstname">Firstname</label><br>
                        <input type="text" autocomplete="on" name="firstname" value="<?php echo $_SESSION['firstname']; ?>">
                    </div>

                    <div class="input-group">
                        <label for="lastname">Lastname</label><br>
                        <input type="text" autocomplete="on" name="lastname" value="<?php echo $_SESSION['lastname']; ?>">
                    </div>

                    <div class="input-group">
                        <label for="email">Email adress</label><br>
                        <input readonly style="cursor:inherit;" type="email" autocomplete="on" name="email" value="<?php echo $_SESSION['email']; ?>">
                    </div>

                    <div class="input-group">
                        <label for="username">Username</label><br>
                        <input type="text" autocomplete="on" name="username" value="<?php echo $_SESSION['username']; ?>">
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label><br>
                        <input type="password" autocomplete="on" name="password" placeholder="Password hidden">
                    </div>

                    <div class="input-group">
                        <button type="submit" name="edit">Edit Profile</button>
                    </div>
                </form>
                <br>
            </div>
            <div class="profile-content content-right">
                <h1 style="text-align:center;">Activity</h1>
                <div class="game-hs">
                    <div class="image-container">
                        <img src="../photos/game1.png" style="max-width:80%;max-height:80%;margin-top:20px;margin-left:10%;">
                    </div>
                    <div class="hs-container">
                        <ul>
                            <li>Easy: 46</li>
                            <li>Medium: 25</li>
                            <li>Hard: 5</li>
                        </ul>

                    </div>
                </div>

                <div class="game-hs">
                    <div class="image-container">
                        <img src="../photos/game2.png" style="max-width:100%;max-height:100%;margin-top:0px;margin-left:10%;opacity:0.8;">
                    </div>
                    <div class="hs-container">
                        <ul>
                            <li>Easy: 65</li>
                            <li>Medium: 12</li>
                            <li>Hard: 3</li>
                        </ul>
                    </div>
                </div>

                <!-- <p style="text-align: center;">Player of the month: 0</p>
                <p style="text-align: center;">Time played: 0</p> -->

                <?php
                if (isset($_POST['logout'])) {
                    $_SESSION['user_id'] = null;
                    $_SESSION['firstname'] = null;
                    $_SESSION['lastname'] = null;
                    $_SESSION['username'] = null;
                    $_SESSION['email'] = null;

                    header("Location: index.php");
                }
                ?>
                <br>
                <form method="post">
                    <button type="submit" name="logout" value="logout">Logout</button>
                </form>
                <br>
                <br>


            </div>
        </div>

    </div>

</body>

</html>