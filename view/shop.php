<div class="container mx-auto max-w-[1440px] my-12 p-4  pt-14 md:p-8">
    <!-- filter on mobile -->
    <div class="md:hidden mb-6">
        <div class="dropdown">
            <label tabindex="0" class="m-1">
                <button class="btn bg-slate-700 hover:bg-slate-800 text-white rounded-full"><i class="bi bi-filter-right text-lg mr-4"></i>Filter products</button>
            </label>
            <ul tabindex="0" class="dropdown-content z-[1] px-5 py-8 shadow bg-base-100 rounded-box w-96">
                <?php include('component/product-filter.php') ?>
            </ul>
        </div>
    </div>
    <!-- filter on large screen -->
    <div class="grid grid-cols-4 gap-x-4">
        <div class="md:col-span-1 hidden md:flex flex-col border-r px-6 divide-y space-y-6">
            <?php include('component/product-filter.php') ?>
        </div>
        <div class="md:col-span-3 col-span-4">
            <div>
                <?php
                if (count($products) > 0) {
                ?>
                    <div class="w-full grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
                        <?php
                        foreach ($products as $product) {
                            extract($product);
                            $variants = getall_variant_by_productId($product_id);
                            $productJson = json_encode($product);
                            $variantDataJson = json_encode($variants);
                            $image_urls = explode(',', $image_urls);
                        ?>
                            <div>
                                <div class="relative">
                                    <div class="relative group overflow-hidden w-full">
                                        <img class="w-full rounded-lg h-[320px] object-cover" src="./<?php echo $image_path . $image_urls[0] ?>" alt="">
                                        <div onclick="openModal(<?php echo htmlspecialchars($productJson) ?>,<?php echo htmlspecialchars($variantDataJson) ?> )" class="absolute btn btn-circle btn-outline bg-white border-0 shadow-md rounded-full bottom-5 left-[50%] -translate-x-[50%] translate-y-28 group-hover:translate-y-0  transition">
                                            <i class="bi bi-arrows-angle-expand text-xl"></i>
                                        </div>
                                    </div>

                                    <?php

                                    if ($discount != 0) {
                                    ?>
                                        <span class="absolute top-2 left-2 w-[110px] rounded-full text-center text-xs px-2 py-1 bg-green-600 text-white">Discount <?php echo $discount; ?>%</span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div>
                                    <a href="index.php?act=product&product_id=<?php echo $product_id ?>" class="text-center mt-4 font-semibold line-clamp-1"><?php echo $name . " - " . $variants['0']['variant_name'] ?></a>

                                    <div class="flex items-center flex-col text-center mt-5">
                                        <span class="font-thin text-sm">Category: <span class="font-bold"><?php echo $category_name ?></span></span>
                                        <?php
                                        if ($discount != 0) {
                                        ?>
                                            <div class="mt-4">
                                                <span class="text-slate-400 font-thin line-through mr-2"><?php echo $variants[0]['price']; ?>$</span>
                                                <span class="font-bold text-xl"><?php echo $variants[0]['price'] -  ($variants[0]['price'] / 100) * $discount; ?>$</span>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="font-bold text-xl mt-4"><?php echo $variants[0]['price']; ?>$</span>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                } else {
                ?>
                    <div class="min-h-full w-full flex items-center justify-start shrink flex-col">
                        <img class="w-[400px]" src="./assets/img/no-result.svg" alt="">
                        <p class="text-sm">No results found!</p>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="flex justify-center mt-20">
                <div class="join">
                    <?php
                    for ($i = 1; $i <= $totalPages; $i++) {
                    ?>
                        <button class="pagination-item  join-item btn bg-slate-400 hover:bg-slate-600 text-white <?php echo $page == $i ? "btn-active bg-slate-800" : "" ?>" data-page="<?php echo $i ?>"><?php echo $i ?></button>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php include('component/modal.php'); ?>
        </div>
    </div>
</div>


<script>
    const paginations = document.querySelectorAll('.pagination-item')
    paginations.forEach(item => {
        item.addEventListener('click', () => {
            const dataPage = item.getAttribute('data-page');
            const currentUrl = new URL(window.location.href);
            const queryString = currentUrl.searchParams;
            const page = queryString.get('page');

            if (!page) {
                currentUrl.searchParams.append('page', dataPage);
            } else {
                queryString.set('page', dataPage);
            }

            window.location.href = currentUrl.href
        })
    })
</script>