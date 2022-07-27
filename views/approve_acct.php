<?php 

if($_SESSION['accessType'] == "User"){
    echo "<script>window.location='dashboard'</script>";
}
        if($_POST){
            extract($_POST);
            $tblquery1 = "SELECT * FROM tblstudents WHERE stu_email = :email";
            $tblvalue1 = array(
              'email' => htmlspecialchars($email)
            );
            $search =$connect->tbl_select($tblquery1, $tblvalue1);
            if($search){
            $tblquery = "UPDATE tblstudents SET stu_paymentStatus = :status WHERE stu_email = :email";
            $tblvalue = array(
                ':status' => htmlspecialchars($status),
                'email' => htmlspecialchars($email)
            );
            $update =$connect->tbl_update($tblquery, $tblvalue);
            if($update){
                echo "
                 <script>
                 swal({
                 title: 'Success', 
                 text: 'Payment Status successfully Updated to ($status)', 
                 icon: 'success',
                 });
                 </script>
             ";
            }
        }else{
            echo "
            <script>
            swal({
            title: 'Error', 
            text: 'Email Does not Exist', 
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
                                    <h6 class="m-0 font-weight-bold text-primary">Update Payment Status</h6>
                                </div>
                                <div class="card-body">
                                <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Manually Approve Payment</h1>
                            </div>
                                <form method="POST" action="approve_acct" class="user">
                                    <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="option">* User's Email :</label>
                                <input type="text" class="form-control form-control-user" id="option" name="email" required>
                                    </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="status">* Choose Payment Status:</label>
                            <select name="status" class="custom-select" id="status" required>
                                    <option value="Paid">Paid</option>
                                    <option value="Not Paid">Not Paid</option>
                                    </select>
                        </div>
                                    </div>
                                <button type="submit" class="btn btn-success btn-user1" style="font-size:1rem; color:#ffffff">
                                    Change Payment Status</i></button>
                                </form>
                                     
                                 </div>   
                            </div>
        </div>
    </div>
</div>
</div>

