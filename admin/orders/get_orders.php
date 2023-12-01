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
        $order_statuss = get_OrderStatus();
?>
        <div class="rounded-lg border p-4">
            <h3 class="font-semibold text-xl">Order ID: <?php echo $order_id ?></h3>
            <?php echo order_item($order, $order_details) ?>
            <div>
                <form action="index.php?act=update_order&order_id=<?php echo $order_id ?>" method="post">
                    <h4 class="font-semibold text-xl mb-6">Update Orders</h4>
                    <div class="flex items-end space-x-3">
                        <div class="flex flex-col space-y-4 md:w-1/2 w-full">
                            <label for="">Order Status</label>
                            <select name="order_status" class="w-full px-3 py-2 rounded-md">
                                <?php
                                $currentSelectedKey;
                                foreach ($order_statuss as $key => $status) {
                                    $status = trim($status, "'");
                                    if ($status === $order_status) {
                                        $currentSelectedKey = $key;
                                    }
                                }
                                foreach ($order_statuss as $key => $status) {
                                    $status = trim($status, "'");
                                    if ($key < $currentSelectedKey) {
                                ?>
                                        <option disabled value="<?php echo $status ?>"><?php echo $status ?></option>
                                    <?php
                                    } else {
                                    ?>
                                        <option class="" value="<?php echo $status ?>" <?php echo $status === $order_status ? "selected" : "" ?>><?php echo $status ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="update_order" class="capitalize btn bg-slate-700 hover:bg-slate-800 text-white rounded-full ">Update</button>
                    </div>
                </form>
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
