<?php
         if($_SESSION['accessType'] == "Admin"){
            echo "<script>window.location='amdashboard'</script>";
        }

        $tblquery = "SELECT * FROM tblstudents WHERE stu_email = :email";
        $tblvalue = array(
            ':email' => $_SESSION['email']
        );
        $select = $connect->tbl_select($tblquery, $tblvalue);
        foreach($select as $data){
            extract($data);
        }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">

        <div class="card shadow mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                                </div>
                                <div class="card-body p-0">
                                 <div class="row">
                                     
                                     <div class="col-lg-4 col-sm-12" style="border-right: 1px solid #bdbdbd;">
                                     <div class="p-3">
                                     <img src="uploads/<?php echo $stu_passport?>" width="200px" style="border: 6px solid #1caa58; border-radius:50%; " class="p-2 d-block m-auto">
                                     <div class="text-center">
                                         <div class="h4 my-3" style="text-transform:capitalize;"><?php echo $stu_lastName . " " .$stu_firstName ?></div>
                                     </div>
                                     </div>
                       
                                     </div>
                                     <div class="col-lg-8 col-sm-12">
                                         <div class="py-5 px-1">
                                                <div class="h4 text-gray-900">Email: <?php echo $stu_email;?></div>
                                                <hr>
                                                <div class="h4 text-gray-900">Phone: <?php echo $stu_phone;?></div>
                                                <hr>
                                                <div class="h4 text-gray-900">Religion: <?php echo $stu_religion;?></div>
                                                <hr>
                                                <div class="h4 text-gray-900">Gender: <?php echo $stu_gender;?></div>
                                                <hr>
                                                <div class="h4 text-gray-900">Marital Status: <?php echo $stu_maritalStatus;?></div>
                                                <hr>
                                                <div class="h4 text-gray-900">Date of Birth: <?php echo $stu_dateOfBirth;?></div>
                                                <hr>
                                                <div class="h4 text-gray-900">Home Address: <?php echo $stu_homeAddress;?></div>
                                                <hr>
                                                <div class="h4 text-gray-900">City: <?php echo $stu_city;?></div>
                                                <hr>
                                                <div class="h4 text-gray-900">State: <?php echo $stu_state;?></div>
                                                <hr>
                                                <div class="h4 text-gray-900">Nationality: <?php echo $stu_nationality;?></div>
                                                <hr>
                                                <div class="h4 text-gray-900">Course: <?php echo $stu_course;?></div>
                                                <hr>
                                                <div class="h4 text-gray-900">Highest Education: <?php echo $stu_education;?></div>
                                            </div>
                                         </div>
                                     </div>
                                 </div>   
                            </div>
        </div>
    </div>
</div>
</div>