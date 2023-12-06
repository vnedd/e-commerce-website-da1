<div class=" bg-white shadow-lg px-7 py-2 fixed top-0 left-0 right-0 h-[90px] z-50">
    <div class=" flex items-center justify-between md:justify-start h-full mx-auto">
        <div class="md:hidden">
            hello
        </div>

        <div class="items-center space-x-3 lg:pr-16 pr-6 shrink hidden md:flex">
            <a href="index.php"><img src="./assets/img/logo.svg" alt="logo" class="w-14 h-14"></a>
        </div>
        <nav class="flex justify-between">
            <ul class="md:flex items-center space-x-4 hidden">
                <li>
                    <a href="index.php?act=shop" class="font-medium text-sm  text-slate-500 hover:text-slate-800 <?php echo isset($_GET['act']) && $_GET['act'] === "shop" ? "text-slate-800 font-medium" : "" ?>">Shop</a>
                </li>
                <li>
                    <a href=" index.php?act=aboutus_site" class="font-medium text-sm  text-slate-500 hover:text-slate-800 <?php echo isset($_GET['act']) && $_GET['act'] === "aboutus" ? "text-slate-800 font-medium" : "" ?>">About us</a>
                </li>
                <li>
                    <a href="index.php?act=view_contact" class="font-medium text-sm  text-slate-500 hover:text-slate-800 <?php echo isset($_GET['act']) && $_GET['act'] === "contact" ? "text-slate-800 font-medium" : "" ?>">Contact us</a>
                </li>
                <li>
                    <a href="index.php" class="font-medium text-sm  text-slate-500 hover:text-slate-800 <?php echo isset($_GET['act']) && $_GET['act'] === "faqs" ? "text-slate-800 font-medium" : "" ?>">Faqs</a>
                </li>
                <li>
                    <a href="index.php?act=list_post" class="font-medium text-sm  text-slate-500 hover:text-slate-800 <?php echo isset($_GET['act']) && $_GET['act'] === "Posts" ? "text-slate-800 font-medium" : "" ?>">Post</a>
                </li>
            
            </ul>
        </nav>
        <div class="ml-auto flex items-center space-x-4">
            <div class="indicator">
                <span class="indicator-item badge p-2 py-3 bg-slate-800 text-white mt-2 mr-2"><?php echo isset($_SESSION['carts']) ? count($_SESSION['carts']) : 0 ?></span>
                <button class="btn btn-circle outline-none border-0 bg-transparent hover:bg-slate-200 btn-md">
                    <a href="index.php?act=view-cart"><i class="bi bi-basket text-xl"></i></a>
                </button>
            </div>
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="flex items-center justify-between space-x-4 border border-slate-400 px-4 py-2 cursor-pointer rounded-full"> <i class="bi bi-person"></i> <i class="bi bi-caret-down-fill"></i></label>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <li><a href="index.php?act=profile&user_id=<?php echo $_SESSION['user']['user_id'] ?>">My profile</a></li>
                        <li><a href="index.php?act=sign-out">Sign Out</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="index.php?act=login">Login</a></li>
                        <li><a href="index.php?act=sign-up">Sign up</a></li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</div>