<div class="container mx-auto max-w-[1440px] my-12 p-4  pt-14 md:p-8">
    <form class="grid grid-cols-5 gap-6 gap-x-8" action="" method="post">
        <div class="col-span-2">
            <h2 class="font-semibold text-xl">Enter your Shipping address</h2>
            <div class="grid grid-cols-1 gap-4 mt-5">
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-semibold text-sm">Name</label>
                    <input type="text" class="form-input rounded text-slate-900" name="name" id="name"
                        placeholder="Example: nedd" value="<?php echo $_SESSION['user']['name'] ?>" />
                    <?php echo !empty($error['name']) ? '<span class="text-red-500 text-sm">' . $error['name'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="email" class="font-semibold text-sm">Email</label>
                    <input type="email" class="form-input rounded text-slate-900" name="email" id="email"
                        value="<?php echo $_SESSION['user']['email'] ?>" />
                    <?php echo !empty($error['email']) ? '<span class="text-red-500 text-sm">' . $error['email'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="phone" class="font-semibold text-sm">Phone</label>
                    <input type="tel" class="form-input rounded text-slate-900" name="phone" id="phone"
                        value="<?php echo $_SESSION['user']['phone'] ?>" />
                    <?php echo !empty($error['phone']) ? '<span class="text-red-500 text-sm">' . $error['phone'] . '</span>' : ""  ?>
                </div>
            </div>
            <div class="flex flex-col space-y-2 mt-6">
                <label class="font-semibold text-sm">Address</label>
                <input type="text" class="form-input rounded text-slate-900" name="address" />
                <?php echo !empty($error['address']) ? '<span class="text-red-500 text-sm">' . $error['address'] . '</span>' : ""  ?>
            </div>
        </div>
        <div class="col-span-3">
            <h2 class="font-semibold text-xl">Your cart items</h2>
            <div class="mt-6">
                <?php
                $totalPrice = 0;
                foreach ($carts as $key => $cart) {
                    extract($cart);
                    $totalPrice += (int)($price) * (int)($quantity);
                ?>
                <div class="grid grid-cols-4 items-center gap-x-4 cart-item text-sm md:text-base">
                    <img class=" col-span-1 h-[90px] rounded-lg object-cover"
                        src="./<?php echo $image_path . $image_url ?>" alt="">
                    <h3 class=" col-span-1 line-clamp-2"><?php echo $name . " - " . $variant_name ?></h3>
                    <h4 class="col-span-1 text-center text-sm font-semibold">x<?php echo $quantity ?></h4>
                    <h4 class="col-span-1 text-right text-base font-bold">$<?php echo $price ?></h4>
                </div>
                <hr class="my-3 w-full h-1">
                <?php
                }
                ?>
            </div>
            <div class="grid grid-cols-2 gap-x-10">
                <div class="flex flex-col space-y-2 mt-4 w-w">
                    <label for="order-note" class="font-semibold text-sm">Note to seller?</label>
                    <textarea name="order-note" id="order-note" cols="3" rows="5" class="rounded-md py-2 px-3"
                        placeholder="Enter something for order"></textarea>
                </div>
                <div class="flex flex-col items-center w-full self-end">
                    <div class="grid grid-cols-1 gap-y-3 w-full mb-4">
                        <label for="" class="text-sm font-semibold">Shipping Method</label>
                        <?php
                        foreach ($shippingTypes as $type) {
                        ?>
                        <div class="self-start flex items-center justify-between">
                            <div>
                                <input type="radio" value="<?php echo $type['shipping_type_id'] ?>" name="shipping_type"
                                    id="shipping_type_<?php echo $type['shipping_type_id'] ?>"
                                    <?php echo $type['shipping_type_id'] == 1 ? "checked" : "" ?> />
                                <label for="shipping_type_<?php echo $type['shipping_type_id'] ?>"
                                    class="cursor-pointer text-sm"><?php echo $type['shipping_type_name'] ?></label>
                            </div>
                            <p class="font-medium text-base">$<?php echo $type['shipping_type_price'] ?></p>
                        </div>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="flex items-center justify-between w-full font-semibold text-lg">
                        <h3>Total: </h3>
                        <input type="hidden" name="total-price" id="total-price"
                            value="<?php echo $totalPrice + $shippingTypes['0']['shipping_type_price']; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['user_id'] ?>">
                        <h3 class="total-price">$<?php echo $totalPrice + $shippingTypes['0']['shipping_type_price']; ?>
                        </h3>
                    </div>
                    <hr class="my-3 w-full h-1">
                    <div class="w-full mb-4">
                        <label for="" class="text-sm font-semibold">Payment Method</label>
                        <div class="grid md:grid-cols-2 grid-cols-1 gap-3 mt-3">
                            <?php
                            foreach ($paymentMethods as $key => $value) {
                                $value = trim($value, "'");
                            ?>
                            <div class="flex space-x-2 rounded-md shadow-sm hover:shadow-lg border p-2 cursor-pointer">
                                <input type="radio" name="payment_method" <?php echo $key === 0 ? 'checked' : '' ?>
                                    value="<?php echo $value ?>" id="payment_<?php echo $key ?>">
                                <label for="payment_<?php echo $key ?>"
                                    class="capitalize text-sm cursor-pointer"><?php echo $value ?></label>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="submit-placeorder-button">
                            <button class="btn btn-outline w-full my-2" type="submit" name="place-order">Place
                                order</button>
                        </div>
                        <div class="flex items-center mt-1">
                            <i class="bi bi-arrow-left mr-2"></i>
                            <a href="index.php" class="text-xs">Continue to shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



<!-- select shipping types -->
<script>
const shippingTypeRadios = document.querySelectorAll("input[name='shipping_type']")

shippingTypeRadios.forEach(radio => {
    radio.addEventListener('change', function() {
        const typeId = this.value

        const selectedShippingType = <?php echo json_encode($shippingTypes); ?>.find(function(type) {
            return type.shipping_type_id == typeId;
        });

        let newTotalPrice = <?php echo $totalPrice; ?> + Number(selectedShippingType
            .shipping_type_price);
        document.querySelector('.total-price').textContent = '$' + newTotalPrice
        documeny.getElementById('total-price').value = newTotalPrice;
    })
})
</script>