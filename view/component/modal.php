<!-- Modal Overlay -->
<div id="modalOverlay" class="fixed top-0 left-0 right-0 bottom-0 bg-slate-900 bg-opacity-40 z-50 hidden justify-center items-center ">
    <!-- Modal Content -->
    <div class="bg-white lg:w-[800px] py-6 px-4 rounded-lg relative animate__animated animate__flipInX animate__faster">
        <div class="absolute right-2 top-2 w-8 h-8 rounded-full hover:bg-slate-100 flex items-center justify-center cursor-pointer" onclick="closeModal()"><i class="bi bi-x text-lg"></i></div>
        <div class="flex flex-row space-x-5 mt-6">
            <div class="w-1/2">
                <img id="modal__product-image" class=" h-[300px] rounded-md object-cover" src="" alt="">
            </div>
            <div class="w-1/2 shrink-1">
                <h1 id="modal__product-name" class="text-gray-800 font-medium text-md my-4">Product Name</h1>
                <form id="add-to-cart-form" class="mt-6" action="index.php?act=addtocart" method="post">
                    <div id="modal__product-variant"></div>
                    <div class="product-quantity-wrapper flex items-center space-x-1 text-sm">
                        <p class="product-quantity text-violet-700 mr-2"><?php echo $variants[0]['quantity'] ?></p>
                        <p class="text-violet-700">In Stock <i class="bi bi-check"></i></p>
                    </div>
                    <div>
                        <p class="font-semibold mb-4">Quantity:</p>
                        <div class="flex items-center space-x-2">
                            <span class="descrease-cart-qty btn btn-square btn-sm rounded-full btn-outline cursor-pointer font-bold text-xl">-</span>
                            <input id="cart-qty-input" type="number" min=1 value="1" name="quantity" class="form-input w-[80px] ">
                            <span class="inscrease-cart-qty btn btn-square btn-sm rounded-full btn-outline cursor-pointer font-bold text-xl">+</span>
                        </div>
                    </div>
                    <button class="add-to-cart-btn btn bg-slate-700 hover:bg-slate-800 text-white w-full rounded-full mt-6" type="submit" name="add-to-cart">Add to cart</button>
                </form>
            </div>
        </div>
    </div>
</div>