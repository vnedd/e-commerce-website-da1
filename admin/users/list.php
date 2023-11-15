<div class="animate__animated animate__lightSpeedInLeft animate__faster ">
    <div class="flex items-center justify-between border-b border-neutral-300 pb-5 px-2">
        <div>
            <h4 class="font-semibold text-3xl ">Users</h4>
            <p class="text-neutral-500 mt-1">List of the user</p>
        </div>
        <a class="btn md:btn-md btn-sm rounded-full bg-slate-700 hover:bg-slate-900 text-white  " href="index.php?act=add_user">
            <p class="capitalize">Add new user</p>
            <i class="bi bi-plus-circle text-xl"></i>
        </a>
    </div>
    <?php
    if (count($list_user) > 0) {
    ?>
        <div class="w-full h-full mt-5 border border-neutral-200">
            <table class="table lg:table-lg md:table-md sm:table-sm table-xs">
                <!-- head -->
                <thead class="bg-slate-700 text-white lg:text-base text-sm ">
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th class="max-md:hidden">Role</th>
                        <th class="max-md:hidden">Phone Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($list_user as $user) {
                        extract($user);
                    ?>
                        <tr>
                            <th><?php echo $user_id ?></th>
                            <td class="font-semibold"><?php echo $name ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $password ?></td>
                            <td class="max-md:hidden"><?php echo $role_id == "2" ? "Normal" : "Admin" ?></td>
                            <td class="max-md:hidden"><?php echo $phone ? $phone : "<span class='text-orange-600'>No phone numbe!</span>" ?></td>
                            <td>
                                <div class="dropdown dropdown-bottom dropdown-end">
                                    <label tabindex="0" class="cursor-pointer m-1">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </label>
                                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-40">
                                        <li><a class=" font-semibold" href="index.php?act=update_user&user_id=<?php echo $user_id ?>"><i class="bi bi-pencil"></i> Update</a></li>
                                        <li>
                                            <a class=" font-semibold" href="index.php?act=delete_user&user_id=<?php echo $user_id ?>" onclick="confirmDelete(this.href); return false;"> <i class="bi bi-trash3"></i>Remove </a>
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
        <div class="w-full text-center py-10"><?php echo isset($_POST['filter_pd']) ? "No user found!" : 'No user created! Create now!' ?></div>
    <?php
    }
    ?>

</div>