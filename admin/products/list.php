<div class="min-h-screen h-full pb-0">
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5 px-2">
        <div>
            <h4 class="font-semibold text-3xl ">Products</h4>
            <p class="text-neutral-500 mt-1">List of the product</p>
        </div>
        <a class="btn md:btn-md btn-sm  rounded-full bg-slate-700 hover:bg-slate-900 text-white  " href="index.php?act=add_product">
            <p class="capitalize">Add new product</p>
            <i class="bi bi-plus-circle text-xl"></i>
        </a>
    </div>
    <div class="w-full mt-4">
        <form action="index.php?act=list_product" method="post" class="flex items-center space-x-2">
            <input type="text" name="keyword" class="form-input rounded-lg" placeholder="Enter anything..">
            <select class="px-4 py-[8px] lg:w-[190px] w-[100px] rounded-lg" name="category_id">
                <option value="">--All category--</option>
                <?php
                foreach ($list_category as $category) {
                ?>
                    <option class="cursor-pointer" value="<?php echo $category['category_id'] ?>" <?php echo $category_id === $category['category_id'] ? "selected" : "" ?>><?php echo $category['name'] ?></option>
                <?php
                }
                ?>
            </select>
            <select class="px-4 py-[8px] lg:w-[190px] w-[100px] rounded-lg" name="brand_id">
                <option value="">--All brand--</option>
                <?php
                foreach ($list_brand as $brand) {
                ?>
                    <option class="cursor-pointer" value="<?php echo $brand['brand_id'] ?>" <?php echo $brand_id === $brand['brand_id'] ? "selected" : "" ?>><?php echo $brand['name'] ?></option>
                <?php
                }
                ?>
            </select>

            <button type="submit" name="filter_pd" class="btn md:btn-md btn-sm capitalize  rounded-full bg-slate-700 hover:bg-slate-800 text-white"><i class="bi bi-filter text-xl"></i> Filter product</button>
        </form>
    </div>
    <?php
    if (count($list_product) > 0) {
    ?>
        <div class="w-full h-full mt-5 border border-neutral-200">
            <table class="table lg:table-lg md:table-md sm:table-sm table-xs">
                <!-- head -->
                <thead class="bg-slate-700 text-white text-sm">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th class="max-md:hidden">Views</th>
                        <th>Discount</th>
                        <th class="max-md:hidden">Featured?</th>
                        <th class="max-md:hidden">Category</th>
                        <th class="max-md:hidden">Brand</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <?php
                    foreach ($list_product as $product) {
                        extract($product);
                        $brand = getone_brand($brand_id);
                        $category = getone_category($category_id);
                    ?>
                        <tr>
                            <th><?php echo $product_id ?></th>
                            <td class=" text-sm font-semibold"><?php echo $name ?></td>
                            <td class=" text-sm text-center max-md:hidden"><?php echo $views ?></td>
                            <td class=" text-xs">
                                <p class="p-1 py-2 text-center rounded-full text-white<?php echo $discount == 0 ? ' bg-neutral-500 ' : ' bg-red-500' ?>">Discount <?php echo $discount ?>%</p>
                            </td>
                            <td class=" text-sm max-md:hidden"><?php echo $is_featured == 0 ? "FALSE" : "TRUE" ?></td>
                            <td class=" text-sm max-md:hidden"><?php echo $category['name'] ?></td>
                            <td class=" text-sm max-md:hidden"><?php echo $brand['name'] ?></td>
                            <td>
                                <div class="dropdown dropdown-bottom dropdown-end">
                                    <label tabindex="0" class="cursor-pointer m-1">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </label>
                                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-40">
                                        <li><a class=" font-semibold" href="index.php?act=update_product&product_id=<?php echo $product_id ?>"><i class="bi bi-pencil"></i> Update</a></li>
                                        <li>
                                            <a class=" font-semibold" href="index.php?act=delete_product&product_id=<?php echo $product_id ?>" onclick="confirmDelete(this.href); return false;"> <i class="bi bi-trash3"></i>Remove </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    } else {
    ?>
        <div class="w-full text-center py-10"><?php echo isset($_POST['filter_pd']) ? "No product found!" : 'No product created! Create now!' ?></div>
    <?php
    }
    ?>

</div>