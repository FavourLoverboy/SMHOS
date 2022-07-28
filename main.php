<?php
    session_start();
    if(!$_SESSION['level']){
        header('location: login.php');
    }
?>
<?php include('includes/header.php');?>
    
    <?php include($page); ?>
    
<?php include ('includes/footer.php'); ?>