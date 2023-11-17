<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div class="heading">
            <h4 class="font-semibold text-3xl ">Add product</h4>
            <p class="text-neutral-500 mt-1">Add new product</p>
        </div>
    </div>
    <div class="mt-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="preview-image flex items-center space-x-4"> </div>
            <div class="flex flex-col space-y-2 my-6  w-1/3">
                <label for="images" class="font-medium text-sm">Upload Images</label>
                <input class="image-upload border-[1px] cursor-pointer border-slate-700 rounded-lg p-3" type="file" name="images[]" multiple />
                <?php echo !empty($error['images']) ? '<span class="text-red-500 text-xs">' . $error['images'] . '</span>' : ""  ?>
            </div>
            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4">
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-medium text-sm">Name</label>
                    <input type="text" class="form-input rounded text-slate-900" name="name" id="name" placeholder="Example: Gucci" />
                    <?php echo !empty($error['name']) ? '<span class="text-red-500 text-xs">' . $error['name'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="discount" class="font-medium text-sm">Discount(%)</label>
                    <input type="number" class="form-input rounded text-slate-900" min=0 step="0.01" name="discount" id="discount" placeholder="Enter discount amount" />
                    <?php echo !empty($error['discount']) ? '<span class="text-red-500 text-xs">' . $error['discount'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-medium text-sm">Category</label>
                    <select class="px-4 py-[8px] rounded-md" name="category_id">
                        <option value="">--Select category--</option>

                        <?php
                        foreach ($list_category as $category) {
                        ?>
                            <option class="block px-2 py-3" value="<?php echo $category['category_id'] ?>"><?php echo $category['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?php echo !empty($error['category_id']) ? '<span class="text-red-500 text-xs">' . $error['category_id'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-medium text-sm">Brand</label>
                    <select class="px-4 py-[8px] rounded-md" name="brand_id">
                        <option value="">--Select brand--</option>

                        <?php
                        foreach ($list_brand as $brand) {
                        ?>
                            <option class="block px-2 py-3" value="<?php echo $brand['brand_id'] ?>"><?php echo $brand['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <?php echo !empty($error['brand_id']) ? '<span class="text-red-500 text-xs">' . $error['brand_id'] . '</span>' : ""  ?>
                </div>
            </div>
            <div class="flex flex-col space-y-2 mt-6  w-full">
                <label for="description" class="font-medium text-sm">Description</label>
                <textarea name="description" id="description" class="textarea textarea-bordered " placeholder="Bio"></textarea>
                <?php echo !empty($error['description']) ? '<span class="text-red-500 text-xs">' . $error['description'] . '</span>' : ""  ?>
            </div>
            <div class="flex flex-row items-center gap-x-3 mt-5">
                <input class="form-checkbox " type="checkbox" name="is_featured" id="is_featured" value="1">
                <label for="is_featured" class="font-semibold cursor-pointer">This product is featured?</label>
                <?php echo !empty($error['is_featured']) ? '<span class="text-red-500 text-xs">' . $error['is_featured'] . '</span>' : ""  ?>
            </div>
            <hr class="my-6">
            <div>
                <h5 class="font-semibold text-xl mb-6">Add product variant</h5>
                <div id="variants-container">
                    <div class="variant grid md:grid-cols-3 grid-cols-1 gap-4">
                        <div class="flex flex-col space-y-2">
                            <label class="font-medium text-sm">Product Variant Name</label>
                            <input type="text" class="form-input rounded text-slate-900" min=0 name="variant_name[]" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label class="font-medium text-sm">Product Variant Price</label>
                            <input type="number" class="form-input rounded text-slate-900" min=0 name="variant_price[]" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label class="font-medium text-sm">Product Variant Quantity</label>
                            <input type="number" class="form-input rounded text-slate-900" min=10 name="variant_quantity[]" />
                        </div>
                    </div>
                </div>
                <?php echo !empty($error['variant']) ? '<span class="text-red-500 text-xs my-6 block">' . $error['variant'] . '</span>' : ""  ?>
                <div class="flex justify-end  mt-6">
                    <span class="btn rounded-full capitalize btn-sm" onclick="addVariant()">Add new variant</span>
                </div>
            </div>
            <hr class="my-6">
            <button class="btn md:btn-md btn-sm capitalize rounded-full bg-slate-700 hover:bg-slate-900 text-white mt-5" type="submit" name="add_product">Add product<i class="bi bi-plus ml-1 text-xl"></i></button>
        </form>
    </div>
</div>


<!-- product variant -->
<script>
    function addVariant() {
        const container = document.getElementById('variants-container');
        const variantsElmLength = document.querySelectorAll('.variant').length;

        const newVariant = document.createElement('div');
        newVariant.classList.add('variant');
        newVariant.innerHTML = `
                <hr class="my-6">
                <h3 class="mb-4 font-semibold text-lg">Product Variant ${variantsElmLength}</h3>
                <div class="grid md:grid-cols-10 grid-cols-1 gap-4">
                    <div class="col-span-9 grid md:grid-cols-3 grid-cols-1 gap-4">
                        <div class="flex flex-col space-y-2">
                            <label class="font-medium text-sm">Product Variant Name</label>
                            <input type="text" class="form-input rounded text-slate-900" min=0 name="variant_name[]" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label class="font-medium text-sm">Product Variant Price</label>
                            <input type="number" class="form-input rounded text-slate-900" min=0 name="variant_price[]" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label class="font-medium text-sm">Product Variant Quantity</label>
                            <input type="number" class="form-input rounded text-slate-900" min=10 name="variant_quantity[]" />
                        </div>
                    </div>
                    <button type="button" class="btn col-span-1  self-end h-[40px] w-[40px] p-0 bg-red-200 hover:bg-red-300 text-red-600" onclick="removeVariant(this)"><i class="bi bi-trash3 text-xl"></i></button>
                </div>
        `;
        container.appendChild(newVariant);
    }

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

    function removeVariant(elm) {
        const container = document.getElementById('variants-container');
        const variantDiv = getParent(elm, ".variant")
        container.removeChild(variantDiv);
    }
</script>



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
                    img.src = e.target.result;
                };

                reader.readAsDataURL(file);
                previewContainer.appendChild(img);
            }
        }
    });
</script>