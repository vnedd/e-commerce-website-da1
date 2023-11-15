<?php
ob_start();
session_start();

if (!isset($_SESSION['carts'])) $_SESSION['carts'] = [];

include './global.php';
include './model/pdo.php';
include './model/billboards.php';
include './model/categories.php';
include './model/products.php';
include './model/brands.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.0.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nouislider@14.6.4/distribute/nouislider.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body class="overflow-x-hidden scrollbar-hide">
    <div class="app ">
        <div class="w-screen">
            <?php
            include './view/header.php';
            ?>
            <main class="mt-[90px]">
                <?php
                if (isset($_GET['act'])) {
                    $act = $_GET['act'];
                    switch ($act) {
                        case 'login':
                            include('./view/auth/login.php');
                            break;
                        case 'sign-up':
                            include('./view/auth/sign-up.php');
                            break;
                            case 'log-out':
                            unset($_SESSION['Blazes']);
                            header('location: login.php');
                            break;
                        case 'view-cart':
                            $carts = $_SESSION['carts'];
                            include('./view/cart/view-cart.php');
                            break;
                        case 'addtocart':
                            if (isset($_POST['add-to-cart'])) {
                                $reload = false;
                                $product_id = $_POST['product_id'];
                                $name = $_POST['name'];
                                $price = $_POST['price'];
                                $image_url = $_POST['image_url'];
                                $quantity = $_POST['quantity'];

                                $dataCart = array(
                                    'product_id' => $product_id,
                                    'name' => $name,
                                    'price' => $price,
                                    'image_url' => $image_url,
                                    'quantity' => $quantity,
                                );
                                $_SESSION['carts'][] = $dataCart;
                                header('location: index.php?act=view-cart');
                            }
                            break;
                        case 'update-cart':
                            $carts = $_SESSION['carts'];
                            if (isset($_POST['update-cart'])) {
                                $cart_indexs = $_POST['cart_index'];
                                $quantity = $_POST['quantity'];
                                foreach ($cart_indexs as $key => $item) {
                                    $_SESSION['carts'][$item]['quantity'] = $quantity[$key];
                                }
                                header('location: index.php?act=view-cart');
                            }
                            break;
                        case 'delete-cart':
                            $_SESSION['carts'];
                            if (isset($_GET['cart-id'])) {
                                $cart_id = $_GET['cart-id'];
                                unset($_SESSION['carts'][$cart_id]);
                                header('location: index.php?act=view-cart');
                            }
                            break;

                        case 'shop':
                            $keyword = "";
                            $minPrice = "";
                            $maxPrice = "";
                            $category_id = "";
                            $brand_id = "";
                            $brands = getall_brand();
                            $product_in_categorys = count_product_in_category();
                            if (isset($_GET['min-price']) && isset($_GET['max-price'])) {
                                $minPrice = $_GET['min-price'];
                                $maxPrice = $_GET['max-price'];
                                $keyword = $_POST['keyword'];
                                if ($minPrice > $maxPrice) {
                                    $price_error = "Please re-enter valid value!";
                                } else {
                                    $products = getall_product_shoppage($keyword, $minPrice, $maxPrice, $category_id, $brand_id);
                                }
                            }
                            if (isset($_GET['category_id'])) {
                                $category_id = $_GET['category_id'];
                            }
                            if (isset($_GET['brand_id'])) {
                                $brand_id = $_GET['brand_id'];
                            }
                            $products = getall_product_shoppage($keyword, $minPrice, $maxPrice, $category_id, $brand_id);

                            include('./view/shop.php');
                            break;
                        case 'product':
                            if (isset($_GET['product_id'])) {
                                $product_id = $_GET['product_id'];
                                $product = getone_product_client($product_id);
                                extract($product);
                                $image_urls = explode(',', $image_urls);
                                include('./view/product.php');
                            } else {
                                header('location: index.php');
                            }
                            break;
                        default:
                            $billboards = getall_billboard();
                            $categories = getall_category();
                            $feature_products = get_feature_product();
                            include './view/home.php';
                            break;
                    }
                } else {
                    $billboards = getall_billboard();
                    $categories = getall_category();
                    $feature_products = get_feature_product();
                    include './view/home.php';
                }
                ?>
            </main>
        </div>
        <?php
        include './view/footer.php';
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script src="./assets/js/index.js"></script>
    <script src="./assets/js/shopping-modal.js"></script>


</body>

</html>