<?php
include "../../model/pdo.php";
include "../../model/orders.php";
include '../../global.php';


$orderStatus = $_GET['order_status'];
$sql = "SELECT * FROM orders WHERE 1  ORDER BY order_id DESC";
if ($orderStatus !== 'all') {
    $sql = "SELECT * FROM orders WHERE order_status= '$orderStatus' ORDER BY order_id DESC";
}
$orders = pdo_query($sql);

if (count($orders) > 0) {
    foreach ($orders as $key => $order) {
        extract($order);
        $order_details = getall_order_details_by_orderId($order_id);
?>
        <div class="rounded-lg border p-4">
            <h3 class="font-semibold text-xl">Order ID: <?php echo $order_id ?></h3>
            <?php echo order_item($order, $order_details) ?>
            <div>
                <a href="index.php?act=update_order&order_id=<?php echo $order_id ?>" class="capitalize btn bg-slate-700 hover:bg-slate-800 text-white rounded-full">Update order</a>
            </div>
        </div>
    <?php
    }
} else {
    ?>
    <div class="h-full w-full p-20 grid place-items-center">
        <p class="text-sm">No orders found!</p>
    </div>
<?php
}
