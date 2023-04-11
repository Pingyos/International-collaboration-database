<?php
// Check if login information is available in session variable
if (isset($_SESSION['login_info'])) {
    $json = $_SESSION['login_info'];
} else {
    echo "You are not logged in.";
}
?>
<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="index.php"><img src="images/logo2.png" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                <h5><?php echo $json['firstname_EN']; ?></h5>
                <a class="btn btn-success" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</header>