<?php 

if($_SESSION['accessType'] == "User"){
    session_start();
    session_destroy();
    echo "<script>window.location='login'</script>";
}elseif($_SESSION['accessType'] == "Admin"){
    session_start();
    session_destroy();
    echo "<script>window.location='adlogin'</script>";
}

?>