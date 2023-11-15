<?php
ob_start();
session_start();
if (!isset($_SESSION['admin'])) {
    header('location: sign-in.php');
}
include '../global.php';
include '../model/pdo.php';
include '../model/billboards.php';
include '../model/brands.php';
include '../model/categories.php';
include '../model/products.php';
include '../model/images.php';
include '../model/users.php';
include '../model/roles.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="../assets/css/index.css">
</head>

<body>
    <div class="w-full overflow-x-hidden">
        <div class="w-full flex items-center">
            <?php include('./sidebar.php') ?>
            <div class="flex-1 min-h-screen h-full lg:ml-[260px] ml-[80px] p-5">
                <?php
                if (isset($_GET['act'])) {
                    $act = $_GET['act'];
                    switch ($act) {
                        case 'sign-out':
                            unset($_SESSION['admin']);
                            header('location: sign-in.php');
                            break;
                        case 'list_billboard':
                            $list_billboard = getall_billboard();
                            include('./billboards/list.php');
                            break;
                        case 'add_billboard':
                            if (isset($_POST['add_billboard'])) {
                                $error = array();

                                $title = $_POST['title'];
                                $subtitle = $_POST['subtitle'];

                                if (empty($title)) {
                                    $error['title'] = "Please enter billboard title!";
                                }
                                if (empty($subtitle)) {
                                    $error['subtitle'] = "Please enter billboard subtitle!";
                                }

                                if (empty($_FILES['image_url']['name'])) {
                                    $error['image_url'] = "Image is required";
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
                                    insert_billboard($title, $subtitle, $image_url);
                                    header('location: index.php?act=list_billboard');
                                }
                            }
                            include('./billboards/add.php');
                            break;
                        case 'update_billboard':
                            if (isset($_GET['billboard_id'])) {
                                $billboard_id = $_GET['billboard_id'];
                                $billboard = getone_billboard($billboard_id);
                                if (isset($_POST['update_billboard'])) {
                                    $error = array();

                                    $title = $_POST['title'];
                                    $subtitle = $_POST['subtitle'];

                                    if (empty($title)) {
                                        $error['title'] = "Please enter billboard title!";
                                    }
                                    if (empty($subtitle)) {
                                        $error['subtitle'] = "Please enter billboard subtitle!";
                                    }

                                    if (empty($_FILES['image_url']['name'])) {
                                        $image_url = $billboard['image_url'];
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
                                        update_billboard($billboard_id, $title, $subtitle, $image_url);
                                        header('location: index.php?act=list_billboard');
                                    }
                                }
                            }
                            include('./billboards/update.php');
                            break;
                        case 'delete_billboard':
                            if ($_GET['billboard_id']) {
                                $billboard_id = $_GET['billboard_id'];
                                $billboard = getone_billboard($billboard_id);
                                $image_url = "../" . $image_path . $billboard['image_url'];
                                if (file_exists($image_url)) {
                                    unlink($image_url);
                                }
                                delete_billboard($_GET['billboard_id']);
                                header("Location:index.php?act=list_billboard");
                            }
                            break;
                        case 'list_brand':
                            $list_brand = getall_brand();
                            include('./brands/list.php');
                            break;
                        case 'add_brand':
                            if (isset($_POST['add_brand'])) {
                                $error = array();

                                $name = $_POST['name'];
                                $description = $_POST['description'];

                                if (empty($name)) {
                                    $error['name'] = "Please enter brand name!";
                                }
                                if (empty($description)) {
                                    $error['description'] = "Please enter brand description!";
                                }

                                if (empty($error)) {
                                    insert_brand($name, $description);
                                    header('location: index.php?act=list_brand');
                                }
                            }
                            include('./brands/add.php');
                            break;
                        case 'update_brand':
                            if (isset($_GET['brand_id'])) {
                                $brand_id = $_GET['brand_id'];
                                $brand = getone_brand($brand_id);
                                if (isset($_POST['update_brand'])) {
                                    $error = array();

                                    $name = $_POST['name'];
                                    $description = $_POST['description'];

                                    if (empty($name)) {
                                        $error['name'] = "Please enter brand name!";
                                    }
                                    if (empty($description)) {
                                        $error['description'] = "Please enter brand description!";
                                    }

                                    if (empty($error)) {
                                        update_brand($brand_id, $name, $description);
                                        header('location: index.php?act=list_brand');
                                    }
                                }
                            }
                            include('./brands/update.php');
                            break;
                        case 'delete_brand':
                            if ($_GET['brand_id']) {
                                $brand_id = $_GET['brand_id'];
                                delete_brand($_GET['brand_id']);
                                header("Location:index.php?act=list_brand");
                            }
                            break;
                        case 'list_category':
                            $list_category = getall_category();
                            include('./categories/list.php');
                            break;
                        case 'add_category':
                            $list_category = getall_category();
                            if (isset($_POST['add_category'])) {
                                $error = array();

                                $name = $_POST['name'];
                                $description = $_POST['description'];
                                $parent_id = $_POST['parent_id'] || null;

                                if (empty($name)) {
                                    $error['name'] = "Please enter brand name!";
                                }
                                if (empty($description)) {
                                    $error['description'] = "Please enter brand description!";
                                }

                                if (empty($_FILES['image_url']['name'])) {
                                    $error['image_url'] = "Image is required";
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
                                    insert_category($name, $description, $image_url, $parent_id);
                                    header('location: index.php?act=list_category');
                                }
                            }
                            include('./categories/add.php');
                            break;
                        case 'update_category':
                            $list_category = getall_category();
                            if (isset($_GET['category_id'])) {
                                $category_id = $_GET['category_id'];
                                $current_cate = getone_category($category_id);

                                if (isset($_POST['update_category'])) {
                                    $error = array();

                                    $name = $_POST['name'];
                                    $description = $_POST['description'];
                                    $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : null;

                                    if (empty($name)) {
                                        $error['name'] = "Please enter category name!";
                                    }
                                    if (empty($description)) {
                                        $error['description'] = "Please enter category description!";
                                    }

                                    if (empty($_FILES['image_url']['name'])) {
                                        $image_url = $billboard['image_url'];
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
                                        update_category($category_id, $name, $description, $image_url, $parent_id);
                                        header('location: index.php?act=list_category');
                                    }
                                }
                            }
                            include('./categories/update.php');
                            break;
                        case 'delete_category':
                            if ($_GET['category_id']) {
                                $category_id = $_GET['category_id'];
                                update_when_delete_parrent($category_id);
                                delete_category($_GET['category_id']);
                                header("Location:index.php?act=list_category");
                            }
                            break;
                        case 'list_product':
                            $keyword = "";
                            $category_id = "";
                            $brand_id = "";
                            if (isset($_POST['filter_pd'])) {
                                $keyword = $_POST['keyword'];
                                $category_id = $_POST['category_id'];
                                $brand_id = $_POST['brand_id'];
                            } else {
                                $keyword = "";
                                $category_id = "";
                                $brand_id = "";
                            }

                            $list_product = getall_product($keyword, $category_id, $brand_id);
                            $list_category = getall_category();
                            $list_brand = getall_brand();

                            include('./products/list.php');
                            break;
                        case 'add_product':
                            $list_category = getall_category();
                            $list_brand = getall_brand();
                            if (isset($_POST['add_product'])) {
                                $error = array();

                                $name = $_POST['name'];
                                $description = $_POST['description'];
                                $price = $_POST['price'];
                                $discount = isset($_POST['discount']) ? floatval($_POST['discount']) : 0.0;
                                $is_featured = isset($_POST['is_featured']) ? 1 : 0;
                                $quantity = $_POST['quantity'];
                                $brand_id = $_POST['brand_id'];
                                $category_id = $_POST['category_id'];

                                if (empty($name)) {
                                    $error['name'] = "Please enter product name!";
                                }
                                if (empty($description)) {
                                    $error['description'] = "Please enter product description!";
                                }
                                if (empty($price)) {
                                    $error['price'] = "Please enter product price!";
                                }
                                if (empty($quantity)) {
                                    $error['quantity'] = "Please enter product quantity!";
                                }
                                if (empty($brand_id)) {
                                    $error['brand_id'] = "Please enter product brand Id!";
                                }
                                if (empty($category_id)) {
                                    $error['category_id'] = "Please enter product category Id!";
                                }

                                if (empty($_FILES['images']['name'][0])) {
                                    $error['images'] = "Upload at least 1 image";
                                }

                                if (empty($error)) {
                                    $last_id = insert_product($name, $description, $price, $quantity, $discount, $category_id, $brand_id, $is_featured);
                                    if ($last_id) {
                                        foreach ($_FILES['images']['name'] as $key => $name) {
                                            $targetDir = '../upload/';
                                            $tmp_name = $_FILES['images']['tmp_name'][$key];
                                            $file_name = uniqid() . '_' . $name;
                                            $targetFile = $targetDir . $file_name;

                                            if (move_uploaded_file($tmp_name, $targetFile)) {
                                                insert_image($file_name, $last_id);
                                            } else {
                                                $error['images'] = "Some thing went wrong!!";
                                            }
                                        }
                                    }
                                    header('location: index.php?act=list_product');
                                }
                            }

                            include('./products/add.php');
                            break;
                        case "update_product":
                            $list_category = getall_category();
                            $list_brand = getall_brand();
                            if (isset($_GET['product_id'])) {
                                $product_id = $_GET['product_id'];
                                $current_pd = getone_product($product_id);
                                $product_images = getall_image_by_id_product($product_id);

                                if (isset($_POST['add_product'])) {
                                    $error = array();

                                    $name = $_POST['name'];
                                    $description = $_POST['description'];
                                    $price = $_POST['price'];
                                    $discount = isset($_POST['discount']) ? floatval($_POST['discount']) : 0.0;
                                    $is_featured = isset($_POST['is_featured']) ? 1 : 0;
                                    $quantity = $_POST['quantity'];
                                    $brand_id = $_POST['brand_id'];
                                    $category_id = $_POST['category_id'];

                                    if (empty($name)) {
                                        $error['name'] = "Please enter product name!";
                                    }
                                    if (empty($description)) {
                                        $error['description'] = "Please enter product description!";
                                    }
                                    if (empty($price)) {
                                        $error['price'] = "Please enter product price!";
                                    }
                                    if (empty($quantity)) {
                                        $error['quantity'] = "Please enter product quantity!";
                                    }
                                    if (empty($brand_id)) {
                                        $error['brand_id'] = "Please enter product brand Id!";
                                    }
                                    if (empty($category_id)) {
                                        $error['category_id'] = "Please enter product category Id!";
                                    }
                                    if (empty($error)) {
                                        update_product($product_id, $name, $description, $price, $quantity, $discount, $category_id, $brand_id, $is_featured);
                                        if (!empty($_FILES['images']['name'][0])) {
                                            deleteall_image_by_id_product($product_id);
                                            foreach ($_FILES['images']['name'] as $key => $name) {
                                                $targetDir = '../upload/';
                                                $tmp_name = $_FILES['images']['tmp_name'][$key];
                                                $file_name = uniqid() . '_' . $name;
                                                $targetFile = $targetDir . $file_name;

                                                if (move_uploaded_file($tmp_name, $targetFile)) {
                                                    insert_image($file_name, $product_id);
                                                } else {
                                                    $error['images'] = "Some thing went wrong!!";
                                                }
                                            }
                                        }
                                        header('location: index.php?act=list_product');
                                    }
                                }
                            }

                            include('./products/update.php');
                            break;
                        case 'delete_product':
                            if ($_GET['product_id']) {
                                $product_id = $_GET['product_id'];
                                deleteall_image_by_id_product($product_id);
                                delete_product($_GET['product_id']);
                                header("Location:index.php?act=list_product");
                            }
                            break;
                        case 'list_user':
                            $list_user = getall_user();
                            include('./users/list.php');
                            break;
                        case 'add_user':
                            $roles = getall_role();
                            if (isset($_POST['add_user'])) {
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
                                    $error['image_url'] = "Image is required!";
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
                                    insert_user($name, $email, $password, $phone, $address, $image_url, $role_id);
                                    header('location: index.php?act=list_user');
                                }
                            }
                            include('./users/add.php');
                            break;
                        case "update_user":
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
                                include('./users/update.php');
                            }
                            break;
                        case "delete_user":
                            if ($_GET['user_id']) {
                                $user_id = $_GET['user_id'];
                                delete_user($_GET['user_id']);
                                header("Location:index.php?act=list_user");
                            }
                            break;
                        default:
                            include 'dashboard.php';
                            break;
                    }
                } else {
                    include 'dashboard.php';
                }
                ?>
            </div>
        </div>
    </div>
    </div>

    <script>
        function confirmDelete(url) {
            const result = confirm("Are you sure to delete this?");
            if (result) {
                window.location.href = url;
            }
        }
    </script>

</body>

</html>