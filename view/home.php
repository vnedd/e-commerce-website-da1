<div class="w-screen">
    <div class="banner-wrapper w-screen h-[500px]">
        <div class="banner-slide scroll-smooth transition-all w-fit h-[500px] flex overflow-x-auto scrollbar-hide">
            <?php
            foreach ($billboards as $billboard) {
            ?>
                <div class="banner-item relative min-w-full h-[500px] flex items-center justify-center">
                    <img class="w-full h-full object-cover" src="./<?php echo $image_path . $billboard['image_url'] ?>" alt="<?php echo $billboard['title'] ?>">
                    <div class="absolute">
                        <h4 class="text-xl lg:text-4xl font-bold text-white"><?php echo $billboard['title'] ?></h4>
                        <p class="text-sm lg:text-lg font-medium text-center text-white"><?php echo $billboard['title'] ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <button class="prev-btn btn btn-square btn-outline rounded-full absolute left-[10%] top-[45%] "><i class="bi bi-chevron-left text-xl "></i></button>
        <button class="next-btn btn btn-square btn-outline rounded-full absolute right-[10%] top-[45%] "><i class="bi bi-chevron-right text-xl "></i></button>
    </div>

    <div class="container mx-auto max-w-[1440px] my-8 p-4 md:p-8">
        <!-- category product -->
        <div class="mb-6">
            <div class="mb-6">
                <h2 class="font-semibold text-2xl font-monospace ">Store Categories</h2>
                <p class="text-slate-500">All category of store</p>
            </div>

            <swiper-container space-between="30" slides-per-view="4" class="mt-6 swipper-category">
                <?php
                foreach ($categories as $category) {
                ?>
                    <swiper-slide class="flex items-center flex-col justify-center">
                        <img class="aspect-square rounded-md object-cover" src="./<?php echo $image_path . $category['image_url'] ?>" alt="">
                        <a href="index.php?act=shop&category_id=<?php echo $category['category_id'] ?>" class="block text-center mt-4 font-semibold"><?php echo $category['name'] ?></a>
                    </swiper-slide>
                <?php
                }
                ?>
            </swiper-container>
        </div>
        <!-- Feature product -->
        <div class="mt-8">
            <div class="mb-6">
                <h2 class="font-semibold text-2xl font-monospace ">Featured Products</h2>
                <p class="text-slate-500">All feature product of store</p>
            </div>
            <swiper-container space-between="30" slides-per-view="4" class="mt-6 swipper-product">
                <?php
                foreach ($feature_products as $product) {
                    extract($product);
                    $variants = getall_variant_by_productId($product_id);
                    $productJson = json_encode($product);
                    $variantJson = json_encode($variants);
                    $image_urls = explode(',', $image_urls);
                ?>
                    <swiper-slide>
                        <div class="relative">
                            <div class="relative group overflow-hidden w-full">
                                <img class="w-full rounded-lg h-[320px] object-cover" src="./<?php echo $image_path . $image_urls[0] ?>" alt="">
                                <div onclick="openModal(<?php echo htmlspecialchars($productJson) ?>,<?php echo htmlspecialchars($variantJson) ?> )" class="absolute btn btn-circle btn-outline bg-white border-0 shadow-md rounded-full bottom-5 left-[50%] -translate-x-[50%] translate-y-28 group-hover:translate-y-0  transition">
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
                    </swiper-slide>
                <?php
                }
                ?>
            </swiper-container>

            <?php include('component/modal.php') ?>
        </div>
    </div>

    <div class="container mx-auto max-w-[1440px] my-8 p-4 md:p-8">
        <div class="flex items-center justify-center min-h-screen bg-white">
            <div class="flex flex-col mt-8">
                <div class="flex flex-wrap justify-center text-center mb-24">
                    <div class="w-full lg:w-6/12 px-4">
                        <h1 class="text-gray-900 text-4xl font-bold mb-8">
                            Meet the Team
                        </h1>

                        <p class="text-gray-700 text-lg font-light">
                            With over 100 years of combined experience, we've got a well-seasoned team at the helm.
                        </p>
                    </div>
                </div>
                <div class="grid lg:grid-cols-3 grid-cols-1 gap-6 ">
                    <div class="flex flex-col">
                        <a href="#" class="mx-auto">
                            <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100" src="https://images.unsplash.com/photo-1634926878768-2a5b3c42f139?fit=clamp&w=400&h=400&q=80">
                        </a>
                        <div class="text-center mt-6">
                            <h1 class="text-gray-900 text-xl font-bold mb-1">
                                Vu Van Thang
                            </h1>
                            <p class="text-gray-700 font-light mb-2">
                                Leader & Coder
                            </p>
                            <div class="flex items-center justify-center opacity-50 hover:opacity-100
                                    transition-opacity duration-300">
                                <a href="#" class="flex rounded-full hover:bg-indigo-50 h-10 w-10">
                                    <i class="bi bi-linkedin text-indigo-500 mx-auto mt-2"></i>
                                </a>
                                <a href="#" class="flex rounded-full hover:bg-blue-50 h-10 w-10">
                                    <i class="bi bi-twitter text-blue-300 mx-auto mt-2"></i>
                                </a>
                                <a href="#" class="flex rounded-full hover:bg-orange-50 h-10 w-10">
                                    <i class="bi bi-instagram text-orange-400 mx-auto mt-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <a href="#" class="mx-auto">
                            <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100" width="366px" height="366px" src="https://i.pinimg.com/736x/db/64/98/db64982fcafcd0b86a4f4dabe75bb8be.jpg" >
                        </a>
                        <div class="text-center mt-6">
                            <h1 class="text-gray-900 text-xl font-bold mb-1">
                             Ngo Trong Khang 
                            </h1>
                            <p class="text-gray-700 font-light mb-2">
                             Coder
                            </p>
                            <div class="flex items-center justify-center opacity-50 hover:opacity-100
                                    transition-opacity duration-300">
                                <a href="#" class="flex rounded-full hover:bg-indigo-50 h-10 w-10">
                                    <i class="bi bi-linkedin text-indigo-500 mx-auto mt-2"></i>
                                </a>
                                <a href="#" class="flex rounded-full hover:bg-blue-50 h-10 w-10">
                                    <i class="bi bi-twitter text-blue-300 mx-auto mt-2"></i>
                                </a>
                                <a href="#" class="flex rounded-full hover:bg-orange-50 h-10 w-10">
                                    <i class="bi bi-instagram text-orange-400 mx-auto mt-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <a href="#" class="mx-auto">
                            <img class="rounded-2xl drop-shadow-md hover:drop-shadow-xl transition-all duration-200 delay-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTArMqSnAx7QgFtul1PURLgSAHNMqgzAQafzQ&usqp=CAU"  width="366px" height="366px" >
                        </a>
                        <div class="text-center mt-6">
                            <h1 class="text-gray-900 text-xl font-bold mb-1">
                              Nguyen Huy  Quoc 
                            </h1>
                            <p class="text-gray-700 font-light mb-2">
                             Coder
                            </p>
                            <div class="flex items-center justify-center opacity-50 hover:opacity-100
                                    transition-opacity duration-300">
                                <a href="#" class="flex rounded-full hover:bg-indigo-50 h-10 w-10">
                                    <i class="bi bi-linkedin text-indigo-500 mx-auto mt-2"></i>
                                </a>
                                <a href="#" class="flex rounded-full hover:bg-blue-50 h-10 w-10">
                                    <i class="bi bi-twitter text-blue-300 mx-auto mt-2"></i>
                                </a>
                                <a href="#" class="flex rounded-full hover:bg-orange-50 h-10 w-10">
                                    <i class="bi bi-instagram text-orange-400 mx-auto mt-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>