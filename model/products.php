<?php

function getall_product($keyword, $category_id, $brand_id)
{
    $sql = "SELECT *  FROM products WHERE 1";

    if (!empty($keyword)) {
        $sql .= ' and name like "%' . $keyword . '%"';
    }
    if (!empty($category_id)) {
        $sql .= " and category_id = '" . $category_id . "'";
    }
    if (!empty($brand_id)) {
        $sql .= " and brand_id = '" . $brand_id . "'";
    }
    return pdo_query($sql);
}

function getone_product($product_id)
{
    $sql = "SELECT * FROM products WHERE product_id=$product_id";
    return pdo_query_one($sql);
}

function insert_product($name, $descrition, $discount, $category_id, $brand_id, $is_featured)
{
    $sql = "INSERT INTO products (name, description, discount, category_id, brand_id, is_featured) VALUES(?,?,?,?,?,?) ";
    $pdo = pdo_execute($sql, $name, $descrition, $discount, $category_id, $brand_id, $is_featured);
    return $pdo->lastInsertId();
}

function update_product($product_id, $name, $description, $discount, $category_id, $brand_id, $is_featured)
{

    $sql = "UPDATE products SET name=?, description=?, discount=?, category_id=?, brand_id=?, is_featured=? where product_id = ?";
    pdo_execute($sql, $name, $description, $discount, $category_id, $brand_id, $is_featured, $product_id);
}

function delete_product($product_id)
{
    $sql = "DELETE FROM products WHERE product_id=?";
    pdo_execute($sql, $product_id);
}


/// client side

function get_feature_product()
{
    $sql = "SELECT products.*, categories.name as category_name, GROUP_CONCAT(images.image_url) AS image_urls
    FROM products
    INNER JOIN images ON products.product_id = images.product_id
    LEFT JOIN categories ON products.category_id = categories.category_id
    WHERE products.is_featured = 1
    GROUP BY products.product_id
    LIMIT 10";
    return pdo_query($sql);
}

function get_latest_product()
{
    $sql = "SELECT products.*, categories.name as category_name, GROUP_CONCAT(images.image_url) AS image_urls
    FROM products
    INNER JOIN images ON products.product_id = images.product_id
    LEFT JOIN categories ON products.category_id = categories.category_id
    GROUP BY products.product_id
    ORDER BY products.product_id DESC
    LIMIT 10";
    return pdo_query($sql);
}

function getall_product_shoppage($keyword, $min, $max, $category_id, $brand_id, $page)
{
    $items_per_page = 6;
    $offset = ($page - 1) * $items_per_page;
    $sql = "SELECT products.*, categories.name as category_name, GROUP_CONCAT(images.image_url) AS image_urls
    FROM products
    INNER JOIN images ON products.product_id = images.product_id
    LEFT JOIN variants ON variants.product_id = products.product_id
    LEFT JOIN categories ON products.category_id = categories.category_id 
    WHERE 1";

    if (!empty($keyword)) {
        $sql .= " AND (products.name LIKE '%$keyword%' OR products.description LIKE '%$keyword%') ";
    }
    if (!empty($min)) {
        $sql .= " AND variants.price > '$min'";
    }
    if (!empty($max)) {
        $sql .= " AND variants.price < '$max'";
    }
    if (!empty($category_id) && $category_id !== 'all') {
        $sql .= " AND products.category_id='$category_id'";
    }
    if (!empty($brand_id)) {
        $sql .= " AND products.brand_id='$brand_id'";
    }

    $sql .= " GROUP BY products.product_id LIMIT $offset, $items_per_page";

    return pdo_query($sql);
}

function count_products()
{
    $sql = "SELECT COUNT(*) as total from products";
    return pdo_query_one($sql);
}

function getone_product_client($product_id)
{
    $sql = "SELECT products.*, categories.name as category_name,brand.name as brand_name, GROUP_CONCAT(images.image_url) AS image_urls
    FROM products
    INNER JOIN images ON products.product_id = images.product_id
    LEFT JOIN categories ON products.category_id = categories.category_id
    LEFT JOIN brand ON products.brand_id = brand.brand_id
    WHERE products.product_id = ?
    GROUP BY products.product_id";
    return pdo_query_one($sql, $product_id);
}

function inscrease_views($product_id)
{
    $sql = "UPDATE products SET views = views + 1 WHERE product_id = '$product_id'";
    pdo_execute($sql);
}

function getall_products(){
    $sql = "SELECT * from products";
    return pdo_query($sql);
}
function load_product_samecategories()
{
    $sql = "SELECT products.*, categories.name as category_name, GROUP_CONCAT(images.image_url) AS image_urls
    FROM products
    INNER JOIN images ON products.product_id = images.product_id
    LEFT JOIN categories ON products.category_id = categories.category_id
    WHERE products.product_id = products.product_id
    GROUP BY products.product_id
    LIMIT 10";
    $result = pdo_query($sql);
    return $result;
}

