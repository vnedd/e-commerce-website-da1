<div class="container mx-auto max-w-[1440px] my-8 mt-[140px] md:mt-[100px] md:p-8 ">
    <div class="sm:mx-auto mx-8 max-w-[900px] my-8 mt-16 p-6 md:p-8 rounded-lg border shadow-md relative">
        <i class="bi bi-check-circle-fill absolute -top-7 left-[50%] -translate-x-[50%] text-violet-600 text-6xl rounded-full shadow-md"></i>
        <div class="flex items-center flex-col">
            <h4 class="text-center mt-5 font-bold text-2xl">
                Thank you for order <?php echo '#TKQ00' . $order['order_id'] ?>
            </h4>
            <p class="text-neutral-600 text-sm mt-2 text-center">We'll send you an email with tracking information when your item ships</p>
        </div>
        <div class="mt-8">
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
                        foreach ($orderDetails as $orderDetail) {
                            extract($orderDetail);
                        ?>
                            <div class="flex items-center space-x-3">
                                <img src="./<?php echo $image_path . $image ?>" alt="" class="w-[90px] h-[70px] rounded-md">
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
                            <div class="capitalize badge text-white text-xs px-2 py-1 <?php echo $order['payment_status'] === 'Processing' ? 'bg-orange-500' : '' ?> <?php echo $order['payment_status'] === 'Succeeded' ? 'bg-green-500' : '' ?>"><?php echo $order['payment_status'] ?></div>
                        </div>
                        <div class="flex items-center">
                            <h4 class="font-medium text-lg mr-3">Order Status</h4>
                            <div class="capitalize badge text-white text-xs px-2 py-1 <?php echo $order['order_status'] === 'Processing' ? 'bg-orange-500' : '' ?> <?php echo $order['order_status'] === 'Succeeded' ? 'bg-green-500' : '' ?>"><?php echo $order['order_status'] ?></div>
                        </div>
                    </div>
                    <a href="index.php?act=shop" class="btn bg-slate-700 hover:bg-slate-800 text-white rounded-full mt-6 w-full">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>