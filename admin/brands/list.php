<div class="animate__animated animate__zoomIn animate__faster">
<div class="animate__animated animate__lightSpeedInLeft animate__faster ">
<div class="w-full mt-4">
    <div>
        <h4 class="font-semibold text-3xl">Brands</h4>
        <p class="text-neutral-500 mt-1">List of the brands</p>
    </div>
    <form id="form-user-search" class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-4" action="index.php?act=list_user" method="post">
        <div class="flex-grow">
            <label for="keyword" class="block text-xs">Find Brand</label>
            <div class="flex">
                <input type="text" name="keyword" id="keyword" class="form-input rounded-lg w-50" placeholder=" Enter Name...">
                <button type="submit" name="filter_br" class="btn btn-sm rounded-full bg-slate-700 hover:bg-slate-800 text-white ml-2">
                    <i class="bi bi-search text-xl"></i>
                </button>
            </div>
        </div>
 
    </form>
</div>  
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
   
        <a class="btn md:btn-md btn-sm rounded-full bg-slate-700 hover:bg-slate-900 text-white  " href="index.php?act=add_brand">
            <p class="capitalize">Add new brand</p>
            <i class="bi bi-plus-circle text-xl"></i>
        </a>
    </div>
    <?php
    if (count($list_brand) > 0) {
    ?>
        <div class="w-full h-full mt-5 border border-neutral-200">
            <table class="table lg:table-lg md:table-md sm:table-sm table-xs">
                <!-- head -->
                <thead class="bg-slate-700 text-white text-base">
                    <tr>
                        <th>ID</th>
                        <th>Brand Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($list_brand as $brand) {
                        extract($brand);
                    ?>
                        <tr>
                            <th><?php echo $brand_id ?></th>
                            <td class="font-semibold"><?php echo $name ?></td>
                            <td>
                                <p class="line-clamp-1"><?php echo $description ?></p>
                            </td>
                            <td>
                                <div class="dropdown dropdown-bottom dropdown-end">
                                    <label tabindex="0" class="cursor-pointer m-1">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </label>
                                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-40">
                                        <li><a class=" font-semibold" href="index.php?act=update_brand&brand_id=<?php echo $brand_id ?>"><i class="bi bi-pencil"></i> Update</a></li>
                                        <li>
                                            <a class=" font-semibold" href="index.php?act=delete_brand&brand_id=<?php echo $brand_id ?>" onclick="confirmDelete(this.href); return false;"> <i class="bi bi-trash3"></i>Remove </a>
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
        <div class="w-full text-center py-10">No brand created! Create now!</div>
    <?php
    }
    ?>

</div>