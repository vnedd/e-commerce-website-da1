<div class="container mx-auto max-w-[1440px] my-8 p-4 md:p-8">
    <div class="grid md:grid-cols-2 grid-cols-1 gap-8">
        <div class="w-full">
            <swiper-container class="h-[470px]" style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" loop="true" space-between="10" navigation="true">
                <?php
                foreach ($image_urls as $image) {
                ?>
                    <swiper-slide class="h-full">
                        <img class="w-full h-full object-cover rounded-lg" src="./<?php echo $image_path . $image ?>" />
                    </swiper-slide>
                <?php
                }
                ?>
            </swiper-container>
        </div>
        <div class="flex flex-col space-y-4">
            <h3 class="text-xl font-medium"><?php echo $name ?></h3>
            <?php
            if ($discount != 0) {
            ?>
                <div class="mt-4">
                    <span class="text-slate-400 font-thin line-through mr-2"><?php echo $price; ?>$</span>
                    <span class="font-bold text-xl"><?php echo $price -  ($price / 100) * $discount; ?>$</span>
                </div>
            <?php
            } else {
            ?>
                <span class="font-bold text-xl mt-4"><?php echo $price; ?>$</span>
            <?php
            }
            ?>
            <div class="w-full rounded-md border relative">
                <div class="absolute w-full h-[40px] top-0 bg-violet-500 rounded-md flex items-center px-3 text-white">
                    <i class="bi bi-gift mr-3"></i>
                    Promotion
                </div>
                <div class="mt-[40px] p-4 text-sm">
                    <ul>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-violet-600 mr-2"></i>Additional discount of up to 1% for Smember members (applies depending on product)</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-violet-600 mr-2"></i>Additional 5% discount up to 200,000 VND when paying via Kredivo</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-violet-600 mr-2"></i>Get YouTube Premium offer for Samsung Galaxy owners now</li>
                    </ul>
                </div>
            </div>
            <p class="text-sm text-neutral-500 uppercase">Category: <span class="font-semibold text-slate-900"><?php echo $category_name ?></span></p>
            <p class="text-sm text-neutral-500 uppercase">Brand: <span class="font-semibold text-slate-900"><?php echo $brand_name ?></span></p>
            <?php
            if ($quantity > 0) {
            ?>
                <p class="text-sm text-violet-700">In Stock <i class="bi bi-check"></i></p>
            <?php
            } else {
            ?>
                <p class="text-sm text-violet-700">Out Stock</p>
            <?php
            }
            ?>
            <form id="add-to-cart-form" class="mt-6" action="index.php?act=addtocart" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                <input type="hidden" name="name" value="<?php echo $name ?>">
                <input type="hidden" name="price" value="<?php echo $price ?>">
                <input type="hidden" name="image_url" value="<?php echo $image_urls[0] ?>">
                <div class="flex items-center space-x-3">
                    <p class="font-semibold">Quantity:</p>
                    <span class="descrease-cart-qty btn btn-square btn-sm rounded-full btn-outline cursor-pointer font-bold text-xl">-</span>
                    <input id="cart-qty-input" type="number" min=1 value="1" name="quantity" class="form-input w-[80px] ">
                    <span class="inscrease-cart-qty btn btn-square btn-sm rounded-full btn-outline cursor-pointer font-bold text-xl">+</span>
                </div>
                <button class="btn mt-6 bg-slate-700 hover:bg-slate-800 text-white w-full rounded-full <?php echo $quantity > 0 ? "" : "btn-disabled" ?>" type="submit" name="add-to-cart">Add to cart</button>
            </form>
        </div>
    </div>
    <hr class="my-10">
    <!-- Product Description -->
    <div class="w-full mt-10 border rounded-md px-6 p-8">
        <h3 class="font-medium mb-4 text-xl">Products descriptions</h3>
        <div class="product-description text-sm">
            <?php echo $description ?>
        </div>
    </div>
</div>