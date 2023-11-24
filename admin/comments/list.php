<div class="animate__animated animate__zoomIn animate__faster">
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5">
        <div>
            <h4 class="font-semibold text-3xl ">Comments</h4>
            <p class="text-neutral-500 mt-1">All Comment of my store</p>
        </div>
    </div>
    <?php
    if (count($list_comments) > 0) {
    ?>
        <div class="w-full h-full mt-5 border border-neutral-200">
            <table class="table lg:table-lg md:table-md sm:table-sm table-xs">
                <!-- head -->
                <thead class="bg-slate-700 text-white text-base">
                    <tr>
                        <th>ID</th>
                        <th>Content</th>
                        <th>Parent ID</th>
                        <th>User ID</th>
                        <th>Product ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($list_comments as $comment) {
                        extract($comment);
                        if ($parent_id == 0) {
                            $parent_comment = '';
                        } else {
                            $parent_comment = getone_comment($parent_id);
                        }
                    ?>
                        <tr>
                            <th><?php echo $comment_id ?></th>
                            <td class="font-semibold"><?php echo $content ?></td>
                            <td>
                                <?php echo !empty($parent_comment) ? $parent_comment['comment_id'] : "NULL" ?>
                            </td>
                            <td class="font-semibold"><?php echo $user_id ?></td>
                            <td class="font-semibold"><?php echo $product_id ?></td>

                            <td>
                                <div class="dropdown dropdown-bottom dropdown-end">
                                    <label tabindex="0" class="cursor-pointer m-1">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </label>
                                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-40">
                                        <li>
                                            <a class=" font-semibold" href="index.php?act=delete_comment&comment_id=<?php echo $comment_id ?>" onclick="confirmDelete(this.href); return false;"> <i class="bi bi-trash3"></i>Remove </a>
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
        <div class="w-full text-center text-sm py-10">No comment in your website!</div>
    <?php
    }
    ?>
</div>