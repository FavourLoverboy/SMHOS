<?php
    if (isset($_GET['tx_ref'])) {
        $ref = $_GET['tx_ref'];
        $amount = ""; //Correct Amount from Server
        $currency = ""; //Correct Currency from Server

        $query = array(
            "SECKEY" => "FLWSECK-0bbb6162e750f12be0239583da16ae59-X",
            "txref" => $ref
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify ');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];

        if ($chargeResponsecode == "00" || $chargeResponsecode == "0"){
          $tblquery = "UPDATE tblstudents SET stu_paymentStatus = :paid WHERE stu_email = :email";
          $tblvalue = array(
              'paid' => "Paid",
              ':email' => $_SESSION['email']
              );
              $update =$connect->tbl_update($tblquery,$tblvalue);
              echo "<script>window.location='payment?status=successful'</script>";
        } else {
           echo "<script>window.location='payment?status=failed'</script>";
        }
    }
    if(isset($_GET['status'])){
        $status = $_GET['status'];
        if($status == "failed"){
?>
<div class="container">
<div class="row">
<div class="col-xl-12 col-md-12 mb-4">

                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="h4 m-0 font-weight-bold text-primary">Transaction Failed</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/payment.svg" alt="">
                                    </div>
                                    <p> Sorry Your Transaction was not successful Click on the Link below to carry out the transaction again thanks. </p>
                                    <a  href="checkout">Checkout Here</a>
                                </div>
                            </div>
                        </div>
    </div>
</div>


<?php } elseif($status == "successful"){?>

        
<div class="container">
<div class="row">
<div class="col-xl-12 col-md-12 mb-4">

                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="h4 m-0 font-weight-bold text-primary">Transaction Successful</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/payment.svg" alt="">
                                    </div>
                                    <p> Your Transaction was successful Click on the link below to continue. </p>
                                    <a  href="dashboard">Continue</a>
                                </div>
                            </div>
                        </div>
    </div>
</div>

<?php } }?>