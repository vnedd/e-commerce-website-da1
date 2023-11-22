<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div class="heading">
            <h4 class="font-semibold text-3xl ">Add posts</h4>
            <p class="text-neutral-500 mt-1">Add new posts</p>
        </div>
    </div>
    <div class="mt-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="preview-image flex items-center space-x-4"> </div>
            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4">
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-medium text-sm">Title</label>
                    <input type="text" class="form-input rounded text-slate-900" name="title" id="title" placeholder="Example: Iphone have amzing functions" />
                    <?php echo !empty($error['title']) ? '<span class="text-red-500 text-xs">' . $error['title'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-medium text-sm">Sub Title</label>
                    <input type="text" class="form-input rounded text-slate-900" name="subtitle" id="subtitle" placeholder="Example: Iphone have amzing functions" />
                    <?php echo !empty($error['subtitle']) ? '<span class="text-red-500 text-xs">' . $error['subtitle'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <!-- <label for="created_at" class="font-medium text-sm">Created_at</label> -->
                    <input type="hidden" class="form-input rounded text-slate-900" name="created_at" id="created_at" placeholder="Example: Iphone have amzing functions" />
                    <?php echo !empty($error['created_at']) ? '<span class="text-red-500 text-xs">' . $error['created_at'] . '</span>' : ""  ?>
                </div>
            </div>
            <div class="flex flex-col space-y-2 mt-6  w-full">
                <label for="content" class="font-medium text-sm">Content</label>
                <textarea name="content" id="content" class="textarea textarea-bordered " placeholder="Bio"></textarea>
                <?php echo !empty($error['content']) ? '<span class="text-red-500 text-xs">' . $error['content'] . '</span>' : ""  ?>
            </div>
           
         
            <hr class="my-6">
            <hr class="my-6">
            <button class="btn md:btn-md btn-sm capitalize rounded-full bg-slate-700 hover:bg-slate-900 text-white mt-5" type="submit" name="add_posts">Add post<i class="bi bi-plus ml-1 text-xl"></i></button>
        </form>
    </div>
</div>


<!-- posts variant -->
<script>
    function addVariant() {
        const container = document.getElementById('variants-container');
        const variantsElmLength = document.querySelectorAll('.variant').length;

        const newVariant = document.createElement('div');
        newVariant.classList.add('variant');
        newVariant.innerHTML = `
                <hr class="my-6">
                <h3 class="mb-4 font-semibold text-lg">posts Variant ${variantsElmLength}</h3>
                <div class="grid md:grid-cols-10 grid-cols-1 gap-4">
                    <div class="col-span-9 grid md:grid-cols-3 grid-cols-1 gap-4">
                        <div class="flex flex-col space-y-2">
                            <label class="font-medium text-sm">posts Variant Name</label>
                            <input type="text" class="form-input rounded text-slate-900" min=0 name="variant_name[]" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label class="font-medium text-sm">posts Variant Price</label>
                            <input type="number" class="form-input rounded text-slate-900" min=0 name="variant_price[]" />
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label class="font-medium text-sm">posts Variant Quantity</label>
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
                img.classList.add("posts-upload-img");
                reader.onload = function(e) {
                    img.src = e.target.result;
                };

                reader.readAsDataURL(file);
                previewContainer.appendChild(img);
            }
        }
    });
</script>