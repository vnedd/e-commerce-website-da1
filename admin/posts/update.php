<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div class="heading">
            <h4 class="font-semibold  text-3xl ">Update post</h4>
            <p class="text-neutral-500 mt-1">Update new post</p>
        </div>
    </div>
    <div class="py-10">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-6">
           
            
            </div>
            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4">
         
                <div class="flex flex-col space-y-2">
                    <label for="title" class="font-medium text-sm">TitLe</label>
                    <input type="text" class="form-input rounded text-slate-900" name="title" id="title" placeholder="Example: Gucci" value="<?php echo $posts['title']; ?>" />
                    <?php echo !empty($error['title']) ? '<span class="text-red-500 text-sm">' . $error['title'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="subtitle" class="font-medium text-sm">SubtitLe</label>
                    <input type="text" class="form-input rounded text-slate-900" name="subtitle" id="subtitle" placeholder="Example: Gucci" value="<?php echo $posts['sub_title']; ?>" />
                    <?php echo !empty($error['subtitle']) ? '<span class="text-red-500 text-sm">' . $error['subtitle'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="created" class="font-medium text-sm">Created at</label>
                    <input type="text" class="form-input rounded text-slate-900" name="created_at" id="created_at" placeholder="Example: Gucci" value="<?php echo $posts['created_at']; ?>" />
                    <?php echo !empty($error['created_at']) ? '<span class="text-red-500 text-sm">' . $error['created_at'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="user_id" class="font-medium text-sm">User ID </label>
                    <input type="text" class="form-input rounded text-slate-900" name="user_id" id="user_id" placeholder="Example: Gucci" value="<?php echo $posts['user_id']; ?>" />
                    <?php echo !empty($error['user_id']) ? '<span class="text-red-500 text-sm">' . $error['user_id'] . '</span>' : ""  ?>
                </div>
            </div>
            <div class="flex flex-col space-y-2 mt-6 w-full">
                <label for="description" class="font-medium text-sm">Content</label>
                <textarea name="content" id="content" class="textarea textarea-bordered " placeholder="Bio"><?php echo $posts['content']; ?></textarea>
                <?php echo !empty($error['content']) ? '<span class="text-red-500 text-sm">' . $error['content'] . '</span>' : ""  ?>
            </div>
        
           
      
            <hr class="my-6">
            <button class="btn md:btn-md btn-sm capitalize rounded-full bg-slate-700 hover:bg-slate-900 text-white mt-5" type="submit" name="update_post">Update post</button>
        </form>
    </div>
</div>


<!-- post variant -->
<script>
    function addVariant() {
        const container = document.getElementById('variants-container');
        const variantsElmLength = document.querySelectorAll('.variant').length;

        const newVariant = document.createElement('div');
        newVariant.classList.add('variant');
        newVariant.innerHTML = `
                <hr class="my-6">
                <h3 class="mb-4 font-semibold text-lg">post Variant ${variantsElmLength}</h3>
                <div class="grid md:grid-cols-10 grid-cols-1 gap-4">
                    <div class="col-span-9 grid md:grid-cols-3 grid-cols-1 gap-4">
                        <div class="flex flex-col space-y-2">
                            <label class="font-medium text-sm">post Variant Name</label>
                            <input type="text" class="form-input rounded text-slate-900" min=0 name="variant_name[]" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label class="font-medium text-sm">post Variant Price</label>
                            <input type="number" class="form-input rounded text-slate-900" min=0 name="variant_price[]" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label class="font-medium text-sm">post Variant Quantity</label>
                            <input type="number" class="form-input rounded text-slate-900" name="variant_quantity[]" />
                        </div>
                        </div>
                    <button type="button" class="btn col-span-1 self-end h-[40px] w-[40px] p-0 bg-red-200 hover:bg-red-300 text-red-600" onclick="removeVariant(this)"><i class="bi bi-trash3 text-xl"></i></button>
                </div>
        `;
        container.appendChild(newVariant);
    }

    function getParent(element, selector) {
        if (element) {
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
        const variantDiv = getParent(elm, ".variant");
        container.removeChild(variantDiv);
    }
</script>




<script>
    CKEDITOR.replace('content', {
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
                img.classList.add("post-upload-img");
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