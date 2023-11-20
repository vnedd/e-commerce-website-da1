<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div class="heading">
            <h4 class="font-semibold text-3xl ">Update Orders</h4>
            <p class="text-neutral-500 mt-1">Update orders of your store</p>
        </div>
    </div>
    <div class="rounded-lg border p-4 mt-6">
        <h3 class="font-semibold text-xl">Order ID: <?php echo $order_id ?></h3>
        <?php echo order_item($order, $order_details) ?>
        <hr class="my-6 w-full h-1 ">
        <form action="" method="post">
            <h4 class="font-semibold text-xl mb-6">Update Orders</h4>
            <div class="flex items-end space-x-3">
                <div class="flex flex-col space-y-4 md:w-1/2 w-full">
                    <label for="">Order Status</label>
                    <select name="order_status" class="w-full px-3 py-2 rounded-md">
                        <?php

                        foreach ($order_statuss as $status) {
                            $status = trim($status, "'");
                        ?>
                            <option value="<?php echo $status ?>" <?php echo $status === $order['order_status'] ? "selected" : "" ?>><?php echo $status ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" name="update_order" class="capitalize btn bg-slate-700 hover:bg-slate-800 text-white rounded-full ">Update</button>
            </div>
        </form>
    </div>
</div>