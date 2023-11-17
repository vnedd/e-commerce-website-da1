<div class="flex flex-col">
    <form id="form-price" action="" method="post">
        <div class="w-full mb-4">
            <input type="text" name="keyword" placeholder="search somethings..." class="w-full rounded-md">
        </div>
        <div class="grid grid-cols-2 gap-x-3">
            <div>
                <label for="min-price text-xs">Min price</label>
                <input class="form-input rounded-md mt-2 w-full" type="number" min=1 max=4999 name="min-price" id="min-price">
            </div>
            <div>
                <label for="max-price text-xs">Max price</label>
                <input class="form-input rounded-md mt-2 w-full" type="number" min=1 max=4999 name="max-price" id="max-price">
            </div>
        </div>
        <?php echo !empty($price_error) ? '<span class="text-red-500 text-sm">' . $price_error . '</span>' : ""  ?>
        <button type="submit" name="filter" class="btn bg-slate-700 hover:bg-slate-800 text-white mt-5 rounded-md w-full">Apply</button>
    </form>
</div>
<div class="flex flex-col pt-6">
    <h3 class="font-semibold text-lg">Categories</h3>
    <ul class="flex flex-col space-y-4 mt-4">
        <li>
            <a href="index.php?act=shop&category_id=all" class="flex items-center justify-between text-sm cursor-pointer hover:text-violet-700">
                All
            </a>
        </li>
        <?php
        foreach ($product_in_categorys as $item) {
        ?>
            <li>
                <a href="index.php?act=shop&category_id=<?php echo $item['category_id'] ?>" class="flex items-center justify-between text-sm cursor-pointer hover:text-violet-700">
                    <span><?php echo $item['category_name'] ?></span>
                    <span><?php echo $item['product_count'] ?></span>
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
</div>
<div class="flex flex-col pt-6">
    <h3 class="font-semibold text-lg">Brands</h3>
    <ul class="flex flex-col space-y-4 mt-4">
        <?php
        foreach ($brands as $brand) {
        ?>
            <li>
                <a href="index.php?act=shop&brand_id=<?php echo $brand['brand_id'] ?>" class="text-sm cursor-pointer hover:text-violet-700">
                    <span><?php echo $brand['name'] ?></span>
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
</div>