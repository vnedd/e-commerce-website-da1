<?php
session_start();

if (!isset($_SESSION['carts'])) $_SESSION['carts'] = [];

include './global.php';
include './model/pdo.php';
include './model/billboards.php';
include './model/categories.php';
include './model/products.php';
include './model/variants.php';
include './model/shipping-types.php';
include './model/orders.php';
include './model/brands.php';
include './model/users.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.0.7/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/index.css">
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
                            if (isset($_POST['login'])) {
                                $error = array();
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                              

                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    $error['email'] = 'Invalid email address';
                                }
                                if (strlen($password) < 6) {
                                    $error['password'] = 'Password must be at least 6 characters long';
                                }
                                if (strlen($password) < 1) {
                                    $error['password'] = ' You must Enter Password';
                                }
                                $user = checklogin_client($email, $password);

                                if (is_array($user)) {
                                    $_SESSION['user'] = $user;
                                    header('location: index.php');
                                } else {
                                    $login_error = "Email or password invalid!";
                                }
                            }
                            include('./view/auth/login.php');
                            break;
                        case 'sign-up':
                            if (isset($_POST['sign-up'])) {
                                $error = array();
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $password = $_POST['password'];

                                if (empty($name)) {
                                    $error['name'] = 'This field is required!';
                                }

                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    $error['email'] = 'Invalid email address';
                                }

                                $user = checksignup_client($email);
                                if (is_array($user)) {
                                    $error['email'] = 'Email already exists';
                                }
                                if (strlen($password) < 6) {
                                    $error['password'] = 'Password must be at least 6 characters long';
                                }

                                if (empty($error)) {
                                    // insert into database
                                    insert_user($name, $email, $password);
                                    header('location: index.php?act=login');
                                }
                            }
                            include('./view/auth/sign-up.php');
                            break;
                        case 'sign-out':
                            unset($_SESSION['user']);
                            header('location: index.php?act=login');
                            break;
                            
                        case 'forget-password':
                                if (isset($_POST['sendMail'])) {
                                    $error = array();
                                    $email = $_POST['email'];
                                    if (empty($email)) {
                                      $error['email']="You aren't enter email the email yet";
                                    }
                                    if(!empty($email)){
                                        $error['email']="The password has been sent to your mail ";
                                    }
                                    $sendMailMess = sendMail($email);
                                }
                                include('view/auth/fgpass.php');
                                break;
                        case "profile":
                            if (isset($_GET['user_id']) && isset($_SESSION['user'])) {
                                $user = $_SESSION['user'];
                                $user_id = $user['user_id'];
                                $arrayAddress = array();
                                $orders = getall_order_by_userId($user_id);
                                if (!empty($user['address'])) {
                                    $arrayAddress = explode(',', $user['address']);
                                }

                                if (isset($_POST['update_user'])) {
                                    $error = array();
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $password = $_POST['password'];
                                    $phone = $_POST['phone'];
                                    $city = $_POST['city'];
                                    $district = $_POST['district'];
                                    $ward = $_POST['ward'];

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


                                    if (empty($_FILES['image_url']['name'])) {
                                        $image_url = $user['image_url'];
                                    } else {
                                        $targetDir = './upload/';
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
                                        update_user($user_id, $name, $email, $password, $phone, $address, $image_url, 2);
                                        $newUser = getone_user($user_id);
                                        $_SESSION['user'] = $newUser;
                                        header("location: index.php?act=profile&user_id=$user_id");
                                    }
                                }
                            }
                            include('./view/auth/profile.php');
                            break;
                        case 'view-cart':
                            $carts = $_SESSION['carts'];
                            include('./view/cart/view-cart.php');
                            break;
                        case 'addtocart':
                            if (isset($_POST['add-to-cart'])) {
                                $product_id = $_POST['product_id'];
                                $name = $_POST['name'];
                                $discount = $_POST['discount'];
                                $image_url = $_POST['image_url'];
                                $quantity = $_POST['quantity'];
                                $variant_id = $_POST['variant_id'];

                                $variant = getone_variant($variant_id);

                                if (is_array($variant)) {
                                    $dataCart = array(
                                        'product_id' => $product_id,
                                        'name' => $name,
                                        'price' => floatval($variant['price']) -  (floatval($variant['price']) / 100) * floatval($discount),
                                        'image_url' => $image_url,
                                        'quantity' => $quantity,
                                        'variant_id' => $variant['variant_id'],
                                        'variant_name' => $variant['variant_name'],
                                        'variant_price' => $variant['price'],
                                    );
                                    $_SESSION['carts'][] = $dataCart;
                                    header('location: index.php?act=view-cart');
                                }
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

                        case 'checkout':
                            if (!$_SESSION['user']) {
                                header('location: index.php?act=login');
                            }
                            $carts = $_SESSION['carts'];
                            $shippingTypes = getall_shippingTypes();
                            $paymentMethods = getPayment_method();

                            if (isset($_POST['place-order'])) {
                                $error = array();
                                $user_id = $_POST['user_id'];
                                $username = $_POST['name'];
                                $email = $_POST['email'];
                                $phone = $_POST['phone'];
                                $order_note = $_POST['order-note'];
                                $createdAt = date("Y-m-d");
                                $totalAmount = $_POST['total-price'];
                                $address = $_POST['address'];
                                $shipingType = $_POST['shipping_type'];
                                $payment_method = $_POST['payment_method'];
                                $payment_status = "Processing";
                                $order_status = 'Processing';

                                if (empty($username)) {
                                    $error['name'] = "Username is required";
                                }
                                if (empty($email)) {
                                    $error['email'] = "Email is required";
                                }
                                if (empty($phone)) {
                                    $error['phone'] = "Phone is required";
                                }
                                if (empty($address)) {
                                    $error['address'] = "Address is required";
                                }

                                if (empty($error)) {
                                    // insert order to database
                                    $conn = insert_order($username, $email, $phone, $order_note, $createdAt, $totalAmount, $address, $shipingType, $payment_method, $payment_status, $order_status, $user_id);
                                    $order_id = $conn->lastInsertId();
                                    if ($order_id) {
                                        foreach ($_SESSION['carts'] as $key => $cart) {
                                            $variant_id = $cart['variant_id'];
                                            $quantity = $cart['quantity'];
                                            $product_id = $cart['product_id'];
                                            $price_per_unit = $cart['price'];
                                            $product_name =   $cart['name'] . " " . $cart['variant_name'];
                                            $image = $cart['image_url'];
                                            insert_order_details($variant_id, $product_id, $product_name, $image,  $quantity, $price_per_unit, $order_id);
                                        }
                                        $_SESSION['carts'] = [];
                                        if ($payment_method === 'online payment') {
                                            header("location: index.php?act=online-payment&order_id=$order_id");
                                        }
                                        if ($payment_method === 'payment on delivery') {
                                            header("location: index.php?act=order-completed&order_id=$order_id");
                                        }
                                    }
                                }
                            }
                            include('./view/checkout.php');
                            break;
                        case 'online-payment':
                            include('./view/vnpay/online-payment.php');
                            break;
                        case 'online-payment-result':
                            include('./view/vnpay/online-payment-result.php');
                            break;
                        case 'order-completed':
                            if (isset($_GET['order_id'])) {
                                $order_id = $_GET['order_id'];
                                $order = getone_order($order_id);
                                $order_details = getall_order_details_by_orderId($order_id);
                            }
                            include('./view/order-completed.php');
                            break;
                        case 'cancel_order':
                            if (isset($_GET['order_id'])) {
                                $order_id = $_GET['order_id'];
                                update_OrderStatus($order_id, "Cancelled");
                                update_PaymentStatus($order_id, "Return");
                                header('location: index.php?act=shop');
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
                            if (isset($_POST['filter'])) {
                                $minPrice = $_POST['min-price'];
                                $maxPrice = $_POST['max-price'];
                                $keyword = $_POST['keyword'];
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
                                $variants = getall_variant_by_productId($product_id);
                              

                                inscrease_views($product_id);
                                $variantDataJson = json_encode($variants);
                              
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
                            $latest_products = get_latest_product();
                            include './view/home.php';
                            break;
                    }
                } else {
                    $billboards = getall_billboard();
                    $categories = getall_category();
                    $feature_products = get_feature_product();
                    $latest_products = get_latest_product();

                    include './view/home.php';
                }
                ?>
            </main>
        </div>
        <?php
        include './view/footer.php';
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script src="./assets/js/index.js"></script>
    <script src="./assets/js/shopping-modal.js"></script>
</body>

</html>