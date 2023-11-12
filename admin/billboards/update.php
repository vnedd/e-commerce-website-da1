<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div class="heading">
            <h4 class="font-semibold text-3xl ">Update billboards</h4>
            <p class="text-neutral-500 mt-1">Update your store billboard</p>
        </div>
    </div>
    <div class="py-10">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="preview-image mb-4">
                <img class="w-[150px] h-[150px] object-cover rounded-md" src="../<?php echo $image_path . $billboard['image_url']; ?>" alt="">
            </div>
            <div class="flex flex-col space-y-2 w-2/3">
                <div class="flex flex-col space-y-2 w-full md:w-2/3 mb-6">
                    <label class="font-semibold" for="image_url">Upload image</label>
                    <input class="image-upload p-2 bg-neutral-100 rounded-md cursor-pointer" id="image_url" name="image_url" type="file">
                    <?php echo !empty($error['image_url']) ? '<span class="text-red-500 text-sm">' . $error['image_url'] . '</span>' : ""  ?>
                </div>
            </div>
            <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                <div class="flex flex-col space-y-2">
                    <label for="title" class="font-semibold">Title</label>
                    <input type="text" class="form-input rounded text-slate-900" name="title" id="title" placeholder="Example: wellcome halloween" value="<?php echo $billboard['title']; ?>" />
                    <?php echo !empty($error['title']) ? '<span class="text-red-500 text-sm">' . $error['title'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="subtitle" class="font-semibold">Subtitle</label>
                    <input type="text" class="form-input rounded text-slate-900" name="subtitle" id="subtitle" value="<?php echo $billboard['subtitle']; ?>" />
                    <?php echo !empty($error['subtitle']) ? '<span class="text-red-500 text-sm">' . $error['subtitle'] . '</span>' : ""  ?>
                </div>
            </div>
            <button class="btn md:btn-md btn-sm capitalize rounded-full bg-slate-700 hover:bg-slate-900 text-white mt-5" type="submit" name="update_billboard">Update billboard</button>

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
                    console.log(e.target.result);
                    img.src = e.target.result;
                };

                reader.readAsDataURL(file);
                previewContainer.appendChild(img);
            }
        }
    });
</script>