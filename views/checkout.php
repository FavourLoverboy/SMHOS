<?php 
    if($_SESSION['accessType'] == "Admin"){
      echo "<script>window.location='amdashboard'</script>";
  }

        $tblquery = "SELECT * FROM tblstudents WHERE stu_email = :email";
        $tblvalue = array(
            ':email' => $_SESSION['email']
        );
        $select =$connect->tbl_select($tblquery, $tblvalue);
        foreach($select as $data){
            extract($data);
        }
?>

<div class="container">
        <div class="row">
        <div class="col-lg-6 mb-4">

<!-- Illustrations -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Check Out</h6>
    </div>
    <div class="card-body">
        <div class="text-center">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                src="img/bank.svg" alt="">
        </div>
        <p class="h5"> For Bank Transfer Make Transfer to the following Account:</p>
        <div class="h5 text-gray-900">Bank: FCMB(First City Monument Bank)</div>
        <div class="h5 text-gray-900">Account Number: 6599656010</div>
        <div class="h5 text-gray-900">Account Name: Harmon Business Academy</div>
        <p class="h5">After successful Completion of transfer Send your details to info@instituteofpeaceandsecurity.com</p>
    </div>
</div>
</div>
<div class="col-lg-6 mb-4">


<div class="card shadow mb-4">
    <div class="card-body">
        <div class="h3 text-gray-900 mb-4">Summary</div>
        <div class="h5 text-gray-900">Original Price: <span style="margin-left:4rem!important">₦<?php echo number_format($stu_amount)?></span></div>
        <div class="h5 text-gray-900">Coupon Discount: <span style="margin-left:4rem!important">₦0.00</span></div>
        <hr>
        <div class="h5 text-gray-900">Total: <span style="margin-left:4rem!important">₦<?php echo number_format($stu_amount)?></span></div>
        <script src="https://checkout.flutterwave.com/v3.js"></script>
        <button type="button" style="font-size:1rem;" class="btn btn-success btn-user btn-block btn-color-black mt-5" onclick="makePayment()">Make Payment Now</button>
    <script type="text/javascript">
 
</script>
        <div class="text-center">
        <p><i class="fas fa-lock mb-5"></i> Secured By Flutterwave</p>
        </div>
       
    </div>
</div>
</div>
        </div>
</div>
<script>
function makePayment() {
  FlutterwaveCheckout({
    public_key: "FLWPUBK-7092122cd376ba4fc08e0eeb73fbe947-X",
    tx_ref: "<?php echo time();?>",
    amount: <?php echo $stu_amount?>,
    currency: "NGN",
    country: "NG",
    payment_options: " ",
    redirect_url: "https://edu.instituteofpeaceandsecurity.com/payment",
    meta: {
      consumer_id: "<?php echo $stu_transID?>",
    },
    customer: {
      email: "<?php echo $_SESSION['email'];?>",
    },
    callback: function (data) {
      console.log(data);
    },
    onclose: function() {
      // close modal
    },
    customizations: {
      title: "IPSMS",
      description: "Payment for Online Lectures",
      logo: "https://edu.instituteofpeaceandsecurity.com/assets/logosm.png",
    },
  });
}
</script>