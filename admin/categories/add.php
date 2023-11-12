<div>
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div class="heading">
            <h4 class="font-semibold text-3xl ">Add category</h4>
            <p class="text-neutral-500 mt-1">Add new category</p>
        </div>
    </div>
    <div class="py-10">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-semibold">Name</label>
                    <input type="text" class="form-input rounded text-slate-900" name="name" id="name" placeholder="Example: Gucci" />
                    <?php echo !empty($error['name']) ? '<span class="text-red-500 text-sm">' . $error['name'] . '</span>' : ""  ?>
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="name" class="font-semibold">Name</label>
                    <select class="px-4 py-[8px] rounded-md form-select" name="parent_id">
                        <option value="">--Select parent category--</option>

                        <?php
                        foreach ($list_category as $category) {
                        ?>
                            <option class="block px-2 py-3" value="<?php echo $category['category_id'] ?>"><?php echo $category['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="flex flex-col space-y-2 mt-6 lg:w-2/3 w-full">
                <label for="description" class="font-semibold">Description</label>
                <textarea name="description" id="description" class="textarea textarea-bordered " placeholder="Bio"></textarea>
                <?php echo !empty($error['description']) ? '<span class="text-red-500 text-sm">' . $error['description'] . '</span>' : ""  ?>
            </div>
            <button class="btn md:btn-md btn-sm capitalize rounded-full bg-slate-700 hover:bg-slate-900 text-white mt-5" type="submit" name="add_category">Add category</button>
        </form>
    </div>
</div>