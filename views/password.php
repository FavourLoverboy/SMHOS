<?php
         if($_SESSION['accessType'] == "Admin"){
            echo "<script>window.location='amdashboard'</script>";
        }

       $msg = "";
       if($_POST){
           extract($_POST);
           $encryptedpass =$connect->epass($oldPass);
           $encryptedpass2 =$connect->epass($newPass);
           $tblquery = "SELECT * FROM tblstudents WHERE stu_password = :oldpass";
           $tblvalue = array(
               ':oldpass' => $encryptedpass
           );
           $select =$connect->tbl_select($tblquery, $tblvalue);
           if($select){
              $tblquery1 = "UPDATE tblstudents SET stu_password = :newPass WHERE stu_email = :email";
              $tblvalue1 = array(
                  ':newPass' => $encryptedpass2,
                  ':email' => $_SESSION['email']
              );
              $update=$connect->tbl_update($tblquery1, $tblvalue1);
              if($update){
                 // $msg = "Password Successfully Changed";
                 echo "
                 <script>
                 swal({
                 title: 'Success', 
                 text: 'Password Successfully Changed', 
                 icon: 'success',
                 }).then(function(){
                     window.location.href='dashboard'
                 });
                 </script>
             ";
              }
       }else{
          // $msg = "Account Pin or Old Password Incorrect";
          echo "
          <script>
          swal({
          title: 'Incorrect Password', 
          text: 'Old Password Incorrect', 
          icon: 'error',
          });
          </script>
      ";
       }
   }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">

        <div class="card shadow mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                                </div>
                                <div class="card-body">
                                <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Fill Information Below to Change Password</h1>
                            </div>
                                <form method="POST" action="password" class="user">
                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="experience">* Old Password:</label>
                                <input type="text" class="form-control form-control-user" id="accountPin" name="oldPass" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="accountPin">* New Password:</label>
                                        <input type="text" class="form-control form-control-user" id="accountPin" name="newPass" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-user1" style="font-size:1.2rem; color:#ffffff">
                                    Update <i class="fa fa-key"></i></button>
                                </form>
                                     
                                 </div>   
                            </div>
        </div>
    </div>
</div>
</div>