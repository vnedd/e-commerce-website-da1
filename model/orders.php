<?php


// get one order by order ID
function getone_order($order_id)
{
    $sql = "SELECT * FROM orders WHERE order_id='$order_id'";
    return pdo_query_one($sql);
}

//get all order by user ID
function getall_order_by_userId($user_id)
{
    $sql = "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY order_id DESC";
    return pdo_query($sql);
}

// get payment method in orders table
function getPayment_method()
{
    $sql = "SHOW COLUMNS FROM orders LIKE 'payment_methods'";
    $paymentMethod =  pdo_query_one($sql);
    $enum_str = $paymentMethod['Type'];
    preg_match("/\((.*?)\)/", $enum_str, $matches);
    $enum_values = explode(",", $matches[1]);
    return $enum_values;
}
//update payment method in orders table
function update_PaymentStatus($order_id, $status)
{
    $sql = "UPDATE orders SET payment_status = '$status' WHERE order_id='$order_id'";
    pdo_execute($sql);
}

// get order status in orders table
function get_OrderStatus()
{
    $sql = "SHOW COLUMNS FROM orders LIKE 'order_status'";
    $orderStatus =  pdo_query_one($sql);
    $enum_str = $orderStatus['Type'];
    preg_match("/\((.*?)\)/", $enum_str, $matches);
    $enum_values = explode(",", $matches[1]);
    return $enum_values;
}
// update order status in orders table
function update_OrderStatus($order_id, $status)
{
    $sql = "UPDATE orders SET order_status = '$status' WHERE order_id='$order_id'";
    pdo_execute($sql);
}

//insert new order
function insert_order($username, $email, $phone, $order_note, $createdAt, $totalAmount, $address, $shipingType, $payment_method, $payment_status, $order_status, $user_id)
{
    $sql = "INSERT INTO orders (order_username, order_user_email, order_tel, order_note, created_at, total_amount, shipping_address, shipping_type_id, payment_methods, payment_status, order_status, user_id )
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
    return pdo_execute($sql, $username, $email, $phone, $order_note, $createdAt, $totalAmount, $address, $shipingType, $payment_method, $payment_status, $order_status, $user_id);
}

/// insert order details
function insert_order_details($variant_id, $product_id, $product_name, $image,  $quantity, $price_per_unit, $order_id)
{
    $sql = "INSERT INTO order_details (variant_id, product_id,product_name, image, quantity, price_per_unit, order_id) VALUES(?,?,?,?,?,?,?)";
    pdo_execute($sql, $variant_id, $product_id, $product_name, $image,  $quantity, $price_per_unit, $order_id);
}
// get all order details of order ID
function getall_order_details_by_orderId($order_id)
{
    $sql = "SELECT * FROM order_details WHERE order_id='$order_id'";
    return pdo_query($sql);
}

//update payment status when payment succeeded
function update_paymentStatus_when_payment_succeeded($order_id)
{
    $sql = "UPDATE orders SET payment_status = 'Succeeded' WHERE order_id = '$order_id'";
    pdo_execute($sql);
}


//render order items if client_side = true: render order item client side
//client_side = false: render order item admin side
// default = fasle

