<div class="container mx-auto max-w-[1440px] my-8 p-4 md:p-8">
    <div class="mb-6">
        <h2 class="font-semibold text-2xl font-monospace ">Your carts</h2>
        <p class="text-slate-500">All product in your cart</p>
    </div>

    <?php
    if (count($carts) > 0) {
        $totalPrice = 0;
    ?>
        <div class="flex flex-col space-y-6">
            <div class="grid grid-cols-10 items-center cart-item  md:text-base text-lg uppercase text-neutral-600 font-thin ">
                <p class="col-span-2">Image</p>
                <p class="col-span-3">Product Name</p>
                <p class="lg:col-span-3 col-span-2 text-center">Quantity</p>
                <p class="col-span-1 text-center">Price</p>
                <p class="lg:col-span-1 col-span-2 text-right">Action</p>
            </div>
            <div class="divider"></div>
            <div class="cart-list">
                <?php
                foreach ($carts as $key => $cart) {
                    extract($cart);
                    $quantity = !empty($quantity) ? $quantity : 1;
                    $totalPrice += (int)($price) * (int)($quantity);
                ?>
                    <div class="cart-item">
                        <div class="grid grid-cols-10 items-center gap-x-4 text-sm md:text-base">
                            <img class=" col-span-2 h-[110px] rounded-lg object-cover" src="./<?php echo $image_path . $image_url ?>" alt="">
                            <h3 class=" col-span-3 line-clamp-2"><?php echo $name . " - " . $variant_name ?></h3>
                            <div class="lg:col-span-3 col-span-2 flex justify-center items-center space-x-4">
                                <div class="flex flex-col md:flex-row items-center md:space-x-2 md:space-y-0 space-y-2">
                                    <span class="descrease-cart-qty btn btn-square btn-sm rounded-full btn-outline cursor-pointer font-bold text-lg">-</span>
                                    <input type="number" min=1 value="<?php echo $quantity ?>" data-id="<?php echo $key ?>" name="quantity[]" class="form-input w-[60px] m-0 cart-qty-input">
                                    <input type="text" hidden value="<?php echo $key ?>" name="cart_index[]">
                                    <div class="cart-price-item" data-price="<?php echo $price ?>"></div>
                                    <span class="inscrease-cart-qty btn btn-square btn-sm rounded-full btn-outline cursor-pointer font-bold text-lg">+</span>
                                </div>
                            </div>
                            <h4 class="col-span-1 text-center lg:text-xl text-base">$<?php echo $price ?></h4>
                            <a href="index.php?act=delete-cart&cart-id=<?php echo $key ?>" onclick="confirmDelete(this.href); return false;" class="lg:col-span-1 col-span-2 hover:underline text-right">Remove</a>
                        </div>
                        <div class="variant-stock" data-stock="<?php echo $variant_stock ?>"></div>
                        <div class="divider"></div>
                    </div>
                <?php
                }
                ?>
                <div class="flex justify-between items-start">
                    <div class="flex flex-col items-center w-[300px]">
                        <div class="flex items-center justify-between w-full font-semibold text-lg">
                            <h3>Total: </h3>
                            <h3 class="cart-total-price">$<?php echo $totalPrice; ?></h3>
                        </div>
                        <div class="w-full mt-4">
                            <p class="text-sm text-center">Taxes and shipping caculated at checkout</p>
                            <?php
                            echo isset($_SESSION['user']) ? "<a class='btn btn-outline w-full my-2' href='index.php?act=checkout'>Checkout</a>" : "<a class='btn btn-outline w-full my-2'  href='index.php?act=login'>Login to checkout</a>"
                            ?>
                            <div class="flex items-center mt-1">
                                <i class="bi bi-arrow-left mr-2"></i>
                                <a href="index.php" class="text-xs">Continue to shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php
    } else {
?>
    <div class="text-center text-sm">
        <p>Your cart is empty! <a href="index.php">Shopping now!</a></p>
    </div>
<?php
    }
?>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function getParent(element, selector) {
        if (element) {
            // Bắt đầu từ phần tử con và duyệt lên đến phần tử cha
            while (element.parentElement) {
                element = element.parentElement;

                if (element.matches(selector)) {
                    return element;
                }
            }
        }
    }

    const inscreaseQtyBtns = document.querySelectorAll('.inscrease-cart-qty')
    const decreaseQtyBtns = document.querySelectorAll('.descrease-cart-qty')
    const quantiyInputs = document.querySelectorAll('.cart-qty-input')
    const cartTotalPrice = document.querySelector('.cart-total-price')

    inscreaseQtyBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const parent = getParent(this, '.cart-item')
            const inputQty = parent.querySelector('.cart-qty-input')
            const cartId = inputQty.dataset.id;
            const variantStock = Number(parent.querySelector('.variant-stock').dataset.stock);
            let qty = parseInt(inputQty.value) + 1;
            if (Number(inputQty.value) > Number(variantStock)) {
                alert(
                    'The quantity purchased is too much so it must remain in stock',
                );
                inputQty.value = 1;
                updateCartQuantity(cartId, 1)
            } else {
                inputQty.value = qty;
                updateCartQuantity(cartId, inputQty.value)
            }
        })
    })

    decreaseQtyBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const parent = getParent(this, '.cart-item')
            const inputQty = parent.querySelector('.cart-qty-input')
            const cartId = inputQty.dataset.id;
            const variantStock = Number(parent.querySelector('.variant-stock').dataset.stock);
            if (parseInt(inputQty.value) > 1) {
                let qty = parseInt(inputQty.value) - 1;
                inputQty.value = qty ? qty : 1
                updateCartQuantity(cartId, inputQty.value)
            } else {
                alert('quantity must be more than one');
                updateCartQuantity(cartId, 1)
            }
        })
    })

    quantiyInputs.forEach(input => {
        input.onchange = () => {
            const parent = getParent(input, '.cart-item')
            const cartId = input.dataset.id;
            const variantStock = Number(parent.querySelector('.variant-stock').dataset.stock);
            if (Number(input.value) >= Number(variantStock)) {
                alert(
                    'The quantity purchased is too much so it must remain in stock',
                );
                input.value = 1;
            }
            updateCartQuantity(cartId, input.value)
        };
    })

    function updateCartUI(totalPrice) {
        $(".cart-total-price").text("$" + totalPrice.toFixed(2));

    }

    function updateCartQuantity(id, quantity) {
        $.ajax({
            url: "/e-commerce-website-da1/view/cart/update-cart.php",
            method: "POST",
            data: {
                id,
                quantity
            },
            success: function(response) {
                const data = JSON.parse(response);
                updateCartUI(data.totalPrice);
            }
        });
    }

    function deleteCartItem(id) {
        $.ajax({
            url: "/e-commerce-website-da1/view/cart/update-cart.php",
            method: "DELELE",
            data: {
                id,
            },
            success: function(response) {
                const data = JSON.parse(response);
                updateCartUI(data.totalPrice);
            }
        });
    }
</script>