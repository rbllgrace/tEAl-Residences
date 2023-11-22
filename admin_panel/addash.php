<?php /* this is for log out */
session_start();
?>
<span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Dashboard</title>
        <link rel="stylesheet" href="addash.css" />
        <!-- Font Awesome Cdn Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    </head>

    <body>
        <header>
            <div class="log">
                <h3>HOTEL RESERVATION SYSTEM</h3>
            </div>
        </header>
        <!-- this for heading -->
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#" class="logo">
                            <!-- <img src="/logo.jpg" alt=""> -->
                            <span class="nav-item">DashBoard</span>
                        </a></li>
                    <li><a href="#">
                            <i class="fas fa-bed"></i>
                            <span class="nav-item">Room</span>
                        </a></li>
                    <li><a href="">
                            <i class="fas fa-users"></i>
                            <span class="nav-item">Customer</span>
                        </a></li>
                    <li><a href="">
                            <i class="fas fa-calendar-day"></i>
                            <span class="nav-item">Check In</span>
                    <li><a href="">
                            <i class=" fas fa-money-bill"></i>
                            <span class="nav-item">Transaction</span>
                        </a></li>
                    </a></li>
                    <li><a href="">
                            <i class=" fas fa-history"></i>
                            <span class="nav-item">History</span>
                        </a></li>
                    <li><a href="">
                            <i class="fas fa-tasks"></i>
                            <span class="nav-item">Tasks</span>
                        </a></li>
                    <li><a href="">
                            <i class="fas fa-cog"></i>
                            <span class="nav-item">Settings</span>
                        </a></li>
                    <li><a href="">
                            <i class="fas fa-question-circle"></i>
                            <span class="nav-item">Help</span>
                        </a></li>
                    <form method="POST">
                        <li><a href="" class="logou">
                                <button name="logout">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <!-- this line for logout button -->
                                    <span class="nav-item">Log out <?php echo $_SESSION['adminloginId']?></span>
                                </button>
                            </a></li>
                    </form>
                </ul>
            </nav>
        </div>
        <?php
    if(isset($_POST['logout'])){
      session_destroy();
      header("location: admin_login.php");
    }
  ?>
    </body>

    </html>
</span>