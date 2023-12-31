<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div class="heading">
            <h4 class="font-semibold text-3xl ">Update categories</h4>
            <p class="text-neutral-500 mt-1">Update new category</p>
        </div>
    </div>
    <div class="py-10">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="preview-image mb-4">
                <img class="w-[150px] h-[150px] object-cover rounded-md" src="../<?php echo $image_path . $current_cate['image_url']; ?>" alt="">
            </div>
            <div class="flex flex-col space-y-2 w-2/3">
                <div class="flex flex-col space-y-2 w-full md:w-2/3 mb-6">
                    <label class="font-semibold" for="image_url">Upload image</label>
                    <input class="image-upload p-2 bg-neutral-100 rounded-md cursor-pointer" id="image_url" name="image_url" type="file">
                    <?php echo !empty($error['image_url']) ? '<span class="text-red-500 text-sm">' . $error['image_url'] . '</span>' : ""  ?>
                </div>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-semibold">Name</label>
                    <input type="text" class="form-input rounded text-slate-900" name="name" id="name" placeholder="Example: Gucci" value="<?php echo $current_cate['name'] ?>" />
                    <?php echo !empty($error['name']) ? '<span class="text-red-500 text-sm">' . $error['name'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-semibold">Parent category</label>
                    <select class="px-4 py-[8px] rounded-md" name="parent_id">
                        <option value="null">None (Top-level category)</option>
                        <?php
                        foreach ($list_category as $category) {
                            if ($category['category_id'] !== $current_cate['category_id']) {
                        ?>
                                <option class="block px-2 py-3" value="<?php echo $category['category_id'] ?>" <?php echo $category['category_id'] === $current_cate['parent_id'] ? "selected" : "" ?>><?php echo $category['name'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="flex flex-col space-y-2 mt-6 lg:w-2/3 w-full">
                <label for="description" class="font-semibold">Description</label>
                <textarea name="description" id="description" class="textarea textarea-bordered " placeholder="Bio"><?php echo $current_cate['description'] ?></textarea>
                <?php echo !empty($error['description']) ? '<span class="text-red-500 text-sm">' . $error['description'] . '</span>' : ""  ?>
            </div>
            <button class="btn md:btn-md btn-sm capitalize rounded-full bg-slate-700 hover:bg-slate-900 text-white mt-5" type="submit" name="update_category">Update category</button>
        </form>
    </div>
</div>

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