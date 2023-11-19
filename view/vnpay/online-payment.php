<!-- Ngân hàng	NCB
Số thẻ	9704198526191432198
Tên chủ thẻ	NGUYEN VAN A
Ngày phát hành	07/15
Mật khẩu OTP	123456 -->

<?php require_once("config.php"); ?>
<?php
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $order = getone_order($order_id);
} else {
    header('Location: index.php');
}
?>

<?php
if (isset($_POST['redirect'])) {
    $vnp_TxnRef = $_POST['order_id'];
    $vnp_OrderInfo = $_POST['order_desc'];
    $vnp_OrderType = $_POST['order_type'];
    $vnp_Amount = $_POST['amount'] * 100;
    $vnp_Locale = $_POST['language'];
    $vnp_BankCode = $_POST['bank_code'];
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array(
        'code' => '00', 'message' => 'success', 'data' => $vnp_Url
    );
    if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
        die();
    } else {
        echo json_encode($returnData);
    }
}


?>
<div class="container mx-auto max-w-[600px] my-8 p-4 md:p-8 border shadow-md rounded-lg">
    <div class="flex flex-col items-center ">
        <img src="././assets/img/logo.svg" alt="" class="w-16 h-16 mb-6">
        <h3 class="text-xl font-semibold uppercase">Start your payment</h3>
    </div>
    <div class="table-responsive">
        <form action="" class="grid grid-cols-1 gap-y-6 mt-10" id="create_form" method="post">
            <div class="form-group">
                <label class="font-semibold text-base" for="language">Commodities</label>
                <select name="order_type" id="order_type" class="w-full p-2 rounded-md mt-2">
                    <option value="billpayment">Pay the bill</option>
                    <option value="other">Other - See more at VNPAY</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label class="font-semibold text-base" for="order_id">Order Id</label>
                <input class="form-input rounded-md" id="order_id" name="order_id" type="text" value="<?php echo $order['order_id'] ?>" />
            </div>
            <div class="flex flex-col space-y-2">
                <label class="font-semibold text-base" for="amount">Payment Amount : <span class="font-bold text-xl"><?php echo number_format($order['total_amount'] * 23000) ?>VND</span></label>
                <input class="form-input rounded-md" hidden id="amount" name="amount" type="number" value="<?php echo $order['total_amount'] * 23000 ?>" />
            </div>
            <div class="flex flex-col space-y-2">
                <label class="font-semibold text-base" for="order_desc">Payment Content</label>
                <textarea class="form-textarea rounded-md p-2" cols="20" id="order_desc" name="order_desc" rows="2">Payment content</textarea>
            </div>
            <div class="flex flex-col space-y-2">
                <label class="font-semibold text-base" for="bank_code">Banks</label>
                <select name="bank_code" id="bank_code" class="form-select rounded-md px-3 py-2">
                    <option value="">Not Select</option>
                    <option value="NCB">NCB</option>
                    <option value="AGRIBANK">Agribank</option>
                    <option value="SCB">SCB</option>
                    <option value="SACOMBANK">Ngan hang SacomBank</option>
                    <option value="EXIMBANK">EximBank</option>
                    <option value="MSBANK">MSBANK</option>
                    <option value="NAMABANK">NamABank</option>
                    <option value="VIETINBANK">Ngan hang Vietinbank</option>
                    <option value="VIETCOMBANK">VCB</option>
                    <option value="HDBANK">Ngan hang HDBank</option>
                    <option value="DONGABANK">Dong A</option>
                    <option value="TPBANK">TPBank</option>
                    <option value="OJB">OceanBank</option>
                    <option value="BIDV">BIDV</option>
                    <option value="TECHCOMBANK">Techcombank</option>
                    <option value="VPBANK">VPBank</option>
                    <option value="MBBANK">MBBank</option>
                    <option value="ACB">ACB</option>
                    <option value="OCB">OCB</option>
                    <option value="IVB">IVB</option>
                    <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label class="font-semibold text-base" for="language">Languages</label>
                <select name="language" id="language" class="form-select rounded-md px-3 py-2">
                    <option value="vn">Tiếng Việt</option>
                    <option value="en">English</option>
                </select>
            </div>
            <button type="submit" name="redirect" id="redirect" class="btn bg-slate-700 hover:bg-slate-800 text-white rounded-full">Payment Redirect</button>
        </form>
    </div>
    <p>
        &nbsp;
    </p>
    <footer class="w-full">
        <p class="text-center text-sm">&copy; E-commerce <?php echo date('Y') ?></p>
    </footer>
</div>