<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div class="heading">
            <h4 class="font-semibold text-3xl ">Update product</h4>
            <p class="text-neutral-500 mt-1">Update new product</p>
        </div>
    </div>
    <div class="py-10">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-6">
                <div class="preview-image flex flex-rows space-x-4">
                    <?php
                    foreach ($product_images as $image) {
                    ?>
                        <div class="w-[150px] h-[150px] rounded-md overflow-hidden">
                            <img src="../<?php echo $image_path . $image['image_url'] ?>" alt="image product" class="object-cover w-full h-full">
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="flex flex-col space-y-2 mt-6  w-1/3">
                    <label for="images" class="font-semibold">Upload Images</label>
                    <input class="image-upload border-[1px] cursor-pointer border-slate-700 rounded-lg px-3 py-5" type="file" name="images[]" multiple />
                    <?php echo !empty($error['images']) ? '<span class="text-red-500 text-sm">' . $error['images'] . '</span>' : ""  ?>
                </div>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-semibold">Name</label>
                    <input type="text" class="form-input rounded text-slate-900" name="name" id="name" placeholder="Example: Gucci" value="<?php echo $current_pd['name']; ?>" />
                    <?php echo !empty($error['name']) ? '<span class="text-red-500 text-sm">' . $error['name'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="price" class="font-semibold">Price</label>
                    <input type="number" class="form-input rounded text-slate-900" min=0 name="price" id="price" value="<?php echo $current_pd['price']; ?>" />
                    <?php echo !empty($error['price']) ? '<span class="text-red-500 text-sm">' . $error['price'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="quantity" class="font-semibold">Quantity</label>
                    <input type="number" class="form-input rounded text-slate-900" min=10 name="quantity" id="quantity" placeholder="Enter quantity product" value="<?php echo $current_pd['quantity']; ?>" />
                    <?php echo !empty($error['quantity']) ? '<span class="text-red-500 text-sm">' . $error['quantity'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="discount" class="font-semibold">Discount(%)</label>
                    <input type="number" class="form-input rounded text-slate-900" min=0 step="0.01" name="discount" id="discount" placeholder="Enter discount amount" value="<?php echo $current_pd['discount']; ?>" />
                    <?php echo !empty($error['discount']) ? '<span class="text-red-500 text-sm">' . $error['discount'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-semibold">Category</label>
                    <select class="px-4 py-[8px] rounded-md" name="category_id">
                        <option value="">--Select category--</option>

                        <?php
                        foreach ($list_category as $category) {
                        ?>
                            <option class="block px-2 py-3" value="<?php echo $category['category_id'] ?>" <?php echo $category['category_id'] === $current_pd['category_id'] ? "selected" : "" ?>><?php echo $category['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-semibold">Brand</label>
                    <select class="px-4 py-[8px] rounded-md" name="brand_id">
                        <option value="">--Select brand--</option>

                        <?php
                        foreach ($list_brand as $brand) {
                        ?>
                            <option class="block px-2 py-3" value="<?php echo $brand['brand_id'] ?>" <?php echo $brand['brand_id'] === $current_pd['brand_id'] ? "selected" : "" ?>><?php echo $brand['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="flex flex-col space-y-2 mt-6 w-full">
                <label for="description" class="font-semibold">Description</label>
                <textarea name="description" id="description" class="textarea textarea-bordered " placeholder="Bio"><?php echo $current_pd['description']; ?></textarea>
                <?php echo !empty($error['description']) ? '<span class="text-red-500 text-sm">' . $error['description'] . '</span>' : ""  ?>
            </div>

            <div class="flex flex-row items-center gap-x-3 mt-5">
                <input class="form-checkbox " type="checkbox" name="is_featured" id="is_featured" value="1" <?php echo $current_pd['is_featured'] == 1 ? 'checked' : '' ?>>
                <label for="is_featured" class="font-semibold cursor-pointer">This product is featured?</label>
                <?php echo !empty($error['is_featured']) ? '<span class="text-red-500 text-sm">' . $error['is_featured'] . '</span>' : ""  ?>
            </div>
            <button class="btn md:btn-md btn-sm capitalize rounded-full bg-slate-700 hover:bg-slate-900 text-white mt-5" type="submit" name="add_product">Update product</button>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace('description', {
        width: ['100%'],
        height: ['500px']
    });
</script>


<script>
    const imageUpload = document.querySelector('.image-upload');
    const previewContainer = document.querySelector('.preview-image')

    imageUpload.addEventListener('change', function() {
        previewContainer.innerHTML = "";
        for (const file of imageUpload.files) {
            if (file) {
                const reader = new FileReader();
                const img = document.createElement("img");
                img.classList.add("product-upload-img");
                reader.onload = function(e) {
                    console.log(e.target.result);
                    img.src = e.target.result;
                };

                reader.readAsDataURL(file);
                previewContainer.appendChild(img);
            }
        }
    });
</script>