<div class="min-h-screen h-full pb-0">
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5 px-2">
        <div>
            <h4 class="font-semibold text-3xl ">Post</h4>
            <p class="text-neutral-500 mt-1">List posts </p>
        </div>
        <a class="btn md:btn-md btn-sm  rounded-full bg-slate-700 hover:bg-slate-900 text-white  " href="index.php?act=add_post">
            <p class="capitalize">Add a new post</p>
            <i class="bi bi-plus-circle text-xl"></i>
        </a>
    </div>
    <?php
    if (count($list_post) > 0) {
    ?>
        <div class="w-full h-full mt-5 border border-neutral-200">
            <table class="table lg:table-lg md:table-md sm:table-sm table-xs">
                <!-- head -->
                <thead class="bg-slate-700 text-white  text-sm">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Subtitle</th>
                        <th>Content</th>
                        <th>Created_at</th>
                        <th>User_id </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <?php
                    foreach ($list_post as $post) {
                        extract($post);
                   
                    ?>
                        <tr>
                            <th><?php echo $post_id ?></th>
                            <td class=" text-sm font-semibold"><?php echo $title ?></td>
                            <td><img class="w-[150px] h-[80px] object-cover border-2 border-neutral-400 rounded-md" src="../<?php echo $image_path . $image_url ?>" alt="billboard"></td>
                            <td class=" text-sm text-center max-md:hidden"><?php echo $sub_title?></td>
                           
                            <td class=" text-sm text-center max-md:hidden  w-auto h-10 line-clamp-1" style="width: 150px; overflow: hidden; text-overflow: ellipsis;" ><?php echo $content?></td>
                            <td class=" text-sm max-md:hidden"><?php echo date("d/m/Y", strtotime($post['created_at']))?></td>
                            <td class=" text-sm max-md:hidden"><?php echo $user_id?></td>
                            <td>
                                <div class="dropdown dropdown-bottom dropdown-end">
                                    <label tabindex="0" class="cursor-pointer m-1">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </label>
                                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-40">
                                        <li><a class=" font-semibold" href="index.php?act=update_post&post_id=<?php echo $post_id ?>"><i class="bi bi-pencil"></i> Update</a></li>
                                        <li>
                                            <a class=" font-semibold" href="index.php?act=delete_post&post_id=<?php echo $post_id ?>" onclick="confirmDelete(this.href); return false;"> <i class="bi bi-trash3"></i>Remove </a>
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
        <div class="w-full text-center py-10"><?php echo isset($_POST['filter_pd']) ? "No post found!" : 'No post created! Create now!' ?></div>
    <?php
    }
    ?>

</div>