function order_item($order, $order_details, $client_side = false, $continue = false)
{
?>
    <div class="grid md:grid-cols-2 grid-cols-1 gap-8 mt-4">
        <div class="flex flex-col space-y-6">
            <h4 class="font-medium text-xl">Order information</h4>
            <div class="grid grid-cols-5">
                <p class=" mb-0 font-medium col-span-2 text-sm text-neutral-600">Order ID</p>
                <p class=" mb-0 font-medium col-span-3 text-base w-full"><?php echo '#TKQ00' . $order['order_id'] ?></p>
            </div>
            <div class="grid grid-cols-5">
                <p class=" mb-0 font-medium col-span-2 text-sm text-neutral-600">Order Date</p>
                <p class=" mb-0 font-medium col-span-3 text-base w-full"><?php echo  str_replace('/', '-', $order['created_at']) ?></p>
            </div>
            <div class="grid grid-cols-5">
                <p class=" mb-0 font-medium col-span-2 text-sm text-neutral-600">Customer</p>
                <p class=" mb-0 font-medium col-span-3 text-base w-full"><?php echo $order['order_username'] ?></p>
            </div>
            <div class="grid grid-cols-5">
                <p class=" mb-0 font-medium col-span-2 text-sm text-neutral-600">Email</p>
                <p class=" mb-0 font-medium col-span-3 text-base w-full"><?php echo $order['order_user_email'] ?></p>
            </div>
            <div class="grid grid-cols-5">
                <p class=" mb-0 font-medium col-span-2 text-sm text-neutral-600">Phone</p>
                <p class=" mb-0 font-medium col-span-3 text-base w-full"><?php echo $order['order_tel'] ?></p>
            </div>
            <div class="grid grid-cols-5">
                <p class=" mb-0 font-medium col-span-2 text-sm text-neutral-600">Shipping address</p>
                <p class=" mb-0 font-medium col-span-3 text-base w-full"><?php echo $order['shipping_address'] ?></p>
            </div>
        </div>
        <div>

            <h4 class="font-medium text-xl">Order Items</h4>
            <div class="mt-6">
                <?php
                foreach ($order_details as $orderDetail) {
                    extract($orderDetail);
                ?>
                    <div class="flex items-center space-x-3">
                        <img src="<?php echo $client_side ? "./upload/" : "../upload/" ?><?php echo  $image ?>" alt="" class="w-[90px] h-[70px] rounded-md">
                        <div class="flex flex-col space-y-2">
                            <p class="text-sm font-medium"><?php echo $product_name ?></p>
                            <p class="text-sm font-medium">Qty: <?php echo $quantity ?></p>
                            <p class="text-sm font-medium">Price: $<?php echo $price_per_unit ?></p>
                        </div>
                    </div>
                    <hr class="w-full h-1 my-3">
                <?php
                }
                ?>
            </div>
            <div class="flex justify-between ">
                <p class="font-semibold text-sm">Total Amount(include shipping fee)</p>
                <p class="font-semibold text-sm">$<?php echo $order['total_amount'] ?></p>
            </div>
            <div class="flex flex-col space-y-6 my-8">
                <div class="flex items-center">
                    <h4 class="font-medium text-lg mr-3">Payment Method</h4>
                    <div class="capitalize badge text-white text-xs px-2 py-1 <?php echo $order['payment_methods'] === 'payment on delivery' ? 'bg-blue-500' : '' ?> <?php echo $order['payment_methods'] === 'online payment' ? 'bg-green-500' : '' ?>"><?php echo $order['payment_methods'] ?></div>
                </div>
                <div class="flex items-center">
                    <h4 class="font-medium text-lg mr-3">Payment Status</h4>
                    <div class="capitalize badge text-white text-xs px-2 py-1 <?php echo $order['payment_status'] === 'Processing' ? 'bg-orange-500' : '' ?> <?php echo $order['payment_status'] === 'Succeeded' ? 'bg-green-500' : '' ?> <?php echo $order['payment_status'] === 'Return' ? 'bg-red-500' : '' ?>"><?php echo $order['payment_status'] ?></div>
                </div>
                <div class="flex items-center">
                    <h4 class="font-medium text-lg mr-3">Order Status</h4>
                    <div class="capitalize badge text-white text-xs px-2 py-1 <?php echo $order['order_status'] === 'Processing' ? 'bg-orange-500' : '' ?> <?php echo $order['order_status'] === 'In Transit' ? 'bg-blue-500' : '' ?> <?php echo $order['order_status'] === 'Delivered' ? 'bg-green-500' : '' ?> <?php echo $order['order_status'] === 'Cancelled' ? 'bg-red-500' : '' ?>"><?php echo $order['order_status'] ?></div>
                </div>
            </div>
            <?php
            if ($client_side) {
                if ($order['order_status'] === 'Processing') {
            ?>
                    <a href="index.php?act=cancel_order&order_id=<?php echo $order['order_id'] ?>" class="btn bg-red-700 hover:bg-red-800 text-white rounded-full mt-6 w-full" onclick="confirmCancle(this.href); return false;">Cancel Order</a>
                <?php
                }
            }
            if ($continue) {
                ?>
                <a href="index.php?act=shop" class="btn bg-slate-700 hover:bg-slate-800 text-white rounded-full mt-6 w-full">Continue Shopping</a>
            <?php
            }
            ?>
        </div>
    </div>
<?php
}


