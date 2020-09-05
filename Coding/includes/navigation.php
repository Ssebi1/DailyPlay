<!--Top Bar -->
<div class="bar">

    <!--Bar Contents -->
    <div class="content">

        <!--Logo -->
        <div class="logo">
            <a href="index.php"><img class="logoimg" src="../photos/logo.png"></a>
        </div>

        <!--Menu -->
        <ul class="menu">
            <a href="index.php">
                <li class="name" style="margin-left: 20px;font-size: 24px;">DAILY<span style="color: #42be55;">PLAY</span></li>
            </a>

            <?php
                if(isset($_SESSION['username']))
                {
                    ?>
                        <a   a class="login" href="profile.php" style="font-size: 20px;">
                            <li style="float: right;"><?php echo $_SESSION['username']; ?></li>
                            <li style="float: right;"><i style="padding: 0px;" class=" fa fa-user"></i></li>
                        </a>
                    <?php
                }
                else
                {
                    ?>
                        <a   a class="login" href="login.php" style="font-size: 20px;">
                            <li style="float: right;">Login</li>
                            <li style="float: right;"><i style="padding: 0px;" class=" fa fa-user"></i></li>
                        </a>
                    <?php
                }
            ?>
            
        </ul>

    </div>

</div>