<div class="animate__animated animate__zoomIn animate__faster">
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5 px-2">
        <div>
            <h4 class="font-semibold text-3xl ">Billboards</h4>
            <p class="text-neutral-500 mt-1">List of the billboard</p>
        </div>
        <a class="btn md:btn-md btn-sm rounded-full bg-slate-700 hover:bg-slate-900 text-white  " href="index.php?act=add_billboard">
            <p class="capitalize">Add new billboard</p>
            <i class="bi bi-plus-circle text-xl"></i>
        </a>
    </div>
    <?php
    if (count($list_billboard) > 0) {
    ?>
        <div class="w-full h-full mt-5 border border-neutral-200">
            <table class="table lg:table-lg md:table-md sm:table-sm table-xs">
                <!-- head -->
                <thead class="bg-slate-700 text-white text-base">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($list_billboard as $billboard) {
                        extract($billboard);
                    ?>
                        <tr>
                            <th><?php echo $billboard_id ?></th>
                            <td><?php echo $title ?></td>
                            <td><?php echo $subtitle ?></td>
                            <td><img class="w-[150px] h-[80px] object-cover border-2 border-neutral-400 rounded-md" src="../<?php echo $image_path  . $image_url ?>" alt="billboard"></td>
                            <td>
                                <div class="dropdown dropdown-bottom dropdown-end">
                                    <label tabindex="0" class="cursor-pointer m-1">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </label>
                                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-40">
                                        <li><a class=" font-semibold" href="index.php?act=update_billboard&billboard_id=<?php echo $billboard_id ?>"><i class="bi bi-pencil"></i> Update</a></li>
                                        <li>
                                            <a class=" font-semibold" href="index.php?act=delete_billboard&billboard_id=<?php echo $billboard_id ?>" onclick="confirmDelete(this.href); return false;"> <i class="bi bi-trash3"></i>Remove </a>
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
        <div class="w-full text-center py-10">No billboard created! Create now!</div>
    <?php
    }
    ?>

</div>