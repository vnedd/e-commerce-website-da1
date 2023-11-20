<?php
require_once("config.php");
// include('./model/orders.php');

$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
?>


<!--Begin display -->
<div class="container mx-auto max-w-[1440px] my-8 mt-[140px] md:mt-[100px] md:p-8 ">
    <div>
        <?php
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
                update_paymentStatus_when_payment_succeeded($_GET['vnp_TxnRef']);
                $order = getone_order($_GET['vnp_TxnRef']);
                $order_details = getall_order_details_by_orderId($_GET['vnp_TxnRef']);
        ?>
                <div class="sm:mx-auto mx-8 max-w-[900px] my-8 mt-16 p-6 md:p-8 rounded-lg border shadow-md relative">
                    <i class="bi bi-check-circle-fill absolute -top-7 left-[50%] -translate-x-[50%] text-violet-600 text-6xl rounded-full shadow-md"></i>
                    <div class="flex items-center flex-col">
                        <h4 class="text-center mt-5 font-bold text-2xl">
                            Thank you for order <?php echo '#TKQ00' . $order['order_id'] ?>
                        </h4>
                        <p class="text-neutral-600 text-sm mt-2 text-center">We'll send you an email with tracking information when your item ships</p>
                    </div>
                    <div class="mt-8">
                        <?php echo order_item($order, $order_details, true, true) ?>
                        <a href="index.php?act=shop" class="btn bg-slate-700 hover:bg-slate-800 text-white rounded-full mt-6 w-full">Continue Shopping</a>
                    </div>
                </div>
        <?php

            } else {
                echo "<span style='color:red'>GD Khong thanh cong</span>";
            }
        } else {
            echo "<span style='color:red'>Chu ky khong hop le</span>";
        }
        ?>
    </div>
</div>
</div>

<script>
    function confirmCancle(url) {
        const result = confirm("Are you sure to cancel this order?");
        if (result) {
            window.location.href = url;
        }
    }
</script>