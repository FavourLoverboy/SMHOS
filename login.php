<?php include('includes/header.php');?>
<?php

    $_SESSION['err'] = '';
    if($_POST){
        extract($_POST);

        // Validating Email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['validate_email'] = true;
        }

        // Validating User Inputs
        if($_SESSION['validate_email'] != true){
            $_SESSION['err'] = 'invalid email';
        }
        else if(strlen($password) < 6){
            $_SESSION['err'] =  'password should be at least 6 characters';
        }
        else{
            $tblquery = "SELECT * FROM tbl_login WHERE email = :email && password = :password";
            $tblvalue = array(
                ':email' => htmlspecialchars($email),
                ':password' => htmlspecialchars($password)
            );
            $select = $collect->tbl_select($tblquery, $tblvalue);
            if($select){
                foreach($select as $data){
                    extract($data);
                    
                    $_SESSION['myId'] = $id;
                    $_SESSION['level'] = $level;

                    if($_SESSION['level'] == 'A'){
                        header ('Location: dashboard');
                        echo '<script> window.location="dashboard"; </script>';
                    }
                    else if($_SESSION['level'] == 'C'){
                        header ('Location: dashboard2');
                        echo '<script> window.location="dashboard2"; </script>';
                    }
                    else if($_SESSION['level'] == 'L'){
                        
                    }
                    else if($_SESSION['level'] == 'M'){
                        
                    }
                }
            }
            else{
                $_SESSION['err'] = 'invalid login info';
            }
        }
    }

?>

    <!-- title -->
    <title>Login | SMHOS Home-Cell Portal</title>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg mt-4">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image2"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-left">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                        <span class="text-center my-2" style="color: red;"><?php echo $_SESSION['err']; ?></span>
                                    </div>
                                    <form class="user" method="POST" action="login.php">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Your Email..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" style="font-size:1rem;" class="btn btn-primary btn-user btn-block btn-color-black">
                                            Login <i class="fas fa-key"></i>
                                        </button>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('includes/footer.php'); ?>
