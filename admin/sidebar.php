<?php
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
?>
<div class="lg:w-[260px] w-[80px] h-screen fixed top-0 bottom-0 left-0 border-r bg-white border-neutral-300 ">
    <div class="flex items-center gap-x-3 justify-center px-2 py-3 border-b border-neutral-300">
        <img src="../assets/img/logo.svg" alt="logo" class="w-10 h-10">
        <p class="lg:text-lg font-bold font-sans text-slate-900 hidden lg:block">Admin Dashboard</p>
    </div>
    <div class="flex items-center flex-col py-2 px-3 gap-y-2 relative h-full">
        <a class="flex items-center lg:justify-start justify-center gap-x-2 p-2 w-full rounded-md hover:bg-slate-50 text-slate-950 <?php echo $act === "dashboard" || !isset($_GET['act']) ? "bg-slate-50" : "" ?>" href="index.php?act=dashboard">
            <div class="tooltip" data-tip="Dashboard"><i class="bi bi-house-door text-xl "></i></div>
            <p class="font-semibold text-sm hidden lg:block">Dashboard</p>
        </a>
        <a class="flex items-center lg:justify-start justify-center gap-x-2 p-2 w-full rounded-md hover:bg-slate-50 text-slate-950 <?php echo str_ends_with($act, 'user') ? "bg-slate-50" : "" ?>" href="index.php?act=list_user">
            <div class="tooltip" data-tip="User account"><i class="bi bi-people text-xl"></i></div>
            <p class="font-semibold text-sm hidden lg:block">User Accounts</p>
        </a>
        <a class="flex items-center lg:justify-start justify-center gap-x-2 p-2 w-full rounded-md hover:bg-slate-50 text-slate-950 <?php echo str_ends_with($act, 'billboard') ? "bg-slate-50" : "" ?>" href="index.php?act=list_billboard">
            <div class="tooltip" data-tip="Billboard"><i class="bi bi-images text-xl"></i></div>
            <p class="font-semibold text-sm hidden lg:block">Billboards</p>
        </a>
        <a class="flex items-center lg:justify-start justify-center gap-x-2 p-2 w-full rounded-md hover:bg-slate-50 text-slate-950 <?php echo  str_ends_with($act, 'brand') ? "bg-slate-50" : "" ?>" href="index.php?act=list_brand">
            <div class="tooltip" data-tip="Brands"><i class="bi bi-app-indicator text-xl"></i></div>
            <p class="font-semibold text-sm hidden lg:block">Brands</p>
        </a>
        <a class="flex items-center lg:justify-start justify-center gap-x-2 p-2 w-full rounded-md hover:bg-slate-50 text-slate-950 <?php echo  str_ends_with($act, 'category') ? "bg-slate-50" : "" ?>" href="index.php?act=list_category">
            <div class="tooltip" data-tip="Categories"><i class="bi bi-boxes text-xl"></i></div>
            <p class="font-semibold text-sm hidden lg:block">Categories</p>
        </a>
        <a class="flex items-center lg:justify-start justify-center gap-x-2 p-2 w-full rounded-md hover:bg-slate-50 text-slate-950 <?php echo  str_ends_with($act, 'product') ? "bg-slate-50" : "" ?>" href="index.php?act=list_product">
            <div class="tooltip" data-tip="Products"><i class="bi bi-box text-xl"></i></div>
            <p class="font-semibold text-sm hidden lg:block">Products</p>
        </a>
        <a class="flex items-center lg:justify-start justify-center gap-x-2 p-2 w-full rounded-md hover:bg-slate-50 text-slate-950 <?php echo  str_ends_with($act, 'order') ? "bg-slate-50" : "" ?>" href="index.php?act=list_order">
            <div class="tooltip" data-tip="Orders"><i class="bi bi-ui-checks-grid text-xl"></i></div>
            <p class="font-semibold text-sm hidden lg:block">Orders</p>
        </a>
        <a class="flex items-center lg:justify-start justify-center gap-x-2 p-2 w-full rounded-md hover:bg-slate-50 text-slate-950 <?php echo  str_ends_with($act, 'comment') ? "bg-slate-50" : "" ?>" href="index.php?act=list_comment">
            <div class="tooltip" data-tip="Comments"><i class="bi bi-chat-dots text-xl"></i></div>
            <p class="font-semibold text-sm hidden lg:block">Comments</p>
        </a>
        <a class="flex items-center lg:justify-start justify-center gap-x-2 p-2 w-full rounded-md hover:bg-slate-50 text-slate-950 <?php echo  str_ends_with($act, 'post') ? "bg-slate-50" : "" ?>" href="index.php?act=list_post">
            <div class="tooltip" data-tip="Post"><i class="bi bi-mailbox2-flag"></i></div>
            <p class="font-semibold text-sm hidden lg:block">Post </p>
        </a>
        <a class="absolute bottom-[70px] flex items-center lg:justify-start justify-center gap-x-2 p-2 w-full rounded-md hover:bg-slate-50 text-slate-950 mt-auto" href="index.php?act=sign-out">
            <div class="tooltip" data-tip="Sign out">
                <i class="bi bi-box-arrow-left text-xl"></i>
            </div>
            <p class="font-semibold text-sm hidden lg:block">Sign Out</p>
        </a>
    </div>
</div>