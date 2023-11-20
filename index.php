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
include './model/comment.php';
include './model/users.php';
include './model/roles.php';


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
                            unset($_SESSION['users']);
                            header('location: index.php');
                            break;
                            case "profile":
                                if (isset($_GET['user_id']) && isset($_SESSION['user'])) {
                                    $user_id = $_GET['user_id'];
                                    $_SESSION['profile_user_id'] = $user_id;
                                 
                                }
                                include('./view/auth/list.php');
                                break;
                                case "update-profile":
                                    if (isset($_GET['user_id'])) {
                                        $user_id = $_GET['user_id'];
                                        $current_user = getone_user($user_id);
                                        $roles = getall_role();
                                        $arrayAddress = explode(',', $current_user['address']);
                                        if (isset($_POST['update_user'])) {
                                            $error = array();
                                            $name = $_POST['name'];
                                            $email = $_POST['email'];
                                            $password = $_POST['password'];
                                            $phone = $_POST['phone'];
                                            $city = $_POST['city'];
                                            $district = $_POST['district'];
                                            $ward = $_POST['ward'];
                                            $role_id = $_POST['role_id'];
        
        
                                            if (empty($name)) {
                                                $error['name'] = "Name is required!";
                                            }
                                            if (empty($email)) {
                                                $error['email'] = "Email is required!";
                                            }
                                            if (empty($password)) {
                                                $error['password'] = "Password is required!";
                                            }
                                            if (empty($city)) {
                                                $error['city'] = "City is required!";
                                            }
                                            if (empty($district)) {
                                                $error['district'] = "District is required!";
                                            }
                                            if (empty($ward)) {
                                                $error['ward'] = "Ward is required!";
                                            }
                                            if (empty($role_id)) {
                                                $error['role_id'] = "Role is required!";
                                            }
        
        
                                            if (empty($_FILES['image_url']['name'])) {
                                                $image_url = $current_user['image_url'];    
                                            } else {
                                                $targetDir = '../upload/';
                                                $newFileName = uniqid() . $_FILES['image_url']['name'];
                                                $targetFile = $targetDir . $newFileName;
        
                                                if (move_uploaded_file($_FILES['image_url']['tmp_name'], $targetFile)) {
                                                    $image_url = $newFileName;
                                                } else {
                                                    $error['image_url'] = "Some thing went wrong!!";
                                                }
                                            }
        
                                            if (empty($error)) {
                                                $address = $city . "," . $district . "," . $ward;
                                                update_user($current_user["user_id"], $name, $email, $password, $phone, $address, $image_url, $role_id);
                                                header('location: index.php?act=list_user');
                                            }
                                        }
                                        include('view/auth/update.php');
                                    }
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
                            case 'list_user':
                                $user_id = $_SESSION['users']['user_id'];
                                $list_user = getall_user($user_id);
                           
                             
                        
                                  
                                include('view/auth/list.php');
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