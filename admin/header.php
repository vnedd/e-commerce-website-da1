<header>
    <div class="alert alert-heading alert-dark  ">
        <h1>Admin</h1>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php echo isset($_GET['act']) && ($_GET['act'] === 'add_cate' || $_GET['act'] === 'list_cate' || $_GET['act'] === 'edit_cate') ? "active" : ""  ?>">
                    <a class="nav-link" href="index.php?act=add_cate">Categories</a>
                </li>
                <li class="nav-item <?php echo isset($_GET['act']) && ($_GET['act'] === 'add_pd' || $_GET['act'] === 'list_pd' || $_GET['act'] === 'edit_pd') ? "active" : ""  ?>">
                    <a class="nav-link" href="index.php?act=add_pd">Products</a>
                </li>
                <li class="nav-item <?php echo isset($_GET['act']) && $_GET['act'] === 'add_account' ? "active" : ""  ?>">
                    <a class="nav-link" href="index.php?act=add_account">Accounts</a>
                </li>
                <li class="nav-item <?php echo isset($_GET['act']) && $_GET['act'] === 'list_comment' ? "active" : ""  ?>">
                    <a class="nav-link" href="index.php?act=list_comment">Comments</a>
                </li>
                <li class="nav-item <?php echo isset($_GET['act']) && ($_GET['act'] === 'statistical' || $_GET['act'] === 'chart') ? "active" : ""  ?>">
                    <a class="nav-link" href="index.php?act=statistical">Statistical</a>
                </li>
            </ul>
        </div>
    </nav>
</header